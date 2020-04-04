<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps = false;
    protected $table = "messages";


    protected $fillable = [
    'user_id','state',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}