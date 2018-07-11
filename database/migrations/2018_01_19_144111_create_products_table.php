<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->increments('id');
                $table->string("thumb",100)->comment('缩略图');
                $table->string("name",100)->comment('产品名称');
				$table->integer("brand_id")->comment('品牌id');
                $table->string("brand_name",50)->comment('品牌名');
                $table->string("species",10)->comment('种类:1其他、2羊、3牛、4驼、5猪、6鸡、7鸭、8鹅、9鱼、10驴、11马');
                $table->integer("status")->default(1)->comment('状态 1：开启 2关闭 产品下架功能');
                $table->integer("recommended")->default(2)->comment('推荐状态 1：推荐 2否 ');
                $table->integer("level")->default(1)->comment('等级 1:普通 2：绿色 3：有机 4:无公害 5：原生态');
                $table->decimal('price',10, 2)->comment('价格');
                $table->integer("specifications")->comment('规格 1：件 2：袋 3：条 4：盒 5：箱 6：块 7：个 8：吨 9：卷 10：斤 11：公斤 12：g 13：kg');
                $table->string("label",50)->comment('标签');
				$table->text("describe")->comment('描述');
                $table->string("net_weight",10)->comment('净重');
                $table->string("atlas1",100)->comment('产品图集1');
                $table->string("atlas2",100)->comment('产品图集2');
                $table->string("atlas3",100)->comment('产品图集3');
                $table->string("atlas4",100)->comment('产品图集4');
                $table->string("Country_of_origin",100)->comment('原产地');
                $table->integer("cold")->default(0)->comment('运送方式 1：冷链');
                $table->integer("empty")->default(0)->comment('运送方式 2：空运');
                $table->integer("courier")->default(0)->comment('运送方式 3：快递');
                $table->string("Shipping_agency",50)->comment('运送机构');
                $table->integer("Selling_way")->comment('售卖方式 1：零售 2：批发');
                $table->integer("halal")->comment('是否清真 1：是 2：否');
                $table->string("varieties",50)->comment('品种');
                $table->string("Shelf_life",10)->comment('保质期');
                $table->string("Storage_way",20)->comment('储藏方式');
                $table->string("temperature",10)->comment('储藏温度');
                $table->string("warehouse_address",100)->comment('仓库地址');
                $table->string("Production_license_number",20)->comment('生产许可证编号');
                $table->string("Production_standard_no",20)->comment('生产标准号');
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
