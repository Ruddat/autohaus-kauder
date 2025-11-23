<?php

namespace Database\Seeders;

use App\Models\Drive;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DriveSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            'FWD (Frontantrieb)',
            'RWD (Heckantrieb)',
            'AWD (Allrad)',
            '4MATIC',
            'Quattro',
            'xDrive'
        ];

        foreach ($items as $item) {
            Drive::firstOrCreate(['name' => $item]);
        }
    }
}
