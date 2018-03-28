<?php

use Illuminate\Database\Seeder;
use PragmaRX\Countries\Package\Countries;

class CountriesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Country::create(['name' => 'Egypt']);
        \App\State::create(['name' => 'State', 'country_id' => 1]);
    }
}
