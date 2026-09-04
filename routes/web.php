<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/**
 *  MVC
 * - Es un patrón de arquitectura de software que organiza una aplicación separndo responsabilidades en tres capas:
 * - Modelo (Model): Manipulación de datos.
 * - Vista (View): Interfaz de usuario.
 * - Controlador (Controller): Procesa la lógica de peticiones y devuelve la información correspondiente.
 */

Route::get('/', fn () => view('welcome'))->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/email/verify', [VerifyEmailController::class, 'notice'])->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('/email/verification-notification', [VerifyEmailController::class, 'sendNotification'])
        ->middleware('throttle:1,1')
        ->name('verification.send');
});

Route::middleware('guest')->group(function () {
    Route::get('/auth/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/auth/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/auth/login', [LoginController::class, 'create'])->name('login');
    Route::post('/auth/login', [LoginController::class, 'store'])->name('login.store');
});
