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
        Schema::create('seos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('language_id')->index('seos_language_id_foreign');
            $table->foreign(['language_id'])->references(['id'])->on('languages')->onDelete('CASCADE');
            $table->string('meta_keyword_home')->nullable();
            $table->text('meta_description_home')->nullable();
            $table->string('meta_keyword_blog')->nullable();
            $table->text('meta_description_blog')->nullable();
            $table->string('meta_keyword_faq')->nullable();
            $table->text('meta_description_faq')->nullable();
            $table->string('meta_keyword_contact')->nullable();
            $table->text('meta_description_contact')->nullable();
            $table->string('meta_keyword_login')->nullable();
            $table->text('meta_description_login')->nullable();
            $table->string('meta_keyword_signup')->nullable();
            $table->text('meta_description_signup')->nullable();
            $table->string('meta_keyword_forget_password')->nullable();
            $table->text('meta_description_forget_password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seos');
    }
};
