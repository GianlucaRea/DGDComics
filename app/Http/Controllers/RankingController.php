<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ranking;
use App\Comic;
use App\User;
class RankingController extends Controller
{
     public static function vendorRanking($id) {
         $user = User::where('id','=',$id)->first();
         $ranking = Ranking::where('user_id','=',$id)->first();
         $comics = Comic::where('user_id','=',$id)->get();
         return view('/vendorinfo')
             ->with(compact('user'))
             ->with(compact('ranking'))
             ->with(compact('comics'));
     }
}
