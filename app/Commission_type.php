<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission_type extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name_ar',
        'name_en',
    ];
}
