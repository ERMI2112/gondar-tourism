<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        try {
            // Auto-run migrations and seeders on first load in production
            if (config('app.env') === 'production') {
                if (!\Illuminate\Support\Facades\Schema::hasTable('migrations')) {
                    \Illuminate\Support\Facades\Artisan::call('migrate --force');
                    \Illuminate\Support\Facades\Artisan::call('db:seed --force');
                }
            }
        } catch (\Exception $e) {
            // Ignore if database is not configured/accessible yet during build
        }
    }
}
