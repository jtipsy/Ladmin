<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\FocusListRepository;

class FocusListController extends Controller
{
    /**
     * @api {get} /focus/index/37fb591be38db52dd1d5f04b689008f6 轮播列表
     * @apiVersion 0.0.1
     * @apiName Focus-Index
     * @apiGroup Index
     *
     * @apiSuccess {String} image 图片名称
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "获取轮播列表成功",
     *       "data":"20180328172856829.jpg"
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 404,
     *       "msg": "暂无数据！",
     *       "data": false
     *   }
     */
    public function index( FocusListRepository $repository){
        $focus = $repository->getAll();
		if($focus->count()){
			return response()->json(['status_code'=>200,'msg'=>'获取轮播列表成功！','data'=>$focus]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'暂无数据！','data'=>false]);
		}
				
    }
}
