<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $table = "baskets";

    protected $fillable = [
        'comic_id','user_id','quantity','price'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comic(){
        return $this->belongsToMany('App\Comic');
    }
}
