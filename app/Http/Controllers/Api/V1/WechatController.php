<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;
use App\Repositories\WechatUserRepository;
use App\Repositories\WechatDiscoverRepository;
use App\Http\Requests\WechatDiscoverRequest;
use Log;
class WechatController extends Controller{

    /**
     * @api {post} /wechat/info/37fb591be38db52dd1d5f04b689008f6  授权登陆
     * @apiVersion 0.0.1
     * @apiName Wechat-Info
     * @apiGroup Wechat
     *
     * @apiParam (params) {String} openid 微信用户openid
     * @apiParam (params) {String} nickName 用户昵称
     * @apiParam (params) {String} avatarUrl 用户头像
     * @apiSuccess {Int} id 供应id
     * @apiSuccess {String} nickName	用户昵称
     * @apiSuccess {String} avatarUrl	用户头像
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "登陆成功！",
     *       "data": {
     *           "nickName": 行走的唐僧肉,
     *           "avatarUrl": https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKqKTSTcsjLwNib8FnKXOict3d055d8YxMvRz1k5jP6jgvI5hDeibKhN8S,
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 403,
     *       "msg": "非法请求！"  
     *   }
     */
	public function AuthLogin(Request $request,WechatUserRepository $repository){
		$openid = request('openid');
		if (!$openid){
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
 		$user = $repository->getField($openid);
		if($user->count()){
			$err = array();
			foreach($user as $val){
				$err['nickName'] = $val['nickName'];
				$err['avatarUrl'] = $val['avatarUrl'];
			}
			return response()->json(['status_code'=>200,'msg'=>'登陆成功！','data'=>$err]);
			exit();
		}else{
			if(request('nickName') && request('avatarUrl')){
				$result = $repository->store($request);
				if ($result) {
					$err = array();
					$err['nickName'] = request('nickName');
					$err['avatarUrl'] = request('avatarUrl');
					return response()->json(['status_code'=>200,'msg'=>'授权登陆成功！','data'=>$err]);
					exit();
				}else{
					return response()->json(['status_code'=>403,'msg'=>'授权登陆失败！']);
					exit();
				}
			}else{
				return response()->json(['status_code'=>403,'msg'=>'授权登陆失败！']);
				exit();
			}
		}
	}

    /**
     * @api {get} /wechat/key/37fb591be38db52dd1d5f04b689008f6  获取SessionKey
     * @apiVersion 0.0.1
     * @apiName Wechat-Key
     * @apiGroup Wechat
     *
     * @apiParam (params) {String} code 微信票据code
     * @apiSuccess {Int} id 供应id
     * @apiSuccess {String} session_key	微信key
     * @apiSuccess {String} openid	用户openid
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "请求成功！",
     *       "session_key": null,
     *       "openid": null
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 403,
     *       "msg": "非法请求！"  
     *   }
     */
	public function GetSessionKey(Request $request,WechatUserRepository $repository){
    	$appid = 'wx3b052d100a5392d2';
    	$secret = '9f591d2b90fd43089c4595128a6ee4dc';

		$code = request('code');
		if (!$code) {
			return response()->json(['status_code'=>0,'msg'=>'非法操作！','data'=>$code]);
			exit();
		}
	
		if (!$appid || !$secret) {
			return response()->json(['status_code'=>0,'msg'=>'非法操作(Appid&&Secret)！']);
			exit();
		}
		$open_key = 'https://api.weixin.qq.com/sns/jscode2session?appid='.$appid.'&secret='.$secret.'&js_code='.$code.'&grant_type=authorization_code';
		$ch = curl_init(); 
		curl_setopt($ch,CURLOPT_URL,$open_key);
		curl_setopt($ch,CURLOPT_HEADER,0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		$res = curl_exec($ch);
		curl_close($ch);
		$WxxJson = json_decode($res,true); 
		$session_key = $WxxJson['session_key'];  
		$openid = $WxxJson['openid'];
		if($session_key == null || $openid == null){
			return response()->json(['status_code'=>500,'msg'=>'请求异常!','session_key'=>$session_key,'openid'=>$openid]);
		}else{
			return response()->json(['status_code'=>200,'msg'=>'请求成功！','session_key'=>$session_key,'openid'=>$openid]);
		}
		
	}
 
	//upload wechat images api
    public function WechatImage(Request $request,WechatDiscoverRepository $repository){
		if($request->hasFile('file')){
			$images = "";
			foreach($request->file('file') as $file) {
				$data = array();
				$filename = date('YmdHis').mt_rand(100,999).'.'.$file->getClientOriginalExtension();
				$file->move(base_path().'/public/backend/uploads/supply', $filename);
				$images[] = $filename;
			}
			$image = implode(",", $images);
			//return json_encode($image_array);
			return $image;
		}
	}
	
	public function InsertDiscover(Request $request,WechatDiscoverRepository $repository){
		$uid = request('uid');
		if(!$uid) {
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
		$result = $repository->InsertDiscover($request);
		return response()->json(['status_code'=>200,'msg'=>'发布供应成功！','data'=>$result]);
	}	
	//edit user name api
	public function EditName(Request $request,WechatUserRepository $repository){
		$uid = request('uid');
		$nickName = request('nickName');
		if(!$uid || !$nickName) {
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
		$result = $repository->update($request,$uid);
		return response()->json(['status_code'=>200,'msg'=>'昵称修改成功！','data'=>$result]);
	}
}