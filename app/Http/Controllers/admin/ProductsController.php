<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Product;
use App\Http\Controllers\Controller;
use App\Product_type;
use App\Sub_categoty;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $items = Product::orderBy('id','desc')->paginate(10);
        return view('admin.products.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        $sub_categories = Sub_categoty::all();
        $product_types = Product_type::all();
        return view('admin.products.create',compact('categories','sub_categories','product_types'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->video)
            $data['video'] = $this->store_image($request->video);
        if ($request->main_image)
            $data['main_image'] = $this->store_image($request->main_image);
        Product::create($data);
        return redirect('/admin/products');
    }


    public function show($id)
    {
        return redirect('/admin/products');
    }

    public function edit($id)
    {
        $item = Product::find($id);
        $categories = Category::all();
        $sub_categories = Sub_categoty::all();
        $product_types = Product_type::all();
        return view('admin.products.edit', compact('item','categories','sub_categories','product_types'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        if ($request->video)
            $data['video'] = $this->store_image($request->video);
        if ($request->main_image)
            $data['main_image'] = $this->store_image($request->main_image);
        $item = Product::find($id);
        $item->update($data);
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
