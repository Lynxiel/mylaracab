<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cables_order', function (Blueprint $table) {
            $table->id('id')->autoIncrement();
            $table->bigInteger('order_id')->unsigned();
            $table->float('price');
            $table->float('quantity');
            $table->bigInteger('cable_id')->unsigned();
            $table->timestamps();

            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->foreign('cable_id')->references('cable_id')->on('cables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cables_order');
    }
};
