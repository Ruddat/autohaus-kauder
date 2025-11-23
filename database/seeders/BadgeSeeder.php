<?php

namespace Database\Seeders;

use App\Models\Badge;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BadgeSeeder extends Seeder
{
    public function run(): void
    {
        $badges = [
            [
                'label' => 'NEU',
                'color' => '#B91C1C',       // Rot
                'text_color' => '#FFFFFF',
                'sort_order' => 1,
            ],
            [
                'label' => 'TOP',
                'color' => '#FFD700',       // Gold
                'text_color' => '#000000',
                'sort_order' => 2,
            ],
            [
                'label' => 'SALE',
                'color' => '#22C55E',       // Grün
                'text_color' => '#FFFFFF',
                'sort_order' => 3,
            ],
            [
                'label' => 'RESERVIERT',
                'color' => '#FACC15',       // Gelb
                'text_color' => '#000000',
                'sort_order' => 4,
            ],
            [
                'label' => 'VERKAUFT',
                'color' => '#6B7280',       // Grau
                'text_color' => '#FFFFFF',
                'sort_order' => 5,
            ],
            [
                'label' => 'IM ANKAUF',
                'color' => '#0EA5E9',       // Hellblau
                'text_color' => '#FFFFFF',
                'sort_order' => 6,
            ],
        ];

        foreach ($badges as $badge) {
            Badge::firstOrCreate(['label' => $badge['label']], $badge);
        }
    }
}
