<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\MsgListRepository;

class MsgListController extends Controller
{
    /**
     * @api {get} /my/msg/list/37fb591be38db52dd1d5f04b689008f6 站内信
     * @apiVersion 0.0.1
     * @apiName My-Msg-List
     * @apiGroup Msg
     *
     * @apiParam (params) {String} uid  微信用户openid
     * @apiSuccess {Int} total 总条数
     * @apiSuccess {Int} per_page 每页条数
     * @apiSuccess {Int} current_page 当前页
     * @apiSuccess {Int} last_page 总页数
     * @apiSuccess {String} next_page_url 下一页
     * @apiSuccess {String} prev_page_url 上一页
     * @apiSuccess {Int} from 从
     * @apiSuccess {Int} to 至
     * @apiSuccess {Int} id 自增id
     * @apiSuccess {String} openid 用户openid
     * @apiSuccess {String} nickName 用户昵称
     * @apiSuccess {String} title 标题
     * @apiSuccess {String} content 内容
     * @apiSuccess {Int} is_read 是否已读：0未读 1已读
     * @apiSuccess {Timestamp} created_at 发送时间
     * @apiSuccess {Timestamp} updated_at 更新时间
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": {
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
     *                  "id": 1,
     *                  "openid": "5Pywdvujkesyuq3U0SadDKeJOYtd",
     *                  "nickName": "k1WQR@163.com",
     *                  "title": "肉之家小程序上线啦",
     *                  "content": "肉之家小程序V1.0.0.1版本即将上线！",
     *                  "is_read": 0,
     *                  "created_at": "2018-06-14 17:09:39",
     *                  "updated_at": "2018-06-14 17:09:39"
     *               }
     *        }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 404,
     *       "msg": "暂无数据！",
     *       "article": false
     *   }
     */
    public function MyMsg(MsgListRepository $repository)
    {
		$uid = request('uid');
		if(!$uid) {
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
        $msg = $repository->ajaxIndex($uid);
		if($msg->count()){
			return response()->json(['status_code'=>200,'msg'=>'获取消息成功！','msg'=>$msg]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'暂无数据！','msg'=>false]);
		}
		
    }
}
