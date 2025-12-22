<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    // Method: Show detail anggota (untuk modal/detail AJAX)
    public function show($id)
    {
        // Ambil data anggota dari tabel

        // Cara pada kode awal kurang tepat, karena menggunakan get() mengambil seluruh data, lalu where dan first baru dilakukan di koleksi memory.
        // Cara yang benar, gunakan where langsung di query builder/eloquent, lalu first.
        // $dataPeminjaman = Peminjaman::with('anggota', 'detail_peminjaman.buku')->where('id', $id)->first();

        $dataPeminjaman = Peminjaman::with('anggota', 'detail_peminjaman')->where('id', $id)->get();

        if ($dataPeminjaman) {
            return response()->json([
                'success' => true,
                'data' => $dataPeminjaman
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data peminjaman tidak ditemukan.'
            ], 404);
        }
    }
}
