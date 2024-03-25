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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ad_type');
            $table->unsignedSmallInteger('resolution_type')->comment('1 => 300 x 250, 2 => 300 x 600, 3 => 728 x 90');
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->string('slot', 50)->nullable();
            $table->unsignedInteger('views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
