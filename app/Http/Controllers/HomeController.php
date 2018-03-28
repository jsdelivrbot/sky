<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Product;
use App\Sub_categoty;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $products = Product::all();
        $categories = Category::all();
        return view('site.index', compact('countries', 'products', 'categories'));
    }

}
