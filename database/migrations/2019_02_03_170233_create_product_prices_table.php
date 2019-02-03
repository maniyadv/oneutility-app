<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(TABLE_PRODUCT_PRICES, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->float('price');

            $table->string('variation')->default(DEFAULT_PRICE_VARIATION);
            $table->string('currency')->default(DEFAULT_PRICE_CURRENCY);

            $table->timestamps();
            $table->softDeletes();

            $table->index('product_id', 'index_product_id');
            $table->index('variation', 'index_variation');
            $table->foreign('product_id')->references('id')->on(TABLE_PRODUCTS)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_prices');
    }
}
