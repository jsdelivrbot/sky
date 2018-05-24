<?php

namespace App\Http\Controllers\admin;

use App\Founder;
use App\User;
use App\Wallet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FoundersController extends Controller
{

    public function index()
    {
        $items = Founder::paginate(5);
        return view('admin.founders.index', compact('items'));
    }

    public function create()
    {
        return view('admin.founders.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->media)
            $data['media'] = $this->store_image($request->media);
        Founder::create($data);
        return redirect('/admin/Founder');
    }


    public function show($id)
    {
        return redirect('/admin/Founder');
    }

    public function edit($id)
    {
        $item = Founder::find($id);
        return view('admin.founders.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Founder::find($id);
        if ($request->media)
            $data['media'] = $this->store_image($request->media);
        $item->update($data);
        return redirect('/admin/Founder');
    }


    public function destroy($id)
    {
        $item = Founder::find($id);
        $item->delete();
        return redirect('/admin/Founder');
    }

}
