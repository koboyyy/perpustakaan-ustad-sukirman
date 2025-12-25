<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Rak;
use App\Models\Buku;
use App\Models\Sumber;
use App\Models\Kategori;

use App\Models\Penerbit;
use App\Models\Pengarang;
use Illuminate\Http\Request;
use App\Models\DetailPengarang;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Menampilkan daftar koleksi buku (untuk route /koleksi-buku).
     */
    public function getBook()
    {
        $dataBuku = Buku::all()->map(function ($buku) {
            return [
                "id" => $buku->id,
                "judul" => $buku->judul_buku,
                "pengarang" => $buku->pengarang,
                "penerbit" => $buku->penerbit->nama_penerbit ?? '-',
                "rak" => $buku->rak->no_rak ?? '-',
                "sumber" => $buku->sumber->nama_sumber ?? '-',
                "kategori" => $buku->kategori->nama_kategori ?? null,
                "eksemplar" => $buku->eksemplar,
                "tahun_terbit" => $buku->tahun_terbit,
                "tanggal_terima" => $buku->tanggal_terima,
                "sinopsis" => $buku->sinopsis,
                "cover" => $buku->cover,
                "created_at" => $buku->created_at,
                "updated_at" => $buku->updated_at,
            ];
        });

        return $dataBuku;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_buku' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer|min:1950|max:' . date('Y'),
            'eksemplar' => 'required|integer|min:1',
            'rak' => 'required|string|max:100',
            'sumber' => 'required|string|max:255',
            'tanggal_terima' => 'required|date',
            'sinopsis' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        // Inisialisasi array data untuk insert (mapping ke nama field tabel)
        $bukuData = [
            'judul_buku' => $validatedData['judul_buku'],
            'pengarang' => $validatedData['pengarang'],
            'id_penerbit' => Penerbit::where('nama_penerbit', $validatedData['penerbit'])->value('id'),
            'id_rak' => Rak::where('no_rak', $validatedData['rak'])->value('id'),
            'id_sumber' => Sumber::where('nama_sumber', $validatedData['sumber'])->value('id'),
            'id_kategori' => Kategori::where('nama_kategori', $validatedData['kategori'])->value('id'),
            'tahun_terbit' => $validatedData['tahun_terbit'],
            'eksemplar' => $validatedData['eksemplar'],
            'tanggal_terima' => $validatedData['tanggal_terima'] ?? null,
            'sinopsis' => $validatedData['sinopsis'] ?? null,
        ];

        if (!$request->input('cover_buku')) {
            $bukuData['cover'] = 'cover-buku/buku-tanpa-cover.jpeg';
        }

        // Proses cover jika diupload
        if ($request->hasFile('cover_buku')) {
            $coverFile = $request->file('cover_buku');
            $coverFileName = time() . '-' . uniqid() . '.' . $coverFile->getClientOriginalExtension();
            $coverFile->storeAs('cover-buku', $coverFileName, 'public');
            $bukuData['cover'] = 'cover-buku/' . $coverFileName;
        }

        // Insert ke database (sesuaikan dengan model Buku, jika mass assignable)
        try {
            Buku::create($bukuData);
            return redirect()->back()->with('success', 'Buku berhasil ditambahkan.');
        } catch (Exception $e) {
            // Jika error, bisa log error dan kembalikan pesan gagal
            return redirect()->back()->withInput()->with('error', 'Gagal menambah buku: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        // Validasi request sesuai field pada edit-buku.blade.php
        $validatedData = $request->validate([
            'judul_buku' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1950|max:' . date('Y'),
            'eksemplar' => 'required|integer|min:1',
            'rak' => 'required|string|max:255',
            'sumber' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'tanggal_terima' => 'nullable|date',
            'sinopsis' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Inisialisasi array data untuk insert (mapping ke nama field tabel)
        $bukuData = [
            'judul_buku' => $validatedData['judul_buku'],
            'pengarang' => $validatedData['pengarang'],
            'id_penerbit' => $validatedData['penerbit'],
            'id_rak' => $validatedData['rak'],
            'id_sumber' => $validatedData['sumber'],
            'id_kategori' => $validatedData['kategori'],
            'tahun_terbit' => $validatedData['tahun_terbit'],
            'eksemplar' => $validatedData['eksemplar'],
            'tanggal_terima' => $validatedData['tanggal_terima'] ?? null,
            'sinopsis' => $validatedData['sinopsis'] ?? null,
        ];

        // Proses cover jika diupload
        if ($request->hasFile('cover')) {
            $coverFile = $request->file('cover');
            $coverFileName = time() . '-' . uniqid() . '.' . $coverFile->getClientOriginalExtension();
            $coverFile->storeAs('cover-buku', $coverFileName, 'public');
            $bukuData['cover'] = 'cover-buku/' . $coverFileName;
        }

        $buku->update($bukuData);

        return back()->with('succes', 'Berhasil Update Buku');
    }

    /**
     * Menghapus data buku berdasarkan ID.
     */
    public function destroy($id)
    {
        // return "ini menghapus";
        try {
            $buku = Buku::all()->findOrFail($id);

            // Hapus file cover jika ada
            if ($buku->cover) {
                $filePath = 'buku/' . $buku->cover;
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
            }

            // Hapus data buku
            $buku->delete();

            // Support response AJAX/JSON dan redirect
            if (request()->ajax() || request()->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Buku berhasil dihapus.'
                ]);
            }

            return redirect()->route('dashboard')->with('success', 'Buku berhasil dihapus.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            if (request()->ajax() || request()->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Buku tidak ditemukan.'
                ], 404);
            }
            return redirect()->route('dashboard')->with('error', 'Buku tidak ditemukan.');
        } catch (Exception $e) {
            $pesan = config('app.debug')
                ? 'Gagal menghapus buku: ' . $e->getMessage()
                : 'Gagal menghapus buku. Silakan coba lagi atau hubungi admin.';
            if (request()->ajax() || request()->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $pesan
                ], 500);
            }
            return redirect()->route('dashboard')->with('error', $pesan);
        }
    }

    /**
     * Show the form for editing the specified resource (AJAX/modal).
     */
    public function edit($id)
    {
        // Alternatif versi singkat, standar Laravel:
        $buku = Buku::with([
            'kategori',
            'sumber',
            'penerbit',
            'rak',
        ])->findOrFail($id);

        // Kembalikan view Blade untuk form edit, kirim variabel $buku
        return view('components.admin.edit-buku', [
            'buku' => $buku,
            'dataKategori' => Kategori::all(),
            'dataPenerbit' => Penerbit::all(),
            'dataSumber' => Sumber::all(),
            'dataRak' => Rak::all()
        ]);
    }

    /**
     * Display the specified resource (AJAX/modal detail).
     */
    public function show($id)
    {
        // Ambil data buku beserta relasi-relasi terkait dan fallback ke field pengarang langsung jika ada
        $buku = Buku::with([
            'kategori',
            'sumber',
            'penerbit',
            'rak',
        ])->findOrFail($id);

        // Render view detail buku dan kembalikan sebagai HTML
        return view('components.admin.detail-buku', compact('buku'))->render();
    }

    // Tambah Penerbit
    public function tambahPenerbit(Request $request)
    {
        $validatedData = $request->validate([
            'nama_penerbit' => 'required|string|max:255'
        ]);

        Penerbit::create($validatedData);

        return back()->with('success', 'Berhasil menambahkan penerbit');
    }

    public function tambahRak(Request $request)
    {
        $validatedData = $request->validate([
            'no_rak' => 'required|string|max:255'
        ]);

        Rak::create($validatedData);

        return back()->with('success', 'Berhasil menambahkan lokasi rak');
    }

    public function tambahSumber(Request $request)
    {
        $validatedData = $request->validate([
            'nama_sumber' => 'required|string|max:255'
        ]);

        Sumber::create($validatedData);

        return back()->with('success', 'Berhasil menambahkan sumber');
    }

    public function tambahKategori(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        Kategori::create($validatedData);

        return back()->with('success', 'Berhasil menambahkan kategori');
    }

}
