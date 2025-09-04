<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            [
                'judul' => 'Jadwal Sholat Bulan Ramadhan 1445 H',
                'isi' => 'Diberitahukan kepada seluruh masyarakat bahwa jadwal sholat selama bulan Ramadhan 1445 H telah ditetapkan. Silakan unduh jadwal lengkapnya melalui website resmi Kemenag Morotai.',
                'tanggal' => Carbon::create(2024, 3, 10),
                'penulis' => 'Admin Kemenag',
            ],
            [
                'judul' => 'Pendaftaran Haji 2025 Dibuka',
                'isi' => 'Pendaftaran calon jamaah haji tahun 2025 resmi dibuka. Silakan melakukan pendaftaran melalui Kantor Kemenag Kabupaten Morotai.',
                'tanggal' => Carbon::create(2024, 5, 1),
                'penulis' => 'Sekretariat Haji',
            ],
            [
                'judul' => 'Pelaksanaan Bimbingan Manasik Haji',
                'isi' => 'Seluruh calon jamaah haji diwajibkan mengikuti bimbingan manasik yang akan dilaksanakan mulai tanggal 12 Mei 2024.',
                'tanggal' => Carbon::create(2024, 5, 12),
                'penulis' => 'Bidang Haji & Umrah',
            ],
            [
                'judul' => 'Peringatan Hari Santri Nasional',
                'isi' => 'Dalam rangka memperingati Hari Santri Nasional, Kemenag Morotai mengundang seluruh pondok pesantren dan santri untuk menghadiri acara pada tanggal 22 Oktober 2024.',
                'tanggal' => Carbon::create(2024, 10, 22),
                'penulis' => 'Admin Kemenag',
            ],
            [
                'judul' => 'Pengumuman Libur Nasional Idul Fitri',
                'isi' => 'Berdasarkan Surat Keputusan Bersama, cuti bersama dan libur nasional Idul Fitri 1445 H akan dilaksanakan mulai tanggal 8 April 2024.',
                'tanggal' => Carbon::create(2024, 4, 8),
                'penulis' => 'Admin Kemenag',
            ],
        ];

        foreach ($data as $pengumuman) {
            Pengumuman::create($pengumuman);
        }
    }
}
