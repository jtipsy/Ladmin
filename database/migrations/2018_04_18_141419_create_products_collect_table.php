<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsCollectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_collect', function (Blueprint $table) {
            $table->increments('id')->comment('id');
            $table->string("uid",100)->comment("收藏者id");
			$table->integer("product_id")->comment("被收藏的产品id"); 
			$table->integer("status")->default(1)->comment("0：取消收藏 1：加入收藏"); 
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
        //
    }
}
