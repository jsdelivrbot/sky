<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;


class HomeController extends Controller
{
    public function index()
    {
        $items = User::paginate(10);
        return view('admin.users.index', compact('items'));
    }
}
