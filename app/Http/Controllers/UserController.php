<?php

namespace App\Http\Controllers;

use App\User;
use App\Comic;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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

            'name' => 'required',
            'surname' => 'required',
            'username' => 'required',
            'age' => 'required',
            'partitaIva' => 'nullable',
            'phone_number' => 'required',
            'email' => 'required',
            'email_verified_at' => 'required',
            'password' => 'required',
            'attivita' => 'nullable',


        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }


        $User = User::create($request->all());
        return response()->json($User,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $User = User::find($id);
        if(is_null($User)){
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
        $User = User::find($id);
        if(is_null($User)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $User -> update($request -> all());
        return response()->json($User,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::find($id);
        if(is_null($User)){
            return redirect()->route("AdminAccount")->with('message','Alredy Deleted');
        }
        $User -> delete();
        return redirect()->route("AdminAccount")->with('message','Success');
    }

    public static function getUserId($id)
    {
        return User::where('id','=',$id)->first();

    }

    public function changeEmail(Request $request){

        $request->validate([
            'email' => 'required',
        ]);

        User::find(auth()->user()->id)->update(['email'=> ($request->email)]);

        $user = \Illuminate\Support\Facades\Auth::user();
        return view('/accountArea')
            ->with(compact('user'));
    }

    public static function addPartitaIva(Request $request){

        $request->validate([
            'partitaIva' => ['required', 'regex:/^[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{4}[0-9]{7}([a-zA-Z0-9]?){0,16}$/'],
            'attivita' => 'required',
        ]);

        User::find(auth()->user()->id)->update(['partitaIva'=> ($request->partitaIva)]);
        User::find(auth()->user()->id)->update(['attivita'=> ($request->attivita)]);


    }

}
