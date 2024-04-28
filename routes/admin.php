<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    Auth,
};

Route::post('login', Auth\AdminLoginController::class)->name('login');

Route::middleware(['auth:sanctum', 'ability:admin'])->group(function() {
    Route::any('logout', Auth\AdminLogoutController::class)->name('logout');
});

