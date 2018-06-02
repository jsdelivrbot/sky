<?php

namespace App\Http\Controllers\admin;

use App\About;
use App\Category;
use App\E_learning;
use App\Product;
use App\Product_type;
use App\Sub_categoty;
use App\User;
use App\Wallet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ELearningController extends Controller
{
    public function index()
    {
        $items = Product::where('product_type_id')->paginate(5);
        return view('admin.e_learning.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        $sub_categories = Sub_categoty::all();
        $product_types = Product_type::all();
        return view('admin.e_learning.create',compact('categories','sub_categories','product_types'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->video)
            $data['video'] = $this->store_image($request->video);
        if ($request->thumb)
            $data['thumb'] = $this->store_image($request->thumb);
        Product::create($data);
        return redirect('/admin/e_learning');
    }

    public function show($id)
    {
        return redirect('/admin/e_learning');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $sub_categories = Sub_categoty::all();
        $product_types = Product_type::all();
        $item = E_learning::find($id);
        return view('admin.e_learning.edit', compact('item','categories','sub_categories','product_types'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = E_learning::find($id);
        if ($request->video)
            $data['video'] = $this->store_image($request->video);
        if ($request->thumb)
            $data['thumb'] = $this->store_image($request->thumb);
        $item->update($data);
        return redirect('/admin/e_learning');
    }


    public function destroy($id)
    {
        $item = E_learning::find($id);
        $item->delete();
        return redirect('/admin/e_learning');
    }

}
