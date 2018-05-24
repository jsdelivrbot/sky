<?php

namespace App\Http\Controllers\admin;

use App\About;
use App\User;
use App\Wallet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index()
    {
        $items = About::paginate(5);
        return view('admin.about.index', compact('items'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->media)
            $data['media'] = $this->store_image($request->media);
        About::create($data);
        return redirect('/admin/about');
    }


    public function show($id)
    {
        return redirect('/admin/about');
    }

    public function edit($id)
    {
        $item = About::find($id);
        return view('admin.about.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = About::find($id);
        if ($request->media)
            $data['media'] = $this->store_image($request->media);
        $item->update($data);
        return redirect('/admin/about');
    }


    public function destroy($id)
    {
        $item = About::find($id);
        $item->delete();
        return redirect('/admin/about');
    }

}
