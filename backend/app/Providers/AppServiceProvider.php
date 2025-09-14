<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
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
        RateLimiter::for('api', function ($request) {
            return Limit::perMinute(60)->by($request->ip()); // general endpoints
        });

        RateLimiter::for('login', function ($request) {
            return Limit::perMinute(20)->by($request->ip());
        });

        RateLimiter::for('heavy', function ($request) {
            return Limit::perMinute(15)->by($request->ip());
        });
    }
}
