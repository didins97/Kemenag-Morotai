<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';
    protected $fillable = [
        'judul', 'youtube_id', 'user_id', 'published'
    ];

    protected static function booted()
    {
        static::creating(function ($video) {
            $video->user_id = \Auth::id();
        });
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
