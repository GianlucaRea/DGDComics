<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{ 
    protected $table = "replies";
    
    protected $fillable = [
        'user_id','comment_id','like','dislike','reply_text'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}

