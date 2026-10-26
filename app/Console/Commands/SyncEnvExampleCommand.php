<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SyncEnvExampleCommand extends Command
{
    protected $signature = 'env:sync {--files=* : Override the target .env files to sync} {--only=* : Only sync these keys} {--skip=* : Skip these keys} {--force : Overwrite protected values, including secrets and tokens} {--dry-run : Show what would change without writing files}';

    protected $description = 'Synchronize safe values from .env.example into sibling .env files';

    protected array $protectedKeys = [
        'APP_KEY',
        'APP_URL',
        'DATABASE_URL',
        'DB_URL',
        'DB_PASSWORD',
        'DB_HOST',
        'DB_DATABASE',
        'DB_USERNAME',
        'MAIL_PASSWORD',
        'MAIL_USERNAME',
        'MAIL_FROM_ADDRESS',
        'AWS_SECRET_ACCESS_KEY',
        'AWS_ACCESS_KEY_ID',
        'AWS_SESSION_TOKEN',
        'AWS_BUCKET',
        'NEON_AI_GATEWAY_TOKEN',
        'NEON_REALTIME_SECRET',
        'NEON_*',
        'S3_CLOUD_SECRET',
        'S3_CLOUD_KEY_ID',
    ];

    public function handle(): int
    {
        $examplePath = base_path('.env.example');

        if (! is_file($examplePath)) {
            $this->error('No .env.example file was found in the project root.');

            return self::FAILURE;
        }

        $exampleVariables = $this->parseEnvFile($examplePath);

        if ($exampleVariables === []) {
            $this->warn('The .env.example file is empty. Nothing to sync.');

            return self::SUCCESS;
        }

        $targetFiles = $this->option('files');

        if (empty($targetFiles)) {
            $targetFiles = $this->discoverEnvFiles();
        }

        $this->validateTargets($targetFiles);

        $only = $this->option('only');
        $skip = $this->option('skip');
        $force = $this->option('force');
        $dryRun = $this->option('dry-run');

        $updates = [];

        foreach ($targetFiles as $file) {
            $existing = is_file($file) ? $this->parseEnvFile($file) : [];
            $changes = [];

            foreach ($exampleVariables as $key => $value) {
                if (! empty($only) && ! in_array($key, $only, true)) {
                    continue;
                }

                if (in_array($key, $skip, true)) {
                    continue;
                }

                if ($this->shouldProtectKey($key) && ! $force) {
                    if (array_key_exists($key, $existing) && $existing[$key] !== '') {
                        continue;
                    }
                }

                if (! array_key_exists($key, $existing) || $force || $existing[$key] === '' || $this->looksLikePlaceholder($existing[$key])) {
                    $changes[$key] = $value;
                }
            }

            if ($changes !== []) {
                $updates[$file] = $changes;

                if ($dryRun) {
                    $this->info("Would update {$file}");
                    foreach ($changes as $key => $value) {
                        $this->line('  - '.sprintf('%s=%s', $key, $this->maskIfSensitive($key, $value)));
                    }
                }
            }
        }

        if ($dryRun) {
            if ($updates === []) {
                $this->info('All target .env files already match .env.example for the selected rules.');
            }

            return self::SUCCESS;
        }

        foreach ($updates as $file => $changes) {
            $finalValues = $this->mergeEnvData($file, $changes, $exampleVariables);
            $this->writeEnvFile($file, $finalValues);
            $this->info('Updated '.$file);
            foreach ($changes as $key => $value) {
                $this->line('  - '.sprintf('%s=%s', $key, $this->maskIfSensitive($key, $value)));
            }
        }

        if ($updates === []) {
            $this->info('No changes were needed.');
        }

        return self::SUCCESS;
    }

    protected function discoverEnvFiles(): array
    {
        $files = glob(base_path('.env*')) ?: [];
        $normalized = [];

        foreach ($files as $file) {
            $name = basename($file);
            if (in_array($name, ['.env.example'], true)) {
                continue;
            }

            $normalized[] = $file;
        }

        if ($normalized === []) {
            $normalized[] = base_path('.env');
        }

        sort($normalized);

        return $normalized;
    }

    protected function validateTargets(array $targetFiles): void
    {
        foreach ($targetFiles as $targetFile) {
            $path = $targetFile;
            if (! is_string($path) || $path === '') {
                continue;
            }

            if (! file_exists(dirname($path))) {
                $this->error('The target directory for '.$path.' does not exist.');
                exit(self::FAILURE);
            }
        }
    }

    protected function parseEnvFile(string $path): array
    {
        if (! is_file($path)) {
            return [];
        }

        $values = [];
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if ($lines === false) {
            return [];
        }

        foreach ($lines as $line) {
            $trimmed = trim($line);

            if ($trimmed === '' || str_starts_with($trimmed, '#')) {
                continue;
            }

            if (! str_contains($trimmed, '=')) {
                continue;
            }

            [$key, $value] = array_map('trim', explode('=', $trimmed, 2));
            $key = trim($key);
            $value = trim($value);

            if ($key === '') {
                continue;
            }

            $values[$key] = $this->normalizeValue($value);
        }

        return $values;
    }

    protected function normalizeValue(string $value): string
    {
        $value = trim($value);

        if (($value === "''" || $value === '""')) {
            return '';
        }

        if (preg_match('/^(["\'])(.*)\\1$/s', $value, $matches)) {
            return $matches[2];
        }

        return $value;
    }

    protected function mergeEnvData(string $file, array $changes, array $exampleVariables): array
    {
        $existing = is_file($file) ? $this->parseEnvFile($file) : [];
        $merged = $existing;

        foreach ($changes as $key => $value) {
            $merged[$key] = $value;
        }

        foreach ($exampleVariables as $key => $value) {
            if (! array_key_exists($key, $merged) && ! $this->shouldProtectKey($key)) {
                $merged[$key] = $value;
            }
        }

        return $merged;
    }

    protected function shouldProtectKey(string $key): bool
    {
        if (in_array($key, ['APP_KEY', 'DATABASE_URL', 'DB_URL', 'DB_PASSWORD', 'MAIL_PASSWORD', 'AWS_SECRET_ACCESS_KEY', 'NEON_AI_GATEWAY_TOKEN', 'NEON_REALTIME_SECRET', 'S3_CLOUD_SECRET'], true)) {
            return true;
        }

        foreach ($this->protectedKeys as $pattern) {
            $pattern = str_replace('\*', '.*', preg_quote($pattern, '/'));
            $pattern = '/^'.str_replace('\\*', '.*', $pattern).'$/i';

            if (preg_match($pattern, $key)) {
                return true;
            }
        }

        return preg_match('/(_KEY|_SECRET|_TOKEN|_PASSWORD)$/i', $key) === 1;
    }

    protected function looksLikePlaceholder(string $value): bool
    {
        $lower = strtolower(trim($value));

        $placeholders = [
            'changeme',
            'example',
            'your_password',
            'your_key',
            'your_secret',
            'null',
            'undefined',
            'replace_me',
        ];

        foreach ($placeholders as $placeholder) {
            if (str_contains($lower, $placeholder)) {
                return true;
            }
        }

        return $value === '';
    }

    protected function writeEnvFile(string $path, array $data): void
    {
        $lines = [];

        foreach ($data as $key => $value) {
            $lines[] = $key.'='.$this->formatEnvValue($value);
        }

        $content = implode(PHP_EOL, $lines).PHP_EOL;
        file_put_contents($path, $content);
    }

    protected function formatEnvValue(string $value): string
    {
        $needsQuotes = preg_match('/\s|[#"\']/', $value) === 1;

        if (! $needsQuotes) {
            return $value;
        }

        return '"'.str_replace('"', '\\"', $value).'"';
    }

    protected function maskIfSensitive(string $key, mixed $value): string
    {
        if ($this->shouldProtectKey($key) && is_string($value) && $value !== '') {
            return Str::mask($value, '*', 4, 6);
        }

        return (string) $value;
    }
}
