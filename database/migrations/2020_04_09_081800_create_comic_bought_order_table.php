<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicBoughtOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comic_bought_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comic_bought_id')->constrained()->cascadeOnDelete();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
        });
        DB::table('comic_bought_order')->insert([
            ['comic_bought_id' => '1', 'order_id' => '1'],
            ['comic_bought_id' => '2', 'order_id' => '1'],
            ['comic_bought_id' => '3', 'order_id' => '1'],
            ['comic_bought_id' => '4', 'order_id' => '2'],
            ['comic_bought_id' => '5', 'order_id' => '2'],
            ['comic_bought_id' => '6', 'order_id' => '2'],
            ['comic_bought_id' => '7', 'order_id' => '2'],
            ['comic_bought_id' => '8', 'order_id' => '3'],
            ['comic_bought_id' => '9', 'order_id' => '3'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comic_bought_order');
    }
}
