<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\WebActionAttributeTrait;

class LogisticsDynamic extends Model
{
    //物流动态
    use WebActionAttributeTrait;

    protected $table = "logistics_dynamic";
	
	protected $action = "admin/logistics/dynamic";

    protected $fillable = [
        'id','nickName','avatarUrl','shop_name','weight','delivery_address','shipping_address','status','created_at','updated_at'
    ];
}
