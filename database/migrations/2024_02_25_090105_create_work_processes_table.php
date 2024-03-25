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
       
            Schema::create('work_processes', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('language_id');
                $table->string('icon');
                $table->string('color')->nullable();
                $table->string('title')->nullable();
                $table->string('text')->nullable();
                $table->unsignedInteger('serial_number');

                $table->timestamps();
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
