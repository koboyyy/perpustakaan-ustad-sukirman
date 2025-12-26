<?php

namespace App\Http\Controllers;

use App\Models\Sumber;
use Illuminate\Http\Request;

class SumberController extends Controller
{
    public function index()
    {
        $sumber = Sumber::all();

        return view('dashboard.sumber', [
            'dataSumber' => $sumber
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $sumber = Sumber::find($id);
        if (!$sumber) {
            return response()->json(['message' => 'Sumber tidak ditemukan.'], 404);
        }

        $sumber->delete();

        return response()->json(['message' => 'Sumber berhasil dihapus.']);
    }
}
