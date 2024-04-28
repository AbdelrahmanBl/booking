<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client;
use App\Http\Controllers\LogoutController;

Route::apiResource('mainPage', Client\ClientMainPageController::class)->only('index');
Route::apiResource('rooms', Client\ClientRoomController::class)->only('show');
Route::post('login', Client\ClientLoginController::class)->name('login');
Route::post('register', Client\ClientRegisterController::class)->name('register');

Route::middleware(['auth:sanctum', 'ability:client'])->group(function() {
    Route::any('logout', LogoutController::class)->name('logout');
});

