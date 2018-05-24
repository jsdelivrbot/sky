<?php

namespace App\Http\Controllers\admin;

use App\About;
use App\Infinity_founder;
use App\User;
use App\Wallet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Infinity_foundersController extends Controller
{

    public function index()
    {
        $items = Infinity_founder::paginate(5);
        return view('admin.infinity_founders.index', compact('items'));
    }

    public function create()
    {
        return view('admin.infinity_founders.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->media)
            $data['media'] = $this->store_image($request->media);
        Infinity_founder::create($data);
        return redirect('/admin/about');
    }


    public function show($id)
    {
        return redirect('/admin/about');
    }

    public function edit($id)
    {
        $item = Infinity_founder::find($id);
        return view('admin.infinity_founders.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Infinity_founder::find($id);
        if ($request->media)
            $data['media'] = $this->store_image($request->media);
        $item->update($data);
        return redirect('/admin/about');
    }


    public function destroy($id)
    {
        $item = Infinity_founder::find($id);
        $item->delete();
        return redirect('/admin/about');
    }

}
