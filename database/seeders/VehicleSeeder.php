<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\FuelType;
use App\Models\Transmission;
use App\Models\Drive;
use App\Models\Badge;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VehicleSeeder extends Seeder
{
    public function run(): void
    {
        $brandsWithModels = [
            'Mercedes-Benz' => ['C 200', 'E 220d', 'E 350 e', 'GLC 300', 'A 180', 'CLA 250'],
            'Audi'          => ['A4 40 TFSI', 'A6 45 TDI', 'Q5 45 TFSI', 'A3 35 TDI', 'Q3 Sportback'],
            'BMW'           => ['320i', '520d', '530e', 'X3 20d', 'X5 30d', 'M440i'],
            'Volkswagen'    => ['Passat 2.0 TDI', 'Golf 8 GTI', 'Tiguan 1.5 TSI', 'Arteon 2.0 TDI'],
            'Lexus'         => ['ES 300h', 'UX 250h', 'RX 450h', 'IS 300'],
            'Porsche'       => ['Macan S', 'Cayenne E-Hybrid', 'Panamera 4S', '911 Carrera'],
        ];

        // IDs laden
        $fuelTypes       = FuelType::pluck('id')->toArray();
        $transmissions   = Transmission::pluck('id')->toArray();
        $drives          = Drive::pluck('id')->toArray();
        $badges          = Badge::pluck('id')->toArray();

        $statuses = ['verfügbar', 'reserviert', 'verkauft'];

        // Brands erzeugen
        foreach ($brandsWithModels as $brandName => $models) {
            VehicleBrand::firstOrCreate(
                ['slug' => Str::slug($brandName)],
                ['name' => $brandName]
            );
        }

        // Fahrzeuge generieren
        for ($i = 0; $i < 30; $i++) {

            // zufällige Marke
            $brandName = array_rand($brandsWithModels);
            $brand     = VehicleBrand::where('name', $brandName)->first();

            // Modell wählen
            $model = $brandsWithModels[$brandName][array_rand($brandsWithModels[$brandName])];

            $slug = Str::slug($brandName . '-' . $model . '-' . $i);

            // Fahrzeug OHNE BILDER speichern
            Vehicle::create([
                'brand_id'        => $brand->id,
                'model'           => $model,
                'slug'            => $slug,
                'year'            => rand(2017, 2024),
                'km'              => rand(5000, 180000),
                'price'           => rand(18000, 120000),

                'fuel_type_id'    => fake()->randomElement($fuelTypes),
                'transmission_id' => fake()->randomElement($transmissions),
                'drive_id'        => fake()->randomElement($drives),
                'badge_id'        => fake()->optional()->randomElement($badges),

                'status'          => fake()->randomElement($statuses),
                'description'     => fake()->paragraph(4),

                'consumption_city' => '8.1',
                'consumption_country' => '5.9',
                'consumption' => '6.8',
                'co2_norm' => 'WLTP',

            ]);
        }
    }
}
