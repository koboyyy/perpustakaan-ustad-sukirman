<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AnggotaController extends Controller
{
    public function __invoke(Request $request)
    {
        $menu = $request->query('menu', 'analitik');

        if (!request()->has('menu')) {
            return redirect()->to(url()->current() . '?menu=analitik');
        }

        return view('admin.dashboard', [
            'dataBuku' => Buku::all(),
            'dataAnggota' => Anggota::all(),
            'menu' => $menu
        ]);
    }
}
