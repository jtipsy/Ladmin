<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\WebActionAttributeTrait;

class WebStore extends Model
{
    //店铺
    use WebActionAttributeTrait;

    protected $table = "stores";
	
	protected $action = "37fb591be38db52dd1d5f04b689008f2";

    protected $fillable = [
        'id','name','logo','brand_name','brand_id','type','address','describe','more1','more2','phone','status','recommended','view_count','created_at'
    ];
}
