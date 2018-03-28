<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'country_id', 'name'
    ];

    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
