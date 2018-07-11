<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use App\Models\ActionAttributeTrait;

class Certification extends Model
{
    use ActionAttributeTrait;

    protected $table = "certification";

    protected $fillable = [
        'id','mobile','uid','business_license','agent','Catering_customer','Corporate_client','Share_talent','Production_service','Brand','Cold_chain_logistic','created_at','	updated_at'
    ];
	
}
