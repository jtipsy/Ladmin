<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\ActionAttributeTrait;

class ProductsCollect extends Model
{
    //店铺
    use ActionAttributeTrait;

    protected $table = "products_collect";

    protected $fillable = [
        'id','uid','product_id','status','created_at','updated_at'
    ];
}
