<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');


/* LOGIN AND REGISTER ROUTES */
Route::get('/login', [LoginController::class, 'showLogin']) -> name('show.login');
Route::get('/register', [LoginController::class, 'showRegister']) -> name('show.register');


Route::post('/login', [LoginController::class, 'login']) -> name('login');
Route::post('/register', [LoginController::class, 'register']) -> name('register');

Route::post('/logout', [LoginController::class, 'logout']) -> name('logout');

/* ADMIN ROUTES */

Route::get('/admin/dashboard', [AdminController::class, 'dashboard']) -> name('admin.dashboard')->middleware('admin');
