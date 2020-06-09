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
            $table->String('name');
            $table->String('vendor');
            $table->integer('quantity');
            $table->double('price');
            $table->String('state');
            $table->timestamp('date')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
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
