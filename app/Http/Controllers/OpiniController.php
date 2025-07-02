<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpiniController extends Controller
{
    public function index()
    {
        return view('opini.index');
    }

    public function detail($slug)
    {
        $opini = \App\Models\Opini::where('slug', $slug)->first();
        return view('opini.detail', compact('opini'));
    }
}
