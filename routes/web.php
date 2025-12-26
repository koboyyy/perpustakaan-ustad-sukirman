<?php
use App\Models\Kategori;
use App\View\Components\pengunjung;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RakController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SumberController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\RegistrasiController;

// ========
// Frontend
// ========
// home
Route::get('/', [PengunjungController::class, 'Home'])->name('home');
// Profil
Route::get('/profil', [PengunjungController::class, 'profil'])->name('profil');
// Koleksi Buku
Route::get('/koleksi-buku', [PengunjungController::class, 'koleksiBuku'])->name('koleksi-buku')->middleware('auth');
Route::get('/koleksi-buku/kategori/{slug}', [PengunjungController::class, 'perkategori'])->name('kategoriBuku')->middleware('auth');
Route::get('/koleksi-buku', [PengunjungController::class, 'pencarian'])->name('pencarian')->middleware('auth');
Route::get('/koleksi-buku/buku/{id}', [PengunjungController::class, 'detailBuku'])->name('detail-buku')->middleware('auth');
Route::get('/live-search-buku', [UserController::class, 'liveSearchBuku'])->name('live-search-buku')->middleware('auth');



// ===============
// Dashboard Admin
// ===============
Route::get('/dashboard/analitik', [AdminController::class, 'viewAnalitik'])->name('analitik')->middleware('admin');
Route::get('/dashboard/buku', [AdminController::class, 'viewBuku'])->name('viewBuku')->middleware('admin');
Route::get('/dashboard/buku', [AdminController::class, 'pencarianBuku'])->name('pencarian-dashboard-buku')->middleware('admin');
Route::get('/dashboard/keanggotaan', [AdminController::class, 'viewAnggota'])->middleware('admin');
Route::get('/dashboard/peminjaman', [AdminController::class, 'viewPeminjaman'])->middleware('admin');
Route::get('/dashboard/pengembalian', [AdminController::class, 'viewPengembalian'])->middleware('admin');

// Tambah penerbit
Route::get('/dashboard/penerbit', [PenerbitController::class, 'index'])->name('view-penerbit')->middleware('auth');
// Sumber
Route::get('/dashboard/sumber', [SumberController::class, 'index'])->name('view-sumber')->middleware('auth');
// Kategori
Route::get('/dashboard/kategori', [KategoriController::class, 'kategori'])->name('view-kategori')->middleware('auth');
// Rak
Route::get('/dashboard/rak', [RakController::class, 'rak'])->name('view-rak')->middleware('auth');


Route::post('/dashboard/buku/tambah-penerbit', [BukuController::class, 'tambahPenerbit'])->name('tambah-penerbit');
Route::post('/dashboard/buku/tambah-rak', [BukuController::class, 'tambahRak'])->name('tambah-rak');
Route::post('/dashboard/buku/tambah-sumber', [BukuController::class, 'tambahSumber'])->name('tambah-sumber');
Route::post('/dashboard/buku/tambah-kategori', [BukuController::class, 'tambahKategori'])->name('tambah-kategori');


// Live Search Peminjaman
Route::get('/live-search-peminjaman', [PeminjamanController::class, 'liveSearchPeminjaman'])->name('live-search-peminjaman');
// Update Status Peminjaman
Route::get('/admin/peminjaman/update-status/{id}', [PeminjamanController::class, 'update'])->name('update-status-peminjaman');



// ===========
// Autentikasi
// ===========
// Register Anggota
Route::get('/registrasi', [RegistrasiController::class, 'show'])->name('registrasi');
Route::post('/registrasi', [RegistrasiController::class, 'store'])->name('registrasi');
// Login
Route::get('/login', [LoginController::class, 'show'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login');
// Logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');



// ===================
// Manajemen Data Buku
// ===================
// Tambah Buku<?php
Route::post('/buku', [BukuController::class, 'store'])->name('tambahBuku');
// Hapus Buku
Route::delete('/admin/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
// Form Edit Buku (AJAX/modal)
Route::get('/admin/buku/{id}/edit', [BukuController::class, 'edit'])->name('admin.buku.edit');
// Update Buku (AJAX/modal)
Route::put('/admin/buku/{id}', [BukuController::class, 'update'])->name('admin.buku.update');
// Detail Buku (AJAX/modal)
Route::get('/admin/buku/{id}', [BukuController::class, 'show'])->name('admin.buku.detail');


// ==============================
// Manajemen Data Penerbit (Hapus)
// ==============================

// Hapus Penerbit (AJAX)
Route::delete('/admin/penerbit/{id}', [PenerbitController::class, 'destroy'])->name('penerbit.destroy');

// ==============================
// Manajemen Data Sumber, Rak, Kategori
// ==============================

// Hapus Sumber (AJAX)
Route::delete('/admin/sumber/{id}', [SumberController::class, 'destroy'])->name('sumber.destroy');

// Hapus Rak (AJAX)
Route::delete('/admin/rak/{id}', [RakController::class, 'destroy'])->name('rak.destroy');

// Hapus Kategori (AJAX)
Route::delete('/admin/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');





// =====================
// Pengelola Keanggotaan
// =====================
// Tambah Anggota
Route::post('/admin/anggota/tambah-anggota', [AnggotaController::class, 'store'])->name('tambah-anggota');

Route::get('/live-search-anggota', [UserController::class, 'liveSearchAnggota'])->name('live-search-anggota');
// Hapus Anggota
Route::delete('/admin/anggota/{id}', [AnggotaController::class, 'destroy'])->name('admin.anggota.destroy');
// Detail Anggota (AJAX/modal)
Route::get('/admin/anggota/{id}', [AnggotaController::class, 'show'])->name('admin.anggota.detail');



// ==========
// Peminjaman
// ==========
// Store Peminjaman
Route::post('/peminjaman/store', [PeminjamanController::class, 'store'])->name('store_peminjaman');
// Detail Peminjaman (AJAX/modal)
Route::get('/admin/peminjaman/{id}', [PeminjamanController::class, 'show'])->name('detail.peminjaman.admin');




