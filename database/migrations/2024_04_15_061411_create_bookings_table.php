<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('type', ['safari', 'package'])->nullable();
            $table->date('date')->nullable();
            $table->enum('vehicle', ['jeep', 'canter', 'elephant'])->nullable();
            $table->enum('zone', ['jungle_trail', 'devalia', 'kankai'])->nullable();
            $table->enum('timing', ['6:45 AM to 9:45 AM', '6:00 AM to 9:00 AM', '8:30 AM to 11:30 AM', '3 PM to 6 PM', '4 PM to 7 PM', '6:30 AM to 9:30 AM', '9:30 AM to 12:30 PM', '3:00 PM to 6:00 PM'])->nullable();
            $table->enum('status', ['pending', 'partially-paid', 'paid'])->default('pending');
            $table->enum('package_option_nationality', ['indian', 'foreigner'])->nullable();
            $table->unsignedBigInteger('adults')->nullable();
            $table->unsignedBigInteger('children')->nullable();
            $table->string('rooms')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->unsignedBigInteger('package_option_id')->nullable();
            $table->unsignedBigInteger('no_of_kids')->nullable();
            $table->unsignedBigInteger('total')->nullable();
            $table->string('state')->nullable();
            $table->text('address')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('proof_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
