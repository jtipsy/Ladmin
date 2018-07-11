<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WechatUser extends Model {

	protected $table = 'wechat_user';

	protected $fillable = ['id','openid','session_key','nickName','gender','province','city','country','avatarUrl'];

}
