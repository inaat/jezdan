<?php
namespace Database\Seeders;

use App\Models\Currency;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents(database_path('seeders/cities.sql'));
        DB::unprepared($sql);
    }
}
