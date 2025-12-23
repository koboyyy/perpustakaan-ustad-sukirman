<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PengunjungController;



// ==================
// Dashboard Admin
// ==================
Route::get('/dashboard/analitik', [AdminController::class, 'viewAnalitik']);
Route::get('/dashboard/buku', [AdminController::class, 'viewBuku'])->name('viewBuku');
Route::get('/dashboard/keanggotaan', [AdminController::class, 'viewAnggota']);
Route::get('/dashboard/peminjaman', [AdminController::class, 'viewPeminjaman']);
Route::get('/dashboard/pengembalian', [AdminController::class, 'viewPengembalian']);



// ==================
// Menu Utama
// ==================
// Landing Page
Route::get('/', [PengunjungController::class, 'Home'])->name('home');

// Profil Perusahaan
Route::get('/profil', [PengunjungController::class, 'profil']);

// Koleksi Buku
// Catatan: Route keKoleksiBuku user diberi nama 'koleksi-buku'
Route::get('/koleksi-buku', [BukuController::class, 'getBook']);

Route::get('/koleksi-buku', [UserController::class, 'keKoleksiBuku'])->name('koleksi-buku');



// ==================
// Autentikasi
// ==================
// Login
Route::get('/login', [LoginController::class, 'index'])->name('viewLogin');
Route::post('/login', [LoginController::class, 'store'])->name('login');

// Logout
Route::post('/logout', function () {
  \Illuminate\Support\Facades\Auth::logout();
  return redirect()->route('home');
})->name('logout');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('viewRegister');
Route::post('/register', [RegisterController::class, 'store'])->name('register');



// ==================
// Manajemen Buku
// ==================
// Pencarian Buku Live Search
Route::get('/live-search', [UserController::class, 'liveSearch'])->name('live-search');

// Tambah Buku
Route::post('/buku', [BukuController::class, 'store'])->name('tambahBuku');

// Hapus Buku
Route::delete('/admin/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

// Form Edit Buku (AJAX/modal)
Route::get('/admin/buku/{id}/edit', [BukuController::class, 'edit'])->name('admin.buku.edit');

// Update Buku
Route::put('/admin/buku/{id}', [BukuController::class, 'update'])->name('admin.buku.update');

// Detail Buku (AJAX/modal)
Route::get('/admin/buku/{id}', [BukuController::class, 'show'])->name('admin.buku.detail');



// ==================
// Keanggotaan Admin
// ==================
Route::get('/live-search-anggota', [UserController::class, 'liveSearchAnggota'])->name('live-search-anggota');

// Hapus Anggota
Route::delete('/admin/anggota/{id}', [\App\Http\Controllers\AnggotaController::class, 'destroy'])->name('admin.anggota.destroy');

// Detail Anggota (AJAX/modal)
Route::get('/admin/anggota/{id}', [\App\Http\Controllers\AnggotaController::class, 'show'])->name('admin.anggota.detail');



// ==================
// Peminjaman
// ==================
// Detail Peminjaman (AJAX/modal)
Route::get('/admin/peminjaman/{id}', [\App\Http\Controllers\PeminjamanController::class, 'show'])->name('detail.peminjaman.admin');
