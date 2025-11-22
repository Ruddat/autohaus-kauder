<?php

namespace Database\Seeders;

use App\Models\OpeningHour;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OpeningHoursSeeder extends Seeder
{
    public function run(): void
    {
        $sales = [
            1 => ['09:00', '18:00'], // Montag
            2 => ['09:00', '18:00'],
            3 => ['09:00', '18:00'],
            4 => ['09:00', '18:00'],
            5 => ['09:00', '18:00'],
            6 => ['09:00', '14:00'], // Samstag
            7 => [null, null],       // Sonntag geschlossen
        ];

        $workshop = [
            1 => ['08:00', '17:00'],
            2 => ['08:00', '17:00'],
            3 => ['08:00', '17:00'],
            4 => ['08:00', '17:00'],
            5 => ['08:00', '17:00'],
            6 => [null, null], // Samstag geschlossen
            7 => [null, null], // Sonntag geschlossen
        ];

        $this->seedDepartment('sales', $sales);
        $this->seedDepartment('workshop', $workshop);
    }

    private function seedDepartment(string $department, array $days)
    {
        foreach ($days as $weekday => [$open, $close]) {
            OpeningHour::updateOrCreate(
                ['department' => $department, 'weekday' => $weekday],
                [
                    'opens' => $open,
                    'closes' => $close,
                    'is_closed' => $open === null,
                ]
            );
        }
    }
}
