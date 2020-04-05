<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->unsignedBigInteger('category_id');
          $table->integer('status')->default(0);
          $table->integer('price');
          $table->integer('stock');
          $table->string('photo');
          $table->longText('description');
          $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('products');
    }
}
