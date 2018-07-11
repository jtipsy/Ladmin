<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsgListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msg_list', function (Blueprint $table) {
            $table->increments('id')->comment('消息id');
			$table->string("openid",100)->comment("微信openid");
			$table->string("nickName",50)->comment("昵称");
			$table->string("title",100)->comment('消息标题');
			$table->string("content",400)->comment('消息内容');
			$table->integer("is_read")->default(0)->comment('0：未读 1：已读');
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
