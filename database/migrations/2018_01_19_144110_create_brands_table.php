<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('brands')) {
            Schema::create('brands', function (Blueprint $table) {
                $table->increments('id');
                $table->string("logo",100)->comment('LOGO');
                $table->string("name",100)->comment('品牌名称');
				$table->integer("admin_id")->comment('品牌管理员id');
                $table->string("admin_name",20)->comment('品牌管理员');
				$table->text("describe")->comment('描述');
                $table->string("enterprise",100)->comment('归属企业');
                $table->string("address",100)->comment('公司地址');
                $table->string("producer",20)->comment('核心生产地');
                $table->string("phone",20)->comment('客服电话');
                $table->integer("sheep")->default(0)->comment('0: 否 1: 是');
                $table->integer("cow")->default(0)->comment('0: 否 1: 是');
                $table->integer("pig")->default(0)->comment('0: 否 1: 是');
                $table->integer("chicken")->default(0)->comment('0: 否 1: 是');
                $table->integer("duck")->default(0)->comment('0: 否 1: 是');
                $table->integer("goose")->default(0)->comment('0: 否 1: 是');
                $table->integer("fish")->default(0)->comment('0: 否 1: 是');
                $table->integer("camel")->default(0)->comment('0: 否 1: 是');
                $table->integer("donkey")->default(0)->comment('0: 否 1: 是');
                $table->integer("horse")->default(0)->comment('0: 否 1: 是');
                $table->integer("other")->default(0)->comment('0: 否 1: 是');
                $table->integer("level1")->comment('1: 普通 ');
                $table->integer("level2")->comment('2：绿色 ');
                $table->integer("level3")->comment('3：有机');
                $table->integer("level4")->comment('4: 无公害');
                $table->integer("level5")->comment('5：原生态');
                $table->string("atlas1",100)->comment('品牌图集1');
                $table->string("atlas2",100)->comment('品牌图集2');
                $table->string("atlas3",100)->comment('品牌图集3');
                $table->string("atlas4",100)->comment('品牌图集4');
                $table->integer("status")->comment("品牌状态：1开启/正常 2关闭 ");
                $table->integer("recommended")->default(2)->comment("品牌推荐：1推荐 2否 ");
                $table->string("sort",5)->comment("按首字母排序：A,B,C,D");
                $table->integer("view_count")->default(0)->comment("浏览数");  
                $table->timestamps();
            });
        }
        
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
