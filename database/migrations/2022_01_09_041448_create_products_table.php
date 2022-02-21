<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('brand_id')->unsigned();
            $table->integer('product_category_id')->unsigned();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->double('price', 16, 2);
            $table->integer('qty');
            $table->double('discount', 16, 2)->nullable();
            $table->double('weight', 16, 2)->nullable();
            $table->string('sku')->nullable();
            $table->boolean('featured');
            $table->string('tag')->nullable();
            $table->string('status');
            
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
