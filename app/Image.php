<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "images";

    protected $fillable = [
        'comic_id','size','format','image'
    ];

    public function comic(){
        return $this->belongsTo("App\Comic");
    }
}
