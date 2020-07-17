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
            ['comic_id' => '2' , 'image_name' => 'IoSonoIronMan0.jpg', 'cover' => '1', 'imageNumber' => '0' ],
            ['comic_id' => '2' , 'image_name' => 'IoSonoIronMan1.jpg', 'cover' => '0', 'imageNumber' => '1' ],
            ['comic_id' => '2' , 'image_name' => 'IoSonoIronMan2.jpg', 'cover' => '0', 'imageNumber' => '2' ],
            ['comic_id' => '2' , 'image_name' => 'IoSonoIronMan3.jpg', 'cover' => '0', 'imageNumber' => '3' ],
            ['comic_id' => '3' , 'image_name' => 'T3219K0.jpg',  'cover' => '1', 'imageNumber' => '0' ],
            ['comic_id' => '3' , 'image_name' => 'T3219K1.jpg',  'cover' => '0', 'imageNumber' => '1' ],
            ['comic_id' => '3' , 'image_name' => 'T3219K2.jpg',  'cover' => '0', 'imageNumber' => '2' ],
            ['comic_id' => '4' , 'image_name' => 'Pippo0.jpg', 'cover' => '1', 'imageNumber' => '0' ],
            ['comic_id' => '4' , 'image_name' => 'Pippo1.jpg', 'cover' => '0', 'imageNumber' => '1' ],
            ['comic_id' => '5' , 'image_name' => 'SM0.jpg','cover' => '1', 'imageNumber' => '0' ],
            ['comic_id' => '5' , 'image_name' => 'SM1.jpg', 'cover' => '0', 'imageNumber' => '1' ],
            ['comic_id' => '5' , 'image_name' => 'SM2.jpg', 'cover' => '0', 'imageNumber' => '2' ],
            ['comic_id' => '5' , 'image_name' => 'SM3.jpg',  'cover' => '0', 'imageNumber' => '3' ],
            ['comic_id' => '6' , 'image_name' => 'BM0.jpg', 'cover' => '1', 'imageNumber' => '0' ],
            ['comic_id' => '6' , 'image_name' => 'BM1.jpg', 'cover' => '0', 'imageNumber' => '1' ],
            ['comic_id' => '6' , 'image_name' => 'BM2.jpg', 'cover' => '0', 'imageNumber' => '2' ],
            ['comic_id' => '6' , 'image_name' => 'BM3.jpg',  'cover' => '0', 'imageNumber' => '3' ],
            ['comic_id' => '7' , 'image_name' => 'Flash0.jpg', 'cover' => '1', 'imageNumber' => '0' ],
            ['comic_id' => '7' , 'image_name' => 'Flash1.jpg', 'cover' => '0', 'imageNumber' => '1' ],
            ['comic_id' => '8' , 'image_name' => 'OP1.jpg' ,  'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '9' , 'image_name' => 'OP2.jpg' ,  'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '10' , 'image_name' => 'OP3.jpg'  , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '11' , 'image_name' => 'OP4.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '12' , 'image_name' => 'OP5.jpg', 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '13' , 'image_name' => 'H1.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '14' , 'image_name' => 'T1.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '15' , 'image_name' => 'ZCpizze0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '15' , 'image_name' => 'ZCpizze1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '15' , 'image_name' => 'ZCpizze2.jpg' , 'cover' => '0', 'imageNumber' => '2'],
            ['comic_id' => '15' , 'image_name' => 'ZCpizze3.jpg' , 'cover' => '0', 'imageNumber' => '3'],
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
            ['comic_id' => '26' , 'image_name' => 'AS0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '26' , 'image_name' => 'AS1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '26' , 'image_name' => 'AS2.jpg' , 'cover' => '0', 'imageNumber' => '2'],
            ['comic_id' => '26' , 'image_name' => 'AS3.jpg' , 'cover' => '0', 'imageNumber' => '3'],
            ['comic_id' => '27' , 'image_name' => 't2550.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '27' , 'image_name' => 't2551.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '27' , 'image_name' => 't2552.jpg' , 'cover' => '0', 'imageNumber' => '2'],
            ['comic_id' => '27' , 'image_name' => 't2553.jpg' , 'cover' => '0', 'imageNumber' => '3'],
            ['comic_id' => '28' , 'image_name' => 'BT0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '28' , 'image_name' => 'BT1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '28' , 'image_name' => 'BT2.jpg' , 'cover' => '0', 'imageNumber' => '2'],
            ['comic_id' => '28' , 'image_name' => 'BT3.jpg' , 'cover' => '0', 'imageNumber' => '3'],
            ['comic_id' => '29' , 'image_name' => 'SUP0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '29' , 'image_name' => 'SUP1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '29' , 'image_name' => 'SUP2.jpg' , 'cover' => '0', 'imageNumber' => '2'],
            ['comic_id' => '29' , 'image_name' => 'SUP3.jpg' , 'cover' => '0', 'imageNumber' => '3'],
            ['comic_id' => '30' , 'image_name' => 'LV0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '30' , 'image_name' => 'LV1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '31' , 'image_name' => 'AQM0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '31' , 'image_name' => 'AQM1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '31' , 'image_name' => 'AQM2.jpg' , 'cover' => '0', 'imageNumber' => '2'],
            ['comic_id' => '31' , 'image_name' => 'AQM3.jpg' , 'cover' => '0', 'imageNumber' => '3'],
            ['comic_id' => '32' , 'image_name' => 'OPM0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '32' , 'image_name' => 'OPM1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '32' , 'image_name' => 'OPM2.jpg' , 'cover' => '0', 'imageNumber' => '2'],
            ['comic_id' => '33' , 'image_name' => 'kj0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '33' , 'image_name' => 'kj2.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '34' , 'image_name' => 'TKGH0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '34' , 'image_name' => 'TKGH1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '34' , 'image_name' => 'TKGH2.jpg' , 'cover' => '0', 'imageNumber' => '2'],
            ['comic_id' => '34' , 'image_name' => 'TKGH3.jpg' , 'cover' => '0', 'imageNumber' => '3'],
            ['comic_id' => '35' , 'image_name' => 'TKGHb0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '35' , 'image_name' => 'TKGHb1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '35' , 'image_name' => 'TKGHb2.jpg' , 'cover' => '0', 'imageNumber' => '2'],
            ['comic_id' => '35' , 'image_name' => 'TKGHb3.jpg' , 'cover' => '0', 'imageNumber' => '3'],
            ['comic_id' => '36' , 'image_name' => 'Par0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '36' , 'image_name' => 'Par1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '37' , 'image_name' => 'ladyoscar1.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '37' , 'image_name' => 'ladyoscar2.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '38' , 'image_name' => 'BNNF0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '38' , 'image_name' => 'BNNF1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '39' , 'image_name' => 'rat0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '39' , 'image_name' => 'rat1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '39' , 'image_name' => 'rat2.jpg' , 'cover' => '0', 'imageNumber' => '2'],
            ['comic_id' => '39' , 'image_name' => 'rat3.jpg' , 'cover' => '0', 'imageNumber' => '3'],
            ['comic_id' => '40' , 'image_name' => 'TLF0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '40' , 'image_name' => 'TLF1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '41' , 'image_name' => 'Bad1K0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '41' , 'image_name' => 'Bad1K1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '42' , 'image_name' => 'Bad2K0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '42' , 'image_name' => 'Bad2K1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '43' , 'image_name' => 'ZCA0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '43' , 'image_name' => 'ZCA1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '43' , 'image_name' => 'ZCA2.jpg' , 'cover' => '0', 'imageNumber' => '2'],
            ['comic_id' => '43' , 'image_name' => 'ZCA3.jpg' , 'cover' => '0', 'imageNumber' => '3'],
            ['comic_id' => '44' , 'image_name' => 'zero0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '44' , 'image_name' => 'zero1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '44' , 'image_name' => 'zero2.jpg' , 'cover' => '0', 'imageNumber' => '2'],
            ['comic_id' => '44' , 'image_name' => 'zero3.jpg' , 'cover' => '0', 'imageNumber' => '3'],
            ['comic_id' => '45' , 'image_name' => 'VFV0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '45' , 'image_name' => 'VFV1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '45' , 'image_name' => 'VFV2.jpg' , 'cover' => '0', 'imageNumber' => '2'],
            ['comic_id' => '45' , 'image_name' => 'VFV3.jpg' , 'cover' => '0', 'imageNumber' => '3'],
            ['comic_id' => '46' , 'image_name' => 'Corvo0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '46' , 'image_name' => 'Corvo1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '46' , 'image_name' => 'Corvo2.jpg' , 'cover' => '0', 'imageNumber' => '2'],
            ['comic_id' => '46' , 'image_name' => 'Corvo3.jpg' , 'cover' => '0', 'imageNumber' => '3'],
            ['comic_id' => '47' , 'image_name' => 'Tex1K0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '47' , 'image_name' => 'Tex1K1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '47' , 'image_name' => 'Tex1K2.jpg' , 'cover' => '0', 'imageNumber' => '2'],
            ['comic_id' => '47' , 'image_name' => 'Tex1K3.jpg' , 'cover' => '0', 'imageNumber' => '3'],
            ['comic_id' => '48' , 'image_name' => 'Tex2K0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '48' , 'image_name' => 'Tex2K1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '48' , 'image_name' => 'Tex2K2.jpg' , 'cover' => '0', 'imageNumber' => '2'],
            ['comic_id' => '48' , 'image_name' => 'Tex2K3.jpg' , 'cover' => '0', 'imageNumber' => '3'],
            ['comic_id' => '49' , 'image_name' => 'Tex3K0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '49' , 'image_name' => 'Tex3K1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '49' , 'image_name' => 'Tex3K2.jpg' , 'cover' => '0', 'imageNumber' => '2'],
            ['comic_id' => '49' , 'image_name' => 'Tex3K3.jpg' , 'cover' => '0', 'imageNumber' => '3'],
            ['comic_id' => '50' , 'image_name' => 'Belg0.jpg' , 'cover' => '1', 'imageNumber' => '0'],
            ['comic_id' => '50' , 'image_name' => 'Belg1.jpg' , 'cover' => '0', 'imageNumber' => '1'],
            ['comic_id' => '50' , 'image_name' => 'Belg2.jpg' , 'cover' => '0', 'imageNumber' => '2'],
            ['comic_id' => '50' , 'image_name' => 'Belg3.jpg' , 'cover' => '0', 'imageNumber' => '3'],
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
