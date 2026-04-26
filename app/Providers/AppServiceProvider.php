<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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
        RateLimiter::for('login', function (Request $request) {
            // Parsing input username dan dapatkan ip
            $username = Str::lower($request->string('username')->trim()->toString());
            $ipAddress = $request->ip();

            // Simpan ke dalam key
            $attemptKey = $username !== '' ? "{$username}|{$ipAddress}" : $ipAddress;

            return [
                Limit::perMinute(10)->by($ipAddress), // Limit untuk ip yang sama
                Limit::perMinute(5)->by($attemptKey), // Limit untuk ip dan username yang sama
            ];
        });
    }
}
