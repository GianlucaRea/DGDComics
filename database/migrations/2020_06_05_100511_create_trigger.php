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
