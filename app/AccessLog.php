<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    protected $table="access_logs";

    protected $fillable = [
        'user_id','plataform','date_time'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }





}

