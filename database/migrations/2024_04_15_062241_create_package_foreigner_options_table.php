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
        Schema::create('package_foreigner_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('id')->on('packages');
            $table->index(['package_id']);
            $table->unsignedBigInteger('package_categories_id');
            $table->foreign('package_categories_id')->references('id')->on('package_categories');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('extra_bed_ch')->default(0);
            $table->unsignedBigInteger('extra_beds')->default(0);
            $table->unsignedBigInteger('fes_ad_price')->default(0);
            $table->unsignedBigInteger('fes_ch_price')->default(0);
            $table->unsignedBigInteger('fes_room_price')->default(0);
            $table->unsignedBigInteger('s_de_price')->default(0);
            $table->unsignedBigInteger('s_fe_price')->default(0);
            $table->unsignedBigInteger('s_we_price')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_foreigner_options');
    }
};
