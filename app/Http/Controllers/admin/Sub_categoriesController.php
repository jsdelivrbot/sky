<?php

namespace App\Http\Controllers\admin;

use App\Sub_categoty;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Sub_categoriesController extends Controller
{
    public function index()
    {
        $items = Sub_categoty::paginate(10);
        return view('admin.sub_categories.index', compact('items'));
    }

    public function create()
    {
        return view('admin.sub_categories.create');
    }

    public function store(Request $request)
    {
        Sub_categoty::create($request->all());
        return redirect('/admin/sub_categories');
    }


    public function show($id)
    {
        return redirect('/admin/sub_categories');
    }

    public function edit($id)
    {
        $item = Sub_categoty::find($id);
        return view('admin.sub_categories.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Sub_categoty::find($id);
        $item->update($request->all());
        return redirect('/admin/sub_categories');
    }


    public function destroy($id)
    {
        $item = Sub_categoty::find($id);
        $item->delete();
        return redirect('/admin/sub_categories');
    }
}
