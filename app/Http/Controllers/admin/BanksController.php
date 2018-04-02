<?php

namespace App\Http\Controllers\admin;

use App\Wallet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BanksController extends Controller
{

    public function index()
    {
        $items = Wallet::paginate(10);
        return view('admin.banks.index', compact('items'));
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
}
