<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComicBoughtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ComicBought::get(),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'ComicBought_description' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }


        $comicBought = ComicBought::create($request->all());
        return response()->json($comicBought,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comicBought = ComicBought::find($id);
        if(is_null($comicBought)){
            return response()->json(["message"=>'Record not found'],404);
        }
        return response()->json(ComicBought::find($id),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comicBought = ComicBought::find($id);
        if(is_null($comicBought)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $comicBought -> update($request -> all());
        return response()->json($comicBought,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comicBought = ComicBought::find($id);
        if(is_null($comicBought)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $comicBought-> delete();
        return response()->json(null,204);
    }

    public static function getComicsIdByOrderId($id){
        return DB::table("comic_bought_order")->where("order_id", "=", $id)->get();
    }

    public static function getComicBoughtDetailById($id){
        return DB::table("comic_boughts")->where("id", "=", $id)->first();
    }

    public static function orderUpdateConfirm($id){
        $data=array(
            'states'=> 'confermato',
            'id' => $id->id,
        );
        DB::table('comic_boughts')->where("id", "=", $id->id)->update($data);

        $user = \Illuminate\Support\Facades\Auth::user();
        return view('/accountArea')
            ->with(compact('user'));
    }
}
