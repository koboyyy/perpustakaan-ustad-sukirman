<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    public function rak()
    {
        $rak = Rak::all();

        return view('dashboard.rak', [
            'dataRak' => $rak
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $rak = Rak::find($id);
        if (!$rak) {
            return response()->json(['message' => 'Rak tidak ditemukan.'], 404);
        }

        $rak->delete();

        return response()->json(['message' => 'Rak berhasil dihapus.']);
    }
}
