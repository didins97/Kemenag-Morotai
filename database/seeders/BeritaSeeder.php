<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    private const CATEGORIES = [
        'Keagamaan', 'Pendidikan', 'Haji & Umrah', 'Bimas Islam', 'Bimas Non-Islam'
    ];

    private const TAGS = [
        'KUA', 'Madrasah', 'Pondok Pesantren', 'Sertifikasi Halal', 'Penghulu',
        'Penyuluh Agama', 'Zakat', 'Wakaf', 'Kerukunan Umat', 'Bimbingan Ibadah'
    ];

    private const NEWS_TITLES = [
        'Kemenag Kabupaten Gelar Bimtek Penyuluh Agama',
        'Pendaftaran Haji Reguler Dibuka Mulai Besok',
        'Peningkatan Kualitas Guru Madrasah di Kabupaten Ini',
        'Sosialisasi Zakat Profesi bagi ASN',
        'Pembangunan Mushola Desa Diresmikan',
        'Pelatihan Tenaga Penghulu Kabupaten',
        'Penerimaan Siswa Baru Madrasah Tahun Ini',
        'Monitoring Pondok Pesantren oleh Kemenag',
        'Penandatanganan MoU dengan Baznas Setempat',
        'Peringatan Maulid Nabi di Lingkungan Kemenag',
        'Bimbingan Pernikahan bagi Calon Pengantin',
        'Pembinaan Rohani Islam bagi Narapidana',
        'Peluncuran Aplikasi Pendaftaran Nikah Online',
        'Penyerahan Sertifikat Halal untuk UMKM Lokal',
        'Kegiatan Pesantren Kilat Sekolah Dasar'
    ];

     public function run()
    {
        // Create admin user
        $user = User::firstOrCreate(
            ['email' => 'kemenag@example.com'],
            [
                'name' => 'Admin Kemenag',
                'password' => bcrypt('password')
            ]
        );

        // Create categories
        foreach (self::CATEGORIES as $category) {
            Kategori::firstOrCreate(
                ['kategori' => $category],
                ['slug' => \Str::slug($category)]
            );
        }

        // Create tags
        foreach (self::TAGS as $tag) {
            Tag::firstOrCreate(
                ['nama' => $tag],
                ['slug' => \Str::slug($tag)]
            );
        }

        // Create news articles
        foreach (self::NEWS_TITLES as $title) {
            $berita = Berita::create([
                'slug' => \Str::slug($title),
                'judul' => $title,
                'isi' => $this->generateNewsContent($title),
                'gambar' => 'kemenag-news-' . rand(1, 5) . '.jpg',
                'tanggal' => Carbon::now()->subDays(rand(0, 30)),
                'user_id' => $user->id,
                'views' => rand(100, 2000),
                'published' => true,
                'is_featured' => rand(0, 1),
                'kategori_id' => Kategori::inRandomOrder()->first()->id
            ]);

            // Attach 2-3 random tags
            $berita->tags()->attach(
                Tag::inRandomOrder()->limit(rand(2, 3))->pluck('id')
            );
        }
    }

    private function generateNewsContent(string $title): string
    {
        $contents = [
            "Kementerian Agama Kabupaten melaksanakan kegiatan...",
            "Bertempat di Aula Kantor Kemenag Kabupaten, dilaksanakan...",
            "Acara dibuka secara resmi oleh Kepala Kemenag Kabupaten...",
            "Hadir dalam kesempatan tersebut para pejabat struktural...",
            "Kegiatan ini merupakan bagian dari program prioritas...",
            "Peserta kegiatan terlihat antusias mengikuti seluruh rangkaian acara...",
            "Dalam sambutannya, Kepala Seksi menyampaikan pentingnya...",
            "Output yang diharapkan dari kegiatan ini adalah...",
            "Turut hadir perwakilan dari berbagai instansi terkait...",
            "Acara diakhiri dengan penyerahan sertifikat kepada peserta..."
        ];

        shuffle($contents);

        $content = "<h2>{$title}</h2>";
        $content .= "<p>" . implode("</p><p>", array_slice($contents, 0, 4)) . "</p>";

        return $content;
    }
}
