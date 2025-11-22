<?php

namespace Database\Seeders;

use App\Models\ShowroomImage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShowroomImageSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'image' => 'showroom/1.jpg',
                'title' => 'Premium-Ausstellung',
                'subtitle' => 'Unsere Top-Fahrzeuge im Fokus',
                'sort_order' => 1,
            ],
            [
                'image' => 'showroom/2.jpg',
                'title' => 'Elegante Präsentation',
                'subtitle' => 'Erleben Sie Fahrzeuge hautnah',
                'sort_order' => 2,
            ],
            [
                'image' => 'showroom/3.jpg',
                'title' => 'Kauder Lounge',
                'subtitle' => 'Entspannt beraten lassen',
                'sort_order' => 3,
            ],
            [
                'image' => 'showroom/4.jpg',
                'title' => 'Werkstatt Meisterbereich',
                'subtitle' => '120-Punkte Qualitätsprüfung',
                'sort_order' => 4,
            ],
            [
                'image' => 'showroom/5.jpg',
                'title' => 'Premium Bereich',
                'subtitle' => 'Luxury Cars',
                'sort_order' => 5,
            ],
            [
                'image' => 'showroom/6.jpg',
                'title' => 'Fahrzeugübergabe',
                'subtitle' => 'Ein unvergessliches Erlebnis',
                'sort_order' => 6,
            ],
        ];

        foreach ($items as $item) {
            ShowroomImage::create($item);
        }
    }
}
