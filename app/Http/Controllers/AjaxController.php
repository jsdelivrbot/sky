<?php

namespace App\Http\Controllers;

use App\Product;
use App\Sub_categoty;
use App\User;
use Hash;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function check_email($email)
    {
        $email = User::where('email', $email)->first();
        if ($email)
            return response()->json(true, 200);
        else
            return response()->json(false, 200);

    }

    public function getSubCategories(Request $request)
    {
        $category_ids = json_decode($request->category_ids);
        $sub_categories = Sub_categoty::whereIn('category_id', $category_ids)->get();
        return response()->json($sub_categories, 200);

    }

    public function getProducts(Request $request)
    {
        $sub_category_ids = json_decode($request->sub_category_ids);
        $products = Product::whereIn('sub_category_id', $sub_category_ids)->with('offer')->get();
        return response()->json($products, 200);

    }

    public function products()
    {
        $products = Product::all();
        return $products;
    }

    public function getDownLines(Request $request)
    {
        $LeftDownLine = User::where('parent_id', $request->unique_id)
            ->where('position', 1)->first();
        $RightDownLine = User::where('parent_id', $request->unique_id)
            ->where('position', 2)->first();
        return response()->json([
            'LeftDownLine' => $LeftDownLine,
            'RightDownLine' => $RightDownLine
        ], 200);
    }

    public function update_password(Request $request)
    {
        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json($request->password, 200);
    }

    public function update_inside_password(Request $request)
    {
        $user = User::find($request->id);
        $user->inside_password = Hash::make($request->inside_password);
        $user->save();
        return response()->json('ok', 200);
    }

    public function transfer_user_name(Request $request)
    {
        $user = User::where('unique_id', $request->unique_id)->first();
        if ($user)
            return response()->json($user->name, 200);
        else
            return response()->json('', 200);
    }
}
