<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitStrukturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data Unit Kerja
        $unitKerja = [
            ['nama_unit' => 'Tata Usaha', 'deskripsi' => 'Bagian administrasi.', 'slug' => \Str::slug('Tata Usaha'), 'profil' => 'Profil Tata Usaha', 'tugas_pokok' => 'Administrasi kantor.', 'fungsi' => 'Mendukung unit lain.', 'is_active' => true, 'urutan' => 1],
            ['nama_unit' => 'Pendidikan Agama', 'deskripsi' => 'Bidang pendidikan keagamaan.', 'slug' => \Str::slug('Pendidikan Agama'), 'profil' => 'Profil Pendidikan Agama', 'tugas_pokok' => 'Pembinaan pendidikan agama.', 'fungsi' => 'Meningkatkan mutu pendidikan agama.', 'is_active' => true, 'urutan' => 2],
            ['nama_unit' => 'Haji & Umrah', 'deskripsi' => 'Pelayanan Haji & Umrah.', 'slug' => \Str::slug('Haji & Umrah'), 'profil' => 'Profil Haji & Umrah', 'tugas_pokok' => 'Penyelenggaraan Haji & Umrah.', 'fungsi' => 'Pelayanan jamaah.', 'is_active' => true, 'urutan' => 3],
            ['nama_unit' => 'Bimas Islam', 'deskripsi' => 'Bimbingan Masyarakat Islam.', 'slug' => \Str::slug('Bimas Islam'), 'profil' => 'Profil Bimas Islam', 'tugas_pokok' => 'Bimbingan umat Islam.', 'fungsi' => 'Pelayanan keagamaan.', 'is_active' => true, 'urutan' => 4],
            ['nama_unit' => 'Bimas Kristen', 'deskripsi' => 'Bimbingan Masyarakat Kristen.', 'slug' => \Str::slug('Bimas Kristen'), 'profil' => 'Profil Bimas Kristen', 'tugas_pokok' => 'Bimbingan umat Kristen.', 'fungsi' => 'Pelayanan keagamaan.', 'is_active' => true, 'urutan' => 5],
        ];

        \DB::table('unit_kerja')->insert($unitKerja);

        $ids = \DB::table('unit_kerja')->pluck('id', 'slug');

        // Struktur Unit (1 Kepala per Unit)
        $struktur = [
            ['unit_kerja_id' => $ids['tata-usaha'], 'jabatan' => 'Kepala Tata Usaha', 'nama' => 'Ahmad Fauzi', 'pangkat_golongan' => 'III/b', 'nip' => '1978123456789012', 'urutan' => 1],
            ['unit_kerja_id' => $ids['pendidikan-agama'], 'jabatan' => 'Kepala Pendidikan Agama', 'nama' => 'Nur Aini', 'pangkat_golongan' => 'III/c', 'nip' => '1987123456789012', 'urutan' => 1],
            ['unit_kerja_id' => $ids['haji-umrah'], 'jabatan' => 'Kasi Haji & Umrah', 'nama' => 'Budi Santoso', 'pangkat_golongan' => 'III/b', 'nip' => '1980123456789012', 'urutan' => 1],
            ['unit_kerja_id' => $ids['bimas-islam'], 'jabatan' => 'Kasi Bimas Islam', 'nama' => 'Rina Setiawan', 'pangkat_golongan' => 'III/c', 'nip' => '1989123456789012', 'urutan' => 1],
            ['unit_kerja_id' => $ids['bimas-kristen'], 'jabatan' => 'Kasi Bimas Kristen', 'nama' => 'Steven Manuel', 'pangkat_golongan' => 'III/b', 'nip' => '1984123456789012', 'urutan' => 1],
        ];

        \DB::table('struktur_unit')->insert($struktur);

        // Minimal 3 anggota per unit
        $anggotaTemplate = [
            ['nama' => 'Dewi Lestari', 'jabatan' => 'Staf 1', 'nip' => '1990123456789001'],
            ['nama' => 'Fajar Muslim', 'jabatan' => 'Staf 2', 'nip' => '1990123456789002'],
            ['nama' => 'Maria Kristina', 'jabatan' => 'Staf 3', 'nip' => '1990123456789003'],
        ];

        $anggotaInsert = [];

        foreach ($ids as $slug => $unitId) {
            foreach ($anggotaTemplate as $i => $data) {
                $anggotaInsert[] = [
                    'unit_kerja_id' => $unitId,
                    'nama' => $data['nama'] . " - $slug",
                    'jabatan' => $data['jabatan'],
                    'nip' => $data['nip'] + $i,
                    'foto' => null,
                    'urutan' => $i + 1,
                ];
            }
        }

        \DB::table('anggota_unit')->insert($anggotaInsert);
    }
}
