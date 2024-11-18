<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class RateLimitAnime
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $route = $request->route()->getName();

        if ($route == 'importAnimeData') {
            RateLimiter::for('importAnimeData', function () {
                return Limit::perMinute(60);
            });
        }

        if ($route == 'getAnimeBySlug') {
            RateLimiter::for('getAnimeBySlug', function () {
                return Limit::perSecond(3); 
            });
        }

        return $next($request);
    }
}