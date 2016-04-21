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
            $table->string('code', 10)->unique();
            $table->string('description', 100);
            $table->integer('stock');
            $table->decimal('price',12,2);
            $table->integer('department_id')->unsigned();
            $table->string('category', 50)->nullable();
            $table->string('brand', 50)->nullable();
            $table->string('img_url')->nullable();
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
