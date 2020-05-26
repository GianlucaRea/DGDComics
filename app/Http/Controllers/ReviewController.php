<?php

namespace App\Http\Controllers;

use App\Comic;
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
            'review_title' => ['required', 'max:20', 'min:3'],
            'review_text' => ['required', 'max:255', 'min:40'],
            'stars' => ['required', 'max:5', 'min:1'],
        ]);
        $user = \Illuminate\Support\Facades\Auth::user();
        $review = new Review; //per evitare problemi con campi che non appartengono effettivamente a paymentMethod.
        $review->user_id = \Illuminate\Support\Facades\Auth::user()->id;
        $review->comic_id = $id;
        $review->review_title = $request->review_title;
        $review->review_text = $request->review_text;
        $review->stars = $request->stars;

        $data = array(
            'user_id' => $review->user_id,
            'review_title' => $review->review_title,
            'review_text' => $review->review_text,
            'stars' => $review->stars,
        );

        DB::table('reviews')->insert($data);


        return redirect('comic_detail/$id')
            ->with(compact('comics'));
    }


    public function destroy($id)
    {
        $Review = Review::find($id);
        if(is_null($Review)){
            return redirect()->route("AdminAccount")->with('message','Alredy Deleted');
        }
        $Review -> delete();
        return redirect()->route("AdminAccount")->with('message','Success');
    }
    public function destroylocal($id)
    {

        $Review = Review::find($id);
        $comic_id = Review::find($id)->comic_id;
        $comic = Comic::where('id','=', $comic_id)->get();
        if(is_null($Review)){
            return redirect()->back()->with('message','Alredy Deleted');
        }
        $Review -> delete();


        return redirect()->back()->with('message','Success');
    }

}
