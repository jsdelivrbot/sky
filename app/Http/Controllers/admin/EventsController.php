<?php

namespace App\Http\Controllers\admin;

use App\City;
use App\Country;
use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsController extends Controller
{

    public function index()
    {
        $items = Event::paginate(5);
        return view('admin.events.index', compact('items'));
    }

    public function create()
    {
        $cities = City::all();
        $countries = Country::all();
        return view('admin.events.create', compact('cities', 'countries'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->image)
            $data['image'] = $this->store_image($request->image);
        $data['launch_date']=strtotime($request->launch_date);
        $data['time_from']=strtotime($request->time_from);
        $data['time_to']=strtotime($request->time_to);
        Event::create($data);
        return redirect('/admin/events');
    }


    public function show($id)
    {
        return redirect('/admin/events');
    }

    public function edit($id)
    {
        $item = Event::find($id);
        $cities = City::all();
        $countries = Country::all();
        return view('admin.events.edit', compact('item', 'cities','countries'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Event::find($id);
        if ($request->image)
            $data['image'] = $this->store_image($request->image);
        $item->update($data);
        return redirect('/admin/events');
    }


    public function destroy($id)
    {
        $item = Event::find($id);
        $item->delete();
        return redirect('/admin/events');
    }

}
