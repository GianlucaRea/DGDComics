<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";

    protected $fillable = [
        'user_id','title','article_text'
    ];

    public function comment(){
        return $this->hasMany('App\Comment')->where('comment_parent', 0);
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}