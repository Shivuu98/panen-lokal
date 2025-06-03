<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\KomoditasController;

Route::get('/', [KomoditasController::class, 'home']);
Route::get('/komoditas', [KomoditasController::class, 'index']);
Route::get('/komoditas/{id}', [KomoditasController::class, 'show']);
