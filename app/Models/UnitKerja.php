<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    protected $table = 'unit_kerja';
    protected $fillable = ['nama_unit', 'deskripsi', 'slug', 'profil', 'tugas_pokok', 'fungsi', 'is_active', 'urutan'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function booted()
    {
        static::creating(function ($unit_kerja) {
            $unit_kerja->slug = \Str::slug($unit_kerja->nama_unit);
        });
    }

    public function strukturUnit()
    {
        return $this->hasMany(StrukturUnit::class);
    }

    public function anggotaUnit()
    {
        return $this->hasMany(AnggotaUnit::class);
    }
}
