<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER triggerStarRecensione AFTER INSERT ON `reviews` FOR EACH ROW
                BEGIN
                    UPDATE rankings SET stars_number = stars_number + NEW.stars WHERE user_id = (select comics.user_id from comics WHERE id = NEW.comic_id);
                END'
        );
        DB::unprepared('
            CREATE TRIGGER triggerFeedbackRecensione AFTER INSERT ON `reviews` FOR EACH ROW
                BEGIN
                    UPDATE rankings SET feedback_number = feedback_number + 1 WHERE user_id = (select comics.user_id from comics WHERE id = NEW.comic_id);
                END'
        );
        DB::unprepared('
            CREATE TRIGGER triggerAvgStarsRecensione AFTER INSERT ON `reviews` FOR EACH ROW
                BEGIN
                    UPDATE rankings SET avg_stars = stars_number / feedback_number WHERE user_id = (select comics.user_id from comics WHERE id = NEW.comic_id);
                END'
        );
        DB::unprepared('
            CREATE TRIGGER triggerProducts AFTER INSERT ON `comic_boughts` FOR EACH ROW
                BEGIN
                    UPDATE rankings SET number_selling_products = number_selling_products + New.quantity WHERE user_id = (select comics.user_id from comics WHERE id = NEW.comic_id);
                END'
        );

        DB::table('reviews')->insert([
            ['comic_id' => '1' , 'user_id' => '2' , 'review_title' => 'Bello' , 'review_text' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'stars' => '5'],
            ['comic_id' => '1' , 'user_id' => '3' , 'review_title' => 'Brutto' , 'review_text' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'stars' => '2'],
            ['comic_id' => '2' , 'user_id' => '4' , 'review_title' => 'Bello' , 'review_text' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'stars' => '5'],
            ['comic_id' => '2' , 'user_id' => '3' , 'review_title' => 'Brutto' , 'review_text' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'stars' => '1'],
            ['comic_id' => '3' , 'user_id' => '4' , 'review_title' => 'Bello' , 'review_text' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'stars' => '4'],
            ['comic_id' => '4' , 'user_id' => '3' , 'review_title' => 'Brutto' , 'review_text' => 'Just a description, this is a try, so sorry but I do not make a serious description ' , 'stars' => '2'],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trigger');
    }
}
