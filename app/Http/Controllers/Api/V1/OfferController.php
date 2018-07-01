<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\OfferRepository;

class OfferController extends Controller
{
    /**
     * @api {get} /offer/index/37fb591be38db52dd1d5f04b689008f6 产品报价
     * @apiVersion 0.0.1
     * @apiName Offer-Index
     * @apiGroup Index
     *
     * @apiSuccess {String} image 图片名称
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "获取产品报价！",
     *       "data": {
     *           "path": "20180611090959.jpg"
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 404,
     *       "msg": "暂无数据！",
     *       "data": false
     *   }
     */
    public function index( OfferRepository $repository){
        $focus = $repository->getAll();
		if($focus->count()){
			return response()->json(['status_code'=>200,'msg'=>'获取产品报价成功！','data'=>$focus]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'暂无数据！','data'=>false]);
		}
				
    }
}
