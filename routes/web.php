<?php

use Illuminate\Support\Facades\Route;

// Routes untuk Pengunjung
Route::get('/', function () {
    return view('pengunjung.home');
});

Route::get('/profil', function () {
    return view('pengunjung.profil');
});

Route::get('/koleksi-buku', function () {
    return view('pengunjung.koleksiBuku');
});

// Routes untuk Admin
Route::get('/dashboard-admin', function () {
    return view('admin.dashboard-admin');
});
