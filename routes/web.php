<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KomoditasController;
use App\Http\Controllers\AdminKomoditasController;

// Public (tanpa login)
Route::get('/', [KomoditasController::class, 'home']); // Tambahkan route home ke public
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Dilindungi oleh middleware auth
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [KomoditasController::class, 'home']); // Ubah route / menjadi /dashboard untuk user yang login
    Route::get('/komoditas', [KomoditasController::class, 'index']);
    Route::get('/komoditas/{id}', [KomoditasController::class, 'show']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});



Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('komoditas', AdminKomoditasController::class);
});
