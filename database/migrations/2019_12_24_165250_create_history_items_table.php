<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('history_id');
            $table->unsignedBigInteger('product_type_id');
            $table->unsignedBigInteger('count');
            $table->double('cost');
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
        Schema::dropIfExists('history_items');
    }
}
