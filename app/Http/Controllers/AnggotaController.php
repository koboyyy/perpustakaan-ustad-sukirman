<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
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

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:tbl_anggota,email',
            'username' => 'required|string|max:50|unique:tbl_anggota,username',
            'password' => 'required|string|min:6|confirmed',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|digits_between:10,16|unique:tbl_anggota,nik',
            'no_hp' => 'required|digits_between:10,15',
            'alamat' => 'required|string|max:500',
        ], [
            'nama_lengkap.required' => 'Masukkan nama lengkap',
            'email.required' => 'Masukkan email',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'username.required' => 'Masukkan username',
            'username.unique' => 'Username sudah digunakan',
            'password.required' => 'Buat password',
            'password.confirmed' => 'Ulangi password dengan benar',
            'password.min' => 'Password minimal 6 karakter',
            'tanggal_lahir.required' => 'Masukkan tanggal lahir',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid',
            'nik.required' => 'Masukkan NIK',
            'nik.digits_between' => 'NIK harus 10-16 digit',
            'nik.unique' => 'NIK sudah terdaftar',
            'no_hp.required' => 'Masukkan nomor HP',
            'no_hp.digits_between' => 'Nomor HP harus 10-15 digit',
            'alamat.required' => 'Masukkan alamat',
        ]);

        Anggota::create($validatedData);

        return back()->with('success', 'Berhasil menambahkan anggota!!');
    }
}
