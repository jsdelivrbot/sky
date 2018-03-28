<?php

namespace App\Http\Controllers;

use App\Product;
use App\Sub_categoty;
use App\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function check_email($email)
    {
        $email = User::where('email', $email)->first();
        if ($email)
            return response()->json(true, 200);
        else
            return response()->json(false, 200);

    }

    public function getSubCategories(Request $request)
    {
        $category_ids = json_decode($request->category_ids);
        $sub_categories = Sub_categoty::whereIn('category_id', $category_ids)->get();
        return response()->json($sub_categories, 200);

    }

    public function getProducts(Request $request)
    {
        $sub_category_ids = json_decode($request->sub_category_ids);
        $products = Product::whereIn('sub_category_id', $sub_category_ids)->with('offer')->get();
        return response()->json($products, 200);

    }

    public function products()
    {
        $products = Product::all();
        return $products;

    }
}
