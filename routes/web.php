<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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
