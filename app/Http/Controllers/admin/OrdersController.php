<?php

namespace App\Http\Controllers\admin;

use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function index()
    {
        $items = Order::paginate(10);
        return view('admin.Orders.index', compact('items'));
    }

    public function create()
    {
        return view('admin.Orders.create');
    }

    public function store(Request $request)
    {
        Order::create($request->all());
        return redirect('/admin/Orders');
    }


    public function show($id)
    {
        return redirect('/admin/Orders');
    }

    public function edit($id)
    {
        $item = Order::find($id);
        return view('admin.Orders.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Order::find($id);
        $item->update($request->all());
        return redirect('/admin/Orders');
    }


    public function destroy($id)
    {
        $item = Order::find($id);
        $item->delete();
        return redirect('/admin/Orders');
    }

    public function filter(Request $request)
    {
        $items = Order::where('order_status_id', $request->status)->paginate(10);
        return view('admin.Orders.index', compact('items'));

    }
}
