<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\LogisticsPlaceOrderRepository;

class LogisticsPlaceOrderController extends Controller
{
    /**
     * @api {post} /logistics/placeorder/37fb591be38db52dd1d5f04b689008f6 快速下单
     * @apiVersion 0.0.1
     * @apiName Logistics-Placeorder
     * @apiGroup Logistics
     *
     * @apiParam (params) {String} uid  微信用户openid
     * @apiParam (params) {String} nickName  用户昵称
     * @apiParam (params) {String} avatarUrl  用户头像
     * @apiParam (params) {String} shop_name  货物名称
     * @apiParam (params) {String} weight  货物重量
     * @apiParam (params) {String} delivery_address  装货地址
     * @apiParam (params) {String} shipping_address  收获地址
	 
     * @apiSuccess {String} uid 用户Openid
     * @apiSuccess {String} nickName 用户昵称
     * @apiSuccess {String} avatarUrl 用户头像
     * @apiSuccess {String} shop_name 货物名称
     * @apiSuccess {String} weight 货物重量
     * @apiSuccess {String} delivery_address 装货地址
     * @apiSuccess {String} shipping_address 收获地址
     * @apiSuccess {Timestamp} created_at 发货时间
     * @apiSuccess {Int} id 自增id
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "下单成功",
     *       "data": {
     *           "nickName": "行走的唐僧肉",
     *           "avatarUrl": "https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTLLOciaCYd6icgToxbc42UicicZZ1icksBFDWlrmErQjUIicicIfR8tLN8PPK7mEiakVDhmd0lxYJ6vq3yXwQ/132",
     *           "shop_name": "白条羊",
     *           "weight": "10吨",
     *           "delivery_address": "锡林浩特市",
     *           "shipping_address": "呼和浩特市",
     *           "created_at": "2018-06-08 16:39:13"
     *           "id": 1
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
    public function index(Request $request,LogisticsPlaceOrderRepository $repository){
		$uid = request('uid');
		$nickName = request('nickName');
		$avatarUrl = request('avatarUrl');
		$shop_name = request('shop_name');
		$weight = request('weight');
		$delivery_address = request('delivery_address');
		$shipping_address = request('shipping_address');
		if(!$uid || !$nickName || !$avatarUrl || !$shop_name || !$weight || !$delivery_address || !$shipping_address ) {
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
		$result = $repository->store($request);
		if($result->count()){
			return response()->json(['status_code'=>200,'msg'=>'下单成功！','data'=>$result]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'请求失败！','data'=>false]);
		}
		
    }
}
