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

        DB::unprepared('
            CREATE TRIGGER triggerModRecensione AFTER UPDATE ON `reviews` FOR EACH ROW
                BEGIN
                    IF NEW.stars > OLD.stars THEN
                        UPDATE rankings SET stars_number = (stars_number + (NEW.stars - OLD.stars)) WHERE user_id = (select comics.user_id from comics WHERE id = NEW.comic_id);
                        UPDATE rankings SET avg_stars = stars_number / feedback_number WHERE user_id = (select comics.user_id from comics WHERE id = NEW.comic_id);
                    ELSEIF NEW.stars < OLD.stars THEN
                        UPDATE rankings SET stars_number = (stars_number - ( OLD.stars - NEW.stars)) WHERE user_id = (select comics.user_id from comics WHERE id = NEW.comic_id);
                        UPDATE rankings SET avg_stars = stars_number / feedback_number WHERE user_id = (select comics.user_id from comics WHERE id = NEW.comic_id);
                    END IF;
                END 
        ');

        DB::unprepared('
            CREATE TRIGGER triggerDelRecensione AFTER DELETE ON `reviews` FOR EACH ROW
                BEGIN
                    UPDATE rankings SET stars_number = stars_number - OLD.stars WHERE user_id = (select comics.user_id from comics WHERE id = OLD.comic_id);
                    UPDATE rankings SET feedback_number = feedback_number - 1 WHERE user_id = (select comics.user_id from comics WHERE id = OLD.comic_id);
                END
        ');

        DB::table('reviews')->insert([
            ['comic_id' => '26' , 'user_id' => '3' , 'review_title' => 'Il mio amato Peter Parker' , 'review_text' => 'Il miglior spiderman che abbia mai letto! Super Consigliato' , 'stars' => '5'],
            ['comic_id' => '28' , 'user_id' => '3'  , 'review_title' => 'Batman Alla riscossa' , 'review_text' => 'Un batman ritrovato, non nuovo ma ritrovato , finalmente la dc torna alle origini' , 'stars' => '4 '],
            ['comic_id' => '34' , 'user_id' => '3'  , 'review_title' => 'Mi aspettavo di più' , 'review_text' => 'Vista la sua fama pensavo ad un manga più avvincente, ma non adoto gli horror' , 'stars' => '2'],
            ['comic_id' => '13' , 'user_id' => '3'  , 'review_title' => 'Il gigante verde spento' , 'review_text' => 'Un hulk troppo stilizzato che non rispecchia le origini del personaggio' , 'stars' => '3'],
            ['comic_id' => '14' , 'user_id' => '3'  , 'review_title' => 'Thor martella di nuovo' , 'review_text' => 'Il figlio di Odino è incredibile in questo fumetto , strepitoso. 5 stelle super meritate' , 'stars' => '5'],
            ['comic_id' => '2' , 'user_id' => '3'  , 'review_title' => 'Tutti vorrebbero essere Stark' , 'review_text' => 'Il fumetto originale che parla della nascita di Iron Man , strepitoso da leggere con gli acdc in sottofondo' , 'stars' => '5'],
            ['comic_id' => '25' , 'user_id' => '3'  , 'review_title' => 'Un Iron man mai visto , in peggio ' , 'review_text' => 'In questo fumetto Tony Stark è diventato troppo potente, talmente potente da essere il cattivo.' , 'stars' => '2'],
            ['comic_id' => '3' , 'user_id' => '3'  , 'review_title' => 'Paperino è il mio alter ego nei fumetti' , 'review_text' => 'Sempre divertente un fumetto per tornare fanciulli e rillasarsi un po' , 'stars' => '5'],
            ['comic_id' => '16' , 'user_id' => '3'  , 'review_title' => 'Topolino Happy Birthday' , 'review_text' => 'Una super collection per celebrare il compleanno di topolino. Molto carino , consigliato!!' , 'stars' => '5'],
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
