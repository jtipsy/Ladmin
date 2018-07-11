<?php

namespace App\Repositories;

use App\Models\Store;
use Mockery\CountValidator\Exception;
use Flash;

class BrandStoreRepository {
	
    /**
     * get all brands
     *
     * @itas
     * @DateTime 2017-12-27
     * @return   array
     */
    public function getAll()
    {
		$Store = new Store();
		$Stores = $Store->select('id','name','brand_name','price')->where('status','=','1')->where('recommended','=','1')->orderBy("id", "desc")->limit(6)->get();
        return $Stores;
    }
	public function getDetail($id){
        try{
           $Store = Store::findOrFail($id);
        }catch (Exception $e){
            return 'not find Store';
        }
		return $Store;
	}
	/**
     * get all brands count
     * @DateTime 2017-12-27
     * @return   array
     */
    public function getCount()
    {
		$Store = new Store();
		$count = $Store->count();
        return $count;
    }
	
    /**
     * brands dataTables data
     *
     * @return array
     */    
    public function ajaxIndex()
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

        $Store = new Store();
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
		
        $count = $Store->count();
		
		if($orders){
			$orderName = request('columns.' . request('order.0.column') . '.name');
			$orderDir = request('order.0.dir');
			$Store = $Store->orderBy($orderName, $orderDir);
		}

        $Store = $Store->limit(20);
        $Stores = $Store->orderBy("id", "desc")->get();
        if ($Stores) {
            foreach ($Stores as &$v) {
                $v['actionButton'] = $v->getActionButtonAttribute(true);
            }
        }
        return [
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $Stores,
        ];
    }
	
    public function getStoreById($id) {
        try{
           $Store = Store::findOrFail($id);

        }catch (Exception $e){
            return 'not find Store';
        }
        return $Store;
    }

    public function store($request)
    {
        $data = $request->all();
        //$data['content'] = $data['content'];
        $result = Store::create($data);
        return $result;
    }

    public function destroy($id)
    {
        $result = Store::destroy($id);
        
        if($result) {
            return true;
        }else {
            return false;
        }
    }

    public function update($request,$id)
    {
        $Store = Store::find($id);
        $data = $request->all();
        //$data['content'] = $data['content'];

        $result = $Store->fill($data)->save();

        if($result){
            return true;
        } else{
            return false;

        }
    }
	
	/**
	 * 推荐店铺
	 * @author jtipsy
	 * @date   2018-01-30
	 * @param  [type]                   $id     [description]
	 * @param  [type]                   $status [description]
	 * @return [type]                           [description]
	 */
	public function recomd($id,$status)
	{
		$Store = Store::find($id);
		if ($Store) {
			$Store->recommended = $status;
			if ($Store->save()) {
				Flash::success(trans('alerts.Store.recomd_success'));
				return true;
			}
			Flash::error(trans('alerts.Store.recomd_error'));
			return false;
		}
		abort(404);
	}
	
	/**
	 * 修改店铺状态
	 * @author jtipsy
	 * @date   2018-01-30
	 * @param  [type]                   $id     [description]
	 * @param  [type]                   $status [description]
	 * @return [type]                           [description]
	 */
	public function mark($id,$status)
	{
		$Store = Store::find($id);
		if ($Store) {
			$Store->status = $status;
			if ($Store->save()) {
				Flash::success(trans('alerts.Store.updated_success'));
				return true;
			}
			Flash::error(trans('alerts.Store.updated_error'));
			return false;
		}
		abort(404);
	}
    /**
     * 更新文章浏览数
     *
     * @param $article_id
     * @return int
     */
    public function updateViewCount($id)
    {
        $res = Store::whereId($id)->increment("view_count",1);
        return $res;
    }

}


