<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if ($request->email == 'admin@admin.com' and $request->password == '123456') {
            return view('admin.users.index', compact('items'));
        } else
            return redirect('/admin');
    }


    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }
}
