<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('username')->unique();
            $table->integer('age');
            $table->string('iva')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert([
            ['name' => 'Daniele' , 'surname' => 'Fossemò' , 'username' => 'DanieleF198' , 'age' => '22' , 'iva' => 'PARTITAIVA0000X' , 'phone_number' => '123456789' , 'email' => 'daniele.fossemo@lalala.comma', 'password' => 'password'],
           // ['name' => 'Davide' , 'surname' => 'Ricci' , 'username' => 'Cronio' , 'age' => '21' , 'iva' => 'PARTITAIVA0000Y' , 'phone_number' => '3333333333' , 'email' => 'davide.ricci@fake.fke', 'password' => 'passuord'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
