<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicBoughtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comic_boughts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comic_id')->cascadeOnDelete();
            $table->integer('quantity');
            $table->double('price');
            $table->timestamp('date')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });

        DB::table('comic_boughts')->insert([

            ['comic_id' => '4' , 'quantity' => '2' , 'price' => '10' ],
            ['comic_id' => '3' , 'quantity' => '3' , 'price' => '10' ],
            ['comic_id' => '2' , 'quantity' => '4' , 'price' => '10' ],
            ['comic_id' => '8' , 'quantity' => '5' , 'price' => '10' ],
            ['comic_id' => '7' , 'quantity' => '1' , 'price' => '10' ],
            ['comic_id' => '3' , 'quantity' => '3' , 'price' => '10' ],
            ['comic_id' => '5' , 'quantity' => '4' , 'price' => '10' ],
            ['comic_id' => '1' , 'quantity' => '1' , 'price' => '10' ],
            ['comic_id' => '1' , 'quantity' => '1' , 'price' => '10' ],
            ['comic_id' => '1' , 'quantity' => '1' , 'price' => '10' ],
            ['comic_id' => '1' , 'quantity' => '1' , 'price' => '10' ],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comic_boughts');
    }
}
