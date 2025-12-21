<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function keKoleksiBuku()
    {
        return view('pengunjung.koleksiBuku', [
            'dataBuku' => (new BukuController())->getBook(),
        ]);
    }

    public function liveSearch(Request $request)
    {
        $keyword = $request->input('keyword');

        $bukus = Buku::where('judul_buku', 'LIKE', '%' . $keyword . '%')
            ->limit(15)
            ->get();

        return response()->json($bukus);
    }
}
