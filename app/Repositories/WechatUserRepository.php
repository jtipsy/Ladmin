<?php

namespace App\Repositories;

use App\Models\WechatUser;

class WechatUserRepository {

	/*
    public function store($data)
    {
        $res = WechatUser::firstOrCreate($data);
        return $res;
    }
	*/
	public function getField($id){
		$user = new WechatUser();
        try{
			$users = $user->where('openid','=',$id)->get();
        }catch (Exception $e){
            return 'not find User';
        }
		return $users;
	}
	
    public function store($request)
    {
        $data = $request->all();
        $result = WechatUser::create($data);
        return $result;
    }
	
    public function update($request,$uid)
    {
		if($uid){
			$user = WechatUser::select('id')->where('openid','=',$uid)->get();
			foreach ($user as $val){
				$id = $val->id;
			}
		}
        $WechatUser = WechatUser::find($id);
        $data = $request->all();
        $result = $WechatUser->fill($data)->save();

        if($result){
            return true;
        } else{
            return false;

        }
    }

}