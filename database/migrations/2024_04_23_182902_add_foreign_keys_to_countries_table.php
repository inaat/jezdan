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
        Schema::table('countries', function (Blueprint $table) {
            $table->foreign(['region_id'], 'country_continent_final')->references(['id'])->on('regions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['subregion_id'], 'country_subregion_final')->references(['id'])->on('subregions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropForeign('country_continent_final');
            $table->dropForeign('country_subregion_final');
        });
    }
};
