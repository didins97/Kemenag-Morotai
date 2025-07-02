<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Struktur extends Model
{
    protected $table = 'struktur';
    protected $fillable = ['gambar', 'deskripsi'];
}
