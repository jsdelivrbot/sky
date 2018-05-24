<?php

use Illuminate\Database\Seeder;
use PragmaRX\Countries\Package\Countries;

class OrderStatusSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Order_status::create(['name_ar' => 'Active','name_en' => 'Active']);
    }
}
