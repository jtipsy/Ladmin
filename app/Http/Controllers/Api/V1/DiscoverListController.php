<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\WechatDiscoverRepository;
use App\Http\Requests\WechatDiscoverRequest;
use Flash;

class DiscoverListController extends Controller
{
    /**
     * @api {get} /discover/index/37fb591be38db52dd1d5f04b689008f6 供应列表
     * @apiVersion 0.0.1
     * @apiName Discover-Index
     * @apiGroup Discover
     *
     * @apiSuccess {Int} id 供应id
     * @apiSuccess {String} nickName	发布者昵称
     * @apiSuccess {String} avatarUrl	发布者头像
     * @apiSuccess {String} num 电话
     * @apiSuccess {String} content 内容
     * @apiSuccess {String} image 图片
     * @apiSuccess {Int} view_count 浏览量
     * @apiSuccess {Timestamp} created_at 发布时间
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "获取供应列表成功",
     *       "data": {
     *           "id": 1,
     *           "nickName": 行走的唐僧肉,
     *           "avatarUrl": https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKqKTSTcsjLwNib8FnKXOict3d055d8YxMvRz1k5jP6jgvI5hDeibKhN8S,
     *           "num": 15034889912,
     *           "content": 这个世界不是因为你能做什么，而是你该做什么,
     *           "image": 20180328172856829.jpg,20180328172856829.jpg,20180328172856829.jpg,
     *           "view_count": 1
     *           "created_at": 2018-04-16 13:40:30
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 404,
     *       "msg": "请求失败",
     *       "data": false 
     *       
     *   }
     */
    public function index( WechatDiscoverRepository $repository){
        $discover = $repository->getAll();
		$Datas = array();
		foreach($discover as $val){
			$data = array();
			$data['id'] = $val['id'];
			$data['num'] = $val['num'];
			$data['nickName']	= $val['nickName'];
			$data['avatarUrl']	= $val['avatarUrl'];
			$data['content']	= $val['content'];
			$data['image'] = explode(',',$val['image']); 
			$data['view_count']	= $val['view_count'];
			$data['created_at']	= $val['created_at'];
			$Datas[]=$data;
			$id = $val['id'];
			$update = $repository->updateViewCount($id);
		}
		if($discover){
			return response()->json(['status_code'=>200,'msg'=>'获取供应成功！','data'=>$Datas]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'暂无数据','data'=>false]);
		}
				
    }
    /**
     * @api {get} /reply/list/37fb591be38db52dd1d5f04b689008f6?uid=openid&id=1 供应的详情
     * @apiVersion 0.0.1
     * @apiName Reply-List
     * @apiGroup Discover
     *
     * @apiParam (params) {String} uid  微信用户openid
     * @apiParam (params) {Int} id  供应id
     * @apiSuccess {Int} id 供应id
     * @apiSuccess {Int} num 供应者电话
     * @apiSuccess {String} d_content	供应的内容
     * @apiSuccess {String} image	供应的图片
	 * @apiSuccess {Int} view_count 供应的浏览量
	 * @apiSuccess {String} d_create_at	供应的发布时间
     * @apiSuccess {String} nickName	评论者昵称
     * @apiSuccess {String} avatarUrl	评论者头像
     * @apiSuccess {String} dr_content	评论者回复的内容
     * @apiSuccess {Timestamp} dr_create_at 评论者回复的时间
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "获取评论列表成功",
     *       "data": {
     *           "id": 1,
     *           "num": 15034889912,
     *           "d_content": 这个世界不是因为你能做什么，而是你该做什么,
     *           "image": 20180328172856829.jpg,20180328172856829.jpg,20180328172856829.jpg,
     *           "view_count": 185
     *           "d_create_at": 2018-04-17 13:54:02
	 *           "nickName": 行走的唐僧肉,
     *           "avatarUrl": https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKqKTSTcsjLwNib8FnKXOict3d055d8YxMvRz1k5jP6jgvI5hDeibKhN8S,
     *           "dr_content": 第一个回复供应的人
     *           "dr_created_at": 2018-04-17 17:24:59
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 403,
     *       "msg": "非法请求！"
     *   }
     */
	public function reply(WechatDiscoverRepository $repository){
		$uid = request('uid');
		$id = request('id');
		if(!$uid || !$id) {
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
		$update = $repository->updateViewCount($id);
		$Data = $repository->getField($id);
		if($Data){
			return response()->json(['status_code'=>200,'msg'=>'获取评论成功！','data'=>$Data]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'暂无数据','data'=>false]);
		}
		
	}
	
    /**
     * @api {get} /my/discover/index/37fb591be38db52dd1d5f04b689008f6?uid=openid 我的发布
     * @apiVersion 0.0.1
     * @apiName My-Discover-Index
     * @apiGroup Discover
     *
     * @apiParam (params) {String} uid  微信用户openid
     * @apiSuccess {Int} id 供应id
     * @apiSuccess {Int} num 供应者电话
     * @apiSuccess {String} content	供应的内容
     * @apiSuccess {String} image	供应的图片
	 * @apiSuccess {Int} view_count 供应的浏览量
	 * @apiSuccess {String} created_at	供应的发布时间
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "获取我的发布列表成功",
     *       "data": {
     *           "id": 1,
     *           "num": 15034889912,
     *           "content": 这个世界不是因为你能做什么，而是你该做什么,
     *           "image": 20180328172856829.jpg,20180328172856829.jpg,20180328172856829.jpg,
     *           "view_count": 185
     *           "created_at": 2018-04-17 13:54:02
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 403,
     *       "msg": "非法请求"
     *   }
     */
	public function mydiscover(WechatDiscoverRepository $repository){
		$uid = request('uid');
		if(!$uid) {
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
		$Data = $repository->getmydiscover($uid);
		$Datas = array();
		foreach($Data as $val){
			$dis = array();
			$dis['id'] = $val['id'];
			$dis['num'] = $val['num'];
			$dis['content'] = $val['content'];
			$dis['image'] = explode(',',$val['image']);
			$dis['view_count'] = $val['view_count'];
			$dis['month'] = $val['created_at']->format('m月');
			$dis['day'] = $val['created_at']->format('d');
			$Datas[] = $dis;
		}
		if($Datas){
			return response()->json(['status_code'=>200,'msg'=>'获取我的发布成功！','data'=>$Datas]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'暂无数据','data'=>false]);
		}
		
	}	
	
    /**
     * @api {get} /my/discover/reply/37fb591be38db52dd1d5f04b689008f6?uid=openid 消息列表
     * @apiVersion 0.0.1
     * @apiName My-Discover-Reply
     * @apiGroup Discover
     *
     * @apiParam (params) {String} uid  微信用户openid
	 * @apiSuccess {String} d_content  供应的内容
	 * @apiSuccess {Int} d_view_count 供应的浏览量
     * @apiSuccess {Int} id 评论id
     * @apiSuccess {Int} d_id 供应id
     * @apiSuccess {String} dr_content  评论的内容
     * @apiSuccess {Int} is_read	标记：0未读 1已读
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "获取未读消息列表成功",
     *       "data": {
     *           "d_content": 我是供应内容,
     *           "d_view_count": 179,
     *           "id": 5,
     *           "d_id": 3,
     *           "dr_content": 我是评论内容,
     *           "is_read": 0
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 403,
     *       "msg": "非法请求！"
     *   }
     */
	public function getMyDiscoverReply(WechatDiscoverRepository $repository){
		$uid = request('uid');
		if(!$uid) {
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
		$Data = $repository->getMyDiscoverReply($uid);
		if($Data){
			return response()->json(['status_code'=>200,'msg'=>'获取未读消息成功！','data'=>$Data]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'暂无数据','data'=>false]);
		}
		
	}
    /**
     * @api {get} /my/discover/reply/read/37fb591be38db52dd1d5f04b689008f6?uid=openid&id=1 标记已读
     * @apiVersion 0.0.1
     * @apiName My-Discover-Reply-Read
     * @apiGroup Discover
     *
     * @apiParam (params) {String} uid  微信用户openid
     * @apiParam (params) {Int} id  评论id
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "data": {
     *           "status_code": 200,
     *           "message": "标记成功"
     *           "data": 1
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 403,
     *       "msg": "非法请求！"
     *   }
     */
	public function InsertRead(WechatDiscoverRepository $repository){
		$uid = request('uid');
		$id = request('id');
		if(!$uid) {
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
		$Data = $repository->InsertRead($id);
		if($Data){
			return response()->json(['status_code'=>200,'msg'=>'标记成功','data'=>$Data]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'标记失败','data'=>false]);
		}
		
	}
	
    /**
     * @api {get} /my/certification/business_license/message/37fb591be38db52dd1d5f04b689008f6?uid=openid 认证-消息状态
     * @apiVersion 0.0.1
     * @apiName My-Certification-Business_License-Message
     * @apiGroup Discover
     *
     * @apiParam (params) {String} uid  微信用户openid
     * @apiSuccess {Int} count 消息数
     * @apiSuccess {Int} certification 认证数
     *
     * @apiSuccessExample 成功响应:
     *
     *   {  
	 *       "meta": {
     *           "status_code": 200,
     *           "message": "请求成功！"
     *           "data": {
     *               "count":1,
     *               "certification":1,
     *           }
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 403,
     *       "msg": "非法请求！"
     *       
     *   }
     */
	public function getCBLmessage(WechatDiscoverRepository $repository){
		$uid = request('uid');
		if(!$uid) {
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
		$Data = $repository->getCBLmessage($uid);
		if($Data){
			return response()->json(['status_code'=>200,'msg'=>'请求成功！','data'=>$Data]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'暂无数据','data'=>false]);
		}
		
	}

}
