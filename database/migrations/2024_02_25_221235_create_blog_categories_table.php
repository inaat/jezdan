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
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('language_id')->index('blog_categories_language_id_foreign');
            $table->foreign(['language_id'])->references(['id'])->on('languages')->onDelete('CASCADE');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->unsignedTinyInteger('status');
            $table->unsignedMediumInteger('serial_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_categories');
    }
};
