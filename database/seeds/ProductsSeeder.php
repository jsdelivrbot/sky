<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class ProductsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(0, 9) as $index) {

            \App\Product::create([
                'name_en' => $faker->name,
                'name_ar' => $faker->name,
                'desc_ar' => $faker->paragraph(10),
                'desc_en' => $faker->paragraph(10),
                'price' => $faker->numberBetween(999, 9999),
                'shipping_fees' => $faker->numberBetween(999, 9999),
                'commission' => $faker->numberBetween(999, 9999),
                'quantity' => $faker->numberBetween(99, 999),
                'main_image' => $faker->imageUrl($width = 240, $height = 180),
                'product_type_id' => $faker->numberBetween(1, 2),
                'sub_category_id' => $faker->numberBetween(1, 2),
                'category_id' => $faker->numberBetween(1, 2),
                'published' => $faker->numberBetween(0, 1),
                'limit' => 100,

            ]);
        }

    }
}
