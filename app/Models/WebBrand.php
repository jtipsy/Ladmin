<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use App\Models\WebActionAttributeTrait;

class WebBrand extends Model
{
    use WebActionAttributeTrait;

    protected $table = "brands";
	
	protected $action = "37fb591be38db52dd1d5f04b689008f9";

    protected $fillable = [
        'id','logo','name','admin_id','admin_name','describe','enterprise','address','producer','phone','sheep','cow','pig','chicken','duck','goose','fish','camel','donkey','horse','other','level1','level2','level3','level4','level5','atlas1','atlas2','atlas3','atlas4','status','recommended','view_count','created_at','sort'
    ];
	
}
