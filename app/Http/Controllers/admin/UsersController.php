<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $items = User::paginate(10);
        return view('admin.users.index', compact('items'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect('/admin/users');
    }


    public function show($id)
    {
        return redirect('/admin/users');
    }

    public function edit($id)
    {
        $item = User::find($id);
        return view('admin.users.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = User::find($id);
        $item->update($request->all());
        return redirect('/admin/users');
    }


    public function destroy($id)
    {
        $item = User::find($id);
        $item->delete();
        return redirect('/admin/users');
    }

    public function filter(Request $request)
    {
        $items = User::where('id', '!=', 0);
        if ($request->status) {
            if ($request->status == 1)
                $items->where('qualified', 1);
            elseif ($request->status == 2)
                $items->where('qualified', 0);
            elseif ($request->status == 3)
                $items->where('status', 2);
            elseif ($request->status == 4)
                $items->where('status', 3);
            elseif ($request->status == 5)
                $items->onlyTrashed();
        }
        if ($request->date) {
            if ($request->date == 1)
                $items->orderBy('created_at', 'desc');
            if ($request->date == 2)
                $items->orderBy('created_at', 'asc');
        }
        if ($request->money) {
            if ($request->money == 1)
                $items->orderBy('e_pin_balance', 'desc');
            if ($request->money == 2)
                $items->orderBy('e_money_balance', 'desc');
            if ($request->money == 3)
                $items->orderBy('e_money_balance', 'desc');
        }
        $items = $items->paginate(10);
        return view('admin.users.index', compact('items'));
    }
    public function qualified($id)
    {
        $item = User::find($id);
        $item->qualified = !$item->qualified;
        $item->save();
        return redirect('/admin/users');
    }
}
