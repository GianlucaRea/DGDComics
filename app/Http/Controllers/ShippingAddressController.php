<?php

namespace App\Http\Controllers;

use App\ShippingAddress;

use Illuminate\Http\Request;
use validator;
use Illuminate\Support\Facades\DB;

class ShippingAddressController extends Controller
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
            'via' => 'required',
            'civico' => 'required',
            'città' => 'required',
            'post_code' => 'required',
            'favourite' => 'required',
            'sede' => 'nullable',
            'other_info' => 'nullable'


        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }


        $shippingAddress = ShippingAddress::create($request->all());
        return response()->json($shippingAddress,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shippingAddress = ShippingAddress::find($id);
        if(is_null($shippingAddress)){
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
        $shippingAddress = ShippingAddress::find($id);
        if(is_null($shippingAddress)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $shippingAddress -> update($request -> all());
        return response()->json($shippingAddress,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shippingAddress = ShippingAddress::find($id);
        if(is_null($shippingAddress)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $shippingAddress -> delete();
        return response()->json(null,204);
    }


    public static function getShippingAddressByUserId($id)
    {
        return ShippingAddress::where('user_id', '=', $id)->get();

        //return response()->json($shippingAddress, 200);
    }

    public function getShippingAddress($id)
    {
        $shippingAddress = ShippingAddress::find($id)->get();

        return response()->json($shippingAddress, 200);
    }

    public function remove($id){
        $address = ShippingAddress::find($id);
        if(is_null($address)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $address -> delete();

        $user = \Illuminate\Support\Facades\Auth::user();
        return redirect('/accountArea')
            ->with(compact('user'));

    }

    public function add(Request $request){
        $request->validate([
            'via' => ['required'],
            'civico' => ['required', 'regex:/^[0-9]*$/'],
            'città' => ['required'],
            'post_code' => ['required', 'regex:/^[0-9]{5}$/'],
            'other_info' => 'nullable'
        ]);
        $user = \Illuminate\Support\Facades\Auth::user();

        $address = new ShippingAddress; //per evitare problemi con campi che non appartengono effettivamente a paymentMethod.
        $address->user_id = \Illuminate\Support\Facades\Auth::user()->id;
        $address->via = $request->via;
        $address->civico = $request->civico;
        $address->città = $request->città;
        $address->post_code = $request->post_code;
        $address->other_info = $request->other_info;
        $address->favourite = 0;

        $data=array(
            'user_id'=> $address->user_id,
            'via'=> $address->via,
            'civico'=> $address->civico,
            'città'=>$address->città,
            'post_code'=>$address->post_code,
            'other_info'=>$address->other_info,
            'favourite'=>$address->favourite,
        );

        DB::table('shipping_addresses')->insert($data);


        return redirect('/accountArea')
            ->with(compact('user'));
    }

}
