<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandsCollect extends Model
{
    protected $table = "brands_collect";

    protected $fillable = [
        'id','uid','brand_id','status','created_at','updated_at'
    ];
}
