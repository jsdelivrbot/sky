<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);
        $this->call(CommessionTypesSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(WalletTypesSeeder::class);
        $this->call(UserStatusSeeder::class);
        $this->call(ProductTypesSeeder::class);
        $this->call(ProductsSeeder::class);
    }
}
