<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class JadwalSholatService
{
    public function getJadwal($kota = '3207')
    {
        $tahun = date('Y');
        $bulan = date('m');
        $tanggal = date('d');

        $response = Http::get("https://api.myquran.com/v2/sholat/jadwal/$kota/$tahun/$bulan/$tanggal");

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }

    public function getKalenderHijriyah()
    {
        $response = Http::get("https://api.myquran.com/v2/cal/hijr");

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
