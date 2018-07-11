<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use App\Models\ActionAttributeTrait;

class VerifyCode extends Model
{
    use ActionAttributeTrait;

    protected $table = "verify_code";

    protected $fillable = [
        'id','code','mobile','status','created_at','	updated_at'
    ];
	
}
