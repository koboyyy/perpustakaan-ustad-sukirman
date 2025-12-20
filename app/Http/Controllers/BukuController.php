<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Menampilkan daftar koleksi buku (untuk route /koleksi-buku).
     */
    public function koleksiBuku()
    {
        // Ambil semua data buku & mapping agar field cocok dengan kebutuhan tabel (lihat databuku.blade.php)
        $dataBuku = Buku::all()->map(function ($buku) {
            return [
                'id' => $buku->id,
                'gambar' => $buku->cover ?? null,
                'judul' => $buku->judul,
                'pengarang' => $buku->pengarang,
                'penerbit' => $buku->penerbit->nama_penerbit,
                'tahunTerbit' => $buku->tahun_terbit,
                'isbn' => $buku->isbn ?? '-',
                'eksemplar' => $buku->eksemplar,
                'rak' => $buku->rak ?? '-',
                'kategori' => $buku->kategori,
                'sumber' => $buku->sumber,
                'tanggalTerima' => $buku->tanggal_terima,
            ];
        });

        // Kirim data ke view pengunjung.koleksiBuku (atau view lain sesuai kebutuhan)
        return view('pengunjung.koleksiBuku', [
            'dataBuku' => $dataBuku
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input sesuai kebutuhan form tambah buku di databuku.blade.php
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer|min:1950|max:' . date('Y'),
            'isbn' => 'nullable|string|max:50',
            'eksemplar' => 'required|integer|min:1',
            'rak' => 'nullable|string|max:100',
            'sumber' => 'required|string|max:255',
            'tanggal_terima' => 'required|date',
            'sinopsis' => 'required|string',
            'cover' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'judul.required' => 'Judul buku wajib diisi.',
            'kategori.required' => 'Kategori wajib dipilih.',
            'pengarang.required' => 'Nama pengarang wajib diisi.',
            'penerbit.required' => 'Nama penerbit wajib diisi.',
            'tahun_terbit.required' => 'Tahun terbit wajib dipilih.',
            'tahun_terbit.digits' => 'Tahun terbit harus 4 digit.',
            'tahun_terbit.integer' => 'Tahun terbit harus berupa angka.',
            'tahun_terbit.min' => 'Tahun terbit tidak boleh sebelum 1950.',
            'tahun_terbit.max' => 'Tahun terbit tidak boleh melebihi tahun sekarang.',
            'eksemplar.required' => 'Jumlah eksemplar wajib diisi.',
            'eksemplar.integer' => 'Jumlah eksemplar harus berupa angka.',
            'eksemplar.min' => 'Minimal 1 eksemplar.',
            'sumber.required' => 'Sumber wajib dipilih.',
            'tanggal_terima.required' => 'Tanggal terima wajib diisi.',
            'sinopsis.required' => 'Sinopsis wajib diisi.',
            'cover.required' => 'Cover buku wajib diupload.',
            'cover.image' => 'File cover harus berupa gambar.',
            'cover.mimes' => 'Format cover harus jpg, jpeg, atau png.',
            'cover.max' => 'Ukuran cover maksimal 2MB.',
        ]);

        // Simpan file cover ke storage/public/buku (supaya path gambar cocok dengan databuku.blade.php)
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $coverName = uniqid('buku_') . '.' . $cover->getClientOriginalExtension();
            $coverPath = $cover->storeAs('buku', $coverName, 'public');
            $validatedData['cover'] = $coverName; // Simpan hanya nama file, sama seperti digunakan pada tabel
        }

        // Simpan buku ke database dengan penanganan error
        try {
            Buku::create([
                'judul' => $validatedData['judul'],
                'kategori' => $validatedData['kategori'],
                'pengarang' => $validatedData['pengarang'],
                'penerbit' => $validatedData['penerbit'],
                'tahun_terbit' => $validatedData['tahun_terbit'],
                'isbn' => $validatedData['isbn'] ?? null,
                'eksemplar' => $validatedData['eksemplar'],
                'rak' => $validatedData['rak'] ?? null,
                'sumber' => $validatedData['sumber'],
                'tanggal_terima' => $validatedData['tanggal_terima'],
                'sinopsis' => $validatedData['sinopsis'],
                'cover' => $validatedData['cover'] ?? null,
            ]);

            return redirect()->route('dashboard')->with('success', 'Buku berhasil ditambahkan.');
        } catch (QueryException $e) {
            // Pesan khusus jika gagal di level database (misal: duplikat, dsb)
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menambahkan buku ke database. Silakan periksa data Anda.');
        } catch (Exception $e) {
            // Pesan umum untuk error selain QueryException
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menambahkan buku: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus data buku berdasarkan ID.
     */
    public function destroy($id)
    {
        try {
            $buku = Buku::findOrFail($id);

            // Hapus file cover dari storage jika ada
            if ($buku->cover) {
                $filePath = 'buku/' . $buku->cover;
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
            }

            $buku->delete();

            return redirect()->route('dashboard')->with('success', 'Buku berhasil dihapus.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('dashboard')->with('error', 'Buku tidak ditemukan.');
        } catch (Exception $e) {
            return redirect()->route('dashboard')->with('error', 'Gagal menghapus buku: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan form edit buku.
     * Route: GET /admin/buku/{id}/edit
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);

        // Optional: jika request adalah AJAX (untuk modal edit via JS)
        if (request()->ajax()) {
            // Bisa kembalikan hanya data json (atau view partial, dsb)
            return response()->json([
                'buku' => $buku,
            ]);
        }

        // Jika bukan AJAX, tampilkan halaman edit penuh
        return view('admin.editBuku', compact('buku'));
    }

    /**
     * Memperbarui data buku di database.
     * Route: PUT /admin/buku/{id}
     */
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer|min:1950|max:' . date('Y'),
            'isbn' => 'nullable|string|max:50',
            'eksemplar' => 'required|integer|min:1',
            'rak' => 'nullable|string|max:100',
            'sumber' => 'required|string|max:255',
            'tanggal_terima' => 'required|date',
            'sinopsis' => 'required|string',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Beda: cover TIDAK selalu diisi saat edit
        ], [
            'judul.required' => 'Judul buku wajib diisi.',
            'kategori.required' => 'Kategori wajib dipilih.',
            'pengarang.required' => 'Nama pengarang wajib diisi.',
            'penerbit.required' => 'Nama penerbit wajib diisi.',
            'tahun_terbit.required' => 'Tahun terbit wajib dipilih.',
            'tahun_terbit.digits' => 'Tahun terbit harus 4 digit.',
            'tahun_terbit.integer' => 'Tahun terbit harus berupa angka.',
            'tahun_terbit.min' => 'Tahun terbit tidak boleh sebelum 1950.',
            'tahun_terbit.max' => 'Tahun terbit tidak boleh melebihi tahun sekarang.',
            'eksemplar.required' => 'Jumlah eksemplar wajib diisi.',
            'eksemplar.integer' => 'Jumlah eksemplar harus berupa angka.',
            'eksemplar.min' => 'Minimal 1 eksemplar.',
            'sumber.required' => 'Sumber wajib dipilih.',
            'tanggal_terima.required' => 'Tanggal terima wajib diisi.',
            'sinopsis.required' => 'Sinopsis wajib diisi.',
            'cover.image' => 'File cover harus berupa gambar.',
            'cover.mimes' => 'Format cover harus jpg, jpeg, atau png.',
            'cover.max' => 'Ukuran cover maksimal 2MB.',
        ]);

        // Jika ada file cover baru, upload & replace yang lama
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $coverName = uniqid('buku_') . '.' . $cover->getClientOriginalExtension();
            $coverPath = $cover->storeAs('buku', $coverName, 'public');
            // Hapus cover lama jika ada
            if ($buku->cover) {
                $oldPath = 'buku/' . $buku->cover;
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }
            $validatedData['cover'] = $coverName;
        } else {
            // Kalau tidak upload cover baru, jangan ubah field cover
            unset($validatedData['cover']);
        }

        // Simpan perubahan
        try {
            $buku->update($validatedData);

            return redirect()->route('dashboard')->with('success', 'Data buku berhasil diperbarui.');
        } catch (QueryException $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui data buku di database. Silakan periksa data Anda.');
        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui buku: ' . $e->getMessage());
        }
    }

    // public function hasPages()
    // {
    //     $jumlah = request('select', 10); // default tampilkan 10 jika tidak ada parameter select

    //     $dataBuku = Buku::limit($jumlah)->get()->map(function ($buku) {
    //         return [
    //             'id' => $buku->id,
    //             'gambar' => $buku->cover ?? null,
    //             'judul' => $buku->judul,
    //             'pengarang' => $buku->pengarang,
    //             'penerbit' => $buku->penerbit,
    //             'tahunTerbit' => $buku->tahun_terbit,
    //             'isbn' => $buku->isbn ?? '-',
    //             'eksemplar' => $buku->eksemplar,
    //             'rak' => $buku->rak ?? '-',
    //             'kategori' => $buku->kategori,
    //             'sumber' => $buku->sumber,
    //             'tanggalTerima' => $buku->tanggal_terima,
    //         ];
    //     });

    //     return response()->json([
    //         'dataBuku' => $dataBuku
    //     ]);
    // }
}
