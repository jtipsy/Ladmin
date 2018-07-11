<?php
/**
* 文章控制器
* @author :luoyangpeng1122@163.com
*/

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleCategoryRepository;
use App\Repositories\ArticleRepository;
use App\Http\Requests\ArticleRequest;
use Flash;

class ArticleListController extends Controller {

    /**
     * @api {get} /article 首页推荐资讯
     * @apiVersion 0.0.1
     * @apiName Article
     * @apiGroup Api
     *
     * @apiSuccess {Int} id 文章id
     * @apiSuccess {String} title	文章标题
     * @apiSuccess {String} desc	文章描述
     * @apiSuccess {String} thumb 文章封面
     * @apiSuccess {Int} view_count 浏览量
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "data": {
     *           "id": 1,
     *           "title": 锡林郭勒最新羊肉价格统计,
     *           "desc": 这是最新的羊肉信息,
     *           "thumb": http://images.meathome.com.cn/backend/uploads/20180206/20180206190820407.jpg,
     *           "view_count": 1
     *       },
     *       "meta": {
     *           "status": "success",
     *           "status_code": 200,
     *           "message": "获取文章列表成功"
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "message": "文章列表不存在",
     *       "status_code": 404
     *   }
     */
    public function index( ArticleRepository $repository)
    {
        $Data = $repository->getAll();
        $Count = $repository->getCount();
		if($Count > 0){
			return response()->json(['status_code'=>200,'msg'=>'获取文章成功！','data'=>$Data->toArray()]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'获取文章失败！','data'=>$Count]); 
		}
    }
	
}
