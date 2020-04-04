<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    protected $table="users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname','age','iva', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


public function comic(){
    return $this->hasMany('App\Comic','user_id');
}

public function order(){
    return $this->hasMany('App\Order','user_id');
}

public function wishlist(){
    return $this->hasOne('App\Whishlist','user_id');
}

public function phone(){
    return $this->hasMany('App\Phone','user_id');
}

public function article(){
    return $this->hasMany('App\Article','user_id');
}

public function comment(){
    return $this->hasMany('App\Comment','user_id');
}

public function reply(){
    return $this->hasMany('App\Reply','user_id');
}

public function access_log(){
    return $this->hasMany('App\AccessLog','user_id');
}

public function message(){
    return $this->hasMany('App\Message','user_id');
}

public function shipping_address(){
    return $this->hasMany('App\ShippingAddress','user_id');
}

public function payment_method(){
    return $this->hasMany('App\PaymentMethod','user_id');
}

 public function group(){
    return $this->belongsToMany('App\Group');
} 

public function ranking(){
    return $this->hasOne('App\Ranking','user_id');
}

public function review(){
    return $this->hasMany('App\Review','user_id');
}

public function notification(){
    return $this->hasMany('App/Notification','user_id');
}


}