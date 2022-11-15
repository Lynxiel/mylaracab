<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Cable;
use App\Models\Order;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cable_order', function (Blueprint $table) {
            $table->foreignIdFor(Cable::class);
            $table->foreignIdFor(Order::class);
            $table->float('price');
            $table->float('quantity');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cable_order');
    }
};
