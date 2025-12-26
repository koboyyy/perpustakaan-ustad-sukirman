<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::all();

        return view('dashboard.penerbit', [
            'dataPenerbit' => $penerbit
        ]);
    }

    public function destroy($id)
    {

        // return 'ini hapus';

        $penerbit = Penerbit::findOrFail($id);

        // Optional: You may want to check if related books exist and prevent deletion

        $penerbit->delete();

        // Return JSON suitable for AJAX request
        return response()->json(['success' => true, 'message' => 'Data penerbit berhasil dihapus.']);
    }
}
