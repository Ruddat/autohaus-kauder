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
    Schema::table('vehicles', function (Blueprint $table) {
        $table->boolean('is_new')->default(false);
        $table->boolean('is_top')->default(false);
        $table->boolean('is_hot_deal')->default(false);
    });
}

public function down()
{
    Schema::table('vehicles', function (Blueprint $table) {
        $table->dropColumn(['is_new', 'is_top', 'is_hot_deal']);
    });
}
};
