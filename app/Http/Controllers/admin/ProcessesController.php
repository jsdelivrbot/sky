<?php

namespace App\Http\Controllers\admin;

use App\About;
use App\Infinity;
use App\Process;
use App\User;
use App\Wallet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProcessesController extends Controller
{

    public function index()
    {
        $items = Process::paginate(5);
        return view('admin.processes.index', compact('items'));
    }

    public function create()
    {
        return view('admin.processes.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->media)
            $data['media'] = $this->store_image($request->media);
        Process::create($data);
        return redirect('/admin/about');
    }


    public function show($id)
    {
        return redirect('/admin/about');
    }

    public function edit($id)
    {
        $item = Process::find($id);
        return view('admin.processes.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Process::find($id);
        if ($request->media)
            $data['media'] = $this->store_image($request->media);
        $item->update($data);
        return redirect('/admin/about');
    }


    public function destroy($id)
    {
        $item = Process::find($id);
        $item->delete();
        return redirect('/admin/about');
    }

}
