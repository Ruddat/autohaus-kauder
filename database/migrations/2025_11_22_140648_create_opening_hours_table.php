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
        Schema::create('opening_hours', function (Blueprint $table) {
            $table->id();
            $table->enum('department', ['sales','workshop'])->default('sales');
            $table->tinyInteger('weekday'); // 1=Mo ... 7=So
            $table->time('opens')->nullable();
            $table->time('closes')->nullable();
            $table->boolean('is_closed')->default(false);
            $table->timestamps();

            $table->unique(['department','weekday']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opening_hours');
    }
};
