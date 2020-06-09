<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;
use App\Http\Controllers\ComicController;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $comics = DB::table('comics')->where('quantity', '>', 0)->get();
        $newComics = \App\Http\Controllers\ComicController::getNewComic();
        $manga = \App\Http\Controllers\ComicController::getManga();
        $america = \App\Http\Controllers\ComicController::getAmerican();
        $italian= \App\Http\Controllers\ComicController::getItalian();
        $articles =  DB::table("articles")->take(6)->get();
        return view('welcome')
            ->with(compact('comics'))
            ->with(compact('newComics'))
            ->with(compact('manga'))
            ->with(compact('america'))
            ->with(compact('italian'))
            ->with(compact('articles'));
    }
}
