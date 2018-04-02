<?php

namespace App\Http\Controllers;

use App\Category;
use App\Commission;
use App\Country;
use App\Order;
use App\Product;
use App\Sub_categoty;
use App\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $order = new Order();
        $order->product_id = $request->product_id;
        $order->user_id = auth()->user()->id;
        if ($request->address_input)
            $order->address = $request->address_input;
        else
            $order->address = $request->address_select;
        $order->phone = $request->mobile;
        $order->order_status_id = 1;
        $order->save();
        $parent = User::where('parent_id', auth()->user()->parent_id)->first();
        if ($parent) {
            $commision = new Commission;
            $commision->user_id = $parent->id;
            $commision->value = 100;
            $commision->commission_type_id = 1;
            $commision->save();
        }
        return redirect('/');
    }

}
