<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Order;
use App\Product;
use App\Sub_categoty;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $order = new Order();
        $order->product_id = $request->product_id;
        $order->user_id = auth()->user()->id;
        $order->save();
        return redirect('/');
    }

}
