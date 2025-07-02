<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sejarah extends Model
{
    protected $table = 'sejarahs';
    protected $fillable = ['latar_belakang', 'timeline'];

    protected $casts = [
        'timeline' => 'array',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (Sejarah::exists()) {
                throw new \Exception('Hanya boleh ada satu data sejarah!');
            }
        });
    }
}
