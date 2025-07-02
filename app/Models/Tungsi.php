<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tungsi extends Model
{
    protected $table = 'tungsi';

    protected $fillable = [
        'tugas',
        'fungsi',
    ];
}
