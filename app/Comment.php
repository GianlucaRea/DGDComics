<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";

    protected $fillable = [
        'user_id','article_id','like','dislike','answer_text'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function article(){
        return $this->belongsTo('App\Article');
    }

    public function replies()
    {
        return $this->hasMany('App\Comment', 'comment_parent');
    }

}
