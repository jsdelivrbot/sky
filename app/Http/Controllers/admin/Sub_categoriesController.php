<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Sub_categoty;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Sub_categoriesController extends Controller
{
    public function index()
    {
        $items = Sub_categoty::paginate(5);
        return view('admin.sub_categories.index', compact('items'));
    }

    public function create()
    {
        $categories = Category:: all();
        return view('admin.sub_categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->image)
            $data['image'] = $this->store_image($request->image);
        Sub_categoty::create($data);
        return redirect('/admin/sub_categories');
    }


    public function show($id)
    {
        return redirect('/admin/sub_categories');
    }

    public function edit($id)
    {
        $item = Sub_categoty::find($id);
        $categories = Category:: all();
        return view('admin.sub_categories.edit', compact('item','categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        if ($request->image)
            $data['image'] = $this->store_image($request->image);
        $item = Sub_categoty::find($id);
        $item->update($data);
        return redirect('/admin/sub_categories');
    }


    public function destroy($id)
    {
        $item = Sub_categoty::find($id);
        $item->delete();
        return redirect('/admin/sub_categories');
    }
}
