<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ArticleDetailRepository;

class ArticleDetailController extends Controller
{
	 /**
     * @api {get} /article/detail/37fb591be38db52dd1d5f04b689008f6?id=1 根据单个id获取资讯详情
     * @apiVersion 0.0.1
     * @apiName Article-Detail
     * @apiGroup Article
     *
     * @apiParam (params) {Int} id  资讯id
     * @apiSuccess {Int} id 资讯id
     * @apiSuccess {String} title	标题
     * @apiSuccess {String} author	作者
     * @apiSuccess {String} from	来源
     * @apiSuccess {String} desc	描述
     * @apiSuccess {Int} category_id  分类id
     * @apiSuccess {String} content 内容
     * @apiSuccess {String} thumb 封面
     * @apiSuccess {Int} status 状态
     * @apiSuccess {Int} recommended 推荐：1否2是
     * @apiSuccess {Int} view_count 浏览量
     * @apiSuccess {Timestamp} created_at 添加时间
     * @apiSuccess {Timestamp} created_at 更新时间
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "获取资讯详情成功",
     *       "article": {
     *           "id": 1,
     *           "title": "行业资讯标题",
     *           "author": "Jtipsy",
     *           "from": "肉之家",
     *           "desc": "行业资讯描述",
     *           "category_id": 1,
     *           "content": "# 行业资讯内容",
     *           "thumb": http://images.meathome.com.cn/backend/uploads/20180206/20180206190820407.jpg,
     *           "status": 1,
     *           "recommended": 1,
     *           "view_count": 0,
     *           "created_at": "2018-06-15 10:28:16",
     *           "updated_at": "2018-06-15 10:28:16"
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 404,
     *       "message": "获取资讯详情失败！",
     *       "article": false
     *   }
     */
	public function index(Request $request,ArticleDetailRepository $repository){
		$id = request('id');
		$article = $repository->getDetail($id);
		if($article->count()){
			$repository->updateViewCount($id);
			return response()->json(['status_code'=>200,'msg'=>'获取资讯详情成功！','article'=>$article]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'获取资讯详情失败！','article'=>false]);
		}
		
	}
}
