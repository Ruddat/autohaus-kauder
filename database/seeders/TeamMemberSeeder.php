<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $team = [
            [
                'name' => 'Markus Kauder',
                'position' => 'Geschäftsführer',
                'bio' => 'Seit 1995 im Familienbetrieb. Leidenschaft für technische Innovationen der Premium-Automobile.',
                'image' => 'team/markus.jpg',
                'sort_order' => 1,
            ],
            [
                'name' => 'Sarah Bergmann',
                'position' => 'Verkaufsleitung',
                'bio' => '12 Jahre Erfahrung im Premium-Automobilhandel. Spezialisiert auf individuelle Kundenberatung.',
                'image' => 'team/sarah.jpg',
                'sort_order' => 2,
            ],
            [
                'name' => 'Thomas Weber',
                'position' => 'Werkstattleiter',
                'bio' => 'Meister mit 20+ Jahren Erfahrung. Verantwortlich für höchste Qualitätsstandards.',
                'image' => 'team/thomas.jpg',
                'sort_order' => 3,
            ],
            [
                'name' => 'Lisa Schmidt',
                'position' => 'Kundenberaterin',
                'bio' => 'Expertin für Finanzierung und Leasing. Findet für jeden Kunden die optimale Lösung.',
                'image' => 'team/lisa.jpg',
                'sort_order' => 4,
            ],
        ];

        foreach ($team as $member) {
            TeamMember::create($member);
        }
    }
}
