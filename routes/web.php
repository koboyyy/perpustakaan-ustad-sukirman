<?php

use App\Http\Controllers\UserController;
use App\Models\Buku;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PengunjungController;

// ==================
// Dashboard Admin
// ==================
Route::post('/dashboard', [AdminController::class, '__invoke'])->name('dashboard');
Route::get('/dashboard', [AdminController::class, '__invoke'])->name('dashboard');


Route::get('/dashboard/buku', [AdminController::class, '__invoke']);

// ==================
// Menu Utama
// ==================

// Home
Route::get('/', [PengunjungController::class, 'Home'])->name('home');

// Profil Pengunjung
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

// Tambah Buku
Route::post('/buku', [BukuController::class, 'store'])->name('tambahBuku');

// Hapus Buku
Route::delete('/admin/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

// Custom Dashboard Buku View jika menu=databuku
Route::get('/dashboard', function (\Illuminate\Http\Request $request) {
  if ($request->query('menu') === 'databuku') {
    $dataBuku = app(\App\Http\Controllers\BukuController::class)->getBook();
    return view('admin.dashboard', [
      'dataBuku' => $dataBuku,
      'menu' => 'databuku',
    ]);
  }
  // Jika bukan databuku, panggil default dashboard
  return app(\App\Http\Controllers\AdminController::class)->__invoke($request);
});

// ==================
// Fitur Pencarian
// ==================

// Pencarian Buku Live Search
Route::get('/live-search', [UserController::class, 'liveSearch'])->name('live-search');

// ==================
// Buku Admin (AJAX, Modal, dsb.)
// ==================

// Form Edit Buku (AJAX/modal)
Route::get('/admin/buku/{id}/edit', [BukuController::class, 'edit'])->name('admin.buku.edit');

// Update Buku
Route::put('/admin/buku/{id}', [BukuController::class, 'update'])->name('admin.buku.update');

// Detail Buku (AJAX/modal)
Route::get('/admin/buku/{id}', [BukuController::class, 'show'])->name('admin.buku.detail');

// [DEPRECATED] Tidak perlu handle update buku via /dashboard, gunakan route /admin/buku/{id} (lihat route di atas)

