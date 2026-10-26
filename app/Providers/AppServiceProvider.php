<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Throwable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->fallbackToSqliteWhenPostgresUnavailable();
    }

    private function fallbackToSqliteWhenPostgresUnavailable(): void
    {
        if (! env('DB_FALLBACK_TO_SQLITE', true)) {
            return;
        }

        if (config('database.default') !== 'pgsql') {
            return;
        }

        try {
            DB::connection('pgsql')->getPdo();
        } catch (Throwable $e) {
            $sqliteDatabase = config('database.connections.sqlite.database', database_path('database.sqlite'));

            if (! file_exists($sqliteDatabase)) {
                $directory = dirname($sqliteDatabase);
                if (! is_dir($directory)) {
                    mkdir($directory, 0775, true);
                }

                if (touch($sqliteDatabase) === false) {
                    throw new \RuntimeException("Unable to create SQLite database at {$sqliteDatabase}");
                }
            }

            DB::purge('pgsql');
            config(['database.default' => 'sqlite']);
            DB::setDefaultConnection('sqlite');

            Log::warning('Neon Postgres connection failed. Falling back to SQLite.', [
                'sqlite_database' => $sqliteDatabase,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
