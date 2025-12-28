<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::all();

        return view('dashboard.penerbit', [
            'dataPenerbit' => $penerbit
        ]);
    }

    public function destroy($id)
    {
        // Cari penerbit
        $penerbit = Penerbit::findOrFail($id);

        // Cek jika penerbit ini masih punya relasi dengan buku
        $jumlahBuku = $penerbit->buku()->count();
        if ($jumlahBuku > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Penerbit tidak bisa dihapus karena masih digunakan pada data buku!'
            ], 422);
        }

        // Hapus penerbit bila tidak terkait ke buku manapun
        $penerbit->delete();

        // Return JSON suitable for AJAX request
        return response()->json([
            'success' => true,
            'message' => 'Data penerbit berhasil dihapus.'
        ]);
    }
}
