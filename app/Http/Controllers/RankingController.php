<?php

namespace App\Http\Controllers;

use App\ShippingAddress;
use Illuminate\Http\Request;
use App\Ranking;
use App\Comic;
use App\User;
use Illuminate\Support\Facades\DB;

class RankingController extends Controller
{
     public static function vendorRanking($id) {
         $user = User::where('id','=',$id)->first();
         $ranking = Ranking::where('user_id','=',$id)->first();
         $sede = DB::table('shipping_addresses')->where('user_id', '=', $id)->where('sede', '=', 1)->first();
         $comics = Comic::where('user_id','=',$id)->get();
         return view('/vendorinfo')
             ->with(compact('user'))
             ->with(compact('sede'))
             ->with(compact('ranking'))
             ->with(compact('comics'));
     }
}
