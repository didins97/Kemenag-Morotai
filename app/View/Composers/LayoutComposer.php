<?php

namespace App\View\Composers;

use App\Models\Berita;
use App\Models\Informasi;
use App\Models\Kontak;
use App\Models\Opini;
use App\Models\ProfilPimpinan;
use App\Models\UnitKerja;
use Illuminate\View\View;


class LayoutComposer
{
    public function compose(View $view)
    {
        $view->with([
            'terbaru' => Berita::with(['kategori', 'user'])
                ->terbaru()->take(3)->get(),
            // 'hotline' => Kontak::first(),
            'opinions' => Opini::latest()->take(3)->get(),
            'unitKerjas' => UnitKerja::all(),
            'kepalaKantor' => ProfilPimpinan::latest()->first(),
            'informasi' => Informasi::all(),
        ]);
    }
}
