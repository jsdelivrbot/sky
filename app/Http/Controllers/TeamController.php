<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Product;
use App\Sub_categoty;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{

    public function index()
    {
        $countries = Country::all();
        $categories = Category::all();
        return view('site.team', compact('countries', 'categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'message' => $errors->first(),
                'success' => 'no',
            ], 200);
        } else {
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'middle_name' => $data['middle_name'],
                'last_name' => $data['last_name'],
                'user_name' => $data['user_name'],
                'inside_password' => Hash::make($data['inside_password']),
                'state_id' => $data['state_id'],
                'city' => $data['city'],
                'address' => $data['address'],
                'national_id' => $data['national_id'],
                'birth_date' => strtotime($data['birth_date']),
                'beneficiary' => $data['beneficiary'],
                'unique_id' => rand(99999, 999999),
                'parent_id' => auth()->user()->id,
                'position' => $data['position'],
                'phone' => $data['phone'],
                'e_pin_balance' => 0,
                'e_money_balance' => 0,
                'user_status_id' => 1,

            ]);
        }
        return redirect()->back();
    }

}
