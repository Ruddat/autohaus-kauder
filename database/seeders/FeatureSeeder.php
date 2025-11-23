<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            'Komfort' => [
                'Sitzheizung',
                'Standheizung',
                'Klimaautomatik',
                'Panorama-Dach',
                'Schiebedach',
                'Keyless Go',
                'Elektrische Heckklappe',
                'Ambientebeleuchtung',
                'Memory Sitze',
                'Elektrische Sitze',
            ],

            'Sicherheit' => [
                'ABS',
                'ESP',
                'Airbags',
                'Notbremsassistent',
                'Totwinkel-Assistent',
                'Spurhalteassistent',
                'Verkehrszeichenerkennung',
                'Adaptive Cruise Control',
                'Müdigkeitserkennung',
                'Alarmanlage',
            ],

            'Assistenz' => [
                '360° Kamera',
                'Rückfahrkamera',
                'Einparkhilfe vorne',
                'Einparkhilfe hinten',
                'Parkassistent',
                'Abstandsregeltempomat',
                'Head-Up Display',
            ],

            'Multimedia' => [
                'Navigationssystem',
                'Apple CarPlay',
                'Android Auto',
                'Bluetooth',
                'DAB Radio',
                'USB Anschluss',
                'Soundsystem',
                'Touchscreen',
            ],

            'Licht & Sicht' => [
                'LED Scheinwerfer',
                'Matrix LED',
                'Xenon',
                'Lichtsensor',
                'Regensensor',
                'Nebelscheinwerfer',
                'Kurvenlicht',
            ],

            'Innenraum' => [
                'Leder',
                'Alcantara',
                'Sportlenkrad',
                'Isofix',
                'Multifunktionslenkrad',
            ],

            'Exterieur' => [
                'Anhängerkupplung',
                'Sommerreifen',
                'Winterreifen',
                'Leichtmetallfelgen',
                'Dachreling',
                'Sportpaket',
            ],
        ];

        foreach ($data as $category => $features) {

            foreach ($features as $name) {

                $slug = Str::slug($name);

                Feature::updateOrCreate(
                    ['slug' => $slug],
                    [
                        'name' => $name,
                        'category' => $category,
                    ]
                );
            }
        }
    }
}
