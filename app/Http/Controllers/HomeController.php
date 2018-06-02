<?php

namespace App\Http\Controllers;

use App\About;
use App\Category;
use App\Contact;
use App\Country;
use App\E_learning;
use App\Event;
use App\Founder;
use App\Infinity;
use App\Process;
use App\Product;
use App\State;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $products = Product::all();
        $categories = Category::all();
        return view('site.index', compact('countries', 'products', 'categories', 'states'));
    }

    public function about()
    {
        $countries = Country::all();
        $items = About::all();
        return view('site.about', compact('countries', 'items'));
    }

    public function infinity()
    {
        $countries = Country::all();
        $items = Infinity::all();
        return view('site.infinity', compact('countries', 'items'));
    }

    public function founders()
    {
        $countries = Country::all();
        $items = Founder::all();
        return view('site.founders', compact('countries', 'items'));
    }

    public function events()
    {
        $countries = Country::all();
        $items = Event::all();
        return view('site.events', compact('countries', 'items'));
    }

    public function processes()
    {
        $countries = Country::all();
        $items = Process::all();
        return view('site.processes', compact('countries', 'items'));
    }

    public function contact()
    {
        $countries = Country::all();
        return view('site.contact', compact('countries'));
    }

    public function add_contact(Request $request)
    {
        Contact::create($request->all());
        return redirect('/');
    }

}
