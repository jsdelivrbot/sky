<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'image',
    ];
}
