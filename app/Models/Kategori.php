<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategories';
    protected $fillable = ['kategori', 'slug'];

    protected static function booted()
    {
        static::creating(function ($kategori) {
            $kategori->slug = \Str::slug($kategori->kategori);
        });
    }
}
