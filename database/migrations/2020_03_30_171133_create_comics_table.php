<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('author_id')->constrained();
            $table->string('comic_name');
            $table->text('description');
            $table->string('type');
            $table->integer('quantity');
            $table->string('ISBN');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->float('price');
            $table->integer('discount')->default(0);
            $table->string('height')->nullable();
            $table->string('width')->nullable();;
            $table->string('length')->nullable();;
            $table->string('language');
            $table->string('publisher');
            $table->boolean('suggest')->default(0);
        });

        DB::table('comics')->insert([
            ['user_id' => '2' , 'author_id' => '1' , 'comic_name' => 'FMA 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p>' , 'type' => "shonen" , 'quantity' => '3'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'10','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Planet manga', 'suggest' => '1'],
            ['user_id' => '1' , 'author_id' => '3' , 'comic_name' => 'Iron Man 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "marvel" , 'quantity' => '5'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'10','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '1'],
            ['user_id' => '1' , 'author_id' => '4' , 'comic_name' => 'Topolino 3219' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "italiano" , 'quantity' => '6'  , 'ISBN' => '1234567890' , 'price' => '6.6','discount'=>'12','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '4' , 'comic_name' => 'Pippo 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "italiano" , 'quantity' => '7'  , 'ISBN' => '1234567890' , 'price' => '6.5','discount'=>'13','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '5' , 'comic_name' => 'Superman 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "dc" , 'quantity' => '13'  , 'ISBN' => '1234567890' , 'price' => '7.5','discount'=>'9','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '5' , 'comic_name' => 'Batman 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "dc" , 'quantity' => '13'  , 'ISBN' => '1234567890' , 'price' => '7.5','discount'=>'9','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '1'],
            ['user_id' => '1' , 'author_id' => '5' , 'comic_name' => 'Flash 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "dc" , 'quantity' => '13'  , 'ISBN' => '1234567890' , 'price' => '7.5','discount'=>'9','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '2' , 'author_id' => '2' , 'comic_name' => 'One Piece 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "shonen" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Planet manga', 'suggest' => '1'],
            ['user_id' => '2' , 'author_id' => '2' , 'comic_name' => 'One Piece 2' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "shonen" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Planet manga', 'suggest' => '0'],
            ['user_id' => '2' , 'author_id' => '2' , 'comic_name' => 'One Piece 3' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "shonen" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Planet manga', 'suggest' => '0'],
            ['user_id' => '2' , 'author_id' => '2' , 'comic_name' => 'One Piece 4' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "shonen" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Planet manga', 'suggest' => '0'],
            ['user_id' => '2' , 'author_id' => '2' , 'comic_name' => 'One Piece 5' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "shonen" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Planet manga', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '3' , 'comic_name' => 'Hulk 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "marvel" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '3' , 'comic_name' => 'Thor 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "marvel" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '2' , 'author_id' => '6' , 'comic_name' => 'zerocalcare' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "italiano" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'ShockDom', 'suggest' => '1'],
            ['user_id' => '1' , 'author_id' => '4' , 'comic_name' => 'Topolino 3286' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "italiano" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '4' , 'comic_name' => 'Topolino 3287' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "italiano" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '4' , 'comic_name' => 'Topolino 3288' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "italiano" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '4.5','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '7' , 'comic_name' => 'The Walking Dead 1' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "Other" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '6.0','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Saldapress', 'suggest' => '1'],
            ['user_id' => '1' , 'author_id' => '7' , 'comic_name' => 'The Walking Dead 2' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "Other" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '6.0','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Saldapress', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '7' , 'comic_name' => 'The Walking Dead 3' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "Other" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '6.0','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Saldapress', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '7' , 'comic_name' => 'The Walking Dead 4' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "Other" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '6.0','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Saldapress', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '7' , 'comic_name' => 'The Walking Dead 5' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "Other" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '6.0','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Saldapress', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '7' , 'comic_name' => 'The Walking Dead 6' , 'description' => '<p>Just a description, this is a try, so sorry but I do not make a serious description</p> ' , 'type' => "Other" , 'quantity' => '1'  , 'ISBN' => '1234567890' , 'price' => '6.0','discount'=>'0' ,'height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Saldapress', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '3' , 'comic_name' => 'Superior Iron Man' , 'description' => '<p>Qual è il prezzo della perfezione? Quanto sareste disposti a pagare? Vuoi essere bello, intelligente, in forma, immortale... in una parola, superiore? Tony Stark ha quello che vuoi - una nuova versione del virus Extremis pronta per essere lanciata a San Francisco. Però il costo sarà altissimo! Ma Daredevil non condivide la visione di Stark - sarà in grado di guidare la rivolta contro questo nuovo, Superior Iron Man?</p> ' , 'type' => "marvel" , 'quantity' => '16'  , 'ISBN' => '1234567845' , 'price' => '5.0','discount'=>'0' ,'height'=>'9' , 'width' => '9' , 'length' => '12','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '3' , 'comic_name' => 'Spider-Man 1' , 'description' => '<p>Le storie da cui tutto ebbe inizio. Le storie che ci fecero capire che “da grandi poteri derivano grandi responsabilità”, presentate qui per la prima volta in una versione nuova di zecca! Ecco il primo appuntamento con i “Marvel Masterworks”, dedicato all’Uomo Ragno. Classiche avventure che hanno fatto la storia della Marvel Comics, scritte da Stan Lee, disegnate da Steve Ditko e Jack Kirby</p> ' , 'type' => "marvel" , 'quantity' => '16'  , 'ISBN' => '1234565845' , 'price' => '5.3','discount'=>'15' ,'height'=>'9' , 'width' => '9' , 'length' => '12','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '1'],
            ['user_id' => '1' , 'author_id' => '3' , 'comic_name' => 'Thor 255' , 'description' => '<p>Nella sua ricerca per trovare Odino, Thor dovrà combattere attraverso gli Uomini di pietra di Saturno!</p> ' , 'type' => "marvel" , 'quantity' => '6'  , 'ISBN' => '1254565845' , 'price' => '3.3','discount'=>'5' ,'height'=>'9' , 'width' => '9' , 'length' => '12','language'=>'inglese','publisher' => 'Panini comics', 'suggest' => '1'],
            ['user_id' => '1' , 'author_id' => '5' , 'comic_name' => 'Batman: Io sono Gotham' , 'description' => '<p>Parte della graphic novel del volume uno più acclamata dalla critica, la più venduta e tutta nuova, DC Universe Rebirth</p> ' , 'type' => "dc" , 'quantity' => '3'  , 'ISBN' => '1232567890' , 'price' => '5.5','discount'=>'20','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '1'],
            ['user_id' => '1' , 'author_id' => '5' , 'comic_name' => 'Superman: Figlio di Superman' , 'description' => '<p>Quando l\'Uomo d\'acciaio morì difendendo la sua casa adottiva, sembrò che lo spirito di verità e giustizia che rappresentava fosse estinto per sempre. Ma a guardare da fuori c\'era un altro Superman - più vecchio, più saggio, più esperto - con sua moglie, Lois Lane, e il loro figlio, Jonathan Kent.</p> ' , 'type' => "dc" , 'quantity' => '12'  , 'ISBN' => '1232267890' , 'price' => '3.7','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '5' , 'comic_name' => 'Lanterna Verde 1' , 'description' => '<p>La paura ha un colore. Si tratta del raccapricciante bagliore del giallo, controllato dal totalitarismo del tiranno Sinestro e dalle sue Lanterne Gialle. E ora l\'intero universo si abbevera alla sua sinistra luce. Oa, la casa dei Guardiani e del loro Corpo delle Lanterne Verdi, non esiste più. Al suo posto, al centro dell\'universo, orbita Mondoguerra, casa base di Sinestro. Le Lanterne Verdi sono svanite, lasciando che nessuno si opponga al regno del terrore di Sinestro. Nessuno, eccetto l\'ultima Lanterna: Hal Jordan. Convinto di aver commesso crimini di cui invece non ha colpa, reduce dall\'essere diventato un essere di solo pensiero e volontà, Hal deve ora tornare per riformare il Corpo e liberare tutti dal pugno d\'acciaio del suo a rcinemico. La parola di Sinestro è legge... ma Hal Jordan è il trasgressore per antonomasia!</p> ' , 'type' => "dc" , 'quantity' => '7'  , 'ISBN' => '1634567890' , 'price' => '6.6','discount'=>'10','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '0'],
            ['user_id' => '1' , 'author_id' => '5' , 'comic_name' => 'Aquaman 1: Acque Silenti' , 'description' => '<p>Ha perso il suo regno. Ha perso la memoria. Potrebbe anche aver perso la testa. È Arthur Curry, ex re di Atlantide, membro fondatore della Justice League ... e non ha idea di dove si trovi, come sia arrivato lì ... o come fuggire.</p> ' , 'type' => "dc" , 'quantity' => '5'  , 'ISBN' => '1634567800' , 'price' => '4.6','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Panini comics', 'suggest' => '1'],
            ['user_id' => '2' , 'author_id' => '8' , 'comic_name' => 'One Punch Man 1' , 'description' => '<p>L’attesa è finalmente finita… approda in Italia la serie cult realizzata da one e Yusuke murata! Un enorme successo commerciale che ha dato vita a una delle serie animate più seguite degli ultimi anni!</p> ' , 'type' => "seinen" , 'quantity' => '20'  , 'ISBN' => '1639567800' , 'price' => '5','discount'=>'0','height'=>'8' , 'width' => '9' , 'length' => '11','language'=>'italiano','publisher' => 'Planet manga', 'suggest' => '0'],
            ['user_id' => '2' , 'author_id' => '9' , 'comic_name' => 'L\'ospite indesiderato. Kiseiju: 1', 'description' => '<p>Shinichi Izumi è un ragazzo di diciassette anni che vive con suo padre e sua madre in un quartiere tranquillo di Tokyo. Una notte però degli alieni parassiti, dalle sembianze molto simili a quelle dei vermi, invadono la Terra con lo scopo di entrare nel corpo degli esseri umani attraverso naso ed orecchie, in modo da raggiungere il loro cervello e prenderne il controllo.</p> ' , 'type' => "seinen" , 'quantity' => '10'  , 'ISBN' => '1649567801' , 'price' => '4.8','discount'=>'10','height'=>'10' , 'width' => '10' , 'length' => '10','language'=>'italiano','publisher' => 'Planet manga', 'suggest' => '0'],
            ['user_id' => '2' , 'author_id' => '10' , 'comic_name' => 'Tokyo Ghoul 1', 'description' => '<p>Un nuovo grandissimo successo manga che sta spopolando in Giappone e anche in Europa! Il ghoul è un personaggio della tradizione fantastica. Lo si ritrova ne “Le Mille e una notte” e in altri miti del folklore occidentale. È un mostro che si nutre di cadaveri cacciati nei cimiteri e che, usando la magia nera, assorbe le forze delle sue vittime. Ora questi mostri stanno serpeggiando per le strade di Tokyo. E un adolescente tormentato andrà loro incontro, senza sapere che in questo modo comprometterà definitivamente il proprio destino</p> ' , 'type' => "seinen" , 'quantity' => '10'  , 'ISBN' => '1640567801' , 'price' => '5.8','discount'=>'15','height'=>'10' , 'width' => '12' , 'length' => '10','language'=>'italiano','publisher' => 'Planet manga', 'suggest' => '0'],
            ['user_id' => '2' , 'author_id' => '10' , 'comic_name' => 'Tokyo Ghoul 2', 'description' => '<p>Continua il nuovo grandissimo successo manga che sta spopolando in giappone e anche in Europa! Il ghoul è un personaggio della tradizione fantastica. È un mostro che si nutre di cadaveri cacciati nei cimiteri e che, usando la magia nera, assorbe le forze delle sue vittime. Ora questi mostri stanno serpeggiando per le strade di Tokyo. </p> ' , 'type' => "seinen" , 'quantity' => '10'  , 'ISBN' => '1640567802' , 'price' => '5.8','discount'=>'15','height'=>'10' , 'width' => '12' , 'length' => '10','language'=>'italiano','publisher' => 'Planet manga', 'suggest' => '0'],
            ['user_id' => '2' , 'author_id' => '11' , 'comic_name' => 'Ristorante Paradiso', 'description' => '<p>Forse tra le opere che hanno fatto conoscere Natsume Ono al pubblico giapponese, "Ristorante Paradiso" è uno slice of life incentrato su Casetta dell\'Orso, un piccolo ristorante romano attorno al quale gravita un caleidoscopio di personaggi particolari.</p> ' , 'type' => "josei" , 'quantity' => '15'  , 'ISBN' => '1642347802' , 'price' => '4.8','discount'=>'0','height'=>'10' , 'width' => '10' , 'length' => '10','language'=>'italiano','publisher' => 'Planet manga', 'suggest' => '0'],
            ['user_id' => '2' , 'author_id' => '12' , 'comic_name' => 'Lady Oscar. Le rose di Versailles: 6', 'description' => '<p>A seguito di un ammutinamento di alcuni soldati della guardia nazionale, Oscar si rende tristemente conto dell\'inconcepibile stato di miseria in cui versa il popolo francese. A Parigi cominciano a verificarsi atti di insurrezione cittadina; Oscar è stremata dagli impegni quando il generale Jarjayes, suo padre, le presenta una proposta di matrimonio. Venendolo a sapere, André si strugge per la propria differenza di ceto...</p> ' , 'type' => "josei" , 'quantity' => '15'  , 'ISBN' => '1642347802' , 'price' => '4.4','discount'=>'10','height'=>'10' , 'width' => '10' , 'length' => '10','language'=>'italiano','publisher' => 'Planet manga', 'suggest' => '0'],
            ['user_id' => '2' , 'author_id' => '13' , 'comic_name' => 'Banana Fish: 3', 'description' => '<p>Attento alle verità che vuoi conoscere... Una volta che guardi in faccia l\'incubo, potresti non risvegliarti mai più. Ash Lynx è a Los Angeles, dove si cela il segreto di Banana Fish, mentre su di lui cala l\'ombra oscura dell\'ossessione di un uomo. È in arrivo una notte che non sarà dimenticata</p> ' , 'type' => "shojo" , 'quantity' => '5'  , 'ISBN' => '1642356202' , 'price' => '3.2','discount'=>'0','height'=>'5' , 'width' => '5' , 'length' => '8','language'=>'italiano','publisher' => 'Planet manga', 'suggest' => '0'],
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics');
    }
}
