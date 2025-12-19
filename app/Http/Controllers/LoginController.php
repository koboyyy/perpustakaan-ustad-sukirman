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

    public function store(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'username.required' => 'Nama pengguna wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Ambil user berdasarkan username
        $user = User::where('username', $credentials['username'])->first();

        // Jika user tidak ditemukan
        if (!$user) {
            return back()->withErrors([
                'username' => 'Nama pengguna tidak sesuai.'
            ])->withInput();
        }

        // Cek password
        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'Password salah.'
            ])->withInput();
        }

        // Cek status aktif, misal kolom 'is_active' true
        if (isset($user->is_active) && !$user->is_active) {
            return back()->withErrors([
                'username' => 'Akun Anda belum aktif. Silakan hubungi admin.'
            ])->withInput();
        }

        // Fitur remember me
        $remember = $request->boolean('remember');
        Auth::login($user, $remember);

        // Pastikan data role valid
        $role = $user->role ?? null;

        // Redirect sesuai role
        switch ($role) {
            case 'admin':
                return redirect()->route('dashboard');
            case 'anggota':
                return redirect()->route('home');
            default:
                Auth::logout();
                return back()->withErrors([
                    'username' => 'Role pengguna tidak dikenali.'
                ])->withInput();
        }
    }
}
