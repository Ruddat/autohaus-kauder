<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('vehicle_images', function (Blueprint $table) {
            $table->string('original')->nullable()->after('path');
            $table->string('hero')->nullable()->after('original');
            $table->string('normal')->nullable()->after('hero');
            $table->string('thumb')->nullable()->after('normal');
        });
    }

    public function down(): void
    {
        Schema::table('vehicle_images', function (Blueprint $table) {
            $table->dropColumn(['original', 'hero', 'normal', 'thumb']);
        });
    }
};
