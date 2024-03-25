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
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->longText('features');
            $table->integer('campuses_count')->comment("No. of  campuses, 0 = infinite option.");
            $table->integer('student_count');
            $table->enum('interval', ['life_time', 'months', 'years']);
            $table->integer('interval_count');
            $table->integer('trial_days');
            $table->decimal('price', 22, 4);
            $table->integer('created_by');
            $table->integer('serial_number')->default(0);
            $table->boolean('status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
