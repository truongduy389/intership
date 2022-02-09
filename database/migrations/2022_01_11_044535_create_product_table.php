<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
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

            $table->unsignedBigInteger('idSize')->nullable();
            $table->foreign('idSize')->references('id')->on('size')->onDelete('cascade');

            $table->unsignedBigInteger('idColor')->nullable();
            $table->foreign('idColor')->references('id')->on('color')->onDelete('cascade');

            $table->integer('cate_id');
            $table->string('name')->nullable();
            $table->string('price')->nullable();
            $table->string('image_before')->nullable();
            $table->string('image_after')->nullable();
            $table->string('default')->default(0);
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
