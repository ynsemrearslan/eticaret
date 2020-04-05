<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BasketElements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basket-elements', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('basket_id');
          $table->unsignedBigInteger('product_id');
          $table->integer('quantity');
          $table->integer('price');
          $table->foreign('basket_id')->references('id')->on('basket');
          $table->foreign('product_id')->references('id')->on('products');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basket-elements');
    }
}
