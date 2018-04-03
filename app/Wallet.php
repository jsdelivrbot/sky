<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'user_id',
        'e_type_id',
        'transaction_id',
        'wallet_type_id',
        'from_id',
        'to_id',
        'value',
        'statement',
        'balance',
    ];

    public function wallet_type()
    {
        return $this->belongsTo(Wallet_type::class, 'wallet_type_id');
    }
    public function transfer()
    {
        return $this->hasOne(Wallet_transfer::class, 'wallet_id');
    }


}
