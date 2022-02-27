<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table){
           $table->id();
           $table->timestamp('first_order_send_time');
           $table->integer('session_id');
           $table->integer('table_id');
           $table->json('staff');
           $table->integer('total_bill');
           $table->integer('discount');
           $table->integer('total_amount');
           $table->integer('excess_cash');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
