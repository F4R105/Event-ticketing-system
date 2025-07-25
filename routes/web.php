<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RequestController;
use Symfony\Component\Routing\RequestContext;

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

    Route::controller(RequestController::class)->group(function () {
        Route::get('/user/request','view')->middleware('role:user');
        Route::post('/user/request','request')->middleware('role:user');
        Route::get('/admin/organizers','organizers')->middleware('role:admin');
        Route::get('/admin/requests','requests')->middleware('role:admin');
    });

    Route::controller(EventController::class)->group(function () {
        Route::get('/events', 'index')->middleware(['role:admin,organizer']);
        Route::get('/event/create', 'create')->middleware(['role:admin,organizer']);
        Route::post('/event', 'store')->middleware(['role:admin,organizer']);
        Route::delete('/event/{event}', 'destroy')->middleware(['role:admin,organizer']);
    });

    Route::controller(BookingController::class)->group(function () {
        Route::get('/bookings', 'index');
        Route::get('/booking/create/{event}', 'create');
        Route::post('/booking', 'store');
    });
});
