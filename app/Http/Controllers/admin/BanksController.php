<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Wallet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BanksController extends Controller
{

    public function index()
    {
        $items = Wallet::paginate(5);
        $users = User::all();
        return view('admin.banks.index', compact('items', 'users'));
    }

    public function create()
    {
        return view('admin.banks.create');
    }

    public function store(Request $request)
    {
        Wallet::create($request->all());
        return redirect('/admin/banks');
    }


    public function show($id)
    {
        return redirect('/admin/banks');
    }

    public function edit($id)
    {
        $item = Wallet::find($id);
        return view('admin.banks.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Wallet::find($id);
        $item->update($request->all());
        return redirect('/admin/banks');
    }


    public function destroy($id)
    {
        $item = Wallet::find($id);
        $item->delete();
        return redirect('/admin/banks');
    }

    public function transfer(Request $request)
    {

        foreach ($request->id as $user_id) {
            if ($request->e_pin) {

                $user = User::find($user_id);
                $wallet = new Wallet;
                $wallet->user_id = $user_id;
                $wallet->e_type_id = 1;
                $wallet->transaction_id = rand(999, 9999);
                $wallet->wallet_type_id = 1;
                $wallet->value = $request->e_pin;
                $wallet->statement = $request->e_pin_statement;
                if ($request->e_pin_statement == 1) {
                    $user->e_pin_balance = $user->e_pin_balance + $request->e_pin;
                } else {
                    $user->e_pin_balance = $user->e_pin_balance - $request->e_pin;
                }

                $wallet->e_pin_balance = $user->e_pin_balance;
                $wallet->e_money_balance = $user->e_money_balance;
                $wallet->save();
                $user->save();

            }

            if ($request->e_money) {
                $user = User::find($user_id);
                $wallet = new Wallet;
                $wallet->user_id = $user_id;
                $wallet->e_type_id = 2;
                $wallet->transaction_id = rand(999, 9999);
                $wallet->wallet_type_id = 1;
                $wallet->value = $request->e_money;
                $wallet->statement = $request->e_money_statement;
                if ($request->e_money_statement == 1) {
                    $user->e_money_balance = $user->e_money_balance + $request->e_money;
                } else {
                    $user->e_money_balance = $user->e_money_balance - $request->e_money;
                }

                $wallet->e_pin_balance = $user->e_pin_balance;
                $wallet->e_money_balance = $user->e_money_balance;
                $user->save();
                $wallet->save();
            }

        }
        return redirect('/admin/banks');
    }
}
