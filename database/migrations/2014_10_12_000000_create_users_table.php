<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
            $table->string('partitaIva')->nullable();;
        });
        DB::table('users')->insert([
            ['name' => 'venditore' , 'surname' => 'scarso' , 'username' => 'VenditoreScarso' , 'age' => '22' , 'iva' => 'PARTITAIVA1111X' , 'phone_number' => '323456789' , 'email' => 'venditore.scarso@lalala.comma', 'password' => Hash::make('password2')],
            ['name' => 'venditore' , 'surname' => 'professionista' , 'username' => 'VenditoreProfessionista' , 'age' => '22' , 'iva' => 'PARTITAIVA2222X' , 'phone_number' => '321654987' , 'email' => 'venditore.professionista@lalala.comma', 'password' => Hash::make('password3')],
            ['name' => 'Daniele' , 'surname' => 'Fossemò' , 'username' => 'DanieleF198' , 'age' => '22' , 'iva' => 'PARTITAIVA0000X' , 'phone_number' => '123456789' , 'email' => 'daniele.fossemo@lalala.comma', 'password' => Hash::make('password')],
            ['name' => 'Gianluca' , 'surname' => 'Rea' , 'username' => 'gianrea' , 'age' => '22' , 'iva' => 'PARTITAIVA0001X' , 'phone_number' => '123654321' , 'email' => 'gianluca.rea@dgdcomics.com', 'password' => Hash::make('password')],
           // ['name' => 'Davide' , 'surname' => 'Ricci' , 'username' => 'Cronio' , 'age' => '21' , 'iva' => 'PARTITAIVA0000Y' , 'phone_number' => '3333333333' , 'email' => 'davide.ricci@fake.fke', 'password' => 'passuord'],
        ]);

        DB::table('users')->insert([
            ['name' => 'Admin' , 'surname' => 'Admin' , 'username' => 'admin' , 'age' => '50', 'email' => 'admin@dgdcomics.com', 'password' => Hash::make('admin')],

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
