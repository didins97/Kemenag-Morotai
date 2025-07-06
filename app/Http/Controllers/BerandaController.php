<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\ProfilPimpinan;
use App\Models\Video;
use App\Services\JadwalSholatService;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $beritasPopuler = Berita::with(['kategori', 'user'])
            ->trending()
            ->orderByDesc('views')
            ->take(3)
            ->get();

        $beritasPilihan = Berita::with(['kategori', 'user'])
            ->featured()
            ->orderByDesc('created_at', 'desc')
            ->take(2)
            ->get();

        $beritaPilihan = Berita::with(['kategori', 'user'])
            ->featured()
            ->orderByDesc('created_at', 'desc')
            ->first();

        $beritasTerbaru = Berita::with(['kategori', 'user'])
            ->terbaru()
            ->take(3)
            ->get();

        $beritaTerbaru = Berita::with(['kategori', 'user'])
            ->terbaru()
            ->first();

        $jadwalSholat = (new JadwalSholatService())->getJadwal()['data'];
        $kalenderHijriyah = (new JadwalSholatService())->getKalenderHijriyah()['data'];

        $playLists = Video::published()->get();

        $galeries = \App\Models\Galeri::all();

        // dd($kalenderHijriyah);

        return view('beranda.index', compact('beritasPopuler', 'beritaPilihan', 'beritasPilihan', 'beritasTerbaru', 'beritaTerbaru', 'jadwalSholat', 'kalenderHijriyah', 'playLists', 'galeries'));
    }
}
