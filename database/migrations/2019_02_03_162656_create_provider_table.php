<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(TABLE_PROVIDERS, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->string('type');
            $table->unsignedInteger('status')->default(STATUS_ACTIVE_FLAG); // provider enable/disable

            $table->timestamps();
            $table->softDeletes();

            $table->index('name', 'index_provider_name');
            $table->index('description', 'index_provider_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(TABLE_PROVIDERS);
    }
}
