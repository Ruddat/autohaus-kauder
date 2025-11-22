<?php

namespace App\Services;

use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    protected $manager;

    public function __construct()
    {
        $this->manager = ImageManager::gd(); // oder ::imagick()
    }

    public function makeSeoName($name): string
    {
        return Str::slug($name) . '-' . time();
    }

    public function uploadTeamImage($file, $name)
    {
        $seo = $this->makeSeoName($name);

        $sizes = [
            'large' => 1600,
            'medium' => 900,
            'small' => 450,
        ];

        $disk = 'public';
        $folder = 'team';

        $paths = [];

        // Original → WEBP
        $img = $this->manager->read($file->getRealPath());
        $original = "$folder/{$seo}.webp";
        Storage::disk($disk)->put($original, $img->toWebp(85));
        $paths['original'] = $original;

        // Größen
        foreach ($sizes as $key => $width) {
            $resized = $img->scale(width: $width);
            $filename = "$folder/{$seo}-$key.webp";
            Storage::disk($disk)->put($filename, $resized->toWebp(85));
            $paths[$key] = $filename;
        }

        // Quadratischer Avatar für Team (200x200)
        $crop = $img->cover(200, 200);
        $cropName = "$folder/{$seo}-avatar.webp";
        Storage::disk($disk)->put($cropName, $crop->toWebp(85));
        $paths['avatar'] = $cropName;

        return $paths;
    }
}
