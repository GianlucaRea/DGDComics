<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Whishlist extends Model
{
    protected $table = "whishlists";
    public $timestamps = false;

    protected $fillable = [
        'comic_id','user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comic(){
        return $this->belongsToMany('App\Comic');
    }
}
