<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Comment::get(),200);
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


        $comment = Comment::create($request->all());
        return response()->json($comment,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        if(is_null($comment)){
            return response()->json(["message"=>'Record not found'],404);
        }
        return response()->json(Comment::find($id),200);
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
        $comment = Comment::find($id);
        if(is_null($comment)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $comment -> update($request -> all());
        return response()->json($comment,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if(is_null($comment)){
            return response()->json(["message"=>'Record not found'],404);
        }
        $comment-> delete();
        return response()->json(null,204);
    }

    public static function getcommentsByArticleId($id){
        return DB::table("comments")->where("article_id", "=", $id)->get();
    }

    public static function getArticleIdBycommentId($id){
        return DB::table('comments')->where("id", "=", $id)->first();
    }

    public function addToArticle(Article $article, Request $request){
        $request->validate([
            'answer' => ['required'],
        ]);
        $user = \Illuminate\Support\Facades\Auth::user();

        $comment = new Comment(); //per evitare problemi con campi che non appartengono effettivamente a paymentMethod.
        $comment->user_id = \Illuminate\Support\Facades\Auth::user()->id;
        $comment->article_id = $article->id;
        $comment->like = 0;
        $comment->dislike = 0;
        $comment->answer = $request->answer;

        $data=array(
            'user_id'=> $comment->user_id,
            'article_id' => $comment->article_id,
            'like' => $comment->like,
            'dislike' => $comment->dislike,
            'answer' => $comment->answer
        );

        DB::table('comments')->insert($data);


        return redirect()->back();
    }

    public function addToComment(int $id, Request $request){
        $request->validate([
            'answer' => ['required'],
        ]);

        $article = CommentController::getArticleIdBycommentId($id);


        $comment = new Comment(); //per evitare problemi con campi che non appartengono effettivamente a paymentMethod.
        $comment->user_id = \Illuminate\Support\Facades\Auth::user()->id;
        $comment->article_id = $article->article_id;
        $comment->like = 0;
        $comment->dislike = 0;
        $comment->answer = $request->answer;
        $comment->parent_comment = $id;

        $data=array(
            'user_id'=> $comment->user_id,
            'article_id' => $comment->article_id,
            'like' => $comment->like,
            'dislike' => $comment->dislike,
            'answer' => $comment->answer,
            'parent_comment' => $comment->parent_comment,
        );

        DB::table('comments')->insert($data);


        return redirect()->back();
    }

    public static function answers($id){
        return DB::table('comments')->where("parent_comment", "=", $id)->get();
    }
}
