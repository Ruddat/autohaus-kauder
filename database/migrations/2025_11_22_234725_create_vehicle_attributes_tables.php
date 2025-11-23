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
        Schema::create('fuel_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('transmissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::table('vehicles', function (Blueprint $table) {
            $table->foreignId('fuel_type_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('transmission_id')->nullable()->constrained()->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropConstrainedForeignId('fuel_type_id');
            $table->dropConstrainedForeignId('transmission_id');
        });

        Schema::dropIfExists('fuel_types');
        Schema::dropIfExists('transmissions');
    }
};
