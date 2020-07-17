<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('payment_method_id')->constrained();
            $table->foreignId('shipping_address_id')->constrained();
            $table->double('total');
            $table->timestamp('date')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
        DB::table('orders')->insert([
            ['user_id' => '3', 'payment_method_id' => '1', 'shipping_address_id' => '1', 'total'=>'55.1'],
            ['user_id' => '3', 'payment_method_id' => '2', 'shipping_address_id' => '2', 'total'=>'35.65'],
            ['user_id' => '3', 'payment_method_id' => '1', 'shipping_address_id' => '1', 'total'=>'20.31'],
            ['user_id' => '3', 'payment_method_id' => '2', 'shipping_address_id' => '2', 'total'=>'26.6'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
