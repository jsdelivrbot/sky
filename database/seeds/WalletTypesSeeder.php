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
        \App\Wallet_type::create(['name' => 'Wallet_type']);
    }
}
