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
                "pengarang" => $buku->detail_pengarang->map(function ($detail) {
                    return $detail->pengarang ? $detail->pengarang->nama_pengarang : '-';
                })->filter()->values()->all(),
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
        // return dd($request);

        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer|min:1950|max:' . date('Y'),
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


        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $coverName = uniqid('buku_') . '.' . $cover->getClientOriginalExtension();
            $coverPath = $cover->storeAs('buku', $coverName, 'public');
            $validatedData['cover'] = $coverName;
        }

        try {
            // Cek apakah relasi benar-benar ada
            $kategori = \App\Models\Kategori::where('nama_kategori', $validatedData['kategori'])->first();
            if (!$kategori) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Kategori tidak ditemukan di database.');
            }
            $penerbit = \App\Models\Penerbit::where('nama_penerbit', $validatedData['penerbit'])->first();
            if (!$penerbit) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Penerbit tidak ditemukan di database.');
            }
            $rak = null;
            if (!empty($validatedData['rak'])) {
                $rak = \App\Models\Rak::where('no_rak', $validatedData['rak'])->first();
                if (!$rak) {
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'No Rak tidak ditemukan di database.');
                }
            }
            $sumber = \App\Models\Sumber::where('nama_sumber', $validatedData['sumber'])->first();
            if (!$sumber) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Sumber tidak ditemukan di database.');
            }

            // Cek duplikasi judul dan pengarang
            $exists = Buku::where('judul_buku', $validatedData['judul'])
                ->where('id_penerbit', $penerbit->id)
                ->first();

            if ($exists) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Data buku dengan judul dan penerbit yang sama sudah ada.');
            }

            // Memasukkan Data Kedalam Table Buku
            $buku = Buku::create([
                'judul_buku' => $validatedData['judul'],
                'id_kategori' => $kategori->id,
                'id_penerbit' => $penerbit->id,
                'tahun_terbit' => $validatedData['tahun_terbit'],
                'eksemplar' => $validatedData['eksemplar'],
                'id_rak' => $rak ? $rak->id : null,
                'id_sumber' => $sumber->id,
                'tanggal_terima' => $validatedData['tanggal_terima'],
                'sinopsis' => $validatedData['sinopsis'],
                'cover' => $validatedData['cover'] ?? null,
            ]);

            // Pengolahan pengarang, sinkronisasi ke tabel pengarang & detail_pengarang
            $pengarangNames = collect(explode(',', $validatedData['pengarang']))
                ->map(fn($n) => trim($n))
                ->filter()
                ->unique()
                ->all();

            foreach ($pengarangNames as $nama) {
                $pengarang = Pengarang::firstOrCreate(
                    ['nama_pengarang' => $nama],
                    ['nama_pengarang' => $nama]
                );
                DetailPengarang::create([
                    'id_buku' => $buku->id,
                    'id_pengarang' => $pengarang->id,
                ]);
            }

            return redirect()->route('viewBuku')->with('success', 'Buku berhasil ditambahkan.');
        } catch (QueryException $e) {
            // Tampilkan pesan asli error SQL jika dev/debug mode, dan error user-friendly jika production
            $pesan = config('app.debug')
                ? 'Gagal menambahkan buku ke database. Pesan error: ' . $e->getMessage()
                : 'Gagal menambahkan buku ke database. Silakan periksa data Anda atau hubungi admin.';
            return redirect()->back()
                ->withInput()
                ->with('error', $pesan);
        } catch (Exception $e) {
            $pesan = config('app.debug')
                ? 'Terjadi kesalahan saat menambahkan buku: ' . $e->getMessage()
                : 'Gagal menambahkan buku. Silakan coba lagi atau hubungi admin.';
            return redirect()->back()
                ->withInput()
                ->with('error', $pesan);
        }
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        // Validasi input (ISBN dihapus)
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1950|max:' . date('Y'),
            'eksemplar' => 'required|integer|min:1',
            'rak' => 'nullable|string|max:255',
            'sumber' => 'required|string|max:255',
            'tanggal_terima' => 'nullable|date',
            'sinopsis' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'judul.required' => 'Judul buku wajib diisi.',
            'kategori.required' => 'Kategori buku wajib diisi.',
            'pengarang.required' => 'Pengarang wajib diisi.',
            'penerbit.required' => 'Penerbit wajib diisi.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.integer' => 'Tahun terbit harus berupa angka.',
            'tahun_terbit.min' => 'Tahun terbit tidak boleh sebelum 1950.',
            'tahun_terbit.max' => 'Tahun terbit tidak boleh melebihi tahun sekarang.',
            'eksemplar.required' => 'Jumlah eksemplar wajib diisi.',
            'eksemplar.integer' => 'Jumlah eksemplar harus berupa angka.',
            'eksemplar.min' => 'Minimal 1 eksemplar.',
            'sumber.required' => 'Sumber wajib dipilih.',
            'cover.image' => 'File cover harus berupa gambar.',
            'cover.mimes' => 'Format cover harus jpg, jpeg, atau png.',
            'cover.max' => 'Ukuran cover maksimal 2MB.',
        ]);

        // Map nama field untuk update (tanpa isbn)
        $dataUpdate = [
            'judul_buku' => $validatedData['judul'],
            'kategori_id' => null,
            'penerbit_id' => null,
            'tahun_terbit' => $validatedData['tahun_terbit'],
            'eksemplar' => $validatedData['eksemplar'],
            'rak_id' => null,
            'sumber_id' => null,
            'tanggal_terima' => $validatedData['tanggal_terima'] ?? null,
            'sinopsis' => $validatedData['sinopsis'] ?? null,
        ];

        // Lookup relasi ke id
        if (!empty($validatedData['kategori'])) {
            $kategori = \App\Models\Kategori::where('nama_kategori', $validatedData['kategori'])->first();
            if (!$kategori) {
                return back()->withInput()->with('error', 'Kategori tidak ditemukan di database.');
            }
            $dataUpdate['kategori_id'] = $kategori ? $kategori->id : null;
        }
        if (!empty($validatedData['penerbit'])) {
            $penerbit = \App\Models\Penerbit::where('nama_penerbit', $validatedData['penerbit'])->first();
            if (!$penerbit) {
                return back()->withInput()->with('error', 'Penerbit tidak ditemukan di database.');
            }
            $dataUpdate['penerbit_id'] = $penerbit ? $penerbit->id : null;
        }
        if (!empty($validatedData['rak'])) {
            $rak = \App\Models\Rak::where('no_rak', $validatedData['rak'])->first();
            if (!$rak) {
                return back()->withInput()->with('error', 'No Rak tidak ditemukan di database.');
            }
            $dataUpdate['rak_id'] = $rak ? $rak->id : null;
        }
        if (!empty($validatedData['sumber'])) {
            $sumber = \App\Models\Sumber::where('nama_sumber', $validatedData['sumber'])->first();
            if (!$sumber) {
                return back()->withInput()->with('error', 'Sumber tidak ditemukan di database.');
            }
            $dataUpdate['sumber_id'] = $sumber ? $sumber->id : null;
        }

        // Handle cover update
        if ($request->hasFile('cover')) {
            if ($buku->cover) {
                $oldPath = 'buku/' . $buku->cover;
                if (\Illuminate\Support\Facades\Storage::disk('public')->exists($oldPath)) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($oldPath);
                }
            }
            $cover = $request->file('cover');
            $coverName = uniqid('buku_') . '.' . $cover->getClientOriginalExtension();
            $cover->storeAs('buku', $coverName, 'public');
            $dataUpdate['cover'] = $coverName;
        }

        // Sinkronisasi detail_pengarang
        $pengarangNames = [];
        if (!empty($validatedData['pengarang'])) {
            $pengarangNames = collect(explode(',', $validatedData['pengarang']))
                ->map(fn($n) => trim($n))
                ->filter()
                ->unique()
                ->all();
        }

        // DB::beginTransaction();
        try {
            // Update field utama Buku
            $dataUpdate = array_filter($dataUpdate, function ($v) {
                return !is_null($v);
            });
            $buku->update($dataUpdate);

            // Sinkronisasi pengarang ke detail_pengarang
            if (!empty($pengarangNames)) {
                DetailPengarang::where('id_buku', $buku->id)->delete();

                foreach ($pengarangNames as $nama) {
                    $pengarang = Pengarang::firstOrCreate(
                        ['nama_pengarang' => $nama],
                        ['nama_pengarang' => $nama]
                    );
                    DetailPengarang::create([
                        'id_buku' => $buku->id,
                        'id_pengarang' => $pengarang->id,
                    ]);
                }
            } else {
                DetailPengarang::where('id_buku', $buku->id)->delete();
            }

            // \DB::commit();

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => true, 'message' => 'Buku berhasil diperbarui.']);
            }
            return back()->with('success', 'Data buku berhasil diperbarui.');
        } catch (\Exception $e) {
            // \DB::rollBack();
            $pesan = config('app.debug')
                ? 'Gagal memperbarui buku: ' . $e->getMessage()
                : 'Gagal memperbarui buku. Silakan coba lagi atau hubungi admin.';
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => false, 'message' => $pesan], 500);
            }
            return back()->withInput()->with('error', $pesan);
        }
    }

    /**
     * Menghapus data buku berdasarkan ID.
     */
    public function destroy($id)
    {
        try {
            $buku = Buku::with(['detail_pengarang'])->findOrFail($id);

            // Hapus relasi detail_pengarang jika ada (pivot/hasMany)
            if ($buku->relationLoaded('detail_pengarang') && $buku->detail_pengarang) {
                foreach ($buku->detail_pengarang as $detail) {
                    $detail->delete();
                }
            }

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
        $buku = \App\Models\Buku::with([
            'kategori',
            'sumber',
            'penerbit',
            'rak',
            'detail_pengarang.pengarang'
        ])->findOrFail($id);

        // Kembalikan view Blade untuk form edit, kirim variabel $buku
        return view('components.edit-buku', [
            'buku' => $buku,
            'dataKategori' => Kategori::all(),
            'dataPengarang' => Pengarang::all(),
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
            'detail_pengarang.pengarang',
        ])->findOrFail($id);

        // Render view detail buku dan kembalikan sebagai HTML
        return view('components.admin.detail-buku', compact('buku'))->render();
    }

}
