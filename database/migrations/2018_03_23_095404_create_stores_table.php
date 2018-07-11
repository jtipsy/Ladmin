<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id')->comment('店铺id');
			$table->string("name",100)->comment('店铺名');
			$table->string("logo",100)->comment('店铺logo');
			$table->string("brand_name",50)->comment('品牌名');
			$table->integer("brand_id")->comment('品牌id');
			$table->integer("type")->comment('店铺类型：1直营店、2专营店、3综合店、4代理商');
			 $table->string("phone",11)->comment('店铺电话');
			$table->string("address",200)->comment('店铺地址');
			$table->text("describe")->comment('店铺描述');
			$table->integer("more1")->default(0)->comment('标签：售多地');
			$table->integer("more2")->default(0)->comment('标签：售本地');
			$table->integer("status")->comment("店铺状态：1开启/正常 2关闭 ");
            $table->integer("recommended")->default(2)->comment("推荐：1推荐 2否 ");
			$table->integer("view_count")->default(0)->comment("浏览数"); 
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
        Schema::drop('stores');
    }
}
