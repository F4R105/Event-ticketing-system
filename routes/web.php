<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::view('/', 'guest.home');
Route::view('/login', 'guest.login');
Route::view('/register', 'guest.register');

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::middleware('auth')->group(function () {
    Route::view('/user', 'user.home');
    Route::view('/organizer', 'organizer.home');
    Route::view('/admin', 'admin.home');
});
