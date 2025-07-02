<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $fillable = ['nama', 'email', 'subjek', 'isi', 'no_telepon', 'file'];
}
