<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use App\User;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Notification::get(),200);
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
            'Notification_text'=>'required',
            'state'=>'required',
            'date'=>'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }


        $Notification = Notification::create($request->all());
        $Genre = Genre::find($genre_id); // Prendi genere in base all'id passato
        $Notification->genre()->attach($Genre); // Attacca al Notification i generi passati come argomento
        //Questo codice non è sicuro sia funzionante Codice di Gianluca Rea
        return response()->json($Notification,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Notification = Notification::find($id);
        if(is_null($Notification)){
            return response()->json(["message"=>'Record not found'],404);
        }
        return response()->json(Notification::find($id),200);
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
        $Notification = Notification::find($id);
        if(is_null($Notification)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $Notification -> update($request -> all());
        return response()->json($Notification,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $Notification = Notification::find($id);
        if(is_null($Notification)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $Notification-> delete();
        return response()->json(null,204);
    }

    public static function getNotification($id){
        return Notification::where('user_id', '=', $id)->get();
    }

    public static function getNumber($id){
        return Notification::where('user_id', '=', $id)->where('state', '=', '0')->count();
    }

    public static function notificationRead($id){
        Notification::where('id', '=', $id)->update(array('state' => '1'));
        $user = \Illuminate\Support\Facades\Auth::user();
        return view('/accountArea')
            ->with(compact('user'));
    }
}
