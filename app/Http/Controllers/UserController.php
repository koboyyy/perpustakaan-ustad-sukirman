<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function liveSearchBuku(Request $request)
    {
        $keyword = $request->input('keyword');

        $bukus = Buku::with(['penerbit', 'kategori', 'rak', 'sumber'])
            ->where('judul_buku', 'LIKE', '%' . $keyword . '%')
            ->limit(10)
            ->get();

        return response()->json($bukus);
    }


    public function liveSearchAnggota(Request $request)
    {
        $keyword = $request->input('keyword');

        $anggota = Anggota::where('nama_lengkap', 'LIKE', '%' . $keyword . '%')
            ->limit(15)
            ->get();

        return response()->json($anggota);
    }
}
