<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table -> string('name');
            $table -> string('title');
            $table -> string('short_description') -> nullable();
            $table -> decimal('regular_price');
            $table -> string('SKU');
            $table -> string('subcategory');
            $table -> string('secondsub');
            $table -> decimal('discount');
            $table -> decimal('discountprice');
            $table ->enum('stock_status',['instock','outofstock']);
            $table -> unsignedInteger('quantity')-> default(10);
            $table->text('size');
            $table->text('pimage');
            $table -> string('color_id');
            $table -> string('occasion');
            $table ->  string('wishlist')-> default('0');
            $table -> bigInteger('category_id')->unsigned()->nullable();
            $table -> bigInteger('brand_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('products');
    }
}
