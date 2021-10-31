<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('quantity')->nullable();
            $table->string('foodname')->nullable();
            $table->string('price')->nullable();
            $table->string('name')->nullable();
            $table->string('table')->nullable();
            $table->string('noted')->nullable();
            $table->string('status')->nullable();
            $table->string('bayar')->nullable();
            $table->string('kembalian')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
