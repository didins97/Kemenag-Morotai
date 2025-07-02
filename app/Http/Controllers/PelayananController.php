<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use Illuminate\Http\Request;

class PelayananController extends Controller
{
    public function index()
    {
        $pelayanan = Pelayanan::first();
        return view('layanan.index', compact('pelayanan'));
    }
}
