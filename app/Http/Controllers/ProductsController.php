<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Product;
use App\Sub_categoty;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $products = Product::all();
        $categories = Category::all();
        return view('site.index', compact('countries', 'products', 'categories'));
    }


    public function products(Request $request)
    {
        $products = Product::where('id', '!=', 0);
        $sub_categories = Sub_categoty::where('id', '!=', 0);
        $countries = Country::all();
        $categories = Category::all();

        if ($request->product_type_id) {
            if (!$request->product_type_id == 3)
                $products = $products->where('product_type_id', $request->product_type_id);
        }
        if ($request->category_id) {
            $sub_categories = $sub_categories->whereIn('category_id', $request->category_id)
                ->pluck('id')->toArray();
            $products = $products = Product::whereIn('sub_category_id', $sub_categories);
        } elseif ($request->sub_category_id) {
            $products = $products->whereIn('sub_category_id', $request->sub_category_id);
        }

        $products = $products->get();

        return view('site.index', compact('countries', 'products', 'categories'));
    }

    public function search(Request $request)
    {
        $countries = Country::all();
        $categories = Category::all();
        $query = Product::query();
        $columns = [
            'name',
            'desc',
        ];

        if ($request->key) {
            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', '%' . $request->key . '%');
            }
        }

        $products = $query->get();
        return view('site.index', compact('countries', 'products', 'categories'));

    }

    public function filter(Request $request)
    {
        $countries = Country::all();
        $categories = Category::all();
        $products = Product::whereBetween('price', [$request->from, $request->to])
            ->get();
        return view('site.index', compact('countries', 'products', 'categories'));

    }


}
