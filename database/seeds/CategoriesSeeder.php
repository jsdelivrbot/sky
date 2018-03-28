<?php

use Illuminate\Database\Seeder;
use PragmaRX\Countries\Package\Countries;

class CategoriesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create(['name' => 'Category']);
        \App\Sub_categoty::create(['name' => 'Sub_categoty', 'category_id' => 1]);
    }
}
