<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Helper\AuthHelper;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(AuthHelper::class, function ($app) {
            return new AuthHelper();
        });
    }
}
