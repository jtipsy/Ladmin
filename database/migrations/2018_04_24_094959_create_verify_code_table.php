<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerifyCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verify_code', function (Blueprint $table) {
            $table->increments('id')->comment('id');
            $table->integer("code")->comment("验证码");
			$table->String("mobile",11)->comment("手机号"); 
			$table->integer("status")->comment("验证码状态：0未使用 1已使用"); 
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
