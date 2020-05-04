<?php

use Illuminate\Support\Facades\Route;
use App\Comic;
use App\Genre;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $comics = Comic::all();
    $newComics = \App\Http\Controllers\ComicController::getNewComic();
    $manga = \App\Http\Controllers\ComicController::getManga();
    $america = \App\Http\Controllers\ComicController::getAmerican();
    $italian= \App\Http\Controllers\ComicController::getItalian();
    return view('welcome')
        ->with(compact('comics'))
        ->with(compact('newComics'))
        ->with(compact('manga'))
        ->with(compact('america'))
        ->with(compact('italian'));
});

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/shoplist', function () {

    $genres = Genre::all();
    $comics = Comic::all()  ->take(20);
    return view('shoplist')
        ->with(compact('genres'))
        ->with(compact('comics'));
});

Route::get('/shoplist/price0',function (){
    $genres = Genre::all();
    $comics = \App\Http\Controllers\ComicController::getByPrice(0,3.99);
    return view('shoplist')->with(compact('genres'))->with(compact('comics'));
})->name('prezzo0');

Route::get('/shoplist/price1',function (){
    $genres = Genre::all();
    $comics = \App\Http\Controllers\ComicController::getByPrice(3.99,8.00);
    return view('shoplist')->with(compact('genres'))->with(compact('comics'));
})->name('prezzo1');

Route::get('/shoplist/price2',function (){
    $genres = Genre::all();
    $comics = \App\Http\Controllers\ComicController::getByPrice(7.99,15.00);
    return view('shoplist')->with(compact('genres'))->with(compact('comics'));
})->name('prezzo2');

Route::get('/shoplist/price3',function (){
    $genres = Genre::all();
    $comics = \App\Http\Controllers\ComicController::getByPrice(14.99,25.00);
    return view('shoplist')->with(compact('genres'))->with(compact('comics'));
})->name('prezzo3');

Route::get('/shoplist/price4',function (){
    $genres = Genre::all();
    $comics = \App\Http\Controllers\ComicController::getByPrice(24.99,2500);
    return view('shoplist')->with(compact('genres'))->with(compact('comics'));
})->name('prezzo4');


Route::get('/shoplist/genre/{name_genre}', function ($name_genre) {
    $comics = \App\Http\Controllers\GenreController::getComics($name_genre);
    $genres = Genre::all();
    return view('shoplist')->with(compact('genres'))->with(compact('comics'));
})->name('genreshoplist');

Route::get('/shoplist/type/{type}', function ($type) {
    $genres = Genre::all();
    $comics = Comic::where('type', '=', $type)->get();
    return view('shoplist')
        ->with(compact('genres'))
        ->with(compact('comics'));
});

Auth::routes();

Route::get('/logout', function () {
    return \App\Http\Controllers\Auth\LoginController::logout();
});

Route::get('/comic_detail/{id}', function ($id) {

    $comic = Comic::find($id);
    $related = \App\Http\Controllers\ComicController::getrelated($id);
    return view('comic_detail')
        ->with(compact('comic'))
        ->with(compact('related'));
});

Route::get('/accountArea', function () {
    $user = \Illuminate\Support\Facades\Auth::user();
    return view('/accountArea')
        ->with(compact('user'));
});