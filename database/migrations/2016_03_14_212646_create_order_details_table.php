<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('order_details', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('order_id')->unsigned();
             $table->string('product_code');
             $table->string('product_desc');
             $table->tinyInteger('line');
             $table->smallInteger('qty');
             $table->decimal('price', 12, 2);
             $table->timestamps();

             $table->index('product_code');
             $table->foreign('order_id')->references('id')->on('orders');

         });

     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::drop('order_details');
     }
}
