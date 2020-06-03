<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;
use App\User;
use App\Review;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
public static function dashboard() {
    $user = \Illuminate\Support\Facades\Auth::user();
    $users = \App\User::where('username','!=','admin')->orderBy('username', 'asc')->paginate(12);
    $comics =Comic::orderBy('comic_name', 'asc')->paginate(12);
    $reviews = \App\Review::orderBy('review_title', 'asc')->paginate(12);
    return view('adminPanel')
        ->with(compact('user'))
        ->with(compact('users'))
        ->with(compact('comics'))
        ->with(compact('reviews'));
}

public static function adminUsers(){
    $user = \Illuminate\Support\Facades\Auth::user();
    $users = \App\User::where('username','!=','admin')->orderBy('username', 'asc')->paginate(12);
    $comics =Comic::orderBy('comic_name', 'asc')->paginate(12);
    $reviews = \App\Review::orderBy('review_title', 'asc')->paginate(12);
    return view('adminPanel')
        ->with(compact('user'))
        ->with(compact('users'))
        ->with(compact('comics'))
        ->with(compact('reviews'));
}

public static function adminComics(){
    $user = \Illuminate\Support\Facades\Auth::user();
    $users = \App\User::where('username','!=','admin')->orderBy('username', 'asc')->paginate(12);
    $comics =Comic::orderBy('comic_name', 'asc')->paginate(12);
    $reviews = \App\Review::orderBy('review_title', 'asc')->paginate(12);
    return view('adminPanel')
        ->with(compact('user'))
        ->with(compact('users'))
        ->with(compact('comics'))
        ->with(compact('reviews'));
}

public static function adminReviews(){
    $user = \Illuminate\Support\Facades\Auth::user();
    $users = \App\User::where('username','!=','admin')->orderBy('username', 'asc')->paginate(12);
    $comics =Comic::orderBy('comic_name', 'asc')->paginate(12);
    $reviews = \App\Review::orderBy('review_title', 'asc')->paginate(12);
    return view('adminPanel')
        ->with(compact('user'))
        ->with(compact('users'))
        ->with(compact('comics'))
        ->with(compact('reviews'));
}

public static function checkForWriteArticle(){
    $user = Auth::user();
    if(GroupController::isAdmin($user->id)){
        return view("articleForm");
    }
    else{
        return view("errorCase");
    }
}

}
