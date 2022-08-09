<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantDashboardController;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\TenantAuthenticatedController;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;
use Illuminate\Http\Request;
use App\Http\Middleware\RedirectIfTenancyNotFound;

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


Route::middleware([
    InitializeTenancyByPath::class,
])
    ->prefix('{tenant}')
    ->where([
        "tenant" => "^((?!register|login|dashboard).)*$"
    ])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', [TenantDashboardController::class, 'index']);

    Route::get('/login', [TenantAuthenticatedController::class, 'create']);
    Route::post('/login', [TenantAuthenticatedController::class, 'store']);
});
