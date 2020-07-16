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
            $table->foreignId('comic_id')->constrained()->cascadeOnDelete();
            $table->text('image_name');
            $table->boolean('cover');
            $table->integer('imageNumber');
        });
        DB::table('images')->insert([
            ['comic_id' => '1' , 'image_name' => 'FMA1.jpg', 'cover' => '1', 'imageNumber' => '0' ],
            ['comic_id' => '1' , 'image_name' => 'FMA1b.jpg', 'cover' => '0', 'imageNumber' => '1' ],
            ['comic_id' => '1' , 'image_name' => 'FMA1c.jpg', 'cover' => '0', 'imageNumber' => '2' ],
            ['comic_id' => '1' , 'image_name' => 'FMA1d.jpg',  'cover' => '0', 'imageNumber' => '3' ],
            ['comic_id' => '2' , 'image_name' => 'IoSonoIronMan.jpg', 'cover' => '1', 'imageNumber' => '0' ],
            ['comic_id' => '3' , 'image_name' => 'T3219.jpg',  'cover' => '1', 'imageNumber' => '0' ],
            ['comic_id' => '4' , 'image_name' => 'Pippo.jpg', 'cover' => '1', 'imageNumber' => '0' ],
            ['comic_id' => '5' , 'image_name' => 'SM1.jpg','cover' => '1', 'imageNumber' => '0' ],
            ['comic_id' => '6' , 'image_name' => 'BM1.jpg', 'cover' => '1', 'imageNumber' => '0' ],
           ['comic_id' => '7' , 'image_name' => 'F1.jpg', 'cover' => '1', 'imageNumber' => '0' ],

            ['comic_id' => '8' , 'image_name' => 'OP1.jpg' ,  'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '9' , 'image_name' => 'OP2.jpg' ,  'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '10' , 'image_name' => 'OP3.jpg'  , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '11' , 'image_name' => 'OP4.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '12' , 'image_name' => 'OP5.jpg', 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '13' , 'image_name' => 'H1.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '14' , 'image_name' => 'T1.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '15' , 'image_name' => 'ZCpizze.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '16' , 'image_name' => 'T3286.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '17' , 'image_name' => 'T3287.jpg', 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '18' , 'image_name' => 'T3288.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '19' , 'image_name' => 'TWD1.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '20' , 'image_name' => 'TWD2.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '21' , 'image_name' => 'TWD3.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '22' , 'image_name' => 'TWD4.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '23' , 'image_name' => 'TWD5.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '24' , 'image_name' => 'TWD6.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '25' , 'image_name' => 'SIR.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '25' , 'image_name' => 'SIR1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '25' , 'image_name' => 'SIR2.jpg' , 'cover' => '0', 'imageNumber' => '2'],
            ['comic_id' => '25' , 'image_name' => 'SIR3.jpg' , 'cover' => '0', 'imageNumber' => '3'],
        ]); }

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
