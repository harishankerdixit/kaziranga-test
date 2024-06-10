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
        Schema::create('hotel_room_availables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            // $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->unsignedBigInteger('room_id')->nullable();
            // $table->foreign('room_id')->references('id')->on('rooms');
            $table->string('only_room', 255)->nullable();
            $table->string('room_with_breakfast', 255)->nullable();
            $table->string('room_with_breakfast_dinner', 255)->nullable();
            $table->string('room_with_breakfast_lunch_dinner', 255)->nullable();
            $table->string('room_check_in', 255)->nullable();
            $table->string('room_check_out', 255)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        Schema::table('hotel_room_availables', function (Blueprint $table) {
            $table->index('hotel_id');
            $table->index('room_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_room_availables');
    }
};
