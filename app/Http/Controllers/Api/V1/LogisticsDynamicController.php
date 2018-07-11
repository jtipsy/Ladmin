<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\LogisticsDynamicRepository;

class LogisticsDynamicController extends Controller
{
    /**
     * @api {get} /logistics/dynamic/37fb591be38db52dd1d5f04b689008f6 物流动态
     * @apiVersion 0.0.1
     * @apiName Logistics-Dynamic
     * @apiGroup Logistics
     *
     * @apiSuccess {String} nickName 用户昵称
     * @apiSuccess {String} shop_name 货物名称
     * @apiSuccess {String} weight 货物重量
     * @apiSuccess {String} delivery_address 装货地址
     * @apiSuccess {String} shipping_address 卸货地址
     * @apiSuccess {String} updated_at 发货时间
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "获取物流动态成功！",
     *       "data": {
     *           "nickName": "MEATHOME",
     *           "shop_name": "白条羊",
     *           "weight": "10吨",
     *           "delivery_address": "锡林浩特市",
     *           "shipping_address": "呼和浩特市",
     *           "updated_at": "2018-06-08 15:48:20",
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 404,
     *       "msg": "暂无数据！",
     *       "data": false
     *       
     *   }
     */
    public function index( LogisticsDynamicRepository $repository){
        $dynamic = $repository->getAll();
		if($dynamic->count()){
			return response()->json(['status_code'=>200,'msg'=>'获取物流动态成功！','data'=>$dynamic]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'暂无数据！','data'=>false]);
		}
				
    }
}
