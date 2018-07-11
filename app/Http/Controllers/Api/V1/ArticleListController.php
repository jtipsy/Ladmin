<?php
/**
* 文章控制器
* @author :luoyangpeng1122@163.com
*/

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleCategoryRepository;
use App\Repositories\ArticleRepository;
use App\Http\Requests\ArticleRequest;
use Flash;

class ArticleListController extends Controller {

    /**
     * @api {get} /article/index/37fb591be38db52dd1d5f04b689008f6 【首页】推荐资讯
     * @apiVersion 0.0.1
     * @apiName Article-Index
     * @apiGroup Article
     *
     * @apiSuccess {Int} id 资讯id
     * @apiSuccess {String} title	标题
     * @apiSuccess {String} desc	描述
     * @apiSuccess {String} thumb 封面
     * @apiSuccess {Int} view_count 浏览量
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "获取资讯成功！",
     *       "data": {
     *           "id": 1,
     *           "title": 锡林郭勒最新羊肉价格统计,
     *           "desc": 这是最新的羊肉信息,
     *           "thumb": http://images.meathome.com.cn/backend/uploads/20180206/20180206190820407.jpg,
     *           "view_count": 1
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 404,
     *       "msg": "获取资讯失败！",
     *       "article": false
     *   }
     */
    public function index( ArticleRepository $repository)
    {
        $article = $repository->getAll();
		if($article->count()){
			return response()->json(['status_code'=>200,'msg'=>'获取资讯成功！','article'=>$article]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'获取资讯失败！','article'=>false]);
		}	
    }
	
}
