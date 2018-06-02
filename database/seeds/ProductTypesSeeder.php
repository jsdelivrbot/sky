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
        \App\Product_type::create(['name_en' => 'Qulified', 'name_ar' => 'عادى']);
        \App\Product_type::create(['name_en' => 'Premium', 'name_ar' => 'مميز']);
        \App\Product_type::create(['name_en' => 'E-Learning', 'name_ar' => 'فيديوهات']);
    }
}
