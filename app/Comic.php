<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comic extends Model
{
    
    
    protected $table = "comics";
    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'comic_name','description','type','quantity','ISBN','price','publisher'
    ];

    public function image(){
        return  $this->hasMany('App\Image','comic_id');
    }

    public function genre(){
        return $this->belongsToMany('App\Genre');
    }

    public function author(){
        return $this->belongsTo('App\Author');
    }

    public function review(){
        return $this->hasMany('App\Review','comic_id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    //public function 
}
