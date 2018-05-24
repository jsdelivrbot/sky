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
        \App\Country::create([
            'name_ar' => 'Country',
            'name_en' => 'Country',
        ]);
        \App\State::create([
            'name_ar' => 'State',
            'name_en' => 'State',
            'country_id' => 1
        ]);
        \App\City::create([
            'name_ar' => 'City',
            'name_en' => 'City',
            'state_id' => 1
        ]);
    }
}
