<?php

use Illuminate\Support\Facades\Route;

// Routes untuk Pengunjung
Route::get('/', function () {
    return view('pengunjung.home');
});

Route::get('/profil', function () {
    return view('pengunjung.profil');
});

Route::get('/dashboard', function () {

    $dataBuku = [
        [
            'judul' => 'Laskar Pelangi',
            'pengarang' => 'Andrea Hirata',
            'penerbit' => 'Bentang Pustaka',
            'tahunTerbit' => '2005',
            'rak' => 'R001',
            'eksemplar' => '3',
            'sumber' => 'Tinaz',
            'tanggalTerima' => '19-1-2006',
        ],
        [
            'judul' => 'Bumi',
            'pengarang' => 'Tere Liye',
            'penerbit' => 'Gramedia Pustaka Utama',
            'tahunTerbit' => '2014',
            'rak' => 'R002',
            'eksemplar' => '5',
            'sumber' => 'Donasi',
            'tanggalTerima' => '10-3-2015',
        ],
        [
            'judul' => 'Negeri 5 Menara',
            'pengarang' => 'Ahmad Fuadi',
            'penerbit' => 'Gramedia Pustaka Utama',
            'tahunTerbit' => '2009',
            'rak' => 'R003',
            'eksemplar' => '4',
            'sumber' => 'Dinas',
            'tanggalTerima' => '14-6-2011',
        ],
        [
            'judul' => 'Ayat-Ayat Cinta',
            'pengarang' => 'Habiburrahman El Shirazy',
            'penerbit' => 'Republika',
            'tahunTerbit' => '2004',
            'rak' => 'R002',
            'eksemplar' => '2',
            'sumber' => 'Sumbangan',
            'tanggalTerima' => '20-8-2006',
        ],
        [
            'judul' => 'Supernova',
            'pengarang' => 'Dewi Lestari',
            'penerbit' => 'Truedee Books',
            'tahunTerbit' => '2001',
            'rak' => 'R004',
            'eksemplar' => '6',
            'sumber' => 'Tinaz',
            'tanggalTerima' => '11-1-2007',
        ],
        [
            'judul' => 'Rectoverso',
            'pengarang' => 'Dewi Lestari',
            'penerbit' => 'Bentang Pustaka',
            'tahunTerbit' => '2008',
            'rak' => 'R005',
            'eksemplar' => '3',
            'sumber' => 'Pembelian',
            'tanggalTerima' => '05-10-2009',
        ],
        [
            'judul' => 'Dilan: Dia Adalah Dilanku Tahun 1990',
            'pengarang' => 'Pidi Baiq',
            'penerbit' => 'Pastel Books',
            'tahunTerbit' => '2014',
            'rak' => 'R006',
            'eksemplar' => '7',
            'sumber' => 'Donasi',
            'tanggalTerima' => '19-5-2017',
        ],
        [
            'judul' => 'Perahu Kertas',
            'pengarang' => 'Dewi Lestari',
            'penerbit' => 'Bentang Pustaka',
            'tahunTerbit' => '2009',
            'rak' => 'R007',
            'eksemplar' => '5',
            'sumber' => 'Sumbangan',
            'tanggalTerima' => '13-12-2013',
        ],
        [
            'judul' => 'Cinta Brontosaurus',
            'pengarang' => 'Raditya Dika',
            'penerbit' => 'Gagasmedia',
            'tahunTerbit' => '2006',
            'rak' => 'R008',
            'eksemplar' => '4',
            'sumber' => 'Dinas',
            'tanggalTerima' => '23-03-2007',
        ],
        [
            'judul' => 'Koala Kumal',
            'pengarang' => 'Raditya Dika',
            'penerbit' => 'Gagasmedia',
            'tahunTerbit' => '2015',
            'rak' => 'R008',
            'eksemplar' => '2',
            'sumber' => 'Pembelian',
            'tanggalTerima' => '18-9-2016',
        ],
    ];

    $dataAnggota = [

        [
            'no_anggota' => 'A001',
            'nama' => 'Ahmad Rizki',
            'email' => 'ahmad@email.com',
            'no_hp' => '081234567890',
            'status' => 'Aktif',
        ],
        [
            'no_anggota' => 'A002',
            'nama' => 'Siti Nurhaliza',
            'email' => 'siti@email.com',
            'no_hp' => '082345678901',
            'status' => 'Aktif',
        ],
        [
            'no_anggota' => 'A003',
            'nama' => 'Budi Santoso',
            'email' => 'budi@email.com',
            'no_hp' => '083456789012',
            'status' => 'Tidak Aktif',
        ],
        [
            'no_anggota' => 'A004',
            'nama' => 'Rina Kusuma',
            'email' => 'rina@email.com',
            'no_hp' => '084567890123',
            'status' => 'Aktif',
        ],
        [
            'no_anggota' => 'A005',
            'nama' => 'Dewi Lestari',
            'email' => 'dewi@email.com',
            'no_hp' => '085678901234',
            'status' => 'Aktif',
        ],
        [
            'no_anggota' => 'A006',
            'nama' => 'Andi Wijaya',
            'email' => 'andi@email.com',
            'no_hp' => '086789012345',
            'status' => 'Tidak Aktif',
        ],
        [
            'no_anggota' => 'A007',
            'nama' => 'Eka Putra',
            'email' => 'eka@email.com',
            'no_hp' => '087890123456',
            'status' => 'Aktif',
        ],
        [
            'no_anggota' => 'A008',
            'nama' => 'Mira Saputri',
            'email' => 'mira@email.com',
            'no_hp' => '088901234567',
            'status' => 'Aktif',
        ],
        [
            'no_anggota' => 'A009',
            'nama' => 'Dian Pratama',
            'email' => 'dian@email.com',
            'no_hp' => '089012345678',
            'status' => 'Tidak Aktif',
        ],
        [
            'no_anggota' => 'A010',
            'nama' => 'Hanafi Nur',
            'email' => 'hanafi@email.com',
            'no_hp' => '080123456789',
            'status' => 'Aktif',
        ],
    ];

    $menu = request()->query('menu', 'analitik');

    if (!request()->has('menu')) {
        return redirect()->to(url()->current() . '?menu=analitik');
    }

    return view('admin.dashboard', [
        'dataBuku' => $dataBuku,
        'dataAnggota' => $dataAnggota,
        'menu' => $menu
    ]);
});

// Routes untuk Admin
Route::get('/koleksi-buku', function () {
    return view('pengunjung.koleksiBuku');
});
