<?php

namespace App\Http\Controllers;


use App\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comic;
use Illuminate\Support\Facades\DB;
use Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Comic::get(),200);
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
     * @param \Illuminate\Http\Request $request
     * @param array $genre_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,array $genre_id) //array $genre_id passa un array di id che corrispondono
    {                                                       //ai generi che prenderà il fumetto
        $rules = [
            'user_id'=>'required',
            'id_author'=>'required',
            'comic_name'=>'required',
            'type'=>'required',
            'quantity'=>'required',
            'ISBN'=>'required',
            'price'=>'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }


        $Comic = Comic::create($request->all());
        $Genre = Genre::find($genre_id); // Prendi genere in base all'id passato
        $Comic->genre()->attach($Genre); // Attacca al Comic i generi passati come argomento
        //Questo codice non è sicuro sia funzionante Codice di Gianluca Rea
        return response()->json($Comic,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Comic = Comic::find($id);
        if(is_null($Comic)){
            return response()->json(["message"=>'Record not found'],404);
        }
        return response()->json(Comic::find($id),200);
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
        $Comic = Comic::find($id);
        if(is_null($Comic)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $Comic -> update($request -> all());
        return response()->json($Comic,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $Comic = Comic::find($id);
        if(is_null($Comic)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $Comic-> delete();
        return response()->json(null,204);
    }



    public static function getByID($id){  //SOLO PER FARE UNA PROVA, NON SAPEVO COME FARE UNA GETBYID ALTRIMENTI IN FEATURED AREA
        return Comic::find($id);
    }


    public function getUser($id){
        $comic = Comic::find($id)->User()->get();

        return response()->json($comic, 200);
    }

    public function getAuthor($id)
    {
        $comic = Comic::find($id)->Author()->get();

        return response()->json($comic, 200);
    }
 

    public function getGenre($id)
    {
        $comic = Comic::find($id)->genre()->get();

        return response()->json($comic, 200);

    }

    public function shoplistBase(Request $request){
        $genres = Genre::all();
        if ($request->has('sorter')){
            switch($request->get('sorter')){
                case `comic_name_asc`:
                    $comics = Comic::orderBy('comic_name', 'asc')->paginate(9);
                    break;
                case `comic_name_desc`:
                    $comics = Comic::orderBy('comic_name', 'desc')->paginate(9);
                    break;
                case `price_asc`:
                    $comics = Comic::orderBy('price', 'asc')->paginate(9);
                    break;
                case `comic_name_desc`:
                    $comics = Comic::orderBy('price', 'desc')->paginate(9);
                    break;
                case `created_at`:
                    $comics = Comic::latest()->paginate(9);
                    break;
            }
        } else {
            $comics = Comic::paginate(9);
        }
        return view('shoplist')
            ->with(compact('genres'))
            ->with(compact('comics'));
    }

    public function shoplistType($type){
        $genres = Genre::all();
        $comics = Comic::where('type', '=', $type)->paginate(9);
        return view('shoplist')
            ->with(compact('genres'))
            ->with(compact('comics'));
    }

    public function shoplistGenre($name_genre){
        $comics = \App\Http\Controllers\GenreController::getComics($name_genre);
        $genres = Genre::all();
        return view('shoplist')->with(compact('genres'))->with(compact('comics'));
    }

    public function comicDetail($id){
        $comic = Comic::find($id);
        $related = \App\Http\Controllers\ComicController::getrelated($id);
        return view('comic_detail')
            ->with(compact('comic'))
            ->with(compact('related'));
    }

    public function shoplistPrice0(){
        $genres = Genre::all();
        $comics = \App\Http\Controllers\ComicController::getByPrice(0,3.99);
        return view('shoplist')->with(compact('genres'))->with(compact('comics'));
    }
    public function shoplistPrice1(){
        $genres = Genre::all();
        $comics = \App\Http\Controllers\ComicController::getByPrice(3.99,8.00);
        return view('shoplist')->with(compact('genres'))->with(compact('comics'));
    }
    public function shoplistPrice2(){
        $genres = Genre::all();
        $comics = \App\Http\Controllers\ComicController::getByPrice(7.99,15.00);
        return view('shoplist')->with(compact('genres'))->with(compact('comics'));
    }
    public function shoplistPrice3(){
        $genres = Genre::all();
        $comics = \App\Http\Controllers\ComicController::getByPrice(14.99,25.00);
        return view('shoplist')->with(compact('genres'))->with(compact('comics'));
    }
    public function shoplistPrice4(){
        $genres = Genre::all();
        $comics = \App\Http\Controllers\ComicController::getByPrice(24.99,2500);
        return view('shoplist')->with(compact('genres'))->with(compact('comics'));
    }
    public static function countByPrice($number1,$number2){
        return Comic::where('price','>',$number1)->where('price','<',$number2)->count();
    }

    public static function getByPrice($number1,$number2){
        return Comic::where('price','>',$number1)->where('price','<',$number2)->paginate(9);
    }

    public static function countByType($text){
        return Comic::where('type','=',$text)->count();
    }

    public static function getNewComic(){
        return Comic::latest()->take(6)->get();
    }

    public static function  getComicByDiscount(){
        return Comic::orderByDesc('discount')->first();
    }

    public static function getComicByDiscountAndNumber($number){
        return Comic::orderByDesc('discount')->skip($number)->first();
    }

    public static function getManga(){
        return Comic::whereIn('type',['shonen','seinen','shojo','josei'])->inRandomOrder()->take(7)->get();
    }

    public static function getAmerican(){
        return Comic::whereIn('type',['marvel','dc'])->inRandomOrder()->take(7)->get();
    }

    public static function getItalian(){
       return Comic::whereIn('type',['italiano'])->inRandomOrder()->take(7)->get();
    }

    public static function getrelated($id){
        $target = Comic::find($id);
        return Comic::whereIn('author_id',[$target ->author_id])->where('id', '!=', $id)->take(4)->get();
     }


}
