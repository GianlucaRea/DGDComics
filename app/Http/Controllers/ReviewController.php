<?php

namespace App\Http\Controllers;

use App\Comic;
use App\Notification;
use App\PaymentMethod;
use App\User;
use App\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ReviewController extends Controller
{
    public function add(Request $request,$id)
    {
        $now = Carbon::now();
        $request->validate([
            'review_title' => ['required', 'max:50', 'min:3'],
            'review_text' => ['required', 'max:255', 'min:10'],
            'stars' => ['required'],
        ]);
        $user = \Illuminate\Support\Facades\Auth::user();
        $review = new Review;
        $review->user_id = \Illuminate\Support\Facades\Auth::user()->id;
        $review->comic_id = $id;
        $review->review_title = $request->review_title;
        $review->review_text = $request->review_text;
        $review->stars = $request->stars;

        $data = array(
            'user_id' => $review->user_id,
            'comic_id' => $id,
            'review_title' => $review->review_title,
            'review_text' => $review->review_text,
            'stars' => $review->stars,
        );

        DB::table('reviews')->insert($data);


        return redirect()->back()->with('message','Success');
    }


    public function destroy($id)
    {
        $Review = Review::find($id);
        $notification = new Notification;
        $notification->user_id = $Review->user_id;
        $notification->state = false;
        $notification->notification_text = 'La sua Recensione non era in accordo con le policy di DGDComics';

        $data = array(
            'user_id' => $notification->user_id,
            'state' =>  $notification->state,
            'notification_text' => $notification->notification_text,
        );

        if(is_null($Review)){
            return redirect()->route("AdminAccount")->with('message','Alredy Deleted');
        }
        $Review -> delete();
        DB::table('notifications')->insert($data);
        return redirect()->route("AdminAccount")->with('message','Success');
    }
    public function destroylocal($id)
    {

        $Review = Review::find($id);
        $comic_id = Review::find($id)->comic_id;
        $comic = Comic::where('id','=', $comic_id)->get();
        $notification = new Notification;
        $notification->user_id = $Review->user_id;
        $notification->state = false;
        $notification->notification_text = 'La sua Recensione non era in accordo con le policy di DGDComics';

        $data = array(
            'user_id' => $notification->user_id,
            'state' =>  $notification->state,
            'notification_text' => $notification->notification_text,
            'notification' => 'comic_detail',
            'idLink' => $comic_id
        );

        if(is_null($Review)){
            return redirect()->back()->with('message','Alredy Deleted');
        }
        $Review -> delete();
        DB::table('notifications')->insert($data);

        return redirect()->back()->with('message','Success');
    }

}
