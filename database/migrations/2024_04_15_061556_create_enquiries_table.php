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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['general', 'package', 'hotel', 'safari']);
            $table->date('booking_date')->nullable();
            $table->string('time_slot')->nullable();
            $table->string('safari_type')->nullable();
            $table->string('traveller_name');
            $table->string('mobile_no');
            $table->string('email_id');
            $table->text('message')->nullable();
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
