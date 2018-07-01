<?php

namespace App\Repositories;

use App\Models\WechatDiscover;
use DB;
use Mockery\CountValidator\Exception;
use Flash;

class SuppleyRepository {
	
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
		$num = request('num','');
		$status = request('status','');

        $created_at_from = request('created_at_from' ,'');
        $created_at_to = request('created_at_to' ,'');
        $updated_at_from = request('updated_at_from' ,'');
        $updated_at_to = request('updated_at_to' ,'');
		$orders = request('order', []);
		
		$suppley = new WechatDiscover();
		
        /*用户昵称*/
        if($nickName){
            if($search_pattern){
                $suppley = $suppley->where('nickName', 'like', '%'.$nickName.'%');
            }else{
                $suppley = $suppley->where('nickName', $nickName);
            }
        }
		/*用户手机*/		
        if($num){
            if($search_pattern){
                $suppley = $suppley->where('num', 'like', '%'.$num.'%');
            }else{
                $suppley = $suppley->where('num', $num);
            }
        }		
		/*状态*/		
		if($status){
            if($search_pattern){
                $suppley = $suppley->where('status', 'like', '%'.$status.'%');
            }else{
                $suppley = $suppley->where('status', $status);
            }
        }

        /*创建时间搜索*/
        if($created_at_from){
            $suppley = $suppley->where('created_at', '>=', getTime($created_at_from));
        }
        if($created_at_to){
            $suppley = $suppley->where('created_at', '<=', getTime($created_at_to, false));
        }        
		/*修改时间搜索*/
        if($updated_at_from){
            $suppley = $suppley->where('updated_at', '>=', getTime($updated_at_from));
        }
        if($updated_at_to){
            $suppley = $suppley->where('updated_at', '<=', getTime($updated_at_to, false));
        }
		$suppley = $suppley->where('category','=',2);
		
        $count = $suppley->count();
		
		if($orders){
			$orderName = request('columns.' . request('order.0.column') . '.name');
			$orderDir = request('order.0.dir');
			$suppley = $suppley->orderBy($orderName, $orderDir);
		}

        $suppley = $suppley->offset($start)->limit($length);
        $suppleys = $suppley->orderBy("id", "desc")->get();
        if ($suppleys) {
            foreach ($suppleys as &$v) {
                $v['webactionButton'] = $v->getActionButtonAttribute(true);
            }
        }
		return [
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $suppleys,
        ];
    }
    /**
     * get all suppleys
     *
     * @itas
     * @DateTime 2017-12-27
     * @return   brand_id
     */
	 public function getBrandId($admin_id){
		 //get brand_id
        try{
		$brands = DB::table('brands')->select('id','name')->where('admin_id',$admin_id)->first();
        }catch (Exception $e){
            return 'not find Brand';
        }
		return $brands;
		
	 }
	 
    public function getsuppleyById($id) {
        try{
           $suppley = WechatDiscover::findOrFail($id);

        }catch (Exception $e){
            return 'not find suppley';
        }
        return $suppley->toArray();
    }
	 
    /**
     * create suppleys
     *
     * @itas
     * @DateTime 2018-6-4
     * @return   result
     */
    public function store($request)
    {
        $data = $request->all();
        //$data['content'] = $data['content'];
        $result = WechatDiscover::create($data);
        return $result;
    }
	
    public function update($request,$id)
    {
        $brand = WechatDiscover::find($id);
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
		$Discover = WechatDiscover::find($id);
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
        $result = WechatDiscover::destroy($id);
        
        if($result) {
            return true;
        }else {
            return false;
        }
    }
}


