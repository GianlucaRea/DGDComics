<?php

namespace App\Http\Controllers;

use App\PaymentMethod;

use Illuminate\Http\Request;
use validator;
use Illuminate\Support\Facades\DB;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(User::get(),200);
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

            'user_id' => 'required',
            'payment_type' => 'required',
            'favourite' => 'required',
            'data_scadenza' => 'required',
            'cardNumber' => ['requred', 'min:16', 'max:16', 'Unique'],
            'intestatario' => ['required', 'unique'],
            'CVV' => ['requred', 'min:3', 'max:3', 'Unique'],

        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }


        $paymentMethod = PaymentMethod::create($request->all());
        return response()->json($paymentMethod,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paymentMethod = PaymentMethod::find($id);
        if(is_null($paymentMethod)){
            return response()->json(["message"=>'Record not found'],404);
        }
        return response()->json(Author::find($id),200);
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
        $paymentMethod = PaymentMethod::find($id);
        if(is_null($paymentMethod)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $paymentMethod -> update($request -> all());
        return response()->json($paymentMethod,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::find($id);
        if(is_null($paymentMethod)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $paymentMethod -> delete();
        return response()->json(null,204);
    }


    public static function getPaymentMethodByUserId($id)
    {
        return PaymentMethod::where('user_id', '=', $id)->get();


    }

    public static function getTime(){
        return strtotime("now");
    }

    public static function getScadenza(){

    }



    public function getPaymentMethod($id)
    {
        $paymentMethod = PaymentMethod::find($id)->get();

        return response()->json($paymentMethod, 200);
    }

    public function remove($id){
        $paymentMethod = PaymentMethod::find($id);
        if(is_null($paymentMethod)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $paymentMethod -> delete();

        $user = \Illuminate\Support\Facades\Auth::user();
        return redirect('/accountArea')
            ->with(compact('user'));

    }

}