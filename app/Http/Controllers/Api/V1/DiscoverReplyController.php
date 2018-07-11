<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\WechatDiscoverReplyRepository;
use Flash;

class DiscoverReplyController extends Controller
{
    /**
     * @api {get} /discover/reply/37fb591be38db52dd1d5f04b689008f6?uid=openid&d_id=1&content=内容 发布评论
     * @apiVersion 0.0.1
     * @apiName Discover-Reply
     * @apiGroup Discover
     *
     * @apiParam (params) {String} uid  微信用户openid
     * @apiParam (params) {Int} d_id  供应id
     * @apiParam (params) {String} content  内容
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "评论成功！",
     *       "data": true
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 403,
     *       "msg": "非法请求！",
     *   }
     */
    public function index(Request $request,WechatDiscoverReplyRepository $repository){
		$uid = request('uid');
		$d_id = request('d_id');
		$content = request('content');
		if(!$uid || !$d_id || !$content) {
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
		$result = $repository->store($request);
		if(){
			return response()->json(['status_code'=>200,'msg'=>'评论成功！','data'=>$result]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'请求失败！','data'=>false]);
		}
		
    }

}
