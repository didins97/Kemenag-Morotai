<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Video;
use App\Models\Galeri;
use App\Models\Pengumuman;
use App\Models\Dokumen;
use App\Models\Kategori;
use App\Services\InstagramService;
use App\Services\JadwalSholatService;

class BerandaController extends Controller
{
    protected JadwalSholatService $jadwalSholatService;
    protected InstagramService $instagramService; // Tambahkan properti

    // Inject InstagramService ke dalam constructor
    public function __construct(
        JadwalSholatService $jadwalSholatService,
        InstagramService $instagramService
    ) {
        $this->jadwalSholatService = $jadwalSholatService;
        $this->instagramService = $instagramService;
    }


    public function index()
    {
        $instagramReels = $this->instagramService->getLatestReels(12);
        $allNews = Berita::published()->featured()->terbaru()->take(10)->get();
        $resJadwal = $this->jadwalSholatService->getJadwal();
        $playLists = Video::published()->orderByDesc('created_at')->get();
        $popularNews = Berita::published()->trending()->take(6)->get();
        $allRecent = Berita::published()->terbaru()->take(4)->get();

        // Pengumuman & Dokumen
        $pengumumans = Pengumuman::latest('tanggal')->take(4)->get();
        $dokumens = Dokumen::latest('created_at')->take(4)->get();
        $dokumens = Dokumen::latestDocuments(4);
        $dokumenCounts = Dokumen::countsByCategory();

        // 3 Berita Dari 3 Kategori Terpopuler
        $beritasKategoriPopuler = Kategori::with(['beritas' => function ($q) {
            $q->published()->terbaru()->take(3);
        }])
            ->withCount('beritas')
            ->orderByDesc('beritas_count')
            ->take(3)
            ->get();

        // Kategori Berita
        $kategories = Kategori::withCount('beritas')->orderByDesc('beritas_count')->limit(7)->get();

        // dd($instagramReels);

        return view('beranda.index', [
            'instagramReels' => $instagramReels,
            'hero'           => $allNews->where('is_featured', true)->first() ?? $allNews->first(),
            'subNews'        => $allNews->skip(1)->take(3),
            'sidebarNews'    => $allNews->skip(4)->take(5),
            'jadwalSholat'   => $resJadwal['data'] ?? null,
            'playLists'      => $playLists,
            'listRecent'      => $popularNews,
            'gridNews'        => $allRecent,
            'pengumumans'     => $pengumumans,
            'dokumens'        => $dokumens,
            'dokumenCounts'   => $dokumenCounts,
            'beritasKategoriPopuler' => $beritasKategoriPopuler,
            'kategories' => $kategories,
        ]);
    }
}
