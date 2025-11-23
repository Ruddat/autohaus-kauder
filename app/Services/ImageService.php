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

public function uploadVehicleImage($file, $vehicleId, $title = null)
{
    $seo = $this->makeSeoName($title ?: 'vehicle-' . $vehicleId);

    $disk = 'public';
    $folder = "vehicles/{$vehicleId}";

    // Ordner sicherstellen
    $this->ensureFolderExists($disk, $folder);

    $paths = [];

    // Original lesen
    $img = $this->manager->read($file->getRealPath());

    // ORIGINAL
    $original = "$folder/{$seo}.webp";
    Storage::disk($disk)->put($original, $img->toWebp(85));
    $paths['original'] = $original;

    // HERO (16:9)
    $hero = $img->cover(1600, 900);
    $heroName = "$folder/{$seo}-hero.webp";
    Storage::disk($disk)->put($heroName, $hero->toWebp(85));
    $paths['hero'] = $heroName;

    // NORMAL (4:3)
    $normal = $img->cover(1200, 900);
    $normalName = "$folder/{$seo}-normal.webp";
    Storage::disk($disk)->put($normalName, $normal->toWebp(85));
    $paths['normal'] = $normalName;

    // THUMB (klein)
    $thumb = $img->cover(600, 400);
    $thumbName = "$folder/{$seo}-thumb.webp";
    Storage::disk($disk)->put($thumbName, $thumb->toWebp(85));
    $paths['thumb'] = $thumbName;

    return $paths;
}




}
