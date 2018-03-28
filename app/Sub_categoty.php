<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_categoty extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'category_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'sub_category_id');
    }
}
