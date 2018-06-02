<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        $items = Category::paginate(5);

        return view('admin.categories.index', compact('items'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->image)
            $data['image'] = $this->store_image($request->image);
        Category::create($data);
        return redirect('/admin/categories');
    }


    public function show($id)
    {
        return redirect('/admin/categories');
    }

    public function edit($id)
    {
        $item = Category::find($id);
        return view('admin.categories.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        if ($request->image)
            $data['image'] = $this->store_image($request->image);
        $item = Category::find($id);
        $item->update($data);
        return redirect('/admin/categories');
    }


    public function destroy($id)
    {
        $item = Category::find($id);
        $item->delete();
        return redirect('/admin/categories');
    }
}
