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
        Schema::create('popups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('language_id')->index('popups_language_id_foreign');
            $table->foreign(['language_id'])->references(['id'])->on('languages')->onDelete('CASCADE');
            $table->unsignedSmallInteger('type');
            $table->string('image');
            $table->string('name');
            $table->string('background_color')->nullable();
            $table->unsignedDecimal('background_color_opacity', 3)->nullable();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_color')->nullable();
            $table->string('button_url')->nullable();
            $table->date('end_date')->nullable();
            $table->time('end_time')->nullable();
            $table->unsignedInteger('delay')->comment('value will be in milliseconds');
            $table->unsignedMediumInteger('serial_number');
            $table->unsignedTinyInteger('status')->default(1)->comment('0 => deactive, 1 => active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('popups');
    }
};
