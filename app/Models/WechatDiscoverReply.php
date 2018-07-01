<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WechatDiscoverReply extends Model {

	protected $table = 'discovers_reply';

	protected $fillable = ['id','uid','d_id','content','view_count','created_at','updated_at'];

}
