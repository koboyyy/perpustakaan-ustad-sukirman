<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Routing\Controller;

class PengunjungController extends Controller
{
    public function home()
    {
        return view('pengunjung.home', [
            'books' => Buku::all()
        ]);
    }

    public function koleksiBuku()
    {
        return view('pengunjung.koleksiBuku', [
            'dataBuku' => Buku::all()
        ]);
    }

    public function profil()
    {
        return view('pengunjung.profil');
    }
}
