<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\ProfilPimpinan;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        // $beritas = Berita::published()->terbaru()->paginate(6);
        // $kategories = \App\Models\Kategori::all();

        if (request('kategori')) {
            $beritas = Berita::with(['kategori', 'user'])
                ->published()
                ->kategori(request('kategori'))
                ->terbaru()
                ->paginate(6);
        } else {
            $beritas = Berita::with(['kategori', 'user'])
                ->published()
                ->terbaru()
                ->paginate(6);
        }

        $kategories = \App\Models\Kategori::all();


        return view('berita.index', compact('beritas', 'kategories'));
    }

    public function detail($slug)
    {
        $berita = Berita::BySlug($slug)->first();
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
