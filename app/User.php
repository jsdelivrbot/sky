<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'name',
        'email',
        'password',
        'middle_name',
        'last_name',
        'user_name',
        'inside_password',
        'state_id',
        'city',
        'address',
        'national_id',
        'birth_date',
        'beneficiary',
        'unique_id',
        'parent_id',
        'position',
        'phone',
        'e_pin_balance',
        'e_money_balance',
        'user_status_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function status()
    {
        return $this->belongsTo(User_status::class, 'user_status_id');
    }
    public function wallet()
    {
        return $this->hasMany(Wallet::class, 'user_id');
    }
}
