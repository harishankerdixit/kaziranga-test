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
        Schema::table('hotel_rooms_available', function (Blueprint $table) {
            $table->boolean('custom_amount_status')->default(false)->after('room_with_breakfast_lunch_dinner');
            $table->integer('adult_custom_amount')->nullable()->after('room_with_breakfast_lunch_dinner');
            $table->integer('child_custom_amount')->nullable()->after('room_with_breakfast_lunch_dinner');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hotel_rooms_available', function (Blueprint $table) {
            //
        });
    }
};
