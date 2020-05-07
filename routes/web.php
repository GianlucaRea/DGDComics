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

Route::get('/', 'HomeController@index');

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/comic_detail/{id}','ComicController@comicDetail');

Route::get('/shoplist', 'ComicController@shoplistBase');
Route::get('/shoplist/type/{type}','ComicController@shoplistType');
Route::get('/shoplist/genre/{name_genre}','ComicController@shoplistGenre')->name('genreshoplist');

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

Auth::routes();

Route::get('/logout', function () {
    return \App\Http\Controllers\Auth\LoginController::logout();
});

Route::get('/accountArea', function () {
    $user = \Illuminate\Support\Facades\Auth::user();

    return view('/accountArea')
        ->with(compact('user'));

});