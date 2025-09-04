<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumens';

    protected $fillable = [
        'judul',
        'tanggal',
        'kategori',
        'file',
    ];

    public static function latestDocuments($limit = 4)
    {
        return self::latest('tanggal')->take($limit)->get();
    }

    public static function countsByCategory()
    {
        return self::select('kategori', \DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->pluck('total', 'kategori');
    }
}
