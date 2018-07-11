<?php

namespace App\Repositories;

use App\Models\WebStore;
use App\Models\Brand;
use DB;
use Mockery\CountValidator\Exception;
use Flash;

class WebStoreRepository {
	
    /**
     * get all products
     *
     * @itas
     * @DateTime 2017-12-27
     * @return   array
     */
    public function ajaxIndex($user_id)
    {
        $draw = request('draw', 1);/*获取请求次数*/
        $start = request('start', config('admin.golbal.list.start')); /*获取开始*/
        $length = request('length', config('admin.golbal.list.length')); ///*获取条数*/
        $search_pattern = true; /*是否启用模糊搜索*/
		
        $name = request('name' ,'');
        $brand_name = request('brand_name' ,'');
        $type  = request('type','');
        $phone = request('phone','');
        $recommended = request('recommended','');
        $status = request('status','');
		
        $created_at_from = request('created_at_from' ,'');
        $created_at_to = request('created_at_to' ,'');
        $updated_at_from = request('updated_at_from' ,'');
        $updated_at_to = request('updated_at_to' ,'');
		$orders = request('order', []);
		
		//get brand_id
		if($user_id){
			$getByid = Brand::select('id')->where('admin_id','=',$user_id)->get();
			foreach ($getByid as $val){
				$brand_id = $val->id;
			}
		}
		
        $Store = new WebStore();
		
		/*产品名*/
        if($name){
            if($search_pattern){
                $Store = $Store->where('name', 'like', '%'.$name.'%');
            }else{
                $Store = $Store->where('name', $name);
            }
        }

        /*品牌名*/
        if($brand_name){
            if($search_pattern){
                $Store = $Store->where('brand_name', 'like','%'. $brand_name.'%');
            }else{
                $Store = $Store->where('brand_name', $brand_name);
            }
        }         
		
		/*类型*/
        if($type){
            $Store = $Store->where('type', $type);
        }  	
		/*电话*/
        if($phone){
            if($search_pattern){
                $Store = $Store->where('phone', 'like','%'. $phone.'%');
            }
        } 		
		
		/*推荐*/
        if($recommended){
            $Store = $Store->where('recommended', $recommended);
        } 
		
		/*状态搜索*/
        if($status) {
			$Store = $Store->where('status', $status);
        } 



        /*创建时间搜索*/
        if($created_at_from){
            $Store = $Store->where('created_at', '>=', getTime($created_at_from));
        }
        if($created_at_to){
            $Store = $Store->where('created_at', '<=', getTime($created_at_to, false));
        }        
		/*修改时间搜索*/
        if($updated_at_from){
            $Store = $Store->where('updated_at', '>=', getTime($updated_at_from));
        }
        if($updated_at_to){
            $Store = $Store->where('updated_at', '<=', getTime($updated_at_to, false));
        }

		if($brand_id){
			$Store = $Store->where('brand_id', $brand_id);
		}
			
        $count = $Store->count();
		
		if($orders){
			$orderName = request('columns.' . request('order.0.column') . '.name');
			$orderDir = request('order.0.dir');
			$Store = $Store->orderBy($orderName, $orderDir);
		}
		
        $Store = $Store->offset($start)->limit($length);
        $Stores = $Store->orderBy("id", "desc")->get();
        if ($Stores) {
            foreach ($Stores as &$v) {
                $v['webactionButton'] = $v->getActionButtonAttribute(true);
            }
        }
		return [
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $Stores,
        ];
    }
    /**
     * get all brands
     *
     * @itas
     * @DateTime 2017-12-27
     * @return   brand_id
     */
	 public function getBrandId($admin_id){
		 //get brand_id
        try{
		$brands = Brand::select('id','name')->where('admin_id',$admin_id)->first();
        }catch (Exception $e){
            return 'not find Brand';
        }
		return $brands;
		
	 }
	 
    public function getStoreById($id) {
        try{
           $Store = WebStore::findOrFail($id);

        }catch (Exception $e){
            return 'not find Store';
        }
        return $Store->toArray();
    }
	 
    /**
     * create store
     *
     * @itas
     * @DateTime 2018-6-4
     * @return   result
     */
    public function store($request)
    {
        $data = $request->all();
        //$data['content'] = $data['content'];
        $result = WebStore::create($data);
        return $result;
    }
	
    public function update($request,$id)
    {
        $store = WebStore::find($id);
        $data = $request->all();
        $result = $store->fill($data)->save();

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
    public function destroy($id)
    {
        $result = WebStore::destroy($id);
        
        if($result) {
            return true;
        }else {
            return false;
        }
    }

}