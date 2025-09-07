<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Video;
use App\Models\Galeri;
use App\Models\Pengumuman;
use App\Models\Dokumen;
use App\Services\JadwalSholatService;

class BerandaController extends Controller
{
    protected JadwalSholatService $jadwalSholatService;

    public function __construct(JadwalSholatService $jadwalSholatService)
    {
        $this->jadwalSholatService = $jadwalSholatService;
    }

    public function index()
    {
        // Berita
        $beritasPopuler = Berita::with(['kategori', 'user'])
            ->trending()
            ->orderByDesc('views')
            ->take(3)
            ->get();

        $beritasPilihan = Berita::with(['kategori', 'user'])
            ->featured()
            ->orderByDesc('created_at')
            ->take(2)
            ->get();

        $beritaPilihan = $beritasPilihan->first();

        $beritasTerbaru = Berita::with(['kategori', 'user'])
            ->terbaru()
            ->take(3)
            ->get();

        $beritaTerbaru = $beritasTerbaru->first();

        // Jadwal & Kalender
        $jadwalSholat = $this->jadwalSholatService->getJadwal()['data'];
        $kalenderHijriyah = $this->jadwalSholatService->getKalenderHijriyah()['data'];

        // Media
        $playLists = Video::published()->orderByDesc('created_at')->get();
        $galeries = Galeri::all();

        // Pengumuman & Dokumen
        $pengumumans = Pengumuman::latest('tanggal')->take(4)->get();
        $dokumens = Dokumen::latestDocuments(4);
        $dokumenCounts = Dokumen::countsByCategory();

        return view('beranda.index', [
            'beritasPopuler'  => $beritasPopuler,
            'beritaPilihan'   => $beritaPilihan,
            'beritasPilihan'  => $beritasPilihan,
            'beritasTerbaru'  => $beritasTerbaru,
            'beritaTerbaru'   => $beritaTerbaru,
            'jadwalSholat'    => $jadwalSholat,
            'kalenderHijriyah'=> $kalenderHijriyah,
            'playLists'       => $playLists,
            'galeries'        => $galeries,
            'pengumumans'     => $pengumumans,
            'dokumens'        => $dokumens,
            'dokumenCounts'   => $dokumenCounts,
        ]);
    }
}
