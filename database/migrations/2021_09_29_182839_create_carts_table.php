<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table ->string('item_id');
            $table ->string('item_name');
            $table ->string('item_quantity');
            $table ->string('item_price');
            $table ->string('item_image');
            $table ->string('status');
            $table ->string('status2');
            $table ->string('from');
            $table ->string('to');
            $table ->string('message');
            $table ->string('box');
            $table ->string('card');
            $table ->string('type');
            $table ->text('font');
            $table ->string('user_id');
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
        Schema::dropIfExists('carts');
    }
}
