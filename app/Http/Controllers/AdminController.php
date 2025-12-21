<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Buku;
use App\Models\Sumber;
use App\Models\Anggota;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Pengarang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function __invoke(Request $request)
    {
        // $menu = $request->query('menu', 'analitik');

        // if (!request()->has('menu')) {
        //     return redirect()->to(url()->current() . '?menu=analitik');
        // }

        return view('dashboard.databuku', [
            'dataAnggota' => Anggota::all(),
            'dataBuku' => Buku::all(),
            'dataBukuDetail' => app(\App\Http\Controllers\BukuController::class)->getBook(),
            'dataPengarang' => Pengarang::all(),
            'dataPenerbit' => Penerbit::all(),
            'dataKategori' => Kategori::all(),
            'dataRak' => Rak::all(),
            'dataSumber' => Sumber::all(),
        ]);
    }
}
