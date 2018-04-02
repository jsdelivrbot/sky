<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Product;
use App\Sub_categoty;
use App\User;
use App\User_address;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{

    private $left = 0, $left_qualified = 0, $right = 0, $right_qualified = 0;

    public function index()
    {
        $countries = Country::all();
        $categories = Category::all();
        $user = auth()->user();
        $this->getChildren($user->unique_id);
        $left = $this->left;
        $left_qualified = $this->left_qualified;
        $right = $this->right;
        $right_qualified = $this->right_qualified;
        return view('site.team', compact('countries',
            'user',
            'categories',
            'right',
            'right_qualified',
            'left',
            'left_qualified'
        ));
    }

    public function getChildren($unique_id)
    {
        $users = User::where('parent_id', $unique_id)->get();
        foreach ($users as $user) {
            if ($user->position == 1) {
                $this->left++;
                if ($user->qualified == 1)
                    $this->left_qualified++;
            }
            if ($user->position == 1) {
                $this->right++;
                if ($user->qualified == 1)
                    $this->right_qualified++;
            }

            return $this->getChildren($user->unique_id);
        }


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
                'unique_id' => rand(99999, 999999),
                'parent_id' => $data['parent_id_input'],
                'position' => $data['position_input'],
                'phone' => $data['phone'],
                'e_pin_balance' => 0,
                'e_money_balance' => 0,
                'user_status_id' => 1,

            ]);
            User_address::create(['user_id' => $user->id, 'address' => $data['address']]);

        }
        return redirect()->back();
    }

    public function search_user_id(Request $request)
    {
        $user = User::where('unique_id', $request->unique_id)->first();
        if ($user) {
            $countries = Country::all();
            $categories = Category::all();
            $this->getChildren($user->unique_id);
            $left = $this->left;
            $left_qualified = $this->left_qualified;
            $right = $this->right;
            $right_qualified = $this->right_qualified;
            return view('site.team', compact('countries',
                'user',
                'categories',
                'right',
                'right_qualified',
                'left',
                'left_qualified'
            ));
        } else
            return redirect()->back();
    }

}
