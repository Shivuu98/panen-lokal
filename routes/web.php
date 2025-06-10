<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KomoditasController;

// Public (tanpa login)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Dilindungi oleh middleware auth
Route::middleware(['auth'])->group(function () {
    Route::get('/', [KomoditasController::class, 'home']);
    Route::get('/komoditas', [KomoditasController::class, 'index']);
    Route::get('/komoditas/{id}', [KomoditasController::class, 'show']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

