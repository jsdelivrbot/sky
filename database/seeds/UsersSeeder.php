<?php

use App\User;
use Illuminate\Database\Seeder;
use PragmaRX\Countries\Package\Countries;

class UsersSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ahmed',
            'email' => 'Ahmed@gmail.com',
            'password' => Hash::make(123456),
            'middle_name' => 'Tarek',
            'last_name' => 'Elmra8y',
            'user_name' => 'ahmed',
            'inside_password' => Hash::make(123456),
            'state_id' => 1,
            'city' => 'City',
            'address' => 'address',
            'national_id' => 123456789,
            'birth_date' => strtotime(time()),
            'beneficiary' => 'Ahmed',
            'unique_id' => rand(99999, 999999),
            'parent_id' => 1,
            'position' => 1,
            'phone' => '01146568373',

        ]);
    }
}
