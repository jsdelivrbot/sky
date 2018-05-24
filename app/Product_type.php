<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_type extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name_ar',
        'name_en',
    ];
}
