<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->text('notification_text');
            $table->boolean('state');
            $table->timestamp('date')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
        DB::table('notifications')->insert([
            ['user_id' => '3', 'notification_text' => 'notifica lungaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica corta', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica media ahahahahahah', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica lungeaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica corta', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica media ahahahahahah', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica lungoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica corta', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica media ahahahahahah', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica lunguaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica corta', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica media ahahahahahah', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica lungiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica corta', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica media ahahahahahah', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica lhwaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica corta', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica media ahahahahahah', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica wgagwagawaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica corta', 'state' => '0'],
            ['user_id' => '3', 'notification_text' => 'notifica media ahahahahahah', 'state' => '0'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
