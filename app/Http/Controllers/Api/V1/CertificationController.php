<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\CertificationRepository;
use Flash;

class CertificationController extends Controller
{
	 /**
     * @api {get} /send/mobile/code/37fb591be38db52dd1d5f04b689008f6?uid=openid&mobile=15034889912 获取验证码
     * @apiVersion 0.0.1
     * @apiName Send-Mobile-Code
     * @apiGroup SendCode
     *
     * @apiParam (params) {String} uid  微信用户openid
     * @apiParam (params) {Int} mobile  用户手机号
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "发送验证码成功！",
     *       "data": {
     *           "status": true,
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 403,
     *       "msg": "非法请求！",
     *   }
     */
	public function Code(Request $request,CertificationRepository $repository){
		$uid = request('uid');
		$mobile = request('mobile');
		if(!$uid || !$mobile) {
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
		$Code = $repository->SendCode($uid,$mobile);
		return response()->json(['status_code'=>200,'msg'=>'发送验证码成功！','data'=>$Code]);
	}
	
	 /**
     * @api {get} /mobile/verify/code/37fb591be38db52dd1d5f04b689008f6?uid=openid&mobile=15034889912&code=code 短信验证
     * @apiVersion 0.0.1
     * @apiName Mobile-Verify-Code
     * @apiGroup SendCode
     *
     * @apiParam (params) {String} uid  微信用户openid
     * @apiParam (params) {Int} mobile  用户手机号
     * @apiParam (params) {Int} agent  代销达人：0否1是
     * @apiParam (params) {Int} Catering_customer  餐饮客户：0否1是
     * @apiParam (params) {Int} Corporate_client  企业客户：0否1是
     * @apiParam (params) {Int} Share_talent  分享达人：0否1是
     * @apiParam (params) {Int} Production_service  生产服务：0否1是
     * @apiParam (params) {Int} Brand  品牌厂商：0否1是
     * @apiParam (params) {Int} Cold_chain_logistic  冷链物流：0否1是
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "验证成功！",
     *       "data": {
     *           "status": true,
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 403,
     *       "msg": "非法请求！",
     *   }
     */
	public function SelectMobileCode(Request $request,CertificationRepository $repository){
		$uid = request('uid');
		$mobile = request('mobile');
		$code = request('code');
		if(!$uid || !$mobile || !$code) {
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
		$MobileCode = $repository->SelectMobileCode($request,$mobile,$code);
		return response()->json(['status_code'=>200,'msg'=>'验证成功！','data'=>$MobileCode]);
	}
	
	 /**
     * @api {post} /business/licensee/37fb591be38db52dd1d5f04b689008f6	上传营业执照
     * @apiVersion 0.0.1
     * @apiName Business-Licensee
     * @apiGroup CertiFicaTion
     *
     * @apiParam (params) {String} file[]  图片名称
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "successful",
     *       "name": "20180615165322429.jpg"
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "msg": "Undefined variable: filename",
     *       "status_code": 500,
     *   }
     */
    public function Image(Request $request,CertificationRepository $repository){
		if($request->hasFile('file')){
			foreach($request->file('file') as $file) {
				$filename = date('YmdHis').mt_rand(100,999).'.'.$file->getClientOriginalExtension();
				$file->move(base_path().'/public/backend/uploads/certification', $filename);
				$filepath = getenv('IMAGE_PATH').'/backend/uploads/certification/'.$filename;
			}
			return response()->json(['status_code'=>200,'msg'=>'successful','name'=>$filename]);
		}
	}
	
	 /**
     * @api {post} /completion/certification/37fb591be38db52dd1d5f04b689008f6?uid=openid	补全认证信息
     * @apiVersion 0.0.1
     * @apiName Completion-Certification
     * @apiGroup CertiFicaTion
     *
     * @apiParam (params) {String} uid  微信用户openid
     * @apiParam (params) {String} filepath  营业执照路径
     * @apiSuccess {Int} id 认证id
     * @apiSuccess {String} mobile 手机
     * @apiSuccess {String} uid 微信用户openid
     * @apiSuccess {String} business_license 营业执照
     * @apiSuccess {Int} agent  代销达人：0否1是
     * @apiSuccess {Int} Catering_customer  餐饮客户：0否1是
     * @apiSuccess {Int} Corporate_client  企业客户：0否1是
     * @apiSuccess {Int} Share_talent  分享达人：0否1是
     * @apiSuccess {Int} Production_service  生产服务：0否1是
     * @apiSuccess {Int} Brand  品牌厂商：0否1是
     * @apiSuccess {Int} Cold_chain_logistic  冷链物流：0否1是
     * @apiSuccess {Timestamp} created_at 认证时间
     * @apiSuccess {Timestamp} updated_at 补全时间
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "successful",
     *       "data": {
     *       	"id": 1,
     *       	"mobile": "15034889912",
     *       	"uid": "5Pywdvujkesyuq3U0SadDKeJOYtd",
     *       	"business_license": null,
     *       	"agent": 0,
     *       	"Catering_customer": 0,
     *       	"Corporate_client": 0,
     *       	"Share_talent": 0,
     *       	"Production_service": 0,
     *       	"Brand": 0,
     *       	"Cold_chain_logistic": 0,
     *       	"created_at": "2018-06-15 16:48:28",
     *       	"updated_at": "2018-06-15 17:06:33"
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 403,
     *       "msg": "非法请求",
     *   }
     */
	public function upImage(Request $request,CertificationRepository $repository){
		$uid = request('uid');
		$filepath = request('filepath');
		if(!$uid){
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
		$insert = $repository->InsertImage($request,$uid,$filepath);
		return response()->json(['status_code'=>200,'msg'=>'请求成功！','data'=>$insert]);
	}
	
    /**
     * @api {get} /my/certification/licensee/status/37fb591be38db52dd1d5f04b689008f6?uid=openid 补全信息-状态
     * @apiVersion 0.0.1
     * @apiName My-Certification-License-Status
     * @apiGroup Discover
     *
     * @apiParam (params) {String} uid  微信用户openid
     * @apiSuccess {Int} count 消息数
     * @apiSuccess {Int} certification 认证数
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
	 *       "status_code": 200,
	 *       "msg": "请求成功！",
	 *       "data": "201806290706.png"
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 404,
     *       "msg": "暂无数据",
     *       "data": false
     *       
     *   }
     */
	public function GetCount(CertificationRepository $repository){
		$uid = request('uid');
		if(!$uid) {
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
		$Data = $repository->GetCount($uid);
		foreach($Data as $v){
			$status = $v['business_license'];
		}
		if($status){
			return response()->json(['status_code'=>200,'msg'=>'请求成功！','data'=>$status]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'暂无数据','data'=>false]);
		}
		
	}
}
