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
        Schema::create('offline_gateways', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('short_description')->nullable();
            $table->binary('instructions')->nullable();
            $table->boolean('status')->default(true)->comment('0 -> gateway is deactive, 1 -> gateway is active.');
            $table->boolean('has_attachment')->comment('0 -> do not need attachment, 1 -> need attachment.');
            $table->unsignedMediumInteger('serial_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offline_gateways');
    }
};
