<?php

namespace Database\Seeders;

use App\Models\ServiceItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'icon' => 'fas fa-tools',
                'title' => 'Inspektionen & Wartung',
                'text' => 'Regelmäßige Wartung nach Herstellervorgaben für maximale Sicherheit und Lebensdauer.',
                'sort_order' => 1,
            ],
            [
                'icon' => 'fas fa-oil-can',
                'title' => 'Ölwechsel & Filterservice',
                'text' => 'Schneller Ölwechsel mit hochwertigen Markenölen. Inklusive Filtertausch.',
                'sort_order' => 2,
            ],
            [
                'icon' => 'fas fa-car-crash',
                'title' => 'Unfallinstandsetzung',
                'text' => 'Fachgerechte Reparatur nach einem Unfall – professionell und effizient.',
                'sort_order' => 3,
            ],
            [
                'icon' => 'fas fa-bolt',
                'title' => 'Elektronik & Diagnose',
                'text' => 'Moderne Diagnosegeräte für präzise Fehleranalyse und Reparatur.',
                'sort_order' => 4,
            ],
            [
                'icon' => 'fas fa-snowflake',
                'title' => 'Klimaservice',
                'text' => 'Überprüfung, Wartung und Befüllung der Klimaanlage.',
                'sort_order' => 5,
            ],
            [
                'icon' => 'fas fa-tachometer-alt',
                'title' => 'HU & AU Vorbereitung',
                'text' => 'Vorbereitung und Durchführung der Hauptuntersuchung.',
                'sort_order' => 6,
            ],
        ];

        foreach ($items as $item) {
            ServiceItem::create($item);
        }
    }
}
