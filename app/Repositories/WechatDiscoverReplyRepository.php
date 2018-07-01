<?php

namespace App\Repositories;

use App\Models\WechatDiscoverReply;
use Mockery\CountValidator\Exception;
use Flash;

class WechatDiscoverReplyRepository {

	public function getField($id){
		$user = new WechatDiscoverReply();
        try{
			$users = $user->where('id','=',$id)->get();
        }catch (Exception $e){
            return 'not find Discover';
        }
		return $users;
	}
	
    public function store($request){
        $data = $request->all();
        $result = WechatDiscoverReply::create($data);
        if($result){
			return true;
		}
		return false;
    }

}