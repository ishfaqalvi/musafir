<?php

namespace App\Providers;

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
