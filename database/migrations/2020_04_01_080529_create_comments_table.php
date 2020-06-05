<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('article_id')->constrained()->cascadeOnDelete();
            $table->integer('like');
            $table->integer('dislike');
            $table->string('answer');
            $table->unsignedBigInteger('parent_comment')->default(0);
            $table->timestamp('date')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
        DB::table('comments')->insert([
            ['user_id' => '1', 'article_id' => '2', 'like' => '10', 'dislike' => '0', 'answer' => 'questo articolo è palesemente un copia ed incolla della pagina wikipedia su fma', 'parent_comment' => '0'],
            ['user_id' => '2', 'article_id' => '2', 'like' => '6', 'dislike' => '0', 'answer' => 'hai proprio ragione bro', 'parent_comment' => '1'],
            ['user_id' => '3', 'article_id' => '2', 'like' => '2', 'dislike' => '8', 'answer' => 'articles are red, others are blue... oh, what is that article? It is an article for you!', 'parent_comment' => '0'],
            ['user_id' => '3', 'article_id' => '1', 'like' => '2', 'dislike' => '8', 'answer' => 'e buonanotte', 'parent_comment' => '0'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
