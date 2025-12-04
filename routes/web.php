<?php

use Illuminate\Support\Facades\Route;

// Routes untuk Pengunjung
Route::get('/', function () {
    return view('pengunjung.home');
});

Route::get('/blog', function () {
    return view('pengunjung.blog');
});

Route::get('/koleksi-buku', function () {
    return view('pengunjung.koleksiBuku');
});

Route::get('/profil', function () {
    return view('pengunjung.profil');
});

Route::get('/about', function () {
    return view('pengunjung.about');
});

// Routes untuk Admin
Route::get('/dashboard-admin', function () {
    return view('admin.dashboard-admin');
});

Route::get('/login', function () {
    return view('admin.halaman-login');
});