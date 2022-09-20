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
        Schema::create('cables', function (Blueprint $table) {
            $table->id('cable_id')->autoIncrement();
            $table->bigInteger('cable_group_id')->unsigned();
            $table->integer('footage')->nullable();
            $table->string('title');
            $table->float('coresize')->nullable();
            $table->integer('corecount')->nullable();
            $table->float('capacity')->nullable();
            $table->float('instock');
            $table->float('price');
            $table->string('1ccode')->nullable();
            $table->string('1ctitle')->nullable();
            $table->boolean('active')->default(0);
            $table->timestamps();

            $table->foreign('cable_group_id')->references('cable_group_id')->on('cable_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cables');
    }
};
