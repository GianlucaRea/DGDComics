<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comic extends Model
{
    use Notifiable;
    
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
        return $this->hasMany('App\Genre','comic_id');
    }

    public function author(){
        return $this->hasMany('App\Author','comic_id');
    }

    public function review(){
        return $this->hasMany('App\Review','comic_id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function 
}
