<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', fn () => view('auth.register'))->name('auth.register');

Route::get('/login', fn () => view('auth.login'))->name('auth.login');
