<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_categoty extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'image',
        'name_ar',
        'name_en',
        'category_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'sub_category_id');
    }
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
