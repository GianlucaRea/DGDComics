<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $table = "shipping_addresses";

    protected $fillable = [
        'user_id','via','civico','other_info',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function order(){
        return $this->belongsTo('App\Order');
    }
}
