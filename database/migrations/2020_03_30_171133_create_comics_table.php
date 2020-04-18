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
            $table->timestamp('insert_data');
            $table->float('price');
            $table->float('old_price');
            $table->string('publisher');
        });
        DB::table('comics')->insert([
            ['user_id' => '1' , 'author_id' => '1' , 'comic_name' => 'Fullmetal Alchemist: Brotherhood 1' , 'description' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'type' => "shonen" , 'quantity' => '1'  , 'ISBN' => 'FAKEISBN' , 'price' => '4.5','old_price'=>'10','publisher' => 'Planet manga'],
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
