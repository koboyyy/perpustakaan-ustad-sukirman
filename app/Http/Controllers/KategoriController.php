<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function kategori()
    {
        $kategori = Kategori::all();

        return view('dashboard.kategori', [
            'dataKategori' => $kategori
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) {
            return response()->json(['message' => 'Kategori tidak ditemukan.'], 404);
        }

        $kategori->delete();

        return response()->json(['message' => 'Kategori berhasil dihapus.']);
    }

}
