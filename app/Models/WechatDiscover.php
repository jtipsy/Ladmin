<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\WebActionAttributeTrait;

class WechatDiscover extends Model {
	
	use WebActionAttributeTrait;

	protected $table = 'discovers';
	
	protected $action = "admin/supply/list";

	protected $fillable = ['id','uid','nickName','avatarUrl','num','content','image','category','status','view_count','created_at'];

}
