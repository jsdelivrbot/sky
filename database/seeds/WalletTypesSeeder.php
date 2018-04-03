<?php

use Illuminate\Database\Seeder;
use PragmaRX\Countries\Package\Countries;

class WalletTypesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $types = ['admin', 'transfer', 'register', 'shipping', 'premium_product', 'renewal' ,'commissions' ,'qualified_product'];
        foreach ($types as $type)
            \App\Wallet_type::create(['name' => $type]);
    }
}
