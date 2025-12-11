<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'role' => 'required',
            'name' => 'required',
            'password' => 'required',
        ]);

        // Ambil user berdasarkan name dan role
        $user = User::where('name', $request->name)
            ->where('role', $request->role)
            ->first();

        // Jika user tidak ditemukan
        if (!$user) {
            return back()->withErrors([
                'name' => 'Nama pengguna atau role tidak sesuai.'
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
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('pengunjung.dashboard');
    }
}

