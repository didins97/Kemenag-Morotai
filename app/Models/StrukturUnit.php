<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrukturUnit extends Model
{
    protected $table = 'struktur_unit';

    protected $fillable = [
        'unit_kerja_id',
        'jabatan',
        'nama',
        'pangkat_golongan',
        'nip',
        'urutan',
    ];

    public function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class);
    }
}
