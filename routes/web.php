<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/index', function () {
    return view('movies.index');
});

Route::get('/show', function () {
    return view('movies.show');
});

Route::get('/seats', function () {
    return view('booking.seats');
});

Route::get('/checkout', function () {
    return view('booking.checkout');
});

Route::get('/tiket', function () {
    return view('booking.tiket');
});

Route::get('/booking', function () {
    return view('user.booking');
});