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
        });

        DB::table('comics')->insert([
            ['user_id' => '2' , 'author_id' => '1' , 'comic_name' => 'FMA 1' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "shonen" , 'quantity' => '3'  , 'ISBN' => 'FAKEISBN' , 'price' => '4.5','discount'=>'10','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Planet manga'],
            ['user_id' => '1' , 'author_id' => '3' , 'comic_name' => 'Iron Man 1' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "marvel" , 'quantity' => '5'  , 'ISBN' => 'FAKEISBN' , 'price' => '4.5','discount'=>'10','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics'],
            ['user_id' => '1' , 'author_id' => '4' , 'comic_name' => 'Topolino 3219' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "italiano" , 'quantity' => '6'  , 'ISBN' => 'FAKEISBN' , 'price' => '6.6','discount'=>'12','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics'],
            ['user_id' => '1' , 'author_id' => '4' , 'comic_name' => 'Pippo 1' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "italiano" , 'quantity' => '7'  , 'ISBN' => 'FAKEISBN' , 'price' => '6.5','discount'=>'13','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics'],
            ['user_id' => '1' , 'author_id' => '5' , 'comic_name' => 'Superman 1' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "dc" , 'quantity' => '13'  , 'ISBN' => 'FAKEISBN' , 'price' => '7.5','discount'=>'9','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics'],
            ['user_id' => '1' , 'author_id' => '5' , 'comic_name' => 'Batman 1' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "dc" , 'quantity' => '13'  , 'ISBN' => 'FAKEISBN' , 'price' => '7.5','discount'=>'9','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics'],
            ['user_id' => '1' , 'author_id' => '5' , 'comic_name' => 'Flash 1' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "dc" , 'quantity' => '13'  , 'ISBN' => 'FAKEISBN' , 'price' => '7.5','discount'=>'9','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics'],
            ['user_id' => '1' , 'author_id' => '2' , 'comic_name' => 'One Piece 1' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "shonen" , 'quantity' => '1'  , 'ISBN' => 'FAKEISBN' , 'price' => '4.5','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Planet manga'],
            ['user_id' => '1' , 'author_id' => '2' , 'comic_name' => 'One Piece 2' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "shonen" , 'quantity' => '1'  , 'ISBN' => 'FAKEISBN' , 'price' => '4.5','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Planet manga'],
            ['user_id' => '1' , 'author_id' => '2' , 'comic_name' => 'One Piece 3' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "shonen" , 'quantity' => '1'  , 'ISBN' => 'FAKEISBN' , 'price' => '4.5','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Planet manga'],
            ['user_id' => '1' , 'author_id' => '2' , 'comic_name' => 'One Piece 4' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "shonen" , 'quantity' => '1'  , 'ISBN' => 'FAKEISBN' , 'price' => '4.5','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Planet manga'],
            ['user_id' => '1' , 'author_id' => '2' , 'comic_name' => 'One Piece 5' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "shonen" , 'quantity' => '1'  , 'ISBN' => 'FAKEISBN' , 'price' => '4.5','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Planet manga'],
            ['user_id' => '1' , 'author_id' => '3' , 'comic_name' => 'Hulk 1' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "marvel" , 'quantity' => '1'  , 'ISBN' => 'FAKEISBN' , 'price' => '4.5','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics'],
            ['user_id' => '1' , 'author_id' => '3' , 'comic_name' => 'Thor 1' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "marvel" , 'quantity' => '1'  , 'ISBN' => 'FAKEISBN' , 'price' => '4.5','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics'],
            ['user_id' => '1' , 'author_id' => '6' , 'comic_name' => 'zerocalcare' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "italiano" , 'quantity' => '1'  , 'ISBN' => 'FAKEISBN' , 'price' => '4.5','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'ShockDom'],
            ['user_id' => '1' , 'author_id' => '4' , 'comic_name' => 'Topolino 3286' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "italiano" , 'quantity' => '1'  , 'ISBN' => 'FAKEISBN' , 'price' => '4.5','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics'],
            ['user_id' => '1' , 'author_id' => '4' , 'comic_name' => 'Topolino 3287' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "italiano" , 'quantity' => '1'  , 'ISBN' => 'FAKEISBN' , 'price' => '4.5','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics'],
            ['user_id' => '1' , 'author_id' => '4' , 'comic_name' => 'Topolino 3288' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "italiano" , 'quantity' => '1'  , 'ISBN' => 'FAKEISBN' , 'price' => '4.5','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics'],
            ['user_id' => '1' , 'author_id' => '7' , 'comic_name' => 'TWD 1' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "Other" , 'quantity' => '1'  , 'ISBN' => 'FAKEISBN' , 'price' => '6.0','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Saldapress'],
            ['user_id' => '1' , 'author_id' => '7' , 'comic_name' => 'TWD 2' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "Other" , 'quantity' => '1'  , 'ISBN' => 'FAKEISBN' , 'price' => '6.0','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Saldapress'],
            ['user_id' => '1' , 'author_id' => '7' , 'comic_name' => 'TWD 3' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "Other" , 'quantity' => '1'  , 'ISBN' => 'FAKEISBN' , 'price' => '6.0','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Saldapress'],
            ['user_id' => '1' , 'author_id' => '7' , 'comic_name' => 'TWD 4' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "Other" , 'quantity' => '1'  , 'ISBN' => 'FAKEISBN' , 'price' => '6.0','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Saldapress'],
            ['user_id' => '1' , 'author_id' => '7' , 'comic_name' => 'TWD 5' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "Other" , 'quantity' => '1'  , 'ISBN' => 'FAKEISBN' , 'price' => '6.0','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Saldapress'],
            ['user_id' => '1' , 'author_id' => '7' , 'comic_name' => 'TWD 6' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "Other" , 'quantity' => '1'  , 'ISBN' => 'FAKEISBN' , 'price' => '6.0','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Saldapress'],
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
