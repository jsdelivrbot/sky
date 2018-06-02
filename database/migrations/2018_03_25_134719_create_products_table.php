<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_en');
            $table->string('name_ar');
            $table->longText('desc_ar');
            $table->longText('desc_en');
            $table->double('price');
            $table->double('shipping_fees')->nullable();
            $table->double('commission')->nullable();
            $table->double('quantity');
            $table->string('main_image');
            $table->string('video')->nullable();
            $table->integer('product_type_id');
            $table->integer('sub_category_id');
            $table->integer('category_id');
            $table->integer('limit');
            $table->boolean('published');
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
        Schema::dropIfExists('products');
    }
}
