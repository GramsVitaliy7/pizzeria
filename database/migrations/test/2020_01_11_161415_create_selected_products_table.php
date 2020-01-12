<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selected_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_variant_id')->unsigned();
            $table->integer('amount')->default(1);
            $table->timestamps();
            $table->foreign('product_variant_id')->references('id')
                ->on('product_variants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('selected_products');
    }
}
