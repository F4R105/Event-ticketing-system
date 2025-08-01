<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout');
});

Route::controller(EventController::class)->group(function () {
    Route::get('/events', 'index');
    Route::get('/events/show/{event}', 'show');

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/events/store', 'store');
        Route::put('/events/update/{event}', 'update');
        Route::delete('/events/delete/{event}', 'destroy');
    });
});
