<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('components.pengunjung.registrasi');
    }

    public function store(Request $request)
    {
        // Penjelasan:
        // Pada baris berikut:
        // 'no_hp' => 'required|string|unique',
        // Rule 'unique' pada validasi Laravel membutuhkan minimal 1 parameter,
        // yaitu nama tabel di database yang akan dicek keunikannya.
        // Contoh yang benar: 'no_hp' => 'required|string|unique:users'
        // Jika 'unique' ditulis tanpa parameter, maka error:
        // "Validation rule unique requires at least 1 parameters."
        // Solusi: Tambahkan nama tabel setelah 'unique', misal 'unique:users'

        $validateData = $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|email|unique:users',
            'username' => 'required|string|min:2|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|string|unique:users',
            'alamat' => 'required|string',
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'kota' => 'required|string',
            'setuju_syarat' => 'accepted',
        ]);

        $user = User::create($validateData);

        // Fitur remember me setelah registrasi
        $remember = $request->has('remember') ? true : false;
        Auth::login($user, $remember);

        return redirect(route('home'));
    }
}
