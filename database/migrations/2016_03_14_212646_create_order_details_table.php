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
             $table->string('product_code', 10);
             $table->string('product_desc');
             $table->tinyInteger('line');
             $table->smallInteger('qty');
             $table->decimal('price', 12, 2);
             $table->timestamps();

             $table->foreign('product_code')->references('code')->on('products');
             $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

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
