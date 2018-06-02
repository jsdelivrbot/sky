<?php

namespace App\Http\Controllers;

use App\E_learning;
use App\Product;

class ELearningController extends Controller
{
    public function index()
    {
        $products_ids = E_learning::where('user_id', auth()->user()->id)
            ->pluck('product_id')->toArray();
        $items = Product::whereIn('id', $products_ids)->paginate(10);
        return view('site.e_learning', compact('items'));
    }
}
