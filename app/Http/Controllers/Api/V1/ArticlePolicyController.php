<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ArticlePolicyRepository;

class ArticlePolicyController extends Controller
{
	 /**
     * @api {get} /article/policy/37fb591be38db52dd1d5f04b689008f6 政策法规列表
     * @apiVersion 0.0.1
     * @apiName Article-Policy
     * @apiGroup Article
     *
     * @apiSuccess {Int} total 总条数
     * @apiSuccess {Int} per_page 每页条数
     * @apiSuccess {Int} current_page 当前页
     * @apiSuccess {Int} last_page 总页数
     * @apiSuccess {String} next_page_url 下一页
     * @apiSuccess {String} prev_page_url 上一页
     * @apiSuccess {Int} from 从
     * @apiSuccess {Int} to 至
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
     *       "msg": "获取政策法规成功",
     *       "article": {
     *           "total": 1,
     *           "per_page": 5,
     *           "current_page": 1,
     *           "last_page": 1,
     *           "next_page_url": null,
     *           "prev_page_url": null,
     *           "from": 1,
     *           "to": 1,
     *           "data": [
     *               {
     *           		"id": 1,
     *           		"title": "政策法规标题",
     *           		"author": "Jtipsy",
     *           		"from": "肉之家",
     *           		"desc": "政策法规描述",
     *           		"category_id": 1,
     *           		"content": "# 政策法规内容",
     *           		"thumb": "images.meathome.com.cn/backend/uploads/20180615/20180615102739936.jpg",
     *           		"status": 1,
     *           		"recommended": 1,
     *           		"view_count": 6,
     *           		"created_at": "2018-06-15 10:28:16",
     *           		"updated_at": "2018-06-15 14:05:15"
     *           	 }
     *           ]
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 404,
     *       "msg": "获取政策法规失败！",
     *       "article": false
     *   }
     */
    public function index( ArticlePolicyRepository $repository)
    {
        $article = $repository->ajaxIndex();
		if($article->count()){
			return response()->json(['status_code'=>200,'msg'=>'获取政策法规成功！','article'=>$article]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'获取政策法规失败！','article'=>false]);
		}
    }
}
