<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Profile extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'profile';
    protected $primaryKey = 'profile_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profile_uuid',
        'msisdn',
        'email',
        'account_pin',
        'profile_name',
        'phone_imei',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'account_pin'
    ];

    public function bid()
    {
        return $this->hasMany(AuctionBid::class);
    }

    // public function ()
    // {
    //     return $this->hasMany(AuctionBid::class);
    // }

    /**
     * The attributes that should be cast to native types.
     *
    //  * @var array
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
