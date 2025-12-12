<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengantinAuthController;
use App\Http\Controllers\PaketController;

Route::get('/', function () {
    return view('welcome');
});

// Route Login Pengantin
Route::get('/login-pengantin', [PengantinAuthController::class, 'showLogin'])->name('login.pengantin.form');
Route::post('/login-pengantin', [PengantinAuthController::class, 'login'])->name('login.pengantin');
Route::get('/dashboard-pengantin', [PengantinAuthController::class, 'dashboard'])->middleware('auth');

// Resource Paket
Route::resource('paket', PaketController::class);
