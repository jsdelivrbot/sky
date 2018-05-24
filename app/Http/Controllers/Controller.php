<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function store_image($image)
    {
        $imgPath = $image->store('public/images');
        $imgPath = str_replace('public/images/', '', $imgPath);
        $url = url('/');
        $serverPath = $url . '/storage/app/public/images/';
        $path = $serverPath . $imgPath;
        return $path;
    }
}
