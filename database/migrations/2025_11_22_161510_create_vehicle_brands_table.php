<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('vehicle_brands', function (Blueprint $table) {
        $table->id();
        $table->string('name')->unique();
        $table->string('slug')->unique();
        $table->string('logo')->nullable(); // optional: PNG/SVG Logo
        $table->timestamps();
    });

    // Optional: zu vehicles relation ergänzen
    Schema::table('vehicles', function (Blueprint $table) {
        $table->foreignId('brand_id')->nullable()->after('id')->constrained('vehicle_brands');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_brands');
    }
};
