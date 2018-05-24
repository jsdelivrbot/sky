<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'image',
        'launch_date',
        'time_from',
        'time_to',
        'city_id',
        'country_id',
        'address',
    ];
}
