<?php

namespace App\Http\Controllers;


use App\Genre;
use App\Http\Controllers\Controller;
use App\Image;
use App\Review;
use App\User;
use Illuminate\Http\Request;
use App\Comic;
use Illuminate\Support\Facades\Auth;
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

    public static function priceCalculator($id){
        $comic = Comic::where('id','=',$id)->first();
        if($comic->discount > 0){
            $valoreSconto = (($comic->price * $comic->discount) / 100);
            $price = ($comic->price - $valoreSconto);
            return $newPrice = number_format($price, 2);
        }
        else{
            return $comic->price;
        }
    }

    public function shoplistBase(Request $request){
        $genres = Genre::all();
        $comics = Comic::orderBy('comic_name', 'asc')->paginate(12);
        if ($request->has('sorter')){
            switch($request->get('sorter')){
                case 'comic_name_asc':
                    $comics = Comic::orderBy('comic_name', 'asc')->paginate(12);
                    break;
                case 'comic_name_desc':
                    $comics = Comic::orderBy('comic_name', 'desc')->paginate(12);
                    break;
                case 'price_asc':
                    $comics = Comic::orderBy('price', 'asc')->paginate(12);
                    break;
                case 'price_desc':
                    $comics = Comic::orderBy('price', 'desc')->paginate(12);
                    break;
                case 'created_at':
                    $comics = Comic::latest()->paginate(12);
                    break;
            }
        }
        return view('shoplist')
            ->with(compact('genres'))
            ->with(compact('comics'));
    }

    public function shoplistType($type,Request $request){
        $genres = Genre::all();
        $comics = Comic::where('type', '=', $type)->orderBy('comic_name', 'asc')->paginate(12);
        if ($request->has('sorter')) {
            switch ($request->get('sorter')) {
                case 'comic_name_asc':
                    $comics = Comic::where('type', '=', $type)->orderBy('comic_name', 'asc')->paginate(12);
                    break;
                case 'comic_name_desc':
                    $comics = Comic::where('type', '=', $type)->orderBy('comic_name', 'desc')->paginate(12);
                    break;
                case 'price_asc':
                    $comics = Comic::where('type', '=', $type)->orderBy('price', 'asc')->paginate(12);
                    break;
                case 'price_desc':
                    $comics = Comic::where('type', '=', $type)->orderBy('price', 'desc')->paginate(12);
                    break;
                case 'created_at':
                    $comics = Comic::where('type', '=', $type)->latest()->paginate(12);
                    break;
            }
        }
        return view('shoplist')
            ->with(compact('genres'))
            ->with(compact('comics'));
    }

    public function shoplistGenre($name_genre,Request $request){
        $comics = Genre::where('name_genre','=',$name_genre)->first()->comic()->orderBy('comic_name', 'asc')->paginate(12);
        $genres = Genre::all();

            if ($request->has('sorter')) {
                switch ($request->get('sorter')) {
                    case 'comic_name_asc':
                        $comics =Genre::where('name_genre','=',$name_genre)->first()->comic()->orderBy('comic_name', 'asc')->paginate(12);
                        break;
                    case 'comic_name_desc':
                        $comics = Genre::where('name_genre','=',$name_genre)->first()->comic()->orderBy('comic_name', 'desc')->paginate(12);
                        break;
                    case 'price_asc':
                        $comics = Genre::where('name_genre','=',$name_genre)->first()->comic()->orderBy('price', 'asc')->paginate(12);
                        break;
                    case 'price_desc':
                        $comics = Genre::where('name_genre','=',$name_genre)->first()->comic()->orderBy('price', 'desc')->paginate(12);
                        break;
                    case 'created_at':
                        $comics = Genre::where('name_genre','=',$name_genre)->first()->comic()->latest()->paginate(12);
                        break;
                }
            }
        return view('shoplist')->with(compact('genres'))->with(compact('comics'));
    }

    public function shoplistSearch(Request $request){
        $genres = Genre::all();
        $search = $request->input('search');
        $comics = Comic::where('comic_name','LIKE','%'.$search.'%')->orWhere('type','LIKE','%'.$search.'%')->orWhere('publisher','LIKE','%'.$search.'%')->paginate(12);
        if ($request->has('sorter')) {
            switch ($request->get('sorter')) {
                case 'comic_name_asc':
                    $comics =Comic::where('comic_name','LIKE','%'.$search.'%')->orWhere('type','LIKE','%'.$search.'%')->orWhere('publisher','LIKE','%'.$search.'%')->orderBy('comic_name', 'asc')->paginate(12);
                    break;
                case 'comic_name_desc':
                    $comics =Comic::where('comic_name','LIKE','%'.$search.'%')->orWhere('type','LIKE','%'.$search.'%')->orWhere('publisher','LIKE','%'.$search.'%')->orderBy('comic_name', 'desc')->paginate(12);
                    break;
                case 'price_asc':
                    $comics = Comic::where('comic_name','LIKE','%'.$search.'%')->orWhere('type','LIKE','%'.$search.'%')->orWhere('publisher','LIKE','%'.$search.'%')->orderBy('price', 'asc')->paginate(12);
                    break;
                case 'price_desc':
                    $comics = Comic::where('comic_name','LIKE','%'.$search.'%')->orWhere('type','LIKE','%'.$search.'%')->orWhere('publisher','LIKE','%'.$search.'%')->orderBy('price', 'desc')->paginate(12);
                    break;
                case 'created_at':
                    $comics = Comic::where('comic_name','LIKE','%'.$search.'%')->orWhere('type','LIKE','%'.$search.'%')->orWhere('publisher','LIKE','%'.$search.'%')->latest()->paginate(12);
                    break;
            }
        }
      if(count($comics) > 0)
      return view('shoplist')->with(compact('genres'))->with(compact('comics'));
      else return view ('shoplist')->with(compact('genres'))->with(compact('comics'))->withMessage('No Details found. Try to search again !');
    }
    public function comicDetail($id){
        $comic = Comic::find($id);
        $related = \App\Http\Controllers\ComicController::getrelated($id);
        $reviews = Review::where('comic_id','=',$id)->get();
        $reviews4 = Review::where('comic_id','=',$id)->inRandomOrder()->take(4)->get();
        $avgstar = Review::where('comic_id','=',$id)->avg('stars');
        return view('comic_detail')
            ->with(compact('comic'))
            ->with(compact('related'))
            ->with(compact('reviews'))
            ->with(compact('reviews4'));
    }

    public function shoplistPrice0(Request $request){
        $number1 = 0;
        $number2 = 3.99;
        $genres = Genre::all();
        $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->paginate(12);
        if ($request->has('sorter')) {
            switch ($request->get('sorter')) {
                case 'comic_name_asc':
                    $comics =Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('comic_name', 'asc')->paginate(12);
                    break;
                case 'comic_name_desc':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('comic_name', 'desc')->paginate(12);
                    break;
                case 'price_asc':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('price', 'asc')->paginate(12);
                    break;
                case 'price_desc':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('price', 'desc')->paginate(12);
                    break;
                case 'created_at':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->latest()->paginate(12);
                    break;
            }
        }
        return view('shoplist')->with(compact('genres'))->with(compact('comics'));
    }
    public function shoplistPrice1(Request $request){
        $number1 = 3.99;
        $number2 = 8;
        $genres = Genre::all();
        $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->paginate(12);
        if ($request->has('sorter')) {
            switch ($request->get('sorter')) {
                case 'comic_name_asc':
                    $comics =Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('comic_name', 'asc')->paginate(12);
                    break;
                case 'comic_name_desc':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('comic_name', 'desc')->paginate(12);
                    break;
                case 'price_asc':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('price', 'asc')->paginate(12);
                    break;
                case 'price_desc':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('price', 'desc')->paginate(12);
                    break;
                case 'created_at':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->latest()->paginate(12);
                    break;
            }
        }
        return view('shoplist')->with(compact('genres'))->with(compact('comics'));
    }
    public function shoplistPrice2(Request $request){
        $number1 = 7.99;
        $number2 = 15.00;
        $genres = Genre::all();
        $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->paginate(12);
        if ($request->has('sorter')) {
            switch ($request->get('sorter')) {
                case 'comic_name_asc':
                    $comics =Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('comic_name', 'asc')->paginate(12);
                    break;
                case 'comic_name_desc':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('comic_name', 'desc')->paginate(12);
                    break;
                case 'price_asc':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('price', 'asc')->paginate(12);
                    break;
                case 'price_desc':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('price', 'desc')->paginate(12);
                    break;
                case 'created_at':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->latest()->paginate(12);
                    break;
            }
        }
        return view('shoplist')->with(compact('genres'))->with(compact('comics'));
    }
    public function shoplistPrice3(Request $request){
        $number1 = 14.99;
        $number2 = 25.00;
        $genres = Genre::all();
        $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->paginate(12);
        if ($request->has('sorter')) {
            switch ($request->get('sorter')) {
                case 'comic_name_asc':
                    $comics =Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('comic_name', 'asc')->paginate(12);
                    break;
                case 'comic_name_desc':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('comic_name', 'desc')->paginate(12);
                    break;
                case 'price_asc':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('price', 'asc')->paginate(12);
                    break;
                case 'price_desc':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('price', 'desc')->paginate(12);
                    break;
                case 'created_at':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->latest()->paginate(12);
                    break;
            }
        }
        return view('shoplist')->with(compact('genres'))->with(compact('comics'));
    }
    public function shoplistPrice4(Request $request){
        $number1 = 24.99;
        $number2 = 2500;
        $genres = Genre::all();
        $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->paginate(12);
        if ($request->has('sorter')) {
            switch ($request->get('sorter')) {
                case 'comic_name_asc':
                    $comics =Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('comic_name', 'asc')->paginate(12);
                    break;
                case 'comic_name_desc':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('comic_name', 'desc')->paginate(12);
                    break;
                case 'price_asc':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('price', 'asc')->paginate(12);
                    break;
                case 'price_desc':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->orderBy('price', 'desc')->paginate(12);
                    break;
                case 'created_at':
                    $comics = Comic::where('price','>',$number1)->where('price','<',$number2)->latest()->paginate(12);
                    break;
            }
        }
        return view('shoplist')->with(compact('genres'))->with(compact('comics'));    }

    public static function countByPrice($number1,$number2){
        return Comic::where('price','>',$number1)->where('price','<',$number2)->count();
    }

    public static function getByPrice($number1,$number2){
        return Comic::where('price','>',$number1)->where('price','<',$number2)->paginate(12);
    }

    public static function countByType($text){
        return Comic::where('type','=',$text)->count();
    }

    public static function getNewComic(){
        return Comic::latest()->where('quantity', '>', 0)->take(6)->get();
    }

    public static function  getComicByDiscount(){
        return Comic::orderByDesc('discount')->first();
    }

    public static function getComicByDiscountAndNumber($number){
        return Comic::orderByDesc('discount')->skip($number)->first();
    }

    public static function getManga(){
        return Comic::whereIn('type',['shonen','seinen','shojo','josei'])->where('quantity', '>', 0)->inRandomOrder()->take(7)->get();
    }

    public static function getAmerican(){
        return Comic::whereIn('type',['marvel','dc'])->where('quantity', '>', 0)->inRandomOrder()->take(7)->get();
    }

    public static function getItalian(){
       return Comic::whereIn('type',['italiano'])->where('quantity', '>', 0)->inRandomOrder()->take(7)->get();
    }

    public static function getrelated($id){
        $target = Comic::find($id);
        return Comic::whereIn('author_id',[$target ->author_id])->where('id', '!=', $id)->take(4)->get();
     }

     public static function getSeller($id){
        $sold = Comic::find($id);
        return User::find($sold->user_id);
     }
     
    public function addToCart($id, Request $request)
    {
        $comic = Comic::find($id);
        $user = Auth::user();
        if($comic->quantity>0) {

            if (!$comic) {

                abort(404);

            }

            $cart = session()->get('cart');
            $image = ImageController::getCover($id);

            // if cart is empty then this the first comic
            if (!$cart) {

                $cart = [
                    $id => [
                        "user" => $user->id,
                        "name" => $comic->comic_name,
                        "quantity" => $request->qty,
                        "price" => $comic->price,
                        "image" => $image->image_name,
                    ]
                ];

                session()->put('cart', $cart);

                $newQuantity = $comic->quantity - $request->qty;
                DB::table('comics')->where('id', $comic->id)->update(['quantity' => $newQuantity]);
                return redirect()->back()->with('success', 'comic added to cart successfully!');
            }

            // if cart not empty then check if this comic exist then increment quantity
            if (isset($cart[$id])) {

                $cart[$id]['quantity'] = $cart[$id]['quantity'] + $request->qty;

                session()->put('cart', $cart);

                $newQuantity = $comic->quantity - $request->qty;
                DB::table('comics')->where('id', $comic->id)->update(['quantity' => $newQuantity]);
                return redirect()->back()->with('success', 'comic added to cart successfully!');


            }

            // if item not exist in cart then add to cart with passed quantity
            $cart[$id] = [
                "user" => $user->id,
                "name" => $comic->comic_name,
                "quantity" => $request->qty,
                "price" => $comic->price,
                "image" => $image->image_name,
            ];

            session()->put('cart', $cart);

            $newQuantity = $comic->quantity - $request->qty;
            DB::table('comics')->where('id', $comic->id)->update(['quantity' => $newQuantity]);
            return redirect()->back()->with('success', 'comic added to cart successfully!');
        }
        else{
            return redirect()->back()->with('error', 'seems something went wrong!');
        }
    }

    public function addToCart1($id)
    {
        $comic = Comic::find($id);
        $user = Auth::user();
        if($comic->quantity>0) {

            if (!$comic) {

                abort(404);

            }

            $cart = session()->get('cart');
            $image = ImageController::getCover($id);

            // if cart is empty then this the first comic
            if (!$cart) {

                $cart = [
                    $id => [
                        "user" => $user->id,
                        "name" => $comic->comic_name,
                        "quantity" => 1,
                        "price" => $comic->price,
                        "image" => $image->image_name,
                    ]
                ];

                session()->put('cart', $cart);

                $newQuantity = $comic->quantity - 1;
                DB::table('comics')->where('id', $comic->id)->update(['quantity' => $newQuantity]);
                return redirect()->back()->with('success', 'comic added to cart successfully!');
            }

            // if cart not empty then check if this comic exist then increment quantity
            if (isset($cart[$id])) {

                $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;

                session()->put('cart', $cart);

                $newQuantity = $comic->quantity - 1;
                DB::table('comics')->where('id', $comic->id)->update(['quantity' => $newQuantity]);
                return redirect()->back()->with('success', 'comic added to cart successfully!');
            }

            // if item not exist in cart then add to cart with passed quantity
            $cart[$id] = [
                "user" => $user->id,
                "name" => $comic->comic_name,
                "quantity" => 1,
                "price" => $comic->price,
                "image" => $image->image_name,
            ];

            session()->put('cart', $cart);

            $newQuantity = $comic->quantity - 1;
            DB::table('comics')->where('id', $comic->id)->update(['quantity' => $newQuantity]);
            return redirect('/')->with('success', 'comic added to cart successfully!');

        }
        else{
            return redirect('/')->with('error', 'seems something went wrong!');
        }
    }

    public function updateCart($id, Request $request)
    {
        if($id and $request->qty)
        {
            $cart = session()->get('cart');

            if($request->qty > $cart[$id]["quantity"]){ //caso in cui sto aumentando la quantità
                $comic = Comic::find($id);
                $added = $request->qty - $cart[$id]["quantity"];
                $newQuantity = $comic->quantity - $added;
                DB::table('comics')->where('id', $comic->id)->update(['quantity' => $newQuantity]);
            }

            if($request->qty < $cart[$id]["quantity"]){ //caso in cui sto rimuovendo la quantità
                $comic = Comic::find($id);
                $removed = $cart[$id]["quantity"] - $request->qty;
                $newQuantity = $comic->quantity + $removed;
                DB::table('comics')->where('id', $comic->id)->update(['quantity' => $newQuantity]);
            }

            $cart[$id]["quantity"] = $request->qty;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'comic updated!');
        }

        return redirect()->back()->with('error', 'comic not updated!');

    }

    public function removeFromCart($id)
    {
        if($id) {

            $cart = session()->get('cart');
            $quantityInCart = $cart[$id]["quantity"];

            if(isset($cart[$id])) {

                unset($cart[$id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');

            $comic = Comic::find($id);
            $newQuantity = $comic->quantity + $quantityInCart;
            DB::table('comics')->where('id', $comic->id)->update(['quantity' => $newQuantity]);

            return redirect()->back();
        }
    }

    public function removeAll(){
        $cart = session()->get('cart');

        // if cart is empty then this the first comic
        if($cart == []) {
            return redirect('/cart');
        }
        else{
            foreach (session('cart') as $id => $details){
                if($id) {

                    $quantityInCart = $cart[$id]["quantity"];

                    if (isset($cart[$id])) {

                        unset($cart[$id]);

                        session()->put('cart', $cart);
                    }

                    session()->flash('success', 'Product removed successfully');

                    $comic = Comic::find($id);
                    $newQuantity = $comic->quantity + $quantityInCart;
                    DB::table('comics')->where('id', $comic->id)->update(['quantity' => $newQuantity]);
                }
            }
        }
        return redirect()->back();
    }

}
