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
        Schema::create(TABLE_PRODUCTS, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('provider_id');
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('name',        'index_product_name');
            $table->index('description', 'index_product_description');
            $table->index('provider_id', 'index_provider_id');
            $table->unique(['name', 'provider_id']);

            $table->foreign('provider_id')->references('id')->on(TABLE_PROVIDERS)->onDelete('cascade');
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
