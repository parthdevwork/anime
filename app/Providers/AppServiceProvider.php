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
        RateLimiter::for('importAnimeData', function () {
            return Limit::perMinute(60)->by(request()->ip());
        });

        RateLimiter::for('getAnimeBySlug', function () {
            return Limit::perSecond(3)->by(request()->ip());
        });
    }
}