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

Route::get('/shoplist/', function () {

    $genres = Genre::all();
    $comics = Comic::all();
    return view('shoplist')
        ->with(compact('genres'))
        ->with(compact('comics'));
})
;
Route::get('/shoplist/{type}', function ($type) {

    $genres = Genre::all();
    $comics = Comic::where('type','=',$type)->get();
    return view('shoplist')
        ->with(compact('genres'))
        ->with(compact('comics'));
});




Auth::routes();

Route::get('/comic_detail/{id}', function ($id){

    $comic = Comic::find($id);
    $related = \App\Http\Controllers\ComicController::getrelated($id);
    return view('comic_detail')
        ->with(compact('comic'))
        ->with(compact('related'));
});