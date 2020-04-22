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
            $table->foreignId('user_id')->constrained();
            $table->foreignId('author_id')->constrained();
            $table->string('comic_name');
            $table->text('description');
            $table->string('type');
            $table->integer('quantity');
            $table->string('ISBN');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->float('price');
            $table->integer('discount');
            $table->integer('volume')->nullable();
            $table->string('dimensions');
            $table->string('language');
            $table->string('publisher');
        });
        DB::table('comics')->insert([
            ['user_id' => '1' , 'author_id' => '1' , 'comic_name' => 'Fullmetal Alchemist: Brotherhood 1' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "shonen" , 'quantity' => '1'  , 'ISBN' => 'FAKEISBN' , 'price' => '4.5','discount'=>'10','volume'=>'1','dimensions'=>'10x10x10','language'=>'italian','publisher' => 'Planet manga'],
            ['user_id' => '1' , 'author_id' => '1' , 'comic_name' => 'Iron Man' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "marvel" , 'quantity' => '5'  , 'ISBN' => 'FAKEISBN' , 'price' => '4.5','discount'=>'10','volume'=>'1','dimensions'=>'10x10x10','language'=>'italian','publisher' => 'Planet manga'],
            ['user_id' => '1' , 'author_id' => '1' , 'comic_name' => 'Topolino' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "italiano" , 'quantity' => '6'  , 'ISBN' => 'FAKEISBN' , 'price' => '6.6','discount'=>'12','volume'=>'1','dimensions'=>'10x10x10','language'=>'italian','publisher' => 'Planet manga'],
            ['user_id' => '1' , 'author_id' => '1' , 'comic_name' => 'Pippo' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "italiano" , 'quantity' => '7'  , 'ISBN' => 'FAKEISBN' , 'price' => '6.5','discount'=>'13','volume'=>'1','dimensions'=>'10x10x10','language'=>'italian','publisher' => 'Planet manga'],
            ['user_id' => '1' , 'author_id' => '1' , 'comic_name' => 'Superman' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "dc" , 'quantity' => '13'  , 'ISBN' => 'FAKEISBN' , 'price' => '7.5','discount'=>'9','volume'=>'1','dimensions'=>'10x10x10','language'=>'italian','publisher' => 'Planet manga'],
            ['user_id' => '1' , 'author_id' => '1' , 'comic_name' => 'Batman' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "dc" , 'quantity' => '13'  , 'ISBN' => 'FAKEISBN' , 'price' => '7.5','discount'=>'9','volume'=>'1','dimensions'=>'10x10x10','language'=>'italian','publisher' => 'Planet manga'],
            ['user_id' => '1' , 'author_id' => '1' , 'comic_name' => 'flash' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "dc" , 'quantity' => '13'  , 'ISBN' => 'FAKEISBN' , 'price' => '7.5','discount'=>'9','volume'=>'1','dimensions'=>'10x10x10','language'=>'italian','publisher' => 'Planet manga'],

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
