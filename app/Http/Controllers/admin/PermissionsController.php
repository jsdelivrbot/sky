<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{

    public function index()
    {
        $items = User::paginate(10);
        return view('admin.permissions.index', compact('items'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect('/admin/permissions');
    }


    public function show($id)
    {
        return redirect('/admin/permissions');
    }

    public function edit($id)
    {
        $item = User::find($id);
        return view('admin.permissions.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = User::find($id);
        $item->update($request->all());
        return redirect('/admin/permissions');
    }


    public function destroy($id)
    {
        $item = User::find($id);
        $item->delete();
        return redirect('/admin/permissions');
    }
}
