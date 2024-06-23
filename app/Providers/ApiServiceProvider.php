<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\UserService;
use App\Services\AdminService;
use App\Services\BundleService;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AdminService::class, function ($app) {
            return new AdminService();
        });

        $this->app->singleton(BundleService::class, function ($app) {
            return new BundleService();
        });

        $this->app->singleton(AuthService::class, function ($app) {
            return new AuthService();
        });

        $this->app->singleton(UserService::class, function ($app) {
            return new UserService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
