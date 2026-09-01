<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

/**
 *  MVC
 * - Es un patrón de arquitectura de software que organiza una aplicación separndo responsabilidades en tres capas:
 * - Modelo (Model): Manipulación de datos.
 * - Vista (View): Interfaz de usuario.
 * - Controlador (Controller): Procesa la lógica de peticiones y devuelve la información correspondiente.
 */

Route::get('/', fn () => view('welcome'))->name('home');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'create'])->name('login');

Route::get('/email/verify', fn () => view('auth.verify-email'))
    ->middleware(['auth'])
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return "Email verified successfully";
})
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');
