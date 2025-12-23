<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    // Method: Show detail anggota (untuk modal/detail AJAX)
    public function show($id)
    {
        // Ambil data buku beserta relasi-relasi terkait dan fallback ke field pengarang langsung jika ada
        $dataPeminjaman = Peminjaman::with([
            'anggota',
            'detail_peminjaman',
        ])->findOrFail($id);


        // $dataPeminjaman = Peminjaman::with('anggota', 'detail_peminjaman')->where('id', $id)->get();

        // Render view detail buku dan kembalikan sebagai HTML
        return view('components.admin.detail-peminjaman', [
            'detailPeminjaman' => $dataPeminjaman
        ]);
    }
}

