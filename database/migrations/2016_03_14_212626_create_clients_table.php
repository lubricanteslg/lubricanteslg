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
            $table->string('code', 10);
            $table->string('name');
            $table->string('business_type', 2);
            $table->string('business_id');
            $table->string('address');
            $table->string('phone', 50);
            $table->string('email')->nullable();
            $table->string('zone_code', 10);
            $table->integer('salesman_id')->unsigned();
            $table->date('last_order')->nullable();
            $table->timestamps();

            $table->index('business_id');
            $table->index('code');
            $table->foreign('zone_code')->references('code')->on('zones');
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
