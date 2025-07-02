<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $fillable = ['nama', 'slug'];

    protected static function booted()
    {
        static::creating(function ($tag) {
            $tag->slug = \Str::slug($tag->nama);
        });
    }
}
