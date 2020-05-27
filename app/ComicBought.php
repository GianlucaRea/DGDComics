<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComicBought extends Model
{
    protected $table = "comic_boughts";
    public $timestamps = false;

    protected $fillable = [
        'comic_id', 'quantity', 'price'
    ];

    public function comic(){
        return $this->belongsTo('App\Comic');
    }

    public function order(){
        return $this->belongsToMany('App\Order');
    }
}
