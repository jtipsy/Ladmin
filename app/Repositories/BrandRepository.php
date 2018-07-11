<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Models\BrandsCollect;
use App\Models\Store;
use App\Models\Product;
use DB;
use Mockery\CountValidator\Exception;
use Flash;

class BrandRepository {

    /**
     * get all brands
     * @DateTime 2017-12-27
     * @return   array
     */
    public function getAll()
    {
		$brands = DB::table('brands')->select('id', 'logo','name', 'phone', 'view_count')->where('status','=','1')->where('recommended','=','1')->orderBy("id", "desc")->limit(10)->get();
        return $brands;
    }    
	//品牌详情
	public function getDetail($id){
		$brand = new Brand();
        try{
		$brands = $brand->select('id','name','logo','phone','describe','enterprise','atlas1','atlas2','atlas3','atlas4','level1','level2','level3','level4','level5')->where('id','=',$id)->where('status','=','1')->orderBy("id", "desc")->get();
        }catch (Exception $e){
            return 'not find Brand';
        }
		return $brands;
	}
	//推荐的店铺
	public function getStoreDetail($id){
		$store = new Store();
        try{
		$stores = $store->select('id as store_id','name as store_name','type as store_type','phone as store_phone','address as store_address','describe as store_describe','more1 as store_more1','more2 as store_more2','recommended as store_recommended')->where('brand_id','=',$id)->where('status','=','1')->orderBy("id", "desc")->limit(4)->get();
        }catch (Exception $e){
            return 'not find Store';
        }
		return $stores;
	}
	//推荐的产品
	public function getProductDetail($id){
		$product = new Product();
        try{
		$products = $product->select('brand_id','id as product_id','view_count','thumb as product_thumb','name as product_name','species as product_species','recommended as product_recommended','level as product_level','price as product_price','specifications as product_specifications','describe as product_describe','Country_of_origin as product_Country_of_origin')->where('brand_id','=',$id)->where('status','=','1')->where('recommended','=','1')->orderBy("id", "desc")->get();
        }catch (Exception $e){
            return 'not find Product';
        }
		return $products;
	}
	//收藏的品牌状态
	public function getStatus($id,$uid){
		$BrandsCollect = new BrandsCollect();
        try{
		$BrandsCollects = $BrandsCollect->select('status')->where('brand_id','=',$id)->where('uid','=',$uid)->get();
        }catch (Exception $e){
            return 'not find BrandsCollect';
        }
		return $BrandsCollects;
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

        $brand = new Brand();
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
                $v['actionButton'] = $v->getActionButtonAttribute(true);
            }
        }
        return [
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $brands,
        ];
    }
	
    public function BrandListOrder()
    {
        $draw = request('draw', 1);/*获取请求次数*/
        $start = request('start', config('admin.golbal.list.start')); /*获取开始*/
        $length = request('length', config('admin.golbal.list.length')); ///*获取条数*/

        $search_pattern = true; /*是否启用模糊搜索*/

        $sheep = request('sheep' ,'');
        $cow = request('cow' ,'');
        $pig = request('pig' ,'');
        $chicken = request('chicken' ,'');
        $duck = request('duck' ,'');
        $goose = request('goose' ,'');
        $fish = request('fish' ,'');
        $camel = request('camel' ,'');
        $donkey = request('donkey' ,'');
        $horse = request('horse' ,'');
        $other = request('other' ,'');
        $level1 = request('level1' ,'');
        $level2 = request('level2' ,'');
        $level3 = request('level3' ,'');
        $level4 = request('level4' ,'');
        $level5 = request('level5' ,'');
        $brand = new Brand();

				if($sheep) {
			$brand = $brand->where('sheep', $sheep);
        }         
				if($cow) {
			$brand = $brand->where('cow', $cow);
        } 		
				if($pig) {
			$brand = $brand->where('pig', $pig);
        }
				if($chicken) {
			$brand = $brand->where('chicken', $chicken);
        } 
				if($duck) {
			$brand = $brand->where('duck', $duck);
        } 
				if($goose) {
			$brand = $brand->where('goose', $goose);
        } 
				if($fish) {
			$brand = $brand->where('fish', $fish);
        } 
				if($camel) {
			$brand = $brand->where('camel', $camel);
        } 
				if($donkey) {
			$brand = $brand->where('donkey', $donkey);
        } 
				if($horse) {
			$brand = $brand->where('horse', $horse);
        }
				if($level1) {
			$brand = $brand->where('level1', $level1);
        } 
				if($level2) {
			$brand = $brand->where('level2', $level2);
        } 
				if($level3) {
			$brand = $brand->where('level3', $level3);
        } 
				if($level4) {
			$brand = $brand->where('level4', $level4);
        } 
				if($level5) {
			$brand = $brand->where('level5', $level5);
        } 
		
        $count = $brand->count();

        $brands = $brand->select("id","logo","name","sort")->orderBy("id", "desc")->get();
		if($brands){
			return $brands;
		}
        return false;
    }	

	
    public function getBrandById($id) {
        try{
           $Brand = Brand::findOrFail($id);

        }catch (Exception $e){
            return 'not find Brand';
        }
        return $Brand->toArray();
    }

    public function store($request)
    {
        $data = $request->all();
        //$data['content'] = $data['content'];
        $result = Brand::create($data);
        return $result;
    }
	
	//create brand collect
	public function BrandCollect($request){
		$data = $request->all();
        $result = BrandsCollect::create($data);
        return $result;
	}	
	//select brand collect
	public function SelectBrandCollect($uid,$brand_id){
		$BrandCollect = new BrandsCollect();
		$BrandCollects = $BrandCollect->select('id')->where('status','=','1')->where('uid','=',$uid)->where('brand_id','=',$brand_id)->get();
        return $BrandCollects;
	}	
	//brand collect list
	public function CollectList($uid){
		$CollectList = DB::table('brands')->join('brands_collect','brands.id','=','brands_collect.brand_id')
		->select('brands.id as brand_id', 'logo','name', 'brands_collect.id','brands_collect.status')->where('brands_collect.uid','=',$uid)->orderBy("brands_collect.id", "desc")->get();
        return $CollectList;
	}
	
	//cancel brand collect
	public function CancelBrandCollect($brand_id,$uid)
    {
		$is_status = BrandsCollect::where('brand_id','=',$brand_id)->where('uid','=',$uid)->get();
		foreach($is_status as $val){
			$id = $val['id'];
		}
        $result = BrandsCollect::destroy($id);
		if($result){
			return true;
		}else{
			return false;
		}
    }

    public function destroy($id)
    {
        $result = Brand::destroy($id);
        
        if($result) {
            return true;
        }else {
            return false;
        }
    }

    public function update($request,$id)
    {
        $brand = Brand::find($id);
        $data = $request->all();
        //$data['content'] = $data['content'];

        $result = $brand->fill($data)->save();

        if($result){
            return true;
        } else{
            return false;

        }
    }
	/**
	 * 修改品牌状态
	 * @author jtipsy
	 * @date   2018-01-30
	 * @param  [type]                   $id     [description]
	 * @param  [type]                   $status [description]
	 * @return [type]                           [description]
	 */
	public function mark($id,$status)
	{
		$brand = Brand::find($id);
		if ($brand) {
			$brand->status = $status;
			if ($brand->save()) {
				Flash::success(trans('alerts.brand.updated_success'));
				return true;
			}
			Flash::error(trans('alerts.brand.updated_error'));
			return false;
		}
		abort(404);
	}	
	/**
	 * 推荐品牌
	 * @author jtipsy
	 * @date   2018-01-30
	 * @param  [type]                   $id     [description]
	 * @param  [type]                   $status [description]
	 * @return [type]                           [description]
	 */
	public function recomd($id,$status)
	{
		$brand = Brand::find($id);
		if ($brand) {
			$brand->recommended = $status;
			if ($brand->save()) {
				Flash::success(trans('alerts.brand.recomd_success'));
				return true;
			}
			Flash::error(trans('alerts.brand.recomd_error'));
			return false;
		}
		abort(404);
	}
	
	
    /**
     * 更新品牌浏览数
     *
     * @param $id
     * @return int
     */
    public function updateViewCount($id)
    {
        $res = Brand::whereId($id)->increment("view_count",mt_rand(1,3));
        return $res;
    }    
	
	/**
     * 更新产品浏览数
     *
     * @param $id
     * @return int
     */
    public function updateProductViewCount($id)
    {
        $res = Product::whereId($id)->increment("view_count",mt_rand(1,3));
        return $res;
    }

}


