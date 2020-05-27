<?php

namespace App\Http\Controllers;

use App\ComicBought;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Order::get(),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($values)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, array $comic_bought_id)
    {
        $rules = [
            'user_id' => 'required',
            'payment_method_id' => 'required',
            'shipping_address_id' => 'required',
            'total' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }


        $order = Order::create($request->all());
        $comic_bought = ComicBought::find($comic_bought_id);
        $order->comic_bought()->attach($comic_bought);
        return response()->json($order,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        if(is_null($order)){
            return response()->json(["message"=>'Record not found'],404);
        }
        return response()->json(Order::find($id),200);
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
        $order = Order::find($id);
        if(is_null($order)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $order -> update($request -> all());
        return response()->json($order,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        if(is_null($order)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $order-> delete();
        return response()->json(null,204);
    }

    public function submitOrder(Request $request){
        if($request != null && $request->total > 0){
        $order = new Order();
        $user =  \Illuminate\Support\Facades\Auth::user();
        $order->user_id = $user->id;
        $order->payment_method_id = $request->paymentMethod;
        $order->shipping_adress_id = $request->shippingAddress;
        $order->total = $request->total;

        $data1=array(
            'user_id' => $order->user_id,
            'payment_method_id' => $order->payment_method_id,
            'shipping_address_id' => $order->shipping_adress_id,
            'total' => $order->total,
        );

        $order_id = Order::create($data1);

        foreach (session('cart') as $id => $details){
            $comicBought = new ComicBought();
            $comicBought->comic_id = $id;
            $comicBought->quantity = $details['quantity'];
            $comicBought->price = $details['price'];

            $data2=array(
                'comic_id' => $comicBought->comic_id,
                'quantity' => $comicBought->quantity,
                'price' => $comicBought->price,
            );

            $comic_Bought_id = ComicBought::create($data2);
            $data3=array(
                'comic_bought_id' => $comic_Bought_id->id,
                'order_id' => $order_id->id,
            );
            DB::table('comic_bought_order')->insert($data3);
        }
        ComicController::removeAll(); //svuotamento carrello

            return redirect('/orderSuccess');
        }
        return redirect()->back();
    }

}
