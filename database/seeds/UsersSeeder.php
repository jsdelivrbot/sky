<?php

use App\User;
use App\User_address;
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
        for ($i = 1; $i < 25; $i++) {
            $user= User::create([
                'name' => 'Ahmed'.$i,
                'email' => 'Ahmed@gmail.com'.$i,
                'password' => Hash::make(123456),
                'middle_name' => 'Tarek',
                'last_name' => 'Elmra8y',
                'user_name' => 'ahmed'.$i,
                'inside_password' => Hash::make(123456),
                'state_id' => 1,
                'city' => 'City',
                'national_id' => 123456789,
                'birth_date' => strtotime(time()),
                'beneficiary' => 'Ahmed',
                'unique_id' => $i,
                'parent_id' => $i,
                'position' => rand(1,2),
                'phone' => '01146568373',
            ]);
            User_address::create(['user_id' => $user->id, 'address' => 'address 1']);
        }


    }
}
