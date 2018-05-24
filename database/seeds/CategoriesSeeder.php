<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoriesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        \App\Category::create([
            'image' => $faker->imageUrl($width = 240, $height = 180),
            'name_ar' => 'Category_ar',
            'name_en' => 'Category_en'
        ]);
        \App\Sub_categoty::create([
            'image' => $faker->imageUrl($width = 240, $height = 180),
            'name_ar' => 'Sub_categoty_ar',
            'name_en' => 'Sub_categoty_en',
            'category_id' => 1,
        ]);
    }
}
