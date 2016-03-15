<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('description');
            $table->integer('stock');
            $table->decimal('price',12,2);
            $table->integer('department_id')->unsigned();
            $table->string('category');
            $table->string('brand');
            $table->string('img_url');
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
