<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opini extends Model
{
    protected $table = 'opini';

    protected $fillable = [
        'judul', 'isi', 'gambar', 'caption_gambar', 'slug', 'sumber', 'narasumber', 'foto_narasumber', 'tentang_narasumber', 'views', 'published'
    ];

    protected $casts = [
        'sumber' => 'array'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function booted()
    {
        static::creating(function ($opini) {
            $opini->slug = \Str::slug($opini->judul);
        });
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
