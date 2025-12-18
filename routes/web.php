<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PengunjungController;

// Rute Dashboard Admin
Route::get('/dashboard', [AnggotaController::class, '__invoke'])->name('dashboard');

// Menu Home
Route::get('/', [PengunjungController::class, 'Home']);

// Menu Profil
Route::get('/profil', [PengunjungController::class, 'profil']);

// Menu Koleksi Buku
Route::get('/koleksi-buku', [PengunjungController::class, 'koleksiBuku']);

// View Login
Route::get('/login', [LoginController::class, 'index']);

// Handle Login
Route::post('/login', [LoginController::class, 'login'])->name('login');