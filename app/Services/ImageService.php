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

    public function ensureFolderExists($disk, $folder)
    {
        if (!Storage::disk($disk)->exists($folder)) {
            Storage::disk($disk)->makeDirectory($folder);
        }
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

        // 🔥 WICHTIG: Ordner sicherstellen
        $this->ensureFolderExists($disk, $folder);

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

        // Quadratischer Avatar
        $crop = $img->cover(200, 200);
        $cropName = "$folder/{$seo}-avatar.webp";
        Storage::disk($disk)->put($cropName, $crop->toWebp(85));
        $paths['avatar'] = $cropName;

        return $paths;
    }

public function uploadShowroomImage($file, $title)
{
    $seo = $this->makeSeoName($title);

    $sizes = [
        'xl' => 1920,
        'lg' => 1400,
        'md' => 900,
        'sm' => 450,
    ];

    $disk = 'public';
    $folder = 'showroom';

    // Ordner sicherstellen
    $this->ensureFolderExists($disk, $folder);

    $paths = [];

    // Original einlesen
    $img = $this->manager->read($file->getRealPath());

    // Original WebP
    $original = "$folder/{$seo}.webp";
    Storage::disk($disk)->put($original, $img->toWebp(85));
    $paths['original'] = $original;

    // Größen erzeugen
    foreach ($sizes as $key => $width) {
        $resized = $img->scale(width: $width);
        $filename = "$folder/{$seo}-{$key}.webp";
        Storage::disk($disk)->put($filename, $resized->toWebp(85));
        $paths[$key] = $filename;
    }

    return $paths;
}




}
