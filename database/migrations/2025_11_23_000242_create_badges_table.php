<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('badges', function (Blueprint $table) {
            $table->id();
            $table->string('label')->unique();
            $table->string('color')->default('#B91C1C');      // Hintergrundfarbe
            $table->string('text_color')->default('#FFFFFF'); // Textfarbe
            $table->integer('sort_order')->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::table('vehicles', function (Blueprint $table) {
            $table->foreignId('badge_id')->nullable()->constrained()->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropConstrainedForeignId('badge_id');
        });

        Schema::dropIfExists('badges');
    }
};
