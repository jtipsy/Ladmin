<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use App\Models\ActionAttributeTrait;

class Brand extends Model
{
    use ActionAttributeTrait;

    protected $table = "brands";
	
	protected $action = "brand/list";

    protected $fillable = [
        'id','logo','name','admin_id','admin_name','describe','enterprise','address','producer','phone','sheep','cow','pig','chicken','duck','goose','fish','camel','donkey','horse','other','level1','level2','level3','level4','level5','atlas1','atlas2','atlas3','atlas4','status','recommended','view_count','created_at','sort'
    ];
	
}
