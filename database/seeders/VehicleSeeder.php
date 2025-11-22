<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use App\Models\VehicleImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VehicleSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            'Mercedes-Benz' => ['C 200', 'E 220d', 'E 350 e', 'GLC 300', 'A 180', 'CLA 250'],
            'Audi'          => ['A4 40 TFSI', 'A6 45 TDI', 'Q5 45 TFSI', 'A3 35 TDI', 'Q3 Sportback'],
            'BMW'           => ['320i', '520d', '530e', 'X3 20d', 'X5 30d', 'M440i'],
            'Volkswagen'    => ['Passat 2.0 TDI', 'Golf 8 GTI', 'Tiguan 1.5 TSI', 'Arteon 2.0 TDI'],
            'Lexus'         => ['ES 300h', 'UX 250h', 'RX 450h', 'IS 300'],
            'Porsche'       => ['Macan S', 'Cayenne E-Hybrid', 'Panamera 4S', '911 Carrera'],
        ];

        $fuels = ['Benzin', 'Diesel', 'Hybrid', 'Elektro'];
        $gears = ['Automatik', 'Schaltgetriebe'];
        $statuses = ['verfügbar', 'reserviert', 'verkauft'];

        for ($i = 0; $i < 30; $i++) {

            $brand = array_rand($brands);
            $model = $brands[$brand][array_rand($brands[$brand])];

            $slug = Str::slug($brand . '-' . $model . '-' . $i);

            $vehicle = Vehicle::create([
                'brand'       => $brand,
                'model'       => $model,
                'slug'        => $slug,
                'year'        => rand(2017, 2024),
                'km'          => rand(5000, 180000),
                'price'       => rand(18000, 120000),
                'fuel'        => $fuels[array_rand($fuels)],
                'gear'        => $gears[array_rand($gears)],
                'status'      => $statuses[array_rand($statuses)],
                'description' => fake()->paragraph(4),
                'badge'       => fake()->randomElement([null, 'TOP', 'NEU', 'SALE', 'ANGEBOT']),
            ]);

            // Fake-Bilder generieren
            $countImages = rand(3, 6);

            for ($j = 1; $j <= $countImages; $j++) {
                VehicleImage::create([
                    'vehicle_id' => $vehicle->id,
                    'path'       => "vehicles/{$vehicle->id}_{$j}.webp",
                ]);
            }
        }
    }
}
