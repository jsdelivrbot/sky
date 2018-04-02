<?php

use Illuminate\Database\Seeder;
use PragmaRX\Countries\Package\Countries;

class ProductTypesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Product_type::create(['name' => 'Qulified']);
        \App\Product_type::create(['name' => 'Premium']);
    }
}
