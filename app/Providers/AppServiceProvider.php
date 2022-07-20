<?php

namespace App\Providers;

use App\Models\Tenant;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.navigation', function ($view) {
            $tenants = Tenant::all();

            $view->with('tenants', $tenants);
        });
    }
}
