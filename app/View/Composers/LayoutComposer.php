<?php

namespace App\View\Composers;

use App\Models\Berita;
use App\Models\Informasi;
use App\Models\UnitKerja;
use Illuminate\View\View;
use App\Models\Kategori;


class LayoutComposer
{
    public function compose(View $view)
    {
        // $view->with([
        //     'terbaru' => Berita::with(['kategori', 'user'])
        //         ->terbaru()->take(3)->get(),
        //     // 'hotline' => Kontak::first(),
        //     'opinions' => Opini::latest()->take(3)->get(),
        //     'unitKerjas' => UnitKerja::all(),
        //     'kepalaKantor' => ProfilPimpinan::latest()->first(),
        //     'informasi' => Informasi::all(),
        //     'pengumumans' => Pengumuman::latest()->take(3)->get(),
        // ]);

        $view->with([
            'unitKerjas' => UnitKerja::all(),
            'informasi' => Informasi::all(),
            'KategoriBerita' => Kategori::withCount('beritas')->orderByDesc('beritas_count')->limit(4)->get(),
        ]);
    }
}
