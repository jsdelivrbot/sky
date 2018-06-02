<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\User_address;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'user_name' => $data['user_name'],
            'inside_password' => Hash::make($data['inside_password']),
            'state_id' => $data['state_id'],
            'city' => $data['city'],
            'national_id' => $data['national_id'],
            'birth_date' => strtotime($data['birth_date']),
            'beneficiary' => $data['beneficiary'],
            'unique_id' => str_limit(Hash::make(rand(99999, 999999)), 10, 11),
            'parent_id' => $data['beneficiary'],
            'position' => $data['position'],
            'phone' => $data['phone'],
            'e_pin_balance' => 0,
            'e_money_balance' => 0,
            'user_status_id' => 1,
        ]);
        User_address::create(['user_id' => $user->id, 'address' => $data['address']]);
        return $user;
    }

    protected function create2(array $data)
    {
        $parent = User::where('unique_id', $data['parent_id'])->first();
        if ($parent) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'middle_name' => $data['middle_name'],
                'last_name' => $data['last_name'],
                'user_name' => $data['user_name'],
                'inside_password' => Hash::make($data['inside_password']),
                'state_id' => $data['state_id'],
                'city' => $data['city'],
                'national_id' => $data['national_id'],
                'birth_date' => strtotime($data['birth_date']),
                'beneficiary' => $data['beneficiary'],
                'unique_id' => str_limit(Hash::make(rand(99999, 999999)), 10, 11),
                'parent_id' => $data['beneficiary'],
                'position' => $data['position'],
                'phone' => $data['phone'],
                'e_pin_balance' => 0,
                'e_money_balance' => 0,
                'user_status_id' => 1,
            ]);
            User_address::create(['user_id' => $user->id, 'address' => $data['address']]);
            return $user;
        } else {
            return redirect()->back();
        }
    }

}
