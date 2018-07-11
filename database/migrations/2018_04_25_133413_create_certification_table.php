<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certification', function (Blueprint $table) {
            $table->increments('id')->comment('认证id');
			$table->String("mobile",11)->comment('手机号');
			$table->string("uid")->comment('用户id');
			$table->string("business_license")->comment('营业执照');
			$table->integer("agent")->default(0)->comment('代销达人：0否 1是');
			$table->integer("Catering_customer")->default(0)->comment('餐饮客户：0否 1是');
			$table->integer("Corporate_client")->default(0)->comment('企业客户：0否 1是');
			$table->integer("Share_talent")->default(0)->comment('分享达人：0否 1是');
			$table->integer("Production_service")->default(0)->comment('生产服务：0否 1是');
			$table->integer("Brand")->default(0)->comment('品牌厂商：0否 1是');
			$table->integer("Cold_chain_logistic")->default(0)->comment('冷链物流：0否 1是');
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
