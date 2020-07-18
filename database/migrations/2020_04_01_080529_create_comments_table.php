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
            ['user_id' => '6', 'article_id' => '2', 'like' => '5', 'dislike' => '0', 'answer' => 'Dylan Dog è il mio fumetto preferito, ha uno stile unico. Ogni volta che lo leggo mi immergo dentro al fumetto', 'parent_comment' => '0'],
            ['user_id' => '7', 'article_id' => '2', 'like' => '1', 'dislike' => '0', 'answer' => 'Stessa cosa per me , ne ho letti almeno 200. Ogni volta mi emoziono sempre.', 'parent_comment' => '1'],
            ['user_id' => '8', 'article_id' => '2', 'like' => '2', 'dislike' => '0', 'answer' => 'Io ho la collezione completa dal 1994 al 2000. Gli anni d\'oro del grande Sclavi', 'parent_comment' => '1'],
            ['user_id' => '6', 'article_id' => '2', 'like' => '2', 'dislike' => '0', 'answer' => 'Pensa un po io ho la collezione dal 96 al 98', 'parent_comment' => '1'],
            ['user_id' => '3', 'article_id' => '2', 'like' => '2', 'dislike' => '8', 'answer' => 'Sclavi è stato unico nel genere Horror... le sue storie sono pazzesche!', 'parent_comment' => '0'],
            ['user_id' => '8', 'article_id' => '1', 'like' => '0', 'dislike' => '8', 'answer' => 'One piece è molto sopravalutato', 'parent_comment' => '0'],
            ['user_id' => '6', 'article_id' => '1', 'like' => '7', 'dislike' => '0', 'answer' => 'Bhè un opinione non comune visto che è il più venduto al mondo!!!', 'parent_comment' => '6'],
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
