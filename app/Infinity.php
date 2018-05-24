<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infinity extends Model
{

    protected $table = "infinity";
    public $timestamps = false;
    protected $fillable = [
        'title_ar',
        'title_en',
        'text_ar',
        'text_en',
        'media',
        'media_type_id',
    ];
}
