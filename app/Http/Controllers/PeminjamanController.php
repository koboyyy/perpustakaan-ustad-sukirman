<?php

namespace App\Http\Controllers;

use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

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

    public function store(Request $request)
    {
        $dataPeminjaman = [
            'id_anggota' => $request->input('id_anggota'),
            'tanggal_peminjaman' => $request->input('tanggal_peminjaman'),
            'id_buku_1' => $request->input('id_buku'),
            'id_buku_2' => $request->input('id_buku_2'),
        ];

        Peminjaman::create([
            'id_anggota' => $dataPeminjaman['id_anggota'],
            'id_admin' => 1,
            'tanggal_pinjam' => $dataPeminjaman['tanggal_peminjaman']
        ]);

        if ($dataPeminjaman['id_buku_2'] === null) {
            DetailPeminjaman::create([
                'id_peminjaman' => Peminjaman::latest('id')->first()->id,
                'id_buku' => $dataPeminjaman['id_buku_1'],
            ]);
        } else {
            DetailPeminjaman::create([
                'id_peminjaman' => Peminjaman::latest('id')->first()->id,
                'id_buku' => $dataPeminjaman['id_buku_1'],
            ]);

            DetailPeminjaman::create([
                'id_peminjaman' => Peminjaman::latest('id')->first()->id,
                'id_buku' => $dataPeminjaman['id_buku_2'],
            ]);
        }

        return back()->with('success', 'Peminjaman Berhasil!!');
    }

    public function update($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        // Contoh: Toggle status antara "dipinjam" dan "dikembalikan"
        if ($peminjaman->status === 'dipinjam') {
            $peminjaman->status = 'dikembalikan';
        } else {
            $peminjaman->status = 'dipinjam';
        }
        $peminjaman->save();

        return response()->json(['success' => true, 'status' => $peminjaman->status]);
    }

    public function liveSearchPeminjaman(Request $request)
    {
        $keyword = $request->input('keyword');

        $peminjamans = Peminjaman::with(['anggota', 'detail_peminjaman'])
            ->whereHas('anggota', function ($query) use ($keyword) {
                $query->where('nama_lengkap', 'LIKE', '%' . $keyword . '%');
            })
            ->limit(10)
            ->get();

        return response()->json($peminjamans);
    }
}

