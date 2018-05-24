<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->cleanDatabase();
        $this->call(CategoriesSeeder::class);
        $this->call(CommessionTypesSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(OrderStatusSeeder::class);
        $this->call(WalletTypesSeeder::class);
        $this->call(UserStatusSeeder::class);
        $this->call(ProductTypesSeeder::class);
        $this->call(ProductsSeeder::class);
    }

    public function cleanDatabase()
    {
        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $tabelName) {
            if ($tabelName == 'migrations') {
                continue;
            }
            DB::table($tabelName)->truncate();
        }
    }
}
