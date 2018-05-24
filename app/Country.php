<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name_ar',
        'name_en',
    ];

    public function city()
    {
        return $this->hasMany(State::class, 'country_id');
    }
}
