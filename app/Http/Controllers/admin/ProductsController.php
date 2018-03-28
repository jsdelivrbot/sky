<?php

namespace App\Http\Controllers\admin;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $items = Product::paginate(10);
        return view('admin.products.index', compact('items'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect('/admin/products');
    }


    public function show($id)
    {
        return redirect('/admin/products');
    }

    public function edit($id)
    {
        $item = Product::find($id);
        return view('admin.products.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Product::find($id);
        $item->update($request->all());
        return redirect('/admin/products');
    }


    public function destroy($id)
    {
        $item = Product::find($id);
        $item->delete();
        return redirect('/admin/products');
    }
}
