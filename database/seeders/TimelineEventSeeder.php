<?php

namespace Database\Seeders;

use App\Models\TimelineEvent;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimelineEventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'year' => '1989',
                'title' => 'Gründung',
                'text' => 'Eröffnung der Kfz-Werkstatt durch Friedrich Kauder mit zwei Mitarbeitern in der Wilhelm-Rausch-Straße 11.',
                'sort_order' => 1,
            ],
            [
                'year' => '1995',
                'title' => 'Erste Erweiterung',
                'text' => 'Beginn des Fahrzeughandels mit gebrauchten Premium-Fahrzeugen und Erweiterung des Betriebsgeländes.',
                'sort_order' => 2,
            ],
            [
                'year' => '2005',
                'title' => 'Neubau Showroom',
                'text' => 'Bau des modernen Showrooms und offizielle Partnerschaften mit Mercedes-Benz, Audi, BMW und Lexus.',
                'sort_order' => 3,
            ],
            [
                'year' => '2020',
                'title' => 'Digitale Transformation',
                'text' => 'Modernisierung der Webpräsenz und Implementierung digitaler Service-Angebote bei gleichbleibender persönlicher Beratung.',
                'sort_order' => 4,
            ],
        ];

        foreach ($events as $event) {
            TimelineEvent::create($event);
        }
    }
}
