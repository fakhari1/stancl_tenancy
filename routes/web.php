<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UserTenantManagementController;
use App\Http\Controllers\TenantDashboardController;
use App\Http\Controllers\TenantAuthenticatedController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__ . '/auth.php';
Route::get('/', function () {
//    auth()->logout();
    return view('welcome');
})->name('central.home');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['isAdmin'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/tenants/all', [TenantController::class, 'index'])->name('tenants');
        Route::get('/tenants/create', [TenantController::class, 'create'])->name('tenants.create');
        Route::post('/tenants/store', [TenantController::class, 'store'])->name('tenants.store');
    });

    Route::middleware(['isUser'])->group(function () {
        Route::get('{user}/tenants/choice', [UserTenantManagementController::class, 'create'])->name('user.tenants.create');
        Route::post('{user}/tenants/store', [UserTenantManagementController::class, 'store'])->name('user.tenants.store');

        Route::get('{user}/tenant/clone', [UserTenantManagementController::class, 'cloneUser'])->name('user.tenants.clone');
    });
});


Route::middleware(['tenancyPathInit'])->group(function () {

    Route::get('{tenant}', function () {
        return view('welcome');
    })->name('tenant.home');

    Route::get('{tenant}/dashboard', [TenantDashboardController::class, 'index'])->middleware('tenantAuth')->name('tenant.dashboard');

    Route::get('{tenant}/login', [TenantAuthenticatedController::class, 'create']);
    Route::post('{tenant}/login', [TenantAuthenticatedController::class, 'store'])->name('tenant.login');

    Route::post('{tenant}/logout', [TenantAuthenticatedController::class, 'logout'])->name('tenant.logout');
});
