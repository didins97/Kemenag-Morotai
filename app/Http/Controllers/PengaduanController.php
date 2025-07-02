<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $kontak = Kontak::first();
        return view('aduan.index', compact('kontak'));
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'no_telepon' => 'required|string|max:20',
            'subjek' => 'required|string|max:200',
            'isi' => 'required|string',
            'file' => 'nullable|file|max:5120|mimes:pdf,jpg,jpeg,png,doc,docx',
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('pengaduan/files');
        }

        Pengaduan::create($validated);

        return redirect()->back()->with('success', 'Pengaduan berhasil dikirim!');
    }
}
