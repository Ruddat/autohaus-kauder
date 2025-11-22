<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VehicleBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run()
{
    $brands = [
        'Mercedes-Benz', 'BMW', 'Audi', 'Volkswagen', 'Opel',
        'Porsche', 'Lexus', 'Toyota', 'Mazda', 'Hyundai',
        'Kia', 'Peugeot', 'Renault', 'Skoda', 'Seat',
        'Cupra', 'Volvo', 'Jaguar', 'Land Rover', 'Mini',
        'Ford', 'Fiat', 'Jeep', 'Honda', 'Nissan',
        'Mitsubishi', 'Subaru', 'Tesla', 'Smart', 'Alfa Romeo'
    ];

    foreach ($brands as $b) {
        \App\Models\VehicleBrand::firstOrCreate([
            'name' => $b,
            'slug' => Str::slug($b)
        ]);
    }
}
}
