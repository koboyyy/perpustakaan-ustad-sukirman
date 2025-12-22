<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    // Method Hapus Anggota
    public function destroy(Request $request, $id)
    {
        $deleted = DB::table('tbl_anggota')->where('id', $id)->delete();

        if ($deleted) {
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json(['success' => true], 200);
            }
            return redirect()->back()->with('success', 'Anggota berhasil dihapus.');
        } else {
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Data anggota tidak ditemukan atau gagal dihapus.'], 404);
            }
            return redirect()->back()->with('error', 'Anggota tidak ditemukan atau gagal dihapus.');
        }
    }

    // Method: Show detail anggota (untuk modal/detail AJAX)
    public function show($id)
    {
        // Ambil data anggota dari tabel
        $anggota = DB::table('tbl_anggota')->where('id', $id)->first();

        if ($anggota) {
            // Return data anggota dalam format JSON (untuk AJAX/modal)
            return response()->json([
                'success' => true,
                'data' => $anggota
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data anggota tidak ditemukan.'
            ], 404);
        }
    }
}
