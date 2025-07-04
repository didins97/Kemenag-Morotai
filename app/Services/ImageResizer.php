<?php

namespace App\Services;

use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageResizer
{
    public static function resizeForSocial(string $path, int $width = 1200, int $height = 630): void
    {
        $fullPath = storage_path('app/public/' . $path);

        if (!file_exists($fullPath)) {
            logger()->warning("Gambar tidak ditemukan: " . $fullPath);
            return;
        }

        try {
            $manager = new ImageManager(new Driver());
            $image = $manager->read($fullPath);
            $image->cover($width, $height)->save(); // overwrite file
        } catch (\Exception $e) {
            logger()->error("Resize gagal: " . $e->getMessage());
        }
    }
}
