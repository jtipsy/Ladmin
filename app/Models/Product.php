<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use App\Models\ActionAttributeTrait;

class Product extends Model
{
    use ActionAttributeTrait;

    protected $table = "products";
	
	protected $action = "product/list";

    protected $fillable = [
        'id','thumb','name','brand_id','brand_name','species','status','recommended','level','price','specifications','label','describe','net_weight','atlas1','atlas2','atlas3','atlas4','Country_of_origin','cold','empty','courier','Shipping_method1','Shipping_method2','Shipping_method3','Shipping_agency','Selling_way','halal','varieties','Shelf_life','Storage_way','temperature','warehouse_address','Production_license_number','Production_standard_no','view_count','created_at','updated_at'
    ];
	
}
