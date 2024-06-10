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
        Schema::create('booking_customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->unsignedBigInteger('jeep_no')->nullable();
            $table->enum('type', ['adult', 'children'])->nullable();
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('idproof')->nullable();
            $table->string('idproof_number')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_customers');
    }
};
