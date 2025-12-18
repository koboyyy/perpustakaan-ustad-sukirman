<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Ambil user berdasarkan name dan role
        $user = User::where('name', $request->name)
            ->first();

        // Jika user tidak ditemukan
        if (!$user) {
            return back()->withErrors([
                'name' => 'Nama pengguna tidak sesuai'
            ])->withInput();
        }

        // Cek password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Password salah.'
            ])->withInput();
        }

        // Login user
        Auth::login($user, $request->remember);

        // Redirect sesuai role
        if ($user->role === 'admin') {
            return redirect()->route('dashboard');
        } elseif ($user->role === 'pengunjung') {
            return redirect()->route('pengunjung.home');
        }
    }
}

