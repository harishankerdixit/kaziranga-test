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
        Schema::create('page_management', function (Blueprint $table) {
            $table->id();
            $table->string('type', 191);
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('image', 191)->nullable();
            $table->string('banner_image_alt', 191)->nullable();
            $table->text('title')->nullable();
            $table->text('heading')->nullable();
            $table->text('subheading')->nullable();
            $table->text('section_1')->nullable();
            $table->text('section_2')->nullable();
            $table->text('section_3')->nullable();
            $table->text('section_4')->nullable();
            $table->text('section_5')->nullable();
            $table->text('section_6')->nullable();
            $table->text('section_7')->nullable();
            $table->text('section_8')->nullable();
            $table->text('section_9')->nullable();
            $table->text('section_10')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_management');
    }
};
