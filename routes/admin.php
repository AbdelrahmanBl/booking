<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin;
use App\Http\Controllers\LogoutController;

Route::post('login', Admin\AdminLoginController::class)->name('login');

Route::middleware(['auth:sanctum', 'ability:admin'])->group(function() {
    Route::any('logout', LogoutController::class)->name('logout');
    Route::apiResource('employees', Admin\AdminEmployeeController::class)->except('show');
    Route::apiResource('rooms', Admin\AdminRoomController::class)->except('show');
    Route::apiResource('users', Admin\AdminUserController::class)->except('show');
    Route::apiResource('bookings', Admin\AdminBookingController::class)->only(['index', 'update']);
});

