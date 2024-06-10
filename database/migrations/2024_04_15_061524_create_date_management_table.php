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
        Schema::create('date_management', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->enum('time', ['7:30 AM to 10:00 AM','1:30 PM to 3:00 PM','5:30 AM to 6:00 AM','6:00 AM to 7:00 AM'])->nullable();
            $table->enum('mode', ['jeep', 'elephant'])->nullable();
            $table->enum('zone', ['Kaziranga Range, Kohora','Western Range, Bagori','Burapahar Range, Ghorakati','Eastern Range, Agaratoli'])->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('date_management');
    }
};
