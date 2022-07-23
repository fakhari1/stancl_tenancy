<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantDashboardController;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\TenantAuthenticatedController;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;


/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/


Route::group([
    'prefix' => '/{tenant}',
    'middleware' => [
        'web',
        InitializeTenancyByPath::class,
//        PreventAccessFromCentralDomains::class
    ]
], function ($tenant) {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/dashboard', [TenantDashboardController::class, 'index'])->middleware('auth');
    Route::get('/login', [TenantAuthenticatedController::class, 'create']);
    Route::post('/login', [TenantAuthenticatedController::class, 'store']);
});
