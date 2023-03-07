<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allorders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('item_id');
            $table->string('item_name');
            $table->bigInteger('user_id')->unsigned();
            $table->decimal('item_price');
            $table->string('quantity');
            $table->string('type');
            $table->string('item_image');
            $table->string('status');
            $table->string('status2');
            $table->string('box_id')->nullable();
            $table->string('card')->nullable();
            $table->string('box_type')->nullable();
            $table->string('to')->nullable();
            $table->string('from')->nullable();
            $table->string('message')->nullable();
            $table->string('font')->nullable();
            $table->string('action');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('allorders');
    }
}
