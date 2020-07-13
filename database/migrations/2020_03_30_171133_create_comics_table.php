<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('author_id')->constrained();
            $table->string('comic_name');
            $table->text('description');
            $table->string('type');
            $table->integer('quantity');
            $table->string('ISBN');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->float('price');
            $table->integer('discount')->default(0);
            $table->string('height')->nullable();
            $table->string('width')->nullable();;
            $table->string('length')->nullable();;
            $table->string('language');
            $table->string('publisher');
            $table->boolean('suggest')->default(0);
        });

        DB::table('comics')->insert([
            ['user_id' => '2' , 'author_id' => '1' , 'comic_name' => 'FMA 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p>' , 'type' => "shonen" , 'quantity' => '3'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'10','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Planet manga', 'suggest' => '1'],
            ['user_id' => '1' , 'author_id' => '3' , 'comic_name' => 'Iron Man 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "marvel" , 'quantity' => '5'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'10','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '1'],
            ['user_id' => '1' , 'author_id' => '4' , 'comic_name' => 'Topolino 3219' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "italiano" , 'quantity' => '6'  , 'ISBN' => '1234567890' , 'price' => '6.6','discount'=>'12','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '4' , 'comic_name' => 'Pippo 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "italiano" , 'quantity' => '7'  , 'ISBN' => '1234567890' , 'price' => '6.5','discount'=>'13','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '5' , 'comic_name' => 'Superman 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "dc" , 'quantity' => '13'  , 'ISBN' => '1234567890' , 'price' => '7.5','discount'=>'9','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '5' , 'comic_name' => 'Batman 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "dc" , 'quantity' => '13'  , 'ISBN' => '1234567890' , 'price' => '7.5','discount'=>'9','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '1'],
            ['user_id' => '1' , 'author_id' => '5' , 'comic_name' => 'Flash 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "dc" , 'quantity' => '13'  , 'ISBN' => '1234567890' , 'price' => '7.5','discount'=>'9','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '2' , 'author_id' => '2' , 'comic_name' => 'One Piece 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "shonen" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Planet manga', 'suggest' => '1'],
            ['user_id' => '2' , 'author_id' => '2' , 'comic_name' => 'One Piece 2' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "shonen" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Planet manga', 'suggest' => '0'],
            ['user_id' => '2' , 'author_id' => '2' , 'comic_name' => 'One Piece 3' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "shonen" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Planet manga', 'suggest' => '0'],
            ['user_id' => '2' , 'author_id' => '2' , 'comic_name' => 'One Piece 4' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "shonen" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Planet manga', 'suggest' => '0'],
            ['user_id' => '2' , 'author_id' => '2' , 'comic_name' => 'One Piece 5' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "shonen" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Planet manga', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '3' , 'comic_name' => 'Hulk 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "marvel" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '3' , 'comic_name' => 'Thor 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "marvel" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '2' , 'author_id' => '6' , 'comic_name' => 'zerocalcare' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "italiano" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'ShockDom', 'suggest' => '1'],
            ['user_id' => '1' , 'author_id' => '4' , 'comic_name' => 'Topolino 3286' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "italiano" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '4' , 'comic_name' => 'Topolino 3287' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "italiano" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '4' , 'comic_name' => 'Topolino 3288' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "italiano" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '7' , 'comic_name' => 'The Walking Dead 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "Other" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '6.0','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Saldapress', 'suggest' => '1'],
            ['user_id' => '1' , 'author_id' => '7' , 'comic_name' => 'The Walking Dead 2' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "Other" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '6.0','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Saldapress', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '7' , 'comic_name' => 'The Walking Dead 3' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "Other" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '6.0','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Saldapress', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '7' , 'comic_name' => 'The Walking Dead 4' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "Other" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '6.0','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Saldapress', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '7' , 'comic_name' => 'The Walking Dead 5' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "Other" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '6.0','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Saldapress', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '7' , 'comic_name' => 'The Walking Dead 6' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "Other" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '6.0','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Saldapress', 'suggest' => '0'],
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics');
    }
}
