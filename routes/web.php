<?php

use App\Models\Buku;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PengunjungController;

// Rute Dashboard Admin
Route::get('/dashboard', [AnggotaController::class, '__invoke'])->name('dashboard');

// Menu Home
Route::get('/', [PengunjungController::class, 'Home'])->name('home');

// Menu Profil
Route::get('/profil', [PengunjungController::class, 'profil']);

// Menu Koleksi Buku
Route::get('/koleksi-buku', [BukuController::class, 'koleksiBuku']);

// View Login
Route::get('/login', [LoginController::class, 'index'])->name('viewLogin');

// Handle Login
Route::post('/login', [LoginController::class, 'store'])->name('login');

// Rute Logout
Route::post('/logout', function () {
  \Illuminate\Support\Facades\Auth::logout();
  return redirect()->route('home');
})->name('logout');

// View Register
Route::get('/register', [RegisterController::class, 'index'])->name('viewRegister');

// Handle Register
Route::post('/register', [RegisterController::class, 'store'])->name('register');


// ========
// Buku
// ========
Route::post('/buku', [BukuController::class, 'store'])->name('tambahBuku');
Route::delete('/admin/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');