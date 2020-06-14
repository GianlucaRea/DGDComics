<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\DB;
use Validator;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Image::get(),200);

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
        $rules=[
            'comic_id' => 'required',
            'image_name' => 'required',
            'cover' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $image = Image::create($request->all());
        return response()->json($image,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::find($id);
        if(is_null($image)){
            return response()->json(["message"=>'Record not found'],404);
        }
        return response()->json(Image::find($id),200);
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
        $image = Image::find($id);
        if(is_null($image)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $image -> update($request -> all());
        return response()->json($image,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        if(is_null($image)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $image-> delete();
        return response()->json(null,204);
    }

    public static function getCover($id){
        return Image::where('comic_id', '=', $id)->where('cover', '=', 1)->first();
    }

    public static function getOtherImages($id){
        return Image::where('comic_id', '=', $id)->where('cover', '=', 0)->get();
    }

    public function getComic($id)
    {
        $image = Image::find($id)->comic()->get();

        return response()->json($image, 200);
    }

    public static function moveFileCover(Request $request, $id){
        $request->validate([
            'cover' => 'required|image|mimes:jpeg|max:16384'
        ]);

        //get image file
        $image = $request->file('cover');
        $name = $image->getClientOriginalName();
        $image->move(public_path("img/comicsImages"), $name);

        $imageC = new Image();
        $imageC->comic_id = $id;
        $imageC->image_name = $name;
        $imageC->cover = 1;

        $data = array(
            'comic_id' => $imageC->comic_id,
            'image_name' => $imageC->image_name,
            'cover' => $imageC->cover,
        );
        DB::table('images')->insert($data);

        return redirect()->back();

    }
}
