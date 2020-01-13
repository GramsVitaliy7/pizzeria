<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDopingsSelectedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_dopings_selected_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_doping_id')->unsigned();
            $table->bigInteger('selected_product_id')->unsigned();
            $table->integer('amount');
            $table->timestamps();
            $table->foreign('product_doping_id')->references('id')
                ->on('product_dopings');
            $table->foreign('selected_product_id')->references('id')
                ->on('selected_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_dopings_selected_products');
    }
}
