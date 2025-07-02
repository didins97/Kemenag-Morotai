<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class JadwalSholatService
{
    public function getJadwal($kota = '3207')
    {
        $tahun = date('Y');
        $bulan = date('m');
        $tanggal = date('d');

        try {
            $response = Http::timeout(10)->get("https://api.myquran.com/v2/sholat/jadwal/$kota/$tahun/$bulan/$tanggal");

            if ($response->successful()) {
                return $response->json();
            }

            Log::error("Gagal mengambil jadwal sholat: " . $response->status());
        } catch (\Exception $e) {
            Log::error("Exception saat ambil jadwal sholat: " . $e->getMessage());
        }

        return null;
    }

    public function getKalenderHijriyah()
    {
        try {
            $response = Http::timeout(10)->get("https://api.myquran.com/v2/cal/hijr");

            if ($response->successful()) {
                return $response->json();
            }

            Log::error("Gagal mengambil kalender hijriyah: " . $response->status());
        } catch (\Exception $e) {
            Log::error("Exception saat ambil kalender hijriyah: " . $e->getMessage());
        }

        return null;
    }
}
