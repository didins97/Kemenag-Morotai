<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'beritas';
    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'gambar',
        'tanggal',
        'kategori_id',
        'published',
        'user_id',
        'is_featured',
        'views',
    ];

    protected static function booted()
    {
        static::creating(function ($berita) {
            $berita->user_id = \Auth::id();
            $berita->slug = \Str::slug($berita->judul);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'berita_tag', 'berita_id', 'tag_id');
    }

    public function scopeTerbaru($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori_id', $kategori);
    }

    public function scopeTrending($query)
    {
        return $query->orderBy('views', 'desc');
    }

    public function scopeBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }
}
