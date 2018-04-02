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

    public function filter(Request $request)
    {
        $items = Product::where('id', '!=', 0);

        if ($request->key) {
            $items->where('name', 'LIKE', '%' . $request->key . '%');
        }
        if ($request->from and $request->to) {
            $items->whereBetween('price', [$request->from, $request->to]);
        }
        if ($request->type) {
            $items->where('product_type_id', $request->type);
        }
        if ($request->published == 1) {
            $items->where('published', 1);
        }
        if ($request->limit == 1) {
            $items->where('quantity', '<', $request->limit);
        }

        $items = $items->paginate(10);
        return view('admin.products.index', compact('items'));
    }

}
