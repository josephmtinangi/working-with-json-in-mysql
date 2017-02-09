<?php

use Illuminate\Support\Facades\Schema;
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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('brand_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->json('attributes');

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade')->onUpdate('restrict');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('restrict');

            $table->index('brand_id');
            $table->index('category_id');

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
