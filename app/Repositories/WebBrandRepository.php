<?php

namespace App\Repositories;

use App\Models\WebBrand;
use DB;
use Mockery\CountValidator\Exception;
use Flash;

class WebBrandRepository {

    /**
     * get all brands
     * @DateTime 2017-12-27
     * @return   array
     */
    public function ajaxWebIndex($user_id)
    {
        $draw = request('draw', 1);/*获取请求次数*/
        $start = request('start', config('admin.golbal.list.start')); /*获取开始*/
        $length = request('length', config('admin.golbal.list.length')); ///*获取条数*/

        $search_pattern = true; /*是否启用模糊搜索*/
		
        $name = request('name' ,'');
        $admin = request('admin_name' ,'');
        $enterprise  = request('enterprise','');
        $phone = request('phone','');
        $status = request('status','');
        $recommended = request('recommended','');

        $created_at_from = request('created_at_from' ,'');
        $created_at_to = request('created_at_to' ,'');
        $updated_at_from = request('updated_at_from' ,'');
        $updated_at_to = request('updated_at_to' ,'');
		$orders = request('order', []);
		
        $brand = new WebBrand();
        /*品牌名*/
        if($name){
            if($search_pattern){
                $brand = $brand->where('name', 'like', '%'.$name.'%');
            }else{
                $brand = $brand->where('name', $name);
            }
        }

        /*管理员*/
        if($admin){
            if($search_pattern){
                $brand = $brand->where('admin_name', 'like','%'. $admin.'%');
            }else{
                $brand = $brand->where('admin_name', $admin);
            }
        }

        /*归属地*/
        if($enterprise) {
            if($search_pattern){
                $brand = $brand->where('enterprise', 'like', '%'.$enterprise.'%');
            }else{
                $brand = $brand->where('enterprise', $enterprise);
            }
        }


        /*手机号*/
        if($phone) {
            if($search_pattern){
                $brand = $brand->where('phone', 'like', '%'.$phone.'%');
            }else{
                $brand = $brand->where('phone', $phone);
            }
        }       

		/*状态*/
        if($status) {
			$brand = $brand->where('status', $status);
        } 		
		
		/*推荐*/
        if($recommended) {
			$brand = $brand->where('recommended', $recommended);
        } 

		if($user_id){
			$brand = $brand->where('admin_id',$user_id);
		}

        /*创建时间搜索*/
        if($created_at_from){
            $brand = $brand->where('created_at', '>=', getTime($created_at_from));
        }
        if($created_at_to){
            $brand = $brand->where('created_at', '<=', getTime($created_at_to, false));
        }        
		/*修改时间搜索*/
        if($updated_at_from){
            $brand = $brand->where('updated_at', '>=', getTime($updated_at_from));
        }
        if($updated_at_to){
            $brand = $brand->where('updated_at', '<=', getTime($updated_at_to, false));
        }
        $count = $brand->count();
		
		if($orders){
			$orderName = request('columns.' . request('order.0.column') . '.name');
			$orderDir = request('order.0.dir');
			$brand = $brand->orderBy($orderName, $orderDir);
		}
		
        $brand = $brand->offset($start)->limit($length);
        $brands = $brand->orderBy("id", "desc")->get();
        if ($brands) {
            foreach ($brands as &$v) {
                $v['webactionButton'] = $v->getActionButtonAttribute(true);
            }
        }
		return [
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $brands,
        ];
    }
	
    public function getBrand($user_id) {
        try{
           $Brand = WebBrand::select('name','atlas1','atlas2','atlas3','atlas4','describe')->where('admin_id',$user_id)->get();
        }catch (Exception $e){
            return 'not find Brand';
        }
        return $Brand;
    }    
	
	public function getBrandById($id) {
        try{
           $Brand = WebBrand::findOrFail($id);

        }catch (Exception $e){
            return 'not find Brand';
        }
        return $Brand->toArray();
    }
	
    public function store($request)
    {
        $data = $request->all();
        $result = WebBrand::create($data);
        return $result;
    }
	
    public function update($request,$id)
    {
        $brand = WebBrand::find($id);
        $data = $request->all();
        $result = $brand->fill($data)->save();

        if($result){
            return true;
        } else{
            return false;

        }
    }
}


