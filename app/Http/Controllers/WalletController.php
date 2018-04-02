<?php

namespace App\Http\Controllers;

use App\Category;
use App\Commission;
use App\Country;
use App\Product;
use App\Sub_categoty;
use App\User;
use App\Wallet;
use Hash;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $countries = Country::all();
        $binary_commission = Commission::where('user_id', $id)
            ->where('commission_type_id', 1)->sum('value');

        $direct_commission = Commission::where('user_id', $id)
            ->where('commission_type_id', 2)->sum('value');

        $store_commission = Commission::where('user_id', $id)
            ->where('commission_type_id', 3)->sum('value');

        $e_pins = Wallet::where('user_id', $id)
            ->where('e_type_id', 1)->get();
        $e_moneys = Wallet::where('user_id', $id)
            ->where('e_type_id', 2)->get();
        return view('site.wallet', compact(
            'binary_commission',
            'direct_commission',
            'store_commission',
            'e_pins',
            'e_moneys',
            'countries'
        ));
    }

    public function transfer(Request $request)
    {
        $wallet = new Wallet;
        $user = User::where('unique_id', $request->unique_id)->first();
        $inside_password = Hash::check($request->inside_password, auth()->user()->password);

        if ($user and $inside_password) {
            if ($request->e_type_id == 1) // e-pin
                auth()->user()->e_pin_balance = auth()->user()->e_pin_balance - $request->value;
            else
                auth()->user()->e_money_balance = auth()->user()->e_money_balance - $request->value;

            $wallet->user_id = $user->id;
            $wallet->e_type_id = $request->e_type_id;
            $wallet->transaction_id = rand(99999, 999999);
            $wallet->wallet_type_id = 1; // transfer
            // todo hander transfer from user to user with same id
            $wallet->from_id = auth()->user()->id;
            $wallet->to_id = $user->id;
            $wallet->value = $request->value;
            $wallet->statement = 1;
            $wallet->e_pin_balance = auth()->user()->e_pin_balance;
            $wallet->e_money_balance = auth()->user()->e_money_balance;
            $wallet->save();
            auth()->user()->save();
            return redirect()->back();
        } else {
            return redirect()->back();
        }

    }

}
