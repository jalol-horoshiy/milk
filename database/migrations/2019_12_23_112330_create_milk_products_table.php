<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilkProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milk_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('milk_id')->index();
            $table->unsignedBigInteger('product_type_id')->index();
            $table->unsignedBigInteger('count');
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
        Schema::dropIfExists('milk_products');
    }
}
