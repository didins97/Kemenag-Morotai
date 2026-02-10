<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Video;
use App\Models\Galeri;
use App\Models\Pengumuman;
use App\Models\Dokumen;
use App\Models\Kategori;
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
        // ===========================================
        // 1. BERITA (Optimasi Query)
        // ===========================================

        // Berita Terbaru (Optimasi)
        $latestQuery = Berita::published()->terbaru();
        $beritaTerbaru = $latestQuery->first();

        // Memastikan $beritaTerbaru ada sebelum melakukan pengecualian ID
        if ($beritaTerbaru) {
            $beritasTerbaru = $latestQuery->where('id', '!=', $beritaTerbaru->id)->take(3)->get();
        } else {
            $beritasTerbaru = $latestQuery->take(3)->get();
        }

        // Berita Populer (Optimasi)
        $trendingQuery = Berita::published()->trending();
        $beritaPopuler = $trendingQuery->first();

        if ($beritaPopuler) {
            $beritasPopuler = $trendingQuery->where('id', '!=', $beritaPopuler->id)->take(5)->get();
        } else {
            $beritasPopuler = $trendingQuery->take(5)->get();
        }

        // Berita Pilihan Editor (Menghilangkan Redundansi & Mengganti Logic)
        // Menggabungkan $beritaPilihan dan $beritasPilihan menjadi satu query utama
        $featuredQuery = Berita::published()->featured()->terbaru()->take(7)->get(); // Ambil total 7

        // $beritaPilihan: Ambil 3 pertama untuk dijadikan slider (atau 3 record pertama)
        $beritaPilihan = $featuredQuery->take(3);

        // $beritasPilihan: Ambil 3 pertama yang sama dengan $beritaPilihan (Redundan, tapi dipertahankan karena variabel harus ada)
        // Sesuai permintaan, $beritasPilihan akan berisi 3 data pertama, sama dengan $beritaPilihan
        $beritasPilihan = $beritaPilihan;

        // Catatan: Baris asli Anda: $beritaPilihan dan $beritasPilihan mengambil data yang sama persis (3 record pertama). Kode ini mempertahankan logic tersebut.
        // Jika Anda ingin 4 data berikutnya, gunakan: $beritasPilihan = $featuredQuery->skip(3)->take(4);

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

        // ===========================================
        // 2. DATA LAIN
        // ===========================================

        $resJadwal = $this->jadwalSholatService->getJadwal();
        $jadwalSholat = $resJadwal['data'] ?? null; // Jika 'data' tidak ada, isi null

        $resKalender = $this->jadwalSholatService->getKalenderHijriyah();
        $kalenderHijriyah = $resKalender['data'] ?? null;

        // Media
        $playLists = Video::published()->orderByDesc('created_at')->get();
        $galeries = Galeri::all();

        // Pengumuman & Dokumen
        $pengumumans = Pengumuman::latest('tanggal')->take(4)->get();
        // Mengganti Dokumen::latestDocuments(4) jika itu custom scope:
        $dokumens = Dokumen::latest('created_at')->take(4)->get();

        // Jika Dokumen::latestDocuments(4) adalah custom scope yang benar, pertahankan:
        // $dokumens = Dokumen::latestDocuments(4);

        $dokumenCounts = Dokumen::countsByCategory();

        // ===========================================
        // 3. PASSING VIEW
        // ===========================================

        return view('beranda.index', compact(
            'beritasPopuler',
            'beritaPopuler',
            'beritaPilihan',
            'beritasPilihan',
            'beritasTerbaru',
            'beritaTerbaru',
            'beritasKategoriPopuler',
            'kategories',
            'jadwalSholat',
            'kalenderHijriyah',
            'playLists',
            'galeries',
            'pengumumans',
            'dokumens',
            'dokumenCounts'
        ));
    }
}
