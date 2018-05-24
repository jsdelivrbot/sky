<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_status extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name_ar',
        'name_en',
    ];
}
