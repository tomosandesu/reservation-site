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
    Schema::table('reservations', function (Blueprint $table) {
        $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('reservations', function (Blueprint $table) {
        $table->dropForeign(['room_id']);
        $table->dropForeign(['plan_id']);
    });
}

};
