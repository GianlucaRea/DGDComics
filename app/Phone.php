<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = "phones";

    protected $fillble = [
        'user_id','phone_number'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
