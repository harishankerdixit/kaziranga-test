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
        Schema::create('price_management', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['default', 'weekend', 'date-range'])->nullable();
            $table->enum('mode', ['jungle_trail', 'devalia', 'kankai'])->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->unsignedBigInteger('indian_adult1')->default(0);
            $table->unsignedBigInteger('indian_child1')->default(0);
            $table->unsignedBigInteger('indian_adult2')->default(0);
            $table->unsignedBigInteger('indian_child2')->default(0);
            $table->unsignedBigInteger('indian_adult3')->default(0);
            $table->unsignedBigInteger('indian_child3')->default(0);
            $table->unsignedBigInteger('indian_adult4')->default(0);
            $table->unsignedBigInteger('indian_child4')->default(0);
            $table->unsignedBigInteger('indian_adult5')->default(0);
            $table->unsignedBigInteger('indian_child5')->default(0);
            $table->unsignedBigInteger('indian_adult6')->default(0);
            $table->unsignedBigInteger('indian_child6')->default(0);
            $table->unsignedBigInteger('foreigner_adult1')->default(0);
            $table->unsignedBigInteger('foreigner_child1')->default(0);
            $table->unsignedBigInteger('foreigner_adult2')->default(0);
            $table->unsignedBigInteger('foreigner_child2')->default(0);
            $table->unsignedBigInteger('foreigner_adult3')->default(0);
            $table->unsignedBigInteger('foreigner_child3')->default(0);
            $table->unsignedBigInteger('foreigner_adult4')->default(0);
            $table->unsignedBigInteger('foreigner_child4')->default(0);
            $table->unsignedBigInteger('foreigner_adult5')->default(0);
            $table->unsignedBigInteger('foreigner_child5')->default(0);
            $table->unsignedBigInteger('foreigner_adult6')->default(0);
            $table->unsignedBigInteger('foreigner_child6')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_management');
    }
};
