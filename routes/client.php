<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client;

Route::apiResource('mainPage', Client\ClientMainPageController::class)->only('index');
Route::apiResource('rooms', Client\ClientRoomController::class)->only('show');
