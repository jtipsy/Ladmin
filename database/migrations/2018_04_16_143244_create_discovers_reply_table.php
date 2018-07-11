<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscoversReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discovers_reply', function (Blueprint $table) {
            $table->increments('id')->comment('id');
            $table->string("uid",100)->comment("绑定者回复者id");
            $table->integer("d_id")->comment("发现(供应)id，用于关联发现表使用");
			$table->string("content",150)->comment('内容');
			$table->integer("is_read")->default(0)->comment("0：未读 1：已读"); 
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
