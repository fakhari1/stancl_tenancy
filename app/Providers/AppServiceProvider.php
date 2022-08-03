<?php

namespace App\Providers;

use App\Models\Tenant;
use App\Tenant\Manager;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Stancl\Tenancy\Database\DatabaseManager;

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

//        View::composer('*', function ($v) {
//            $currentTenant = config('database');
//            $v->with('currentTenant', $currentTenant);
//        });

        Blade::if('tenant', function () {
            return Tenant::query()->count() > 0;
        });

        Blade::if('admin', function () {
            return auth()->user()->is_admin;
        });

        Blade::if('user', function () {
            return !auth()->user()->is_admin;
        });
    }
}
