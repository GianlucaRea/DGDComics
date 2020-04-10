<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->foreignId('comic_id')->constrained();
            $table->text('size');
            $table->text('format');
            $table->binary('image');
        });
        DB::table('images')->insert([
            ['comic_id' => '1' , 'size' => '175.75 Kb' ,'format' => 'jpg' , 'image' => '/public/img/comicsImages/FMA1.jpg'],
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
