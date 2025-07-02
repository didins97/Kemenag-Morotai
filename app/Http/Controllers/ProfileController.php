<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function sejarah()
    {
        $sejarah = \App\Models\Sejarah::first();
        return view('profile.sejarah', compact('sejarah'));
    }

    public function visiMisi()
    {
        $visiMisi = \App\Models\VisiMisi::first();
        return view('profile.visi-misi', compact('visiMisi'));
    }

    public function tugasFungsi()
    {
        $tugasFungsi = \App\Models\Tungsi::first();
        return view('profile.tugas-fungsi', compact('tugasFungsi'));
    }

    public function strukturOrganisasi()
    {
        $struktur = \App\Models\Struktur::first();
        return view('profile.struktur', compact('struktur'));
    }

    public function unitKerja($slug)
    {
        $unitKerja = \App\Models\UnitKerja::with('strukturUnit', 'anggotaUnit')->where('slug', $slug)->first();
        return view('profile.unit-kerja.index', compact('unitKerja'));
    }

    public function informasi($slug)
    {
        $info = \App\Models\Informasi::where('slug', $slug)->first();
        return view('informasi.detail', compact('info'));
    }
}
