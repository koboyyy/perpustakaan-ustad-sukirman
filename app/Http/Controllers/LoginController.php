<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Anggota;
use Illuminate\Http\Request;

// Tambahan import Socialite
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Cek apakah input adalah email atau username
        $emailOrUsername = $request->input('email/username');
        $isEmail = filter_var($emailOrUsername, FILTER_VALIDATE_EMAIL);

        if ($isEmail) {
            $credentials = $request->validate([
                'email/username' => 'required|email',
                'password' => 'required|string',
            ]);
            // mapping ke field di database
            $credentials = [
                'email' => $emailOrUsername,
                'password' => $request->input('password'),
            ];
        } else {
            $credentials = $request->validate([
                'email/username' => 'required|string',
                'password' => 'required|string',
            ]);
            $credentials = [
                'username' => $emailOrUsername,
                'password' => $request->input('password'),
            ];
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login Gagal!!');
    }

    // Method untuk login pakai Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback setelah login Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = \Laravel\Socialite\Facades\Socialite::driver('google')->user();

            // Pastikan sudah mengimpor model Anggota
            // use App\Models\Anggota;
            $anggota = \App\Models\Anggota::where('email', $googleUser->getEmail())->first();

            if (!$anggota) {
                // Opsi: buat data anggota baru. Sesuaikan field pada model Anggota.
                $anggota = \App\Models\Anggota::create([
                    'nama' => $googleUser->getName() ?? $googleUser->getNickname() ?? 'Pengguna Google',
                    'email' => $googleUser->getEmail(),
                    'username' => $googleUser->getEmail(), // Atau generate berbeda jika perlu
                    'password' => bcrypt(uniqid()), // Random (tidak digunakan untuk Google)
                    'role' => 'anggota',
                    'is_active' => true, // Default aktif, atau false jika perlu verifikasi
                    // Tambahkan field lain sesuai kebutuhan di tabel anggota
                ]);
            } elseif (isset($anggota->is_active) && !$anggota->is_active) {
                // Jika anggota ada tapi tidak aktif
                return redirect()->route('viewLogin')->withErrors([
                    'username' => 'Akun Anda belum aktif. Silakan hubungi admin.'
                ]);
            }

            // Login anggota secara manual (session)
            \Illuminate\Support\Facades\Auth::login($anggota);

            // Redirect sesuai role (asumsi role tetap disimpan di model anggota)
            $role = $anggota->role ?? null;
            switch ($role) {
                case 'admin':
                    return redirect()->route('dashboard');
                case 'anggota':
                    return redirect()->route('home');
                default:
                    \Illuminate\Support\Facades\Auth::logout();
                    return redirect()->route('viewLogin')->withErrors([
                        'username' => 'Role pengguna tidak dikenali.'
                    ]);
            }
        } catch (\Exception $e) {
            return redirect()->route('viewLogin')->withErrors([
                'username' => 'Gagal login dengan Google. Silakan coba lagi.'
            ]);
        }
    }
}
