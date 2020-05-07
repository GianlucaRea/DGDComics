<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;
use App\Http\Controllers\ComicController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
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
    }
}
