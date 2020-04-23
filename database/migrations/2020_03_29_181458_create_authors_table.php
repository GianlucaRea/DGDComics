<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name_author');
            $table->string('surname_author');
            $table->string('nationality');
        });
        DB::table('authors')->insert([
            ['name_author' => 'Hiromu' , 'surname_author' => 'Arakawa' , 'nationality' => 'japan' ],
            ['name_author' => 'Eiichiro' , 'surname_author' => 'Oda' , 'nationality' => 'japan' ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
    }
}
