<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'product_id',
        'new_price',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
