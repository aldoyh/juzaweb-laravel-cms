<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class UseBingDailyImageCommand extends Command
{
    protected $signature = 'app:use-bing-daily-image {--url= : Direct image URL override} {--save-to= : Storage path for the downloaded file} {--force : Replace existing app auth background even if it is already set}';

    protected $description = 'Download the Bing image of the day and use it for the auth background';

    public function handle(): int
    {
        $url = $this->option('url');
        $saveTo = $this->option('save-to') ?: 'juzaweb/images/auth-bg.jpg';

        try {
            $imageUrl = $url ?: $this->resolveBingImageUrl();

            if (! $imageUrl) {
                $this->error('Unable to resolve a Bing image for today.');

                return self::FAILURE;
            }

            $response = Http::timeout(30)->get($imageUrl);

            if (! $response->successful()) {
                $this->error('The image could not be fetched from Bing. HTTP '.$response->status());

                return self::FAILURE;
            }

            $contents = $response->body();

            if ($contents === '') {
                $this->error('The fetched image response was empty.');

                return self::FAILURE;
            }

            $path = $this->storeImage($saveTo, $contents);

            $this->info('Saved the daily Bing image to '.$path);
            $this->info('Tip: the auth layout reads the background from the default auth-bg asset path.');

            return self::SUCCESS;
        } catch (\Throwable $e) {
            $this->error('Failed to use Bing image: '.$e->getMessage());

            return self::FAILURE;
        }
    }

    protected function resolveBingImageUrl(): ?string
    {
        $apiUrl = 'https://www.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1&mkt=en-US';
        $response = Http::timeout(30)->get($apiUrl);

        if (! $response->successful()) {
            return null;
        }

        $payload = $response->json();
        $images = $payload['images'] ?? [];

        if (! is_array($images) || $images === []) {
            return null;
        }

        $first = $images[0] ?? null;
        $url = $first['url'] ?? null;

        if (! is_string($url) || $url === '') {
            return null;
        }

        return 'https://www.bing.com'.$url;
    }

    protected function storeImage(string $saveTo, string $contents): string
    {
        $normalizedPath = ltrim($saveTo, '/');
        $directory = public_path(dirname($normalizedPath));

        if (! is_dir($directory)) {
            mkdir($directory, 0775, true);
        }

        $file = public_path($normalizedPath);

        file_put_contents($file, $contents);

        return str_replace('\\', '/', $file);
    }
}
