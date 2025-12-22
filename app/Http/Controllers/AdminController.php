<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Buku;
use App\Models\Sumber;
use App\Models\Anggota;
use App\Models\DetailPeminjaman;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Pengarang;
use App\Models\Pengembalian;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function viewAnalitik(Request $request)
    {
        $dataPeminjaman = Peminjaman::with('anggota', 'detail_peminjaman.buku')->get();
        $dataPengembalian = Pengembalian::all();
        $dataBuku = Buku::all();
        $dataKategori = Kategori::all();

        $sumBukuPerKategori = Buku::selectRaw('tbl_kategori.nama_kategori, count(tbl_buku.id) as total_buku')
            ->rightJoin('tbl_kategori', 'tbl_kategori.id', '=', 'tbl_buku.id_kategori')
            ->groupBy('tbl_kategori.nama_kategori')
            ->get();

        return view('dashboard.analitik', [
            'dataPeminjaman' => $dataPeminjaman,
            'dataPengembalian' => $dataPengembalian,
            'dataBuku' => $dataBuku,
            'sumBukuPerKategori' => $sumBukuPerKategori
        ]);

        // Menghitung total seluruh eksemplar buku (misal kolom jumlah_eksemplar di tabel buku)
        // $totalEksemplar = $dataBuku->sum('eksemplar');
        // $idPeminjaman = $dataPeminjaman->sum('id');
        // $dataPengembalian->count();




        // return $sumBukuPerKategori;
    }

    public function viewBuku(Request $request)
    {
        return view('dashboard.databuku', [
            'dataAnggota' => Anggota::all(),
            'dataBuku' => Buku::all(),
            // Mengambil data buku dari BukuController::getBook() yang mengembalikan Collection,
            // kemudian melakukan manual pagination menggunakan LengthAwarePaginator,
            // agar bisa dipakai untuk fitur paginasi pada tabel databuku admin.

            'dataBukuDetail' => (function () {
                $dataBukuCollection = app(\App\Http\Controllers\BukuController::class)->getBook();
                $perPage = 10;
                $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1;
                $currentItems = $dataBukuCollection->slice(($currentPage - 1) * $perPage, $perPage)->values();
                return new \Illuminate\Pagination\LengthAwarePaginator(
                    $currentItems,
                    $dataBukuCollection->count(),
                    $perPage,
                    $currentPage,
                    [
                        'path' => request()->url(),
                        'query' => request()->query(),
                    ]
                );
            })(),
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
            'dataAnggota' => Anggota::paginate(10)
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
