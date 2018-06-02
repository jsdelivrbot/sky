<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class E_learning extends Model
{
    protected $table ="e_learning";
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'product_id',
    ];
}
