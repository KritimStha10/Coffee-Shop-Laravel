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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('subcat_id');
            $table->unsignedBigInteger('productbrand_id');
            $table->text('description')->nullable();;
            $table->float('price');
            $table->string('image');
            $table->float('discount');
            $table->string('size');
            $table->enum('condition',['default','new','hot'])->default('default');
            $table->integer('stock');
            $table->enum('status',['0','1','2'])->default('1');

            $table->foreign('cat_id')->references('id')->on('category');
            $table->foreign('subcat_id')->references('id')->on('subcategories');
            $table->foreign('productbrand_id')->references('id')->on('product_brands');
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
};
