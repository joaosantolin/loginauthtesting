<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/login', [LoginController::class, 'showLogin']) -> name('show.login');
Route::get('/register', [LoginController::class, 'showRegister']) -> name('show.register');


Route::post('/login', [LoginController::class, 'login']) -> name('login');
Route::post('/register', [LoginController::class, 'register']) -> name('register');

Route::post('/logout', [LoginController::class, 'logout']) -> name('logout');