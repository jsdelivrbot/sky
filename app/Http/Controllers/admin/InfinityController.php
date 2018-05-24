<?php

namespace App\Http\Controllers\admin;

use App\About;
use App\Infinity;
use App\User;
use App\Wallet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfinityController extends Controller
{

    public function index()
    {
        $items = Infinity::paginate(5);
        return view('admin.infinity.index', compact('items'));
    }

    public function create()
    {
        return view('admin.infinity.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->media)
            $data['media'] = $this->store_image($request->media);
        Infinity::create($data);
        return redirect('/admin/about');
    }


    public function show($id)
    {
        return redirect('/admin/about');
    }

    public function edit($id)
    {
        $item = Infinity::find($id);
        return view('admin.infinity.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Infinity::find($id);
        if ($request->media)
            $data['media'] = $this->store_image($request->media);
        $item->update($data);
        return redirect('/admin/about');
    }


    public function destroy($id)
    {
        $item = Infinity::find($id);
        $item->delete();
        return redirect('/admin/about');
    }

}
