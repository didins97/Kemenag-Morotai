<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaUnit extends Model
{
    protected $table = 'anggota_unit';

    protected $fillable = [
        'unit_kerja_id',
        'nama',
        'jabatan',
        'nip',
        'foto',
        'urutan',
    ];

    public function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class);
    }
}
