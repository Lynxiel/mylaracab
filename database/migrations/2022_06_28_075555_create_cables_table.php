<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Group;

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
            $table->id()->unsigned();
            $table->integer('footage')->nullable();
            $table->string('title');
            $table->float('instock');
            $table->float('price');
            $table->float('coresize')->nullable();
            $table->integer('corecount')->nullable();
            $table->float('capacity')->nullable();
            $table->string('1ccode')->nullable()->unique();
            $table->string('1ctitle')->nullable();
            $table->boolean('active')->default(0);
            $table->timestamps();
            $table->foreignIdFor(Group::class);
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
