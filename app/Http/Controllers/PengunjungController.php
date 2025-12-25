<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PengunjungController extends Controller
{
    public function home()
    {
        return view('pengunjung.home', [
            'books' => Buku::all()
        ]);
    }

    public function koleksiBuku()
    {

        $dataBuku = Buku::with('kategori', 'penerbit')->paginate(16);
        $dataKategori = Kategori::all();

        return view('pengunjung.koleksiBuku', [
            'dataBuku' => $dataBuku,
            'dataKategori' => $dataKategori
        ]);
    }

    function perKategori($slug)
    {

        $dataBuku = Buku::with(['kategori', 'penerbit'])
            ->whereHas('kategori', fn($q) => $q->where('nama_kategori', $slug))
            ->paginate(16);
        $dataKategori = Kategori::all();

        return view('pengunjung.koleksiBuku', [
            'dataBuku' => $dataBuku,
            'dataKategori' => $dataKategori
        ]);
    }

    public function pencarian(Request $request)
    {
        $search = $request->input('pencarian');

        $dataBuku = Buku::when($search, function ($query, $search) {
            $query->where('judul_buku', 'like', "%{$search}%");
        })->paginate(16);
        $dataKategori = Kategori::all();

        return view('pengunjung.koleksiBuku', [
            'dataBuku' => $dataBuku,
            'dataKategori' => $dataKategori
        ]);
    }

    public function detailBuku($id)
    {
        $dataBuku = Buku::with(['kategori', 'penerbit', 'kategori', 'rak'])
            ->where('id', $id)
            ->firstOrFail();


        return view('components.pengunjung.halaman-detail-buku', compact('dataBuku'));
    }

    public function profil()
    {
        return view('pengunjung.profil');
    }
}
