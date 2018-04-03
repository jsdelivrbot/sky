<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use App\Country;
use App\Jobs\Binary;
use App\Product;
use App\Sub_categoty;
use Hash;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $schedule = new  Schedule();
        $schedule->job(new Binary());

        $countries = Country::all();
        $products = Product::all();
        $categories = Category::all();
        return view('site.index', compact('countries', 'products', 'categories'));
    }

    public function about()
    {
        $countries = Country::all();
        return view('site.about', compact('countries'));
    }

    public function infinity()
    {
        $countries = Country::all();
        return view('site.infinity', compact('countries'));
    }

    public function founders()
    {
        $countries = Country::all();
        return view('site.founders', compact('countries'));
    }

    public function members_events()
    {
        $countries = Country::all();
        return view('site.members_events', compact('countries'));
    }

    public function processes()
    {
        $countries = Country::all();
        return view('site.processes', compact('countries'));
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
