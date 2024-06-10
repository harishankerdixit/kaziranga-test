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
        Schema::create('package_festival_dates', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['festival', 'blocked'])->default('festival');
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->timestamps();
            $table->index(['start', 'end']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_festival_dates');
    }
};
