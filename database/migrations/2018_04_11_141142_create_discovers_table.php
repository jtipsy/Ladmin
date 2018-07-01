<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discovers', function (Blueprint $table) {
            $table->increments('id')->comment('id');
            $table->string("uid",100)->comment("绑定者发布id");
			$table->string("nickName",50)->comment('昵称');
			$table->string("avatarUrl",200)->comment('头像');
			$table->string("num",11)->comment('手机号');
			$table->string("content",150)->comment('内容');
			$table->string("image",250)->comment('图片URL');
			$table->integer("category")->default(1)->comment("类别：1供应 2求购");
			$table->integer("status")->default(1)->comment("状态：1未处理 2已处理");
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
        //
    }
}
