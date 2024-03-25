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
        Schema::create('footer_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('language_id')->index('footer_texts_language_id_foreign');
            $table->foreign(['language_id'], 'footer_texts_language_id_foreign')->references(['id'])->on('languages')->onDelete('CASCADE');
            $table->string('footer_background_color')->nullable();
            $table->text('about_company')->nullable();
            $table->string('copyright_background_color')->nullable();
            $table->text('copyright_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_contents');
    }
};
