<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subregions', function (Blueprint $table) {
            $table->foreign(['region_id'], 'subregion_continent_final')->references(['id'])->on('regions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subregions', function (Blueprint $table) {
            $table->dropForeign('subregion_continent_final');
        });
    }
};
