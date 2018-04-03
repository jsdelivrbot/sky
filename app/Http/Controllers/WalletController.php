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

    public function filter(Request $request)
    {
        $id = auth()->user()->id;
        $countries = Country::all();
        $binary_commission = Commission::where('user_id', $id)
            ->where('commission_type_id', 1)->sum('value');
        $direct_commission = Commission::where('user_id', $id)
            ->where('commission_type_id', 2)->sum('value');
        $store_commission = Commission::where('user_id', $id)
            ->where('commission_type_id', 3)->sum('value');
        if ($request->wallet_type_id != 0) {
            $e_pins = Wallet::where('user_id', $id)
                ->where('wallet_type_id', $request->wallet_type_id)
                ->where('e_type_id', 1)->get();
            $e_moneys = Wallet::where('user_id', $id)
                ->where('wallet_type_id', $request->wallet_type_id)
                ->where('e_type_id', 2)->get();
        } else {

            $e_pins = Wallet::where('user_id', $id)
                ->where('e_type_id', 1)->get();
            $e_moneys = Wallet::where('user_id', $id)
                ->where('e_type_id', 2)->get();
        }
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
        $auth_user = auth()->user();
        $flag = false;
        if ($request->e_type_id == 2) {

            if ($auth_user->e_money_balance > $request->value) {
                $flag = true;
            }
        }

        if ($request->e_type_id == 1) {

            if ($auth_user->e_pin_balance > $request->value) {
                $flag = true;
            }

        }
        if ($flag) {
            $wallet = new Wallet;
            $user = User::where('unique_id', $request->unique_id)->first();
            $inside_password = Hash::check($request->inside_password, auth()->user()->inside_password);

            if ($user and $inside_password) {
                if ($request->e_type_id == 1) { // e-pin
                    auth()->user()->e_pin_balance = auth()->user()->e_pin_balance - $request->value;
                    $user->e_pin_balance = $user->e_pin_balance + $request->value;
                } else {
                    auth()->user()->e_money_balance = auth()->user()->e_money_balance - $request->value;
                    $user->e_money_balance = $user->e_money_balance + $request->value;
                }
                $wallet->user_id = $auth_user->id;
                $wallet->e_type_id = $request->e_type_id;
                $wallet->transaction_id = rand(99999, 999999);
                $wallet->wallet_type_id = 1; // transfer
                // todo handel transfer from user to user with same id
                $wallet->from_id = auth()->user()->id;
                $wallet->to_id = $user->id;
                $wallet->value = $request->value;
                $wallet->statement = 2; // debit
                $wallet->e_pin_balance = auth()->user()->e_pin_balance;
                $wallet->e_money_balance = auth()->user()->e_money_balance;
                $wallet->save();
                $user->save();
                auth()->user()->save();
                return redirect()->back();
            } else {
                session()->put('transfer1', 'incorrect inside password');
                return redirect()->back();
            }

        } else {
            session()->put('transfer2', 'inbalance money');
            return redirect()->back();
        }
    }

}
