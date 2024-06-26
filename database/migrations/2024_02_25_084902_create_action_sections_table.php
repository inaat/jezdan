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
        Schema::create('action_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('language_id');
            $table->foreign(['language_id'])->references(['id'])->on('languages')->onDelete('CASCADE');
            $table->string('background_image');
            $table->string('first_title')->nullable();
            $table->string('second_title')->nullable();
            $table->string('first_button')->nullable();
            $table->string('first_button_url')->nullable();
            $table->string('second_button')->nullable();
            $table->string('second_button_url')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('action_sections');
    }
};
