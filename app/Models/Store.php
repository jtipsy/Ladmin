<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\ActionAttributeTrait;

class Store extends Model
{
    //店铺
    use ActionAttributeTrait;

    protected $table = "stores";
	
	protected $action = "store/list";

    protected $fillable = [
        'id','name','logo','brand_name','brand_id','type','address','describe','more1','more2','phone','status','recommended','view_count','created_at'
    ];
}
