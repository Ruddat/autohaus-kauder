<?php

namespace Database\Seeders;

use App\Models\FuelType;
use App\Models\Transmission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FuelTransmissionSeeder extends Seeder
{
    public function run(): void
    {
        $fuels = [
            'Benzin',
            'Diesel',
            'Hybrid',
            'Plug-In Hybrid',
            'Elektro',
            'Wasserstoff',
        ];

        $transmissions = [
            'Automatik',
            'Automatik (Doppelkupplung)',
            'Schaltgetriebe',
            'CVT',
            'E-Antrieb',
        ];

        foreach ($fuels as $fuel) {
            FuelType::firstOrCreate(['name' => $fuel]);
        }

        foreach ($transmissions as $t) {
            Transmission::firstOrCreate(['name' => $t]);
        }
    }
}
