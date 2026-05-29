<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class InstagramService
{
    protected string $token;

    public function __construct()
    {
        // Pastikan Anda sudah menaruh token di file .env
        $this->token = config('services.instagram.access_token');
    }

    public function getLatestReels(int $limit = 12)
    {
        return Cache::remember('instagram_reels', 3600, function () use ($limit) {
            try {
                $reels = [];
                $nextUrl = "https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,permalink,thumbnail_url,timestamp&access_token={$this->token}&limit=50";

                // Lakukan penarikan data hingga jumlah limit terpenuhi atau data habis
                while (count($reels) < $limit && $nextUrl) {
                    $response = Http::get($nextUrl);

                    if (!$response->successful()) break;

                    $data = $response->json();
                    $allMedia = $data['data'] ?? [];

                    $filtered = collect($allMedia)->filter(function ($item) {
                        return $item['media_type'] === 'VIDEO';
                    });

                    foreach ($filtered as $video) {
                        $reels[] = $video;
                        if (count($reels) >= $limit) break;
                    }

                    // Cek apakah ada halaman berikutnya jika belum mencapai limit
                    $nextUrl = $data['paging']['next'] ?? null;
                }

                return $reels;
            } catch (\Exception $e) {
                return [];
            }
        });
    }
}
