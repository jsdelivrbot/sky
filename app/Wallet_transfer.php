<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet_transfer extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'wallet_id',
        'from_id',
        'to_id',
    ];
    public function from_user()
    {
        return $this->belongsTo(User::class, 'from_id');
    }

    public function to_user()
    {
        return $this->belongsTo(User::class, 'to_id');
    }
}
