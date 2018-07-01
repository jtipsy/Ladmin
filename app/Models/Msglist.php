<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use App\Models\ActionAttributeTrait;

class Msglist extends Model
{
    use ActionAttributeTrait;

    protected $table = "msg_list";
	
	protected $action = "msg/sendlist";

    protected $fillable = [
        'id','openid','nickName','title','content','is_read','created_at','updated_at'
    ];
	
}
