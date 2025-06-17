<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KomoditasController;
use App\Http\Controllers\AdminKomoditasController;
use App\Http\Controllers\ArtikelController;

// Public (tanpa login)
Route::get('/', [KomoditasController::class, 'home']); // homepage user
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
    Route::get('/profile/edit', [AuthController::class, 'showEditProfile'])->name('profile.edit');
    Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
});

// Untuk user (read only)
Route::get('/artikel', [\App\Http\Controllers\ArtikelController::class, 'index']);
Route::get('/artikel/{id}', [\App\Http\Controllers\ArtikelController::class, 'show']);
Route::post('/artikel/{artikel}/komentar', [\App\Http\Controllers\KomentarController::class, 'store'])->name('komentar.store');

// Untuk admin (CRUD)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('artikel', \App\Http\Controllers\ArtikelAdminController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('komoditas', AdminKomoditasController::class);
});

// Untuk halaman dashboard admin (home admin)
Route::get('/admin', function() {
    return view('admin.home');
})->middleware('auth')->name('admin.home');
