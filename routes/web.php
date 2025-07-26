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
        Route::get('/user/request', 'view')->middleware('role:user');
        Route::post('/user/request', 'request')->middleware('role:user');
        Route::get('/admin/organizers', 'organizers')->middleware('role:admin');
        Route::get('/admin/requests', 'requests')->middleware('role:admin');
        Route::post('/admin/request', 'approve')->middleware('role:admin');
    });

    Route::controller(EventController::class)->group(function () {
        Route::middleware(['role:admin,organizer'])->group(function () {
            Route::get('/events', 'index');
            Route::get('/event/create', 'create');
            Route::post('/event', 'store');
            Route::get('/event/edit/{event}', 'edit');
            Route::put('/event/update/{event}', 'update');
            Route::delete('/event/{event}', 'destroy');
        });
    });

    Route::controller(BookingController::class)->group(function () {
        Route::get('/bookings', 'index');
        Route::get('/booking/create/{event}', 'create');
        Route::post('/booking', 'store');
    });
});

Route::get('/event/{event}', [EventController::class, 'show']);
