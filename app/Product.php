<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'desc',
        'price',
        'shipping_fees',
        'commission',
        'quantity',
        'main_image',
        'product_type_id',
        'sub_category_id',
    ];

    public function sub_category()
    {
        return $this->hasOne(Sub_categoty::class, 'id', 'sub_category_id');
    }

    public function offer()
    {
        return $this->hasOne(Offer::class, 'product_id');
    }

}
