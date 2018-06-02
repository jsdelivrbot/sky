<?php

namespace App\Http\Controllers;

use App\Commission;
use App\E_learning;
use App\Order;
use App\Product;
use App\User;
use App\Wallet;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(Request $request)
    {

        // product shipping fees from e-pin
        // product price fees from e-money
        $user = auth()->user();
        $product = Product::find($request->product_id);
        $parent = User::where('unique_id', $user->parent_id)->first();


        if ($user->e_money_balance > $product->price) {

            $order = new Order();
            $order->product_id = $request->product_id;
            $order->user_id = $user->id;
            if ($request->address_input)
                $order->address = $request->address_input;
            else
                $order->address = $request->address_select;
            $order->phone = $request->mobile;
            $order->order_status_id = 1;
            $order->save();

            if ($parent) {
                $commision = new Commission;
                $commision->user_id = $parent->id;
                $commision->value = 100;
                $commision->commission_type_id = 1;
                $commision->save();
                $parent->e_money_balance = $parent->e_money_balance + 100;
                $parent->save();
            }


            if ($product->product_type_id == 1) {
                // user e-pin wallet
                $wallet = new Wallet;
                $wallet->user_id = $user->id;
                $wallet->e_type_id = 1;
                $wallet->transaction_id = rand(999, 9999);
                $wallet->wallet_type_id = 8;
                $wallet->value = $product->price;
                $wallet->statement = 2;
                //    $user->e_money_balance = $user->e_money_balance - $product->price;
                $user->e_pin_balance = $user->e_pin_balance - $product->shipping_fees;

                $wallet->e_money_balance = auth()->user()->e_money_balance;
                $wallet->e_pin_balance = auth()->user()->e_pin_balance;

                $wallet->save();

                // user e-money wallet
                $wallet = new Wallet;
                $wallet->user_id = $user->id;
                $wallet->e_type_id = 2;
                $wallet->transaction_id = rand(999, 9999);
                $wallet->wallet_type_id = 8;
                $wallet->value = $product->shipping_fees;
                $wallet->statement = 2;

                $user->e_money_balance = $user->e_money_balance - $product->price;
                //   $user->e_pin_balance = $user->e_pin_balance - $product->shipping_fees;

                $wallet->e_money_balance = auth()->user()->e_money_balance;
                $wallet->e_pin_balance = auth()->user()->e_pin_balance;

                if (!$user->qualified) {
                    $videos = Product::where('product_type_id', 3)->get();
                    if ($videos[0]) {
                        $e = new E_learning();
                        $e->user_id = $user->id;
                        $e->product_id = $videos[0]['id'];
                        $e->save();
                    }
                    if ($videos[1]) {
                        $e = new E_learning();
                        $e->user_id = $user->id;
                        $e->product_id = $videos[1]['id'];
                        $e->save();
                    }
                }

                $user->qualified = 1;
                $wallet->save();
                $user->save();
                // end wallet


            } elseif ($product->product_type_id == 2) {

                $user->e_money_balance = $user->e_money_balance - $product->price;
                $commision = new Commission;
                $commision->user_id = $user->id;
                $commision->value = $product->commission;
                $commision->commission_type_id = 3;
                $commision->save();

                $wallet = new Wallet;
                $wallet->user_id = $user->id;
                $wallet->e_type_id = 2;
                $wallet->transaction_id = rand(999, 9999);
                $wallet->wallet_type_id = 5;
                $wallet->value = $product->price;
                $wallet->statement = 2;
                $wallet->e_money_balance = $user->e_money_balance;
                $wallet->e_pin_balance = $user->e_pin_balance;
                $e = new E_learning();
                $e->user_id = $user->id;
                $e->product_id = $product->id;
                $e->save();
                $user->save();
                $wallet->save();
            } elseif ($product->product_type_id == 3) {

                $user->e_money_balance = $user->e_money_balance - $product->price;
                $commision = new Commission;
                $commision->user_id = $user->id;
                $commision->value = $product->commission;
                $commision->commission_type_id = 3;
                $commision->save();

                $wallet = new Wallet;
                $wallet->user_id = $user->id;
                $wallet->e_type_id = 2;
                $wallet->transaction_id = rand(999, 9999);
                $wallet->wallet_type_id = 5;
                $wallet->value = $product->price;
                $wallet->statement = 2;
                $wallet->e_money_balance = $user->e_money_balance;
                $wallet->e_pin_balance = $user->e_pin_balance;
                $user->save();
                $wallet->save();

            } else {
                $wallet = new Wallet;
                $wallet->user_id = $user->id;
                $wallet->e_type_id = 2;
                $wallet->transaction_id = rand(999, 9999);
                $wallet->wallet_type_id = 5;
                $wallet->value = $product->price;
                $wallet->statement = 2;
                $wallet->e_money_balance = $user->e_money_balance;
                $wallet->e_pin_balance = $user->e_pin_balance;
                $user->save();
                $wallet->save();

                $e_learning = new E_learning();
                $e_learning->user_id = $user->id;
                $e_learning->product_id = $product->id;
                $e_learning->save();
            }


            return redirect('/');

        } else {
            session()->put('order_insufficient_money', 'inbalance money');
            return redirect('/');
        }


    }

}
