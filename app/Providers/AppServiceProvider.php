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
        $this->ensureSqliteDatabaseExists();
        $this->fallbackToSqliteWhenPostgresUnavailable();
    }

    private function ensureSqliteDatabaseExists(): void
    {
        $sqliteDatabase = config('database.connections.sqlite.database', database_path('database.sqlite'));

        if (empty($sqliteDatabase) || ! is_string($sqliteDatabase)) {
            return;
        }

        if (file_exists($sqliteDatabase)) {
            return;
        }

        $directory = dirname($sqliteDatabase);
        if (! is_dir($directory) && ! mkdir($directory, 0775, true) && ! is_dir($directory)) {
            throw new \RuntimeException("Unable to create SQLite directory at {$directory}");
        }

        if (touch($sqliteDatabase) === false) {
            throw new \RuntimeException("Unable to create SQLite database at {$sqliteDatabase}");
        }
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
            $this->ensureSqliteDatabaseExists();

            DB::purge('pgsql');
            config(['database.default' => 'sqlite']);
            DB::setDefaultConnection('sqlite');

            Log::warning('Neon Postgres connection failed. Falling back to SQLite.', [
                'sqlite_database' => config('database.connections.sqlite.database', database_path('database.sqlite')),
                'error' => $e->getMessage(),
            ]);
        }
    }
}
