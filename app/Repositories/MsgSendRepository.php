<?php

namespace App\Repositories;

use App\Models\Msglist;
use App\Models\WechatUser;
use DB;
use Mockery\CountValidator\Exception;
use Flash;

class MsgSendRepository {
	
    /**
     * get all suppleys
     *
     * @itas
     * @DateTime 2017-12-27
     * @return   array
     */
    public function ajaxIndex()
    {
        $draw = request('draw', 1);/*获取请求次数*/
        $start = request('start', config('admin.golbal.list.start')); /*获取开始*/
        $length = request('length', config('admin.golbal.list.length')); ///*获取条数*/
        $search_pattern = true; /*是否启用模糊搜索*/
		
		$nickName = request('nickName' ,'');
		$title = request('title' ,'');
		$content = request('content' ,'');
		$created_at_from = request('created_at_from' ,'');
        $created_at_to = request('created_at_to' ,'');
        $updated_at_from = request('updated_at_from' ,'');
        $updated_at_to = request('updated_at_to' ,'');
		
		$list = new Msglist();
		
        /*用户昵称*/
        if($nickName){
            if($search_pattern){
                $list = $list->where('nickName', 'like', '%'.$nickName.'%');
            }else{
                $list = $list->where('nickName', $nickName);
            }
        }        
		/*消息标题*/
        if($title){
            if($search_pattern){
                $list = $list->where('title', 'like', '%'.$title.'%');
            }else{
                $list = $list->where('title', $title);
            }
        }		
		/*消息内容*/
        if($content){
            if($search_pattern){
                $list = $list->where('content', 'like', '%'.$content.'%');
            }else{
                $list = $list->where('content', $content);
            }
        }
        /*创建时间搜索*/
        if($created_at_from){
            $list = $list->where('created_at', '>=', getTime($created_at_from));
        }
        if($created_at_to){
            $list = $list->where('created_at', '<=', getTime($created_at_to, false));
        }        
		/*修改时间搜索*/
        if($updated_at_from){
            $list = $list->where('updated_at', '>=', getTime($updated_at_from));
        }
        if($updated_at_to){
            $list = $list->where('updated_at', '<=', getTime($updated_at_to, false));
        }
		
        $count = $list->count();
        $list = $list->offset($start)->limit($length);
        $lists = $list->orderBy("id", "desc")->get();
		return [
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $lists,
        ];
    }
	 
    /**
     * create msg
     *
     * @itas
     * @DateTime 2018-6-4
     * @return   result
     */
    public function send($request)
    {
		$UserData = $request->all();
		//get_user_info
		$users = WechatUser::select('openid','nickName')->get();
		$UserArray = array();
		foreach($users as $user){
			$UserArray['openid'] = $user->openid;
			$UserArray['nickName'] = $user->nickName;
			$UserArray['title'] = $UserData['title'];
			$UserArray['content'] = $UserData['content'];
			$result = Msglist::create($UserArray);
		}
        return $result;
    }
	
    public function update($request,$id)
    {
        $brand = Msglist::find($id);
        $data = $request->all();
        $result = $brand->fill($data)->save();

        if($result){
            return true;
        } else{
            return false;

        }
    }
	
    /**
     * delete store
     *
     * @itas
     * @DateTime 2018-6-4
     * @return   result
     */    
	public function mark($id,$status)
	{
		$Discover = Msglist::find($id);
		if ($Discover) {
			$Discover->status = $status;
			if ($Discover->save()) {
				Flash::success("处理成功");
				return true;
			}
			Flash::error("处理失败");
			return false;
		}
		abort(404);
	}	
	 
	 /**
     * delete store
     *
     * @itas
     * @DateTime 2018-6-4
     * @return   result
     */
    public function destroy($id)
    {
        $result = Msglist::destroy($id);
        
        if($result) {
            return true;
        }else {
            return false;
        }
    }
}


