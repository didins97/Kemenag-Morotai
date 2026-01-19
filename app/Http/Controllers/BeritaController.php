<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\ProfilPimpinan;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $beritas = Berita::with(['kategori', 'user'])
            ->published()
            ->terbaru()
            // 1. Logic Search (Judul & Isi)
            ->when($request->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('judul', 'like', "%{$search}%")
                        ->orWhere('isi', 'like', "%{$search}%");
                });
            })
            // 2. Logic Filter Kategori (Mencari berdasarkan SLUG di tabel relasi)
            ->when($request->kategori, function ($query, $slug) {
                $query->whereHas('kategori', function ($q) use ($slug) {
                    $q->where('slug', $slug);
                });
            })
            ->paginate(6)
            ->withQueryString();

        $kategories = \App\Models\Kategori::select('id', 'kategori', 'slug')->get();

        return view('berita.index', compact('beritas', 'kategories'));
    }

    public function detail($slug)
    {
        $berita = Berita::with(['kategori', 'user'])
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        $beritasPopuler = Berita::with(['kategori', 'user'])
            ->published()
            ->trending()
            ->take(4)
            ->get();

        $beritasTerkait = Berita::with(['kategori', 'user'])
            ->published()
            ->where('kategori_id', $berita->kategori_id)
            ->where('id', '!=', $berita->id)
            ->terbaru()
            ->take(3)
            ->get();

        $key = 'berita_' . $berita->id;

        if (!session()->has($key)) {
            $berita->increment('views'); // Tambah 1 view
            session()->put($key, true);
        }

        return view('berita.detail', compact('berita', 'beritasPopuler', 'beritasTerkait'));
    }
}
