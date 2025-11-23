<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {

            // Verbrauch (NEU)
            $table->string('consumption_city')->nullable()->after('consumption');
            $table->string('consumption_country')->nullable()->after('consumption_city');
            // 'consumption' (kombiniert) existiert ja bereits

            // CO2 Norm optional
            $table->string('co2_norm')->nullable()->after('co2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn([
                'consumption_city',
                'consumption_country',
                'co2_norm'
            ]);
        });
    }
};
