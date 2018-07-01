<?php

namespace App\Repositories;

use App\Models\LogisticsDynamic;
use DB;
use Mockery\CountValidator\Exception;
use Flash;

class LogisticsDynamicRepository {
	
    /**
     * get all logistics dynamic
     * @DateTime 2018-6-8
     * @return   array
     */
	public function getAll(){
		$Dynamic = new LogisticsDynamic();
		$Dynamics = $Dynamic->select('nickName','shop_name','weight','delivery_address','shipping_address','updated_at')->where('status','=',2)->orderBy("id", "desc")->limit(20)->get();
        return $Dynamics;
	}	

    /**
     * get all Dynamics
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
		$delivery_address = request('delivery_address','');
		$shipping_address = request('shipping_address','');
		$shop_name = request('shop_name','');
		$status = request('status','');

        $created_at_from = request('created_at_from' ,'');
        $created_at_to = request('created_at_to' ,'');
        $updated_at_from = request('updated_at_from' ,'');
        $updated_at_to = request('updated_at_to' ,'');
		$orders = request('order', []);
		
		$Dynamic = new LogisticsDynamic();
		
        /*用户昵称*/
        if($nickName){
            if($search_pattern){
                $Dynamic = $Dynamic->where('nickName', 'like', '%'.$nickName.'%');
            }else{
                $Dynamic = $Dynamic->where('nickName', $nickName);
            }
        }
		/*装货地址*/		
        if($delivery_address){
            if($search_pattern){
                $Dynamic = $Dynamic->where('delivery_address', 'like', '%'.$delivery_address.'%');
            }else{
                $Dynamic = $Dynamic->where('delivery_address', $delivery_address);
            }
        }        
		/*卸货地址*/
		if($shipping_address){
            if($search_pattern){
                $Dynamic = $Dynamic->where('shipping_address', 'like', '%'.$shipping_address.'%');
            }else{
                $Dynamic = $Dynamic->where('shipping_address', $shipping_address);
            }
        }		
		/*货物名称*/
		if($shop_name){
            if($search_pattern){
                $Dynamic = $Dynamic->where('shop_name', 'like', '%'.$shop_name.'%');
            }else{
                $Dynamic = $Dynamic->where('shop_name', $shop_name);
            }
        }		
		/*状态*/
		if($status){
            if($search_pattern){
                $Dynamic = $Dynamic->where('status', 'like', '%'.$status.'%');
            }else{
                $Dynamic = $Dynamic->where('status', $status);
            }
        }

        /*创建时间搜索*/
        if($created_at_from){
            $Dynamic = $Dynamic->where('created_at', '>=', getTime($created_at_from));
        }
        if($created_at_to){
            $Dynamic = $Dynamic->where('created_at', '<=', getTime($created_at_to, false));
        }        
		/*修改时间搜索*/
        if($updated_at_from){
            $Dynamic = $Dynamic->where('updated_at', '>=', getTime($updated_at_from));
        }
        if($updated_at_to){
            $Dynamic = $Dynamic->where('updated_at', '<=', getTime($updated_at_to, false));
        }
		
        $count = $Dynamic->count();
		
		if($orders){
			$orderName = request('columns.' . request('order.0.column') . '.name');
			$orderDir = request('order.0.dir');
			$Dynamic = $Dynamic->orderBy($orderName, $orderDir);
		}
		
        $Dynamic = $Dynamic->offset($start)->limit($length);
        $Dynamics = $Dynamic->orderBy("id", "desc")->get();
        if ($Dynamics) {
            foreach ($Dynamics as &$v) {
                $v['webactionButton'] = $v->getActionButtonAttribute(true);
            }
        }
		return [
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $Dynamics,
        ];
    }
	 
    /**
     * create Dynamics
     *
     * @itas
     * @DateTime 2018-6-4
     * @return   result
     */
    public function store($request)
    {
        $data = $request->all();
        $result = LogisticsDynamic::create($data);
        return $result;
    }
	
    public function update($request,$id)
    {
        $brand = LogisticsDynamic::find($id);
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
		$Discover = LogisticsDynamic::find($id);
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
        $result = LogisticsDynamic::destroy($id);
        
        if($result) {
            return true;
        }else {
            return false;
        }
    }
}


