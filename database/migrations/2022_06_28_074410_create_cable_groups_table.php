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
        Schema::create('cable_groups', function (Blueprint $table) {
            $table->bigInteger('cable_group_id')->autoIncrement()->unsigned();
            $table->timestamps();
            $table->string('title');
            $table->mediumText('description');
            $table->string('image')->nullable();
            $table->string('files')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cable_groups');
    }
};
