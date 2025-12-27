<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Buku;
use App\Models\Sumber;
use App\Models\Anggota;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function viewAnalitik(Request $request)
    {
        $dataPeminjaman = Peminjaman::with('anggota', 'detail_peminjaman.buku')->paginate(10);
        $dataPengembalian = Pengembalian::all();
        $dataBuku = Buku::all();

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
    }

    public function viewBuku(Request $request)
    {
        return view('dashboard.databuku', [
            'dataAnggota' => Anggota::all(),
            'dataBuku' => Buku::with('penerbit', 'sumber', 'kategori', 'rak')->paginate(10),
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
        $keyword = $request->input('pencarian-peminjaman');

        if ($keyword) {
            $dataPeminjaman = Peminjaman::with('anggota', 'detail_peminjaman.buku')
                ->whereHas('anggota', function ($query) use ($keyword) {
                    $query->where('nama_lengkap', 'LIKE', '%' . $keyword . '%');
                })
                ->paginate(10);
        } else {
            $dataPeminjaman = Peminjaman::with('anggota', 'detail_peminjaman.buku')->paginate(10);
        }

        return view('dashboard.peminjaman', [
            'dataPeminjaman' => $dataPeminjaman
        ]);
    }

    public function viewPengembalian(Request $request)
    {
        // Ambil data pengembalian beserta relasi peminjaman dan id_peminjaman (fk)
        $dataPengembalian = Pengembalian::with('peminjaman')->get();

        return view('dashboard.pengembalian', [
            'dataPengembalian' => $dataPengembalian
        ]);
    }

    public function pencarianBuku(Request $request)
    {
        $search = $request->input('pencarian');

        $dataBuku = Buku::with('penerbit', 'sumber', 'kategori', 'rak')
            ->when($search, function ($query, $search) {
                $query->where('judul_buku', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('dashboard.databuku', [
            'dataAnggota' => Anggota::all(),
            'dataBuku' => $dataBuku,
            'dataPenerbit' => Penerbit::all(),
            'dataKategori' => Kategori::all(),
            'dataRak' => Rak::all(),
            'dataSumber' => Sumber::all(),
        ]);
    }
}
