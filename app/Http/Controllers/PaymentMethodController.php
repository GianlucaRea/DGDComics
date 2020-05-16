<?php

namespace App\Http\Controllers;

use App\PaymentMethod;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function add(Request $request){
        $now = Carbon::now();
        $request->validate([
            'payment_type' => 'required',
            'data_scadenza' => ['required', 'after:now'],
            'cardNumber' => ['required', 'regex:/^[0-9]{16}$/'],
            'intestatario' => ['required', 'regex:/^[a-z ,.-]+$/i'],
            'CVV' => ['required', 'regex:/^[0-9]{3}$/'],
        ]);
        $user = \Illuminate\Support\Facades\Auth::user();

        $paymentMethod = new PaymentMethod; //per evitare problemi con campi che non appartengono effettivamente a paymentMethod.
        $paymentMethod->user_id = \Illuminate\Support\Facades\Auth::user()->id;
        $paymentMethod->payment_type = $request->payment_type;
        $paymentMethod->favourite = 0;
        $paymentMethod->data_scadenza = $request->data_scadenza;
        $paymentMethod->cardNumber = $request->cardNumber;
        $paymentMethod->intestatario = $request->intestatario;
        $paymentMethod->CVV = $request->CVV;

        $data=array(
            'user_id'=> $paymentMethod->user_id,
            'payment_type'=> $paymentMethod->payment_type,
            'favourite'=> $paymentMethod->favourite,
            'data_scadenza'=>$paymentMethod->data_scadenza,
            'cardNumber'=>$paymentMethod->cardNumber,
            'intestatario'=>$paymentMethod->intestatario,
            'CVV'=>Hash::make($paymentMethod->CVV),
        );

        DB::table('payment_methods')->insert($data);


        return redirect('/accountArea')
            ->with(compact('user'));
    }

}