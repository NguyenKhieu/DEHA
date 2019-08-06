<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name',191);
            $table->string('anh',191)->nullable();
            $table->string('tomtat');
            $table->integer('danhgia');
            $table->integer('gia');
            $table->integer('id_type')->unsigned();
            $table->foreign('id_type')->references('id')->on('producttype')->onDelete('cascade');
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
        Schema::dropIfExists('product');
    }
}
