<?php
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengunjungController;



// ==================
// Dashboard Admin
// ==================
Route::get('/dashboard/analitik', [AdminController::class, 'viewAnalitik']);
Route::get('/dashboard/buku', [AdminController::class, 'viewBuku'])->name('viewBuku');
Route::get('/dashboard/keanggotaan', [AdminController::class, 'viewAnggota']);
Route::get('/dashboard/peminjaman', [AdminController::class, 'viewPeminjaman']);
Route::get('/dashboard/pengembalian', [AdminController::class, 'viewPengembalian']);



// ==========
// Frontend
// ==========
// home
Route::get('/', [PengunjungController::class, 'Home'])->name('home');
// Profil
Route::get('/profil', [PengunjungController::class, 'profil'])->name('profil');
// Koleksi Buku
Route::get('/koleksi-buku', [PengunjungController::class, 'koleksiBuku'])->name('koleksi-buku');
Route::get('/koleksi-buku/kategori/{slug}', [PengunjungController::class, 'perkategori'])->name('kategoriBuku');
Route::get('/koleksi-buku', [PengunjungController::class, 'pencarian'])->name('pencarian');
Route::get('/koleksi-buku/buku/{id}', [PengunjungController::class, 'detailBuku'])->name('detail-buku');
Route::get('/live-search', [UserController::class, 'liveSearch'])->name('live-search');



// ==================
// Autentikasi
// ==================
// Login
Route::get('/login', [LoginController::class, 'index'])->name('viewLogin');
Route::post('/login', [LoginController::class, 'store'])->name('login');

// Logout
Route::post('/logout', function () {
  Auth::logout();
  return redirect()->route('home');
})->name('logout');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('viewRegister');
Route::post('/register', [RegisterController::class, 'store'])->name('register');



// ==================
// Manajemen Data Buku
// ==================
// Tambah Buku
Route::post('/buku', [BukuController::class, 'store'])->name('tambahBuku');
// Hapus Buku
Route::delete('/admin/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
// Form Edit Buku (AJAX/modal)
Route::get('/admin/buku/{id}/edit', [BukuController::class, 'edit'])->name('admin.buku.edit');
// Update Buku (AJAX/modal)
Route::put('/admin/buku/{id}', [BukuController::class, 'update'])->name('admin.buku.update');
// Detail Buku (AJAX/modal)
Route::get('/admin/buku/{id}', [BukuController::class, 'show'])->name('admin.buku.detail');



// ==================
// Keanggotaan Admin
// ==================
Route::get('/live-search-anggota', [UserController::class, 'liveSearchAnggota'])->name('live-search-anggota');

// Hapus Anggota
Route::delete('/admin/anggota/{id}', [AnggotaController::class, 'destroy'])->name('admin.anggota.destroy');

// Detail Anggota (AJAX/modal)
Route::get('/admin/anggota/{id}', [AnggotaController::class, 'show'])->name('admin.anggota.detail');



// ==================
// Peminjaman
// ==================
// Detail Peminjaman (AJAX/modal)
Route::get('/admin/peminjaman/{id}', [PeminjamanController::class, 'show'])->name('detail.peminjaman.admin');
