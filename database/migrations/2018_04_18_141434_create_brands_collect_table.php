<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsCollectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands_collect', function (Blueprint $table) {
            $table->increments('id')->comment('id');
            $table->string("uid",100)->comment("收藏者id");
			$table->integer("brand_id")->comment("被收藏的品牌id"); 
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
