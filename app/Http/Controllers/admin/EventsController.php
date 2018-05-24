<?php

namespace App\Http\Controllers\admin;

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
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->media)
            $data['media'] = $this->store_image($request->media);
        Event::create($data);
        return redirect('/admin/Event');
    }


    public function show($id)
    {
        return redirect('/admin/Event');
    }

    public function edit($id)
    {
        $item = Event::find($id);
        return view('admin.events.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Event::find($id);
        if ($request->media)
            $data['media'] = $this->store_image($request->media);
        $item->update($data);
        return redirect('/admin/Event');
    }


    public function destroy($id)
    {
        $item = Event::find($id);
        $item->delete();
        return redirect('/admin/Event');
    }

}
