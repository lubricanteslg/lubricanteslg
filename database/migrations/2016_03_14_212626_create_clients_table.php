<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('business_type');
            $table->string('business_id');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('zone');
            $table->string('zone2');
            $table->integer('salesman_id')->unsigned()  ;
            $table->date('last_order');
            $table->timestamps();

            $table->foreign('salesman_id')->references('id')->on('salesmen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clients');
    }
}
