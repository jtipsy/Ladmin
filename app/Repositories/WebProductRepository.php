<?php

namespace App\Repositories;

use App\Models\WebProduct;
use App\Models\Brand;
use DB;
use Mockery\CountValidator\Exception;
use Flash;

class WebProductRepository {
	
    public function getAll($user_id){
		//get brand_id
		if($user_id){
			$getByid = DB::table('brands')->select('id')->where('admin_id','=',$user_id)->get();
			foreach ($getByid as $val){
				$brand_id = $val->id;
			}
		}
		
		$products = WebProduct::select('id','name','brand_name','price')->where('brand_id',$brand_id)->orderBy("id", "desc")->get();
		return $products;
        
    }
	/**
     * get all products
     *
     * @itas
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
        $brand_name = request('brand_name' ,'');
        $species  = request('species','');
        $level = request('level','');
        $price = request('price','');
        $specifications = request('specifications','');
        $net_weight = request('net_weight','');
        $recommended = request('recommended','');
		$view_count = request('view_count','');
        $status = request('status','');

        $created_at_from = request('created_at_from' ,'');
        $created_at_to = request('created_at_to' ,'');
        $updated_at_from = request('updated_at_from' ,'');
        $updated_at_to = request('updated_at_to' ,'');
		$orders = request('order', []);
		
		//get brand_id
		if($user_id){
			$getByid = DB::table('brands')->select('id')->where('admin_id','=',$user_id)->get();
			foreach ($getByid as $val){
				$brand_id = $val->id;
			}
		}
		
		$product = new WebProduct();

        /*产品名*/
        if($name){
            if($search_pattern){
                $product = $product->where('name', 'like', '%'.$name.'%');
            }else{
                $product = $product->where('name', $name);
            }
        }

        /*品牌名*/
        if($brand_name){
            if($search_pattern){
                $product = $product->where('brand_name', 'like','%'. $brand_name.'%');
            }else{
                $product = $product->where('brand_name', $brand_name);
            }
        }         
		
		/*种类*/
        if($species){
            $product = $product->where('species', $species);
        }  
		
		
		/*等级*/
        if($level){
            $product = $product->where('level', $level);
        }		
		
		/*价格*/
        if($price){
            if($search_pattern){
                $product = $product->where('price', 'like','%'. $price.'%');
            }
        } 		
		
		/*规格*/
        if($specifications){
            $product = $product->where('specifications', $specifications);
        } 	
		
		/*推荐*/
        if($recommended){
            $product = $product->where('recommended', $recommended);
        } 
		
		/*状态搜索*/
        if($status) {
			$product = $product->where('status', $status);
        }

        /*创建时间搜索*/
        if($created_at_from){
            $product = $product->where('created_at', '>=', getTime($created_at_from));
        }
        if($created_at_to){
            $product = $product->where('created_at', '<=', getTime($created_at_to, false));
        }        
		/*修改时间搜索*/
        if($updated_at_from){
            $product = $product->where('updated_at', '>=', getTime($updated_at_from));
        }
        if($updated_at_to){
            $product = $product->where('updated_at', '<=', getTime($updated_at_to, false));
        }
		
		if($brand_id){
			$product = $product->where('brand_id',$brand_id);
		}
		
        $count = $product->count();
		
		if($orders){
			$orderName = request('columns.' . request('order.0.column') . '.name');
			$orderDir = request('order.0.dir');
			$product = $product->orderBy($orderName, $orderDir);
		}
		
        $product = $product->offset($start)->limit($length);
        $products = $product->orderBy("id", "desc")->get();
        if ($products) {
            foreach ($products as &$v) {
                $v['webactionButton'] = $v->getActionButtonAttribute(true);
            }
        }
		return [
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $products,
        ];
    }
    /**
     * get all products
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
	
    public function getProduct($user_id) {
        try{
			$brand_id = "";
			//get brand_id
			if($user_id){
				$getByid = DB::table('brands')->select('id')->where('admin_id','=',$user_id)->get();
				foreach ($getByid as $val){
					$brand_id = $val->id;
				}
			}
			$product = WebProduct::select('id','thumb','name')->where('brand_id',$brand_id)->limit(6)->get();
        }catch (Exception $e){
            return 'not find Product';
        }
        return $product;
    }    
	
	public function getProductById($id) {
        try{
           $Product = WebProduct::findOrFail($id);

        }catch (Exception $e){
            return 'not find Product';
        }
        return $Product->toArray();
    }
	 
    /**
     * create products
     *
     * @itas
     * @DateTime 2018-6-4
     * @return   result
     */
    public function store($request)
    {
        $data = $request->all();
        //$data['content'] = $data['content'];
        $result = WebProduct::create($data);
        return $result;
    }
	
    public function update($request,$id)
    {
        $brand = WebProduct::find($id);
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
    public function destroy($id)
    {
        $result = WebProduct::destroy($id);
        
        if($result) {
            return true;
        }else {
            return false;
        }
    }
    /**
     * 更新文章浏览数
     *
     * @param $article_id
     * @return int
     */
    public function updateViewCount($id)
    {
		$res = WebProduct::whereId($id)->increment("view_count",mt_rand(1,3));
        return $res;
    }
}


