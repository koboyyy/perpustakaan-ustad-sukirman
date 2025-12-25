<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function show()
    {
        return view('components.pengunjung.registrasi');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|email|unique:tbl_anggota',
            'username' => 'required|string|min:2|unique:tbl_anggota',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|unique:tbl_anggota',
            'no_hp' => 'required|string|unique:tbl_anggota',
            'alamat' => 'required|string',
            'setuju_syarat' => 'accepted',
        ]);

        $anggota = Anggota::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'tanggal_lahir' => $request->tanggal_lahir,
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect(route('login'))->with('success', 'Registrasi Berhasil!!, Silahkan Login.');
    }
}
