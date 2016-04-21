<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesmenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('salesmen', function (Blueprint $table) {
             $table->increments('id');
             $table->string('code')->unique();
             $table->integer('user_id')->unsigned();
             $table->string('name', 20);
             $table->string('phone', 20);
             $table->string('email', 100);
             $table->string('zone_code', 10);
             $table->date('last_order');

             $table->foreign('user_id')->references('id')->on('users');

         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('salesmen');
    }
}
