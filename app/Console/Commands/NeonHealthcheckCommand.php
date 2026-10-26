<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

class NeonHealthcheckCommand extends Command
{
    protected $signature = 'neon:healthcheck';

    protected $description = 'Verify Neon Postgres, Object Storage, Functions, and Realtime integrations';

    public function handle(): int
    {
        $this->info('Running Neon service health checks...');

        $checks = [
            ['name' => 'Postgres', 'run' => fn () => $this->checkPostgres()],
            ['name' => 'Object Storage', 'run' => fn () => $this->checkObjectStorage()],
            ['name' => 'Functions', 'run' => fn () => $this->checkFunctions()],
            ['name' => 'Realtime', 'run' => fn () => $this->checkRealtime()],
        ];

        $failed = false;

        foreach ($checks as $check) {
            try {
                $details = $check['run']();
                $this->info("✔ {$check['name']}: {$details}");
            } catch (\Throwable $e) {
                $failed = true;
                $this->error("✘ {$check['name']}: {$e->getMessage()}");
            }
        }

        return $failed ? self::FAILURE : self::SUCCESS;
    }

    private function checkPostgres(): string
    {
        if (config('database.default') !== 'pgsql') {
            throw new RuntimeException('DB_CONNECTION is not set to pgsql.');
        }

        $result = DB::selectOne('select current_database() as db, current_user as "user"');

        if (! isset($result->db, $result->user)) {
            throw new RuntimeException('Unexpected query result from Postgres.');
        }

        return "connected to {$result->db} as {$result->user}";
    }

    private function checkObjectStorage(): string
    {
        $disk = config('filesystems.default') === 's3' ? 's3' : 'cloud';
        $path = 'healthchecks/neon-'.uniqid().'.txt';
        $contents = 'neon-ok';

        Storage::disk($disk)->put($path, $contents);
        $readBack = Storage::disk($disk)->get($path);
        Storage::disk($disk)->delete($path);

        if ($readBack !== $contents) {
            throw new RuntimeException('Object storage round-trip content mismatch.');
        }

        return "disk {$disk} read/write/delete succeeded";
    }

    private function checkFunctions(): string
    {
        $url = config('services.neon.functions.hello_base_url');

        if (! $url) {
            throw new RuntimeException('NEON_FUNCTION_HELLO_BASE_URL is not configured.');
        }

        $response = Http::timeout(15)->get($url);

        if (! $response->successful()) {
            throw new RuntimeException('Unexpected status code '.$response->status().'.');
        }

        return 'hello function responded with 2xx';
    }

    private function checkRealtime(): string
    {
        $url = config('services.neon.realtime.url');

        if (! $url) {
            throw new RuntimeException('NEON_REALTIME_URL is not configured.');
        }

        $parts = parse_url($url);
        $host = $parts['host'] ?? null;
        $path = ($parts['path'] ?? '/').(isset($parts['query']) ? '?'.$parts['query'] : '');

        if (! $host) {
            throw new RuntimeException('Invalid NEON_REALTIME_URL.');
        }

        $errno = 0;
        $errstr = '';
        $socket = @stream_socket_client("ssl://{$host}:443", $errno, $errstr, 10);

        if (! $socket) {
            throw new RuntimeException("TLS connection failed ({$errno}): {$errstr}");
        }

        $key = base64_encode(random_bytes(16));
        $request = "GET {$path} HTTP/1.1\r\n".
            "Host: {$host}\r\n".
            "Upgrade: websocket\r\n".
            "Connection: Upgrade\r\n".
            "Sec-WebSocket-Key: {$key}\r\n".
            "Sec-WebSocket-Version: 13\r\n\r\n";

        fwrite($socket, $request);
        $statusLine = fgets($socket) ?: '';
        fclose($socket);

        if (! preg_match('/HTTP\/1\.[01] (\d{3})/', $statusLine, $matches)) {
            throw new RuntimeException('No valid HTTP status from realtime endpoint.');
        }

        $status = (int) $matches[1];
        if (! in_array($status, [101, 200, 400, 401, 403, 426], true)) {
            throw new RuntimeException("Unexpected realtime handshake status {$status}.");
        }

        return "endpoint reachable (HTTP {$status})";
    }
}
