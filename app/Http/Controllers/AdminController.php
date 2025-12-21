<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Buku;
use App\Models\Sumber;
use App\Models\Anggota;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Pengarang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function viewAnalitik(Request $request)
    {
        return view('dashboard.analitik');
    }

    public function viewBuku(Request $request)
    {
        return view('dashboard.databuku', [
            'dataAnggota' => Anggota::all(),
            'dataBuku' => Buku::all(),
            'dataBukuDetail' => app(\App\Http\Controllers\BukuController::class)->getBook(),
            'dataPengarang' => Pengarang::all(),
            'dataPenerbit' => Penerbit::all(),
            'dataKategori' => Kategori::all(),
            'dataRak' => Rak::all(),
            'dataSumber' => Sumber::all(),
        ]);
    }

    public function viewAnggota(Request $request)
    {
        return view('dashboard.keanggotaan', [
            'dataAnggota' => Anggota::all()
        ]);
    }

    public function viewPeminjaman(Request $request)
    {
        return view('dashboard.peminjaman');
    }

    public function viewPengembalian(Request $request)
    {
        return view('dashboard.pengembalian');
    }
}
