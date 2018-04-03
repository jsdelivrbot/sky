<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Product;
use App\Product_image;
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

    public function show($id)
    {
        $countries = Country::all();
        $sub_categories = Sub_categoty::all();
        $product = Product::find($id);
        $images = Product_image::where('product_id', $id)->get();
        $categories = Category::all();
        return view('site.product', compact('countries', 'product', 'categories', 'images', 'sub_categories'));
    }


    public function filter(Request $request)
    {
        $countries = Country::all();
        $categories = Category::all();
        $products = Product::where('id', '!=', 0);

        if ($request->product_type_id) {
            if ($request->product_type_id != 3)
                $products = $products->where('product_type_id', $request->product_type_id);
            session()->put('product_type_id', $request->get('product_type_id'));

        }
        if ($request->category_id) {
            $products = $products->whereIn('category_id', $request->category_id);
            session()->put('category_id', $request->get('category_id'));
            $sub_categories = Sub_categoty::whereIn('category_id', $request->category_id)->get();
        }

        if ($request->sub_category_id) {
            $products = $products->whereIn('category_id', $request->sub_category_id);
            session()->put('sub_category_id', $request->get('sub_category_id'));
        }
        if ($request->from and $request->to) {
            $products = $products->whereBetween('price', [$request->from, $request->to]);
            session()->put('from', $request->from);
            session()->put('to', $request->to);
        }
        if ($request->key) {
            $products = $products->where('name', 'LIKE', '%' . $request->key . '%');
            session()->put('key', $request->key);
        }

        $products = $products->get();

        return view('site.index', compact('countries', 'products', 'categories', 'sub_categories'));

    }

    public function products(Request $request)
    {
        $products = Product::where('id', '!=', 0);
        $countries = Country::all();
        $categories = Category::all();
        $sub_categories = Sub_categoty::all();
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

        return view('site.index', compact('countries', 'products', 'categories', 'sub_categories'));
    }

    public function types(Request $request)
    {
        $countries = Country::all();
        $categories = Category::all();
        $sub_categories = Sub_categoty::all();
        $products = Product::where('id', '!=', 0);
        if ($request->product_type_id) {
            $products = $products->where('product_type_id', $request->product_type_id);
            $products = $products->get();
        }
        if ($request->product_type_id == 3) {
            $products = Product::all();
        }
        session()->put('product_type_id', $request->get('product_type_id'));

        return view('site.index', compact('countries', 'products', 'categories', 'sub_categories'));
    }

    public function search(Request $request)
    {
        $countries = Country::all();
        $categories = Category::all();
        $sub_categories = Sub_categoty::all();
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
        return view('site.index', compact('countries', 'products', 'categories', 'sub_categories'));

    }


}
