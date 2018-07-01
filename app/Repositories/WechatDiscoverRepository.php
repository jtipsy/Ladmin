<?php

namespace App\Repositories;

use App\Models\WechatDiscover;
use App\Models\WechatDiscoverReply;
use Mockery\CountValidator\Exception;
use DB;
use Flash;

class WechatDiscoverRepository {

    /**
     * get all discovers
     * @DateTime 2017-12-27
     * @return   array
     */
    public function getAll(){
			$discovers = DB::table('wechat_user')
			->leftJoin('discovers','discovers.uid','=','wechat_user.openid')
			->where('discovers.category','=','1')
			->select('discovers.id','discovers.num','discovers.content','discovers.image','discovers.view_count','discovers.created_at','wechat_user.nickName','wechat_user.avatarUrl','wechat_user.country')
			->orderBy("discovers.id", "desc")
			->get();
		return $discovers;
    }
	
	public function getField($id){
        try{
			$reply = DB::table('discovers')
			->join('discovers_reply','discovers.id','=','discovers_reply.d_id')
			->join('wechat_user','discovers_reply.uid','=','wechat_user.openid')
			->where('discovers_reply.d_id','=',$id)
			->select('discovers.id','discovers.num','discovers.content as d_content','discovers.image','discovers.view_count','discovers.created_at as d_create_at','wechat_user.nickName','wechat_user.avatarUrl', 'discovers_reply.content as dr_content','discovers_reply.created_at as dr_create_at')
			->orderBy("id", "desc")
			->get();
        }catch (Exception $e){
            return 'not find Reply';
        }
		return $reply;
	}
	
	public function getmydiscover($uid){
		$WechatDiscover = new WechatDiscover();
        try{
		$WechatDiscovers = $WechatDiscover->select('id','num','content','image','view_count','created_at')->where('category','=','1')->where('uid','=',$uid)->orderBy("id", "desc")->get();
        }catch (Exception $e){
            return 'not find WechatDiscovers';
        }
		return $WechatDiscovers;
	}	
	public function getMyDiscoverReply($uid){
		$WechatDiscover = new WechatDiscover();
        try{
			$WechatDiscovers =DB::table('discovers')
			->join('discovers_reply','discovers.id','=','discovers_reply.d_id')
			->where('discovers_reply.uid','=',$uid)
			->where('discovers_reply.is_read','=','0')
			->select('discovers.content as d_content','discovers.view_count as d_view_count','discovers_reply.id','discovers_reply.d_id','discovers_reply.content as dr_content','discovers_reply.is_read')
			->orderBy("discovers_reply.id", "desc")
			->get();
        }catch (Exception $e){
            return 'not find WechatDiscovers';
        }
		return $WechatDiscovers;
	}
	public function InsertRead($id){
		$res = WechatDiscoverReply::whereId($id)->increment("is_read",1);
        return $res;
	}
	public function getCBLmessage($uid){
		$count = WechatDiscoverReply::where('is_read',0)->where('uid',$uid)->count();
		$certification = DB::table('certification')->where('uid',$uid)->count();
		return [
            'count' => $count,
            'certification' => $certification,
        ];
	}
	
    public function InsertDiscover($request){
        $data = $request->all();
        $result = WechatDiscover::create($data);
		if($result){
			return true;
		}
		return false;
    }

	/**
     * 更新文章浏览数
     *
     * @param $article_id
     * @return int
     */
    public function updateViewCount($id)
    {
        $res = WechatDiscover::whereId($id)->increment("view_count",mt_rand(1,3));
        return $res;
    }

}