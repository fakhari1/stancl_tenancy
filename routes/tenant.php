<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

//Route::middleware([
//    InitializeTenancyByPath::class,
//    PreventAccessFromCentralDomains::class
//])->get('/', function () {
//    dd('hi');
//})->name('tenant.change');


Route::group([
    'prefix' => '{tenant}',
    'middleware' => [
        InitializeTenancyByPath::class,
        PreventAccessFromCentralDomains::class,
        'auth'
    ],
    'as' => 'tenant.'
], function () {
    Route::get('/', [TenantController::class, 'show']);

//    Route::get('register', [RegisteredUserController::class, 'create']);
//    Route::post('register', [RegisteredUserController::class, 'store']);
//
//    Route::get('login', [AuthenticatedSessionController::class, 'create']);
//    Route::post('login', [AuthenticatedSessionController::class, 'store']);

});
