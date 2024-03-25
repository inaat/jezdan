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
        Schema::create('blog_informations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('language_id')->index('blog_informations_language_id_foreign');
            $table->unsignedBigInteger('blog_category_id')->index('blog_informations_blog_category_id_foreign');
            $table->unsignedBigInteger('blog_id')->index('blog_informations_blog_id_foreign');
            $table->foreign(['blog_category_id'])->references(['id'])->on('blog_categories')->onDelete('CASCADE');
            $table->foreign(['language_id'])->references(['id'])->on('languages')->onDelete('CASCADE');
            $table->foreign(['blog_id'])->references(['id'])->on('blogs')->onDelete('CASCADE');

            $table->string('title');
            $table->string('slug');
            $table->string('author');
            $table->longText('content');
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_informations');
    }
};
