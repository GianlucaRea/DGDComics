<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Article::get(),200);
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
        $validator = Validator::make($request->all());
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }


        $article = Article::create($request->all());
        return response()->json($article,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        if(is_null($article)){
            return response()->json(["message"=>'Record not found'],404);
        }
        return response()->json(Article::find($id),200);
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
        $article = Article::find($id);
        if(is_null($article)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $article -> update($request -> all());
        return response()->json($article,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        if(is_null($article)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $article-> delete();
        return response()->json(null,204);
    }

    public static function getArticles(){
        $articles = DB::table("articles")->latest()->paginate(5) ;
        $tags = Tag::all();
        return view('blogHome')->with(compact('articles'))->with(compact('tags'));
    }

    public function getArticleByTag($tag_name,Request $request){
        $articles = TAG::where('tag_name','=',$tag_name)->first()->article()->paginate(5);
        $tags = Tag::all();
        return view('blogHome')->with(compact('articles'))->with(compact('tags'));
    }

    public function articleSearch(Request $request){
        $tags = Tag::all();
        $search = $request->input('search');
        $articles = Article::where('title','LIKE','%'.$search.'%')->orWhere('article_text','LIKE','%'.$search.'%')->paginate(5);
        return view('blogHome')->with(compact('articles'))->with(compact('tags'));
    }



    public static function getArticleById($id){
        $article = Article::where("id", "=", $id)->first();
        return view('blogArticleDetail')->with(compact('article'));
    }

    public static function addArticle($id, Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:127'],
            'article_text' => ['required'],
        ]);

        if(GroupController::isAdmin($id)){
            $article = new Article();
            $article->user_id = $id;
            $article->title = $request->title;
            $article->article_text = $request->article_text;


            $data=array(
                'user_id'=> $id,
                'title' => $article->title,
                'article_text' => $article->article_text,
            );

            DB::table('articles')->insert($data);


            return redirect('/blog');
        }
        else{
            return view("errorCase");
        }
    }

    public static function destroyArticle($id){
        DB::table("articles")->where("id", "=", $id)->delete();

        return redirect('/blog');
    }
}
