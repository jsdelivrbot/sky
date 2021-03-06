<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name_ar',
        'name_en',
        'desc_ar',
        'desc_en',
        'price',
        'shipping_fees',
        'commission',
        'quantity',
        'main_image',
        'published',
        'product_type_id',
        'sub_category_id',
        'category_id',
        'limit',
        'video',
    ];

    public function sub_category()
    {
        return $this->belongsTo(Sub_categoty::class, 'sub_category_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function offer()
    {
        return $this->hasOne(Offer::class, 'product_id');
    }
    public function product_type()
    {
        return $this->belongsTo(Product_type::class, 'product_type_id');
    }

}
