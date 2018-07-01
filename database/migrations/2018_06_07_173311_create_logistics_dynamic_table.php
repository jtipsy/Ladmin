<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogisticsDynamicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistics_dynamic', function (Blueprint $table) {
            $table->increments('id')->comment('动态id');
			$table->string("nickName",50)->comment('用户昵称');
			$table->string("avatarUrl",200)->comment('用户头像');
			$table->string("shop_name",50)->comment('货物名称');
			$table->string("weight",10)->comment('货物重量');
			$table->string("delivery_address",200)->comment('发货地址');
			$table->string("shipping_address",200)->comment('收货地址');
			$table->integer("status")->default(1)->comment("发货状态：1未发货 2已发货");
            //$table->timestamps('created_at');
            //$table->timestamps('updated_at');
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
