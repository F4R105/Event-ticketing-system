<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::view('/', 'guest.home');
Route::view('/login', 'guest.login');
Route::view('/register', 'guest.register');

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth');

    Route::view('/event/create', 'event.create');
});

Route::middleware('auth')->group(function () {
    Route::view('/user', 'user.home')->middleware('role:user');
    Route::view('/organizer', 'organizer.home')->middleware('role:organizer');
    Route::view('/admin', 'admin.home')->middleware('role:admin');
});
