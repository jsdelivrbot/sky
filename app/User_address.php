<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_address extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'address',
    ];
}
