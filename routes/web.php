<?php

use Illuminate\Support\Facades\Route;
use App\Comic;

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

Route::get('/shoplist', function () {
    return view('shoplist');
});




Auth::routes();

Route::get('/comic_detail/{id}', function ($id){

    $comic = Comic::find($id);
    $related = \App\Http\Controllers\ComicController::getrelated($id);
    return view('comic_detail')
        ->with(compact('comic'))
        ->with(compact('related'));
});