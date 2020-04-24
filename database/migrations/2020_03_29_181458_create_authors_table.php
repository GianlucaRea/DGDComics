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
            ['name_author' => 'Stan' , 'surname_author' => 'Lee' , 'nationality' => 'America' ],
            ['name_author' => 'Walt' , 'surname_author' => 'Disney' , 'nationality' => 'America' ],
            ['name_author' => 'Malcolm' , 'surname_author' => 'Wheeler' , 'nationality' => 'America' ],
            ['name_author' => 'Michele' , 'surname_author' => 'Rech' , 'nationality' => 'Italia' ],
            ['name_author' => 'Robert' , 'surname_author' => 'Kirkman' , 'nationality' => 'America' ],
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
