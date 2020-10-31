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
            $table->bigIncrements('id')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->Integer('price')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_available')->nullable();
            $table->enum('size',['SM','MD','LG'])->default('MD');
            $table->float('discounted')->nullable();
             $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('Categories')->onDelete('cascade');
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
