<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('via');
            $table->integer('civico');
            $table->string('città');
            $table->integer('post_code');
            $table->text('other_info');
            $table->boolean('favourite');
        });
        DB::table('shipping_addresses')->insert([
            ['user_id' => '1', 'via' => 'le mani dal naso', 'civico' => '123', 'città' => 'Pescara', 'post_code' => '65123', 'other_info' => 'nothing', 'favourite' => '1']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_addresses');
    }
}
