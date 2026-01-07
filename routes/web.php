<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Customer\AuthController as CustomerAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


/*------------------------------------------------------------*/
/* Admin authentication and  authorization
/*------------------------------------------------------------*/
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminAuthController::class, 'index'])
            ->name('dashboard');

        Route::post('logout', [AdminAuthController::class, 'logout'])
            ->name('logout');
    });
});

/*------------------------------------------------------------*/
/* Customer authentication and  authorization
/*------------------------------------------------------------*/
Route::prefix('customer')->name('customer.')->group(function () {

    Route::get('login', [CustomerAuthController::class, 'showLogin'])->name('login');
    Route::post('login', [CustomerAuthController::class, 'login']);

    Route::middleware('auth:customer')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::post('logout', [CustomerAuthController::class, 'logout'])
            ->name('logout');
    });
});
