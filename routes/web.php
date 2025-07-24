<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;

Route::view('/', 'guest.home');
Route::view('/login', 'guest.login')->name('login');
Route::view('/register', 'guest.register');

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth');
});

Route::middleware('auth')->group(function () {
    Route::view('/user', 'user.home')->middleware('role:user');
    Route::view('/admin', 'admin.home')->middleware('role:admin');
    Route::view('/organizer', 'organizer.home')->middleware('role:organizer');

    Route::controller(EventController::class)->group(function () {
        Route::get('/events', 'index')->middleware(['role:admin,organizer']);
        Route::get('/event/create', 'create')->middleware(['role:admin,organizer']);
        Route::post('/event', 'store')->middleware(['role:admin,organizer']);
        Route::delete('/event/{event}', 'destroy')->middleware(['role:admin,organizer']);
    });
});
