<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();

            // Grunddaten
            $table->string('brand');                 // Mercedes-Benz
            $table->string('model');                 // E 350 e AMG Line

            $table->string('slug')->unique();        // SEO URL: mercedes-e-350-e-amg-line

            $table->year('year');                    // Erstzulassung
            $table->integer('km');                   // Kilometerstand

            // Preis
            $table->integer('price');                // Preis (brutto)
            $table->integer('price_net')->nullable();  // Netto optional
            $table->integer('vat')->default(19);       // MwSt-Satz

            // Antrieb
            //$table->string('fuel');                  // Diesel, Benzin, Hybrid, Elektro
            //$table->string('gear');                  // Automatik / Schaltgetriebe
           // $table->string('drive')->nullable();     // 4MATIC, Frontantrieb, RWD

            // Motor
            $table->string('power')->nullable();     // 215 kW (292 PS)
            $table->integer('hp')->nullable();       // 292 PS
            $table->integer('kw')->nullable();       // 215 kW
            $table->integer('ccm')->nullable();      // Hubraum (1991 cm³)

            // Fahrzeugdaten
            $table->string('body_type')->nullable();   // SUV, Limousine, Kombi, Coupe
            $table->integer('doors')->nullable();      // 4/5
            $table->integer('seats')->nullable();      // 5

            // Optik
            $table->string('color')->nullable();       // Schwarz Metallic
            $table->string('color_code')->nullable();  // 040, 197, etc.
            $table->string('interior')->nullable();    // Leder Schwarz
            $table->string('interior_color')->nullable();
            $table->string('interior_material')->nullable(); // Leder / Stoff / Alcantara

            // Fahreigenschaften
            $table->decimal('consumption', 4, 1)->nullable(); // l/100km
            $table->integer('co2')->nullable();               // CO2 g/km

            // Verwaltung
            $table->string('vehicle_number')->nullable();   // FZ-12345
            $table->string('vin')->nullable();              // FIN (optional)
            // $table->string('badge')->nullable();            // TOP / NEU / SALE
            $table->string('main_image')->nullable();       // schnelles Ladebild

            // Kategorien (frei erweiterbar)
            $table->string('category')->nullable();         // E-Klasse, 3er, Q5 etc.

            // Status
            $table->enum('status', [
                'verfügbar',
                'reserviert',
                'verkauft'
            ])->default('verfügbar');

            // Beschreibung
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
