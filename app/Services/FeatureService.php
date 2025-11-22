<?php

namespace App\Services;

use App\Models\Feature;
use Illuminate\Support\Str;

class FeatureService
{
    /**
     * Nimmt ein Fahrzeug-Modell und ein Array von Feature-Namen
     * und sorgt dafür, dass:
     *  - neue Merkmale automatisch angelegt werden (auto-learning)
     *  - Slugs sauber generiert werden
     *  - Dubletten vermieden werden
     *  - Pivot-Tabelle sauber synchronisiert wird
     */
    public static function syncFeatures($vehicle, array $features)
    {
        // Falls leer → Pivot leeren und raus
        if (empty($features)) {
            $vehicle->features()->sync([]);
            return;
        }

        $ids = [];

        foreach ($features as $name) {
            $cleanName = trim($name);

            if (!$cleanName) {
                continue;
            }

            // Slug generieren
            $slug = Str::slug($cleanName);

            // Feature holen oder erzeugen
            $feature = Feature::firstOrCreate(
                ['slug' => $slug],
                ['name' => $cleanName]
            );

            $ids[] = $feature->id;
        }

        // Fahrzeug bekommt neue Zuordnung
        $vehicle->features()->sync($ids);
    }


    /**
     * Optional: Einzelnes Feature holen/erstellen
     */
    public static function createOrGet(string $name): Feature
    {
        $slug = Str::slug($name);

        return Feature::firstOrCreate(
            ['slug' => $slug],
            ['name' => $name]
        );
    }
}
