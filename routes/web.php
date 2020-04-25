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
    return view('welcome', compact('comics'), compact('newComics') , compact('manga'));
});

Auth::routes();

Route::get('/comic_detail/{id}', function ($id){

    $comic = Comic::find($id);


    return view('comic_detail', compact('comic'));
});