<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'upLine_id',
        'downLine_id',
        'position_id',
    ];
}
