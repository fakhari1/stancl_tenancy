<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UserTenantManagementController;
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
require __DIR__ . '/tenant.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});


Route::get('/tenants/all', [TenantController::class, 'index'])->name('tenants');
Route::get('/tenants/create', [TenantController::class, 'create'])->name('tenants.create');
Route::post('/tenants/store', [TenantController::class, 'store'])->name('tenants.store');
Route::middleware(['auth'])->group(function () {
    Route::get('{user}/tenants/choice', [UserTenantManagementController::class, 'create'])->name('user.tenants.create');
    Route::post('{user}/tenants/store', [UserTenantManagementController::class, 'store'])->name('user.tenants.store');
});

