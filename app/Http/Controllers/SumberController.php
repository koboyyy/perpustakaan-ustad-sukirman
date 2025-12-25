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
}
