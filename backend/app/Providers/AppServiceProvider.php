<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
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

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function ($request) {
            return Limit::perMinute(60)->by($request->ip());
        });
        RateLimiter::for('login', function ($request) {
            return Limit::perMinute(20)->by($request->ip()); // login endpoint
        });

        RateLimiter::for('heavy', function ($request) {
            return Limit::perMinute(15)->by($request->ip());
        });
    }
}
