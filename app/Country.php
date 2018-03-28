<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name'
    ];
    public $timestamps = false;

    public function city()
    {
        return $this->hasMany(State::class, 'country_id');
    }
}
