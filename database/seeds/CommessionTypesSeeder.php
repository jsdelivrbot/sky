<?php

use Illuminate\Database\Seeder;
use PragmaRX\Countries\Package\Countries;

class CommessionTypesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Commission_type::create(['name_ar' => 'Commission_type','name_en' => 'Commission_type']);
    }
}
