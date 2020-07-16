<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comic_genre', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comic_id')->constrained()->onDelete('cascade');
            $table->foreignId('genre_id')->constrained()->onDelete('cascade');

            $table->unique(['comic_id','genre_id']);

        });

        DB::table('comic_genre')->insert([
            ['comic_id' => '1' , 'genre_id' => '1'],
            ['comic_id' => '1' , 'genre_id' => '2'],
            ['comic_id' => '1' , 'genre_id' => '3'],
            ['comic_id' => '2' , 'genre_id' => '8'],
            ['comic_id' => '3' , 'genre_id' => '12'],
            ['comic_id' => '4' , 'genre_id' => '12'],
            ['comic_id' => '5' , 'genre_id' => '8'],
            ['comic_id' => '6' , 'genre_id' => '8'],
            ['comic_id' => '7' , 'genre_id' => '8'],
            ['comic_id' => '8' , 'genre_id' => '1'],
            ['comic_id' => '8' , 'genre_id' => '3'],
            ['comic_id' => '9' , 'genre_id' => '1'],
            ['comic_id' => '9' , 'genre_id' => '3'],
            ['comic_id' => '10' , 'genre_id' => '1'],
            ['comic_id' => '10' , 'genre_id' => '3'],
            ['comic_id' => '11' , 'genre_id' => '1'],
            ['comic_id' => '11' , 'genre_id' => '3'],
            ['comic_id' => '12' , 'genre_id' => '1'],
            ['comic_id' => '12' , 'genre_id' => '3'],
            ['comic_id' => '13' , 'genre_id' => '8'],
            ['comic_id' => '14' , 'genre_id' => '8'],
            ['comic_id' => '15' , 'genre_id' => '5'],
            ['comic_id' => '16' , 'genre_id' => '12'],
            ['comic_id' => '17' , 'genre_id' => '12'],
            ['comic_id' => '18' , 'genre_id' => '12'],
            ['comic_id' => '19' , 'genre_id' => '9'],
            ['comic_id' => '19' , 'genre_id' => '13'],
            ['comic_id' => '20' , 'genre_id' => '9'],
            ['comic_id' => '20' , 'genre_id' => '13'],
            ['comic_id' => '21' , 'genre_id' => '9'],
            ['comic_id' => '21' , 'genre_id' => '13'],
            ['comic_id' => '22' , 'genre_id' => '9'],
            ['comic_id' => '22' , 'genre_id' => '13'],
            ['comic_id' => '23' , 'genre_id' => '9'],
            ['comic_id' => '23' , 'genre_id' => '13'],
            ['comic_id' => '24' , 'genre_id' => '9'],
            ['comic_id' => '24' , 'genre_id' => '13'],
            ['comic_id' => '25' , 'genre_id' => '8'],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comic_genre');
    }
}
