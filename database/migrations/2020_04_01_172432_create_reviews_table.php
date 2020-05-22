<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comic_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->text('review_title');
            $table->text('review_text');
            $table->float('stars');
            $table->timestamp('review_date');
        });
        DB::table('reviews')->insert([
            ['comic_id' => '1' , 'user_id' => '2' , 'review_title' => 'Bello' , 'review_text' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'stars' => '5'],
            ['comic_id' => '1' , 'user_id' => '3' , 'review_title' => 'Brutto' , 'review_text' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'stars' => '2'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
