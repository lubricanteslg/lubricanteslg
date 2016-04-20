<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->date('date');
            $table->integer('client_id')->unsigned();
            $table->tinyInteger('lines');
            $table->decimal('subtotal',12, 2);
            $table->decimal('tax',12, 2);
            $table->decimal('total',12, 2);
            $table->integer('salesman_id')->unsigned();
            $table->boolean('processed');
            $table->timestamps();


            $table->foreign('salesman_id')->references('id')->on('salesmen');
            $table->foreign('client_id')->references('id')->on('clients');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
