<?php

namespace App\Http\Controllers;

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
        return DB::table("articles")->get();
    }

    public static function getArticleById($id){
        $article = DB::table("articles")->where("id", "=", $id)->first();
        return view('blogArticleDetail')->with(compact('article'));
    }

    public static function addArticle($id, Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:127'],
            'article_text' => ['required'],
        ]);

        if(GroupController::isAdmin($id)){
            $article = new Article(); //per evitare problemi con campi che non appartengono effettivamente a paymentMethod.
            $article->user_id = $id;
            $article->title = $request->title;
            $article->article_text = $request->article_text;

            $data=array(
                'user_id'=> $id,
                'title' => $article->title,
                'article_text' => $article->article_text,
            );

            DB::table('articles')->insert($data);


            return view('/blogHome');
        }
        else{
            return view("errorCase");
        }
    }
}
