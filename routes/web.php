<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 *  MVC
 * - Es un patrón de arquitectura de software que organiza una aplicación separndo responsabilidades en tres capas:
 * - Modelo (Model): Manipulación de datos.
 * - Vista (View): Interfaz de usuario.
 * - Controlador (Controller): Procesa la lógica de peticiones y devuelve la información correspondiente.
 */

Route::get('/', fn () => view('welcome'))->name('home');

Route::get('/dashboard', fn () => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/auth/register', [RegisterController::class, 'create'])->name('register');
Route::post('/auth/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/auth/login', [LoginController::class, 'create'])->name('login');
Route::post('/auth/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/email/verify', fn () => view('auth.verify-email'))
    ->middleware(['auth'])
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()
        ->route('dashboard')
        ->with('success', 'Email verificado correctamente. Ya puedes crear y administrar presupuestos.');
})
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return redirect()->route('verification.notice')->with('success', 'Se reenvió el email de confirmación');
})
    ->middleware(['auth', 'throttle:1,1'])
    ->name('verification.send');
