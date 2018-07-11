<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductsCollect;
use DB;
use Mockery\CountValidator\Exception;
use Flash;

class BrandProductRepository {
	
    /**
     * get all brands
     *
     * @itas
     * @DateTime 2017-12-27
     * @return   array
     */
    public function getAll()
    {
		$product = new Product();
		$products = $product->select('id','name','brand_name','price')->where('status','=','1')->where('recommended','=','1')->orderBy("id", "desc")->limit(5)->get();
        return $products;
    }
	
	
	public function getDetail($product_id){
		$product = new Product();
        try{
		$Products = DB::table('products')
		->join('brands','products.brand_id','=','brands.id')
		->select('products.*','brands.logo','brands.enterprise')
		->where('products.status','=','1')
		->where('products.id','=',$product_id)
		->orderBy("products.id", "desc")
		->get();
        }catch (Exception $e){
            return 'not find Product';
        }
		return $Products;
	}
	//推荐的店铺
	public function getStoreDetail($id){
        try{
			$stores = DB::table('products')
			->join('stores','products.brand_id','=','stores.brand_id')
			->where('products.id','=',$id)
			->where('stores.recommended','=','1')
			->select('stores.id as store_id','stores.name as store_name','stores.type as store_type','stores.phone as store_phone','stores.address as store_address','stores.more1 as store_more1','stores.more2 as store_more2')
			->get();
        }catch (Exception $e){
            return 'not find Store';
        }
		return $stores;
	}
	//收藏的产品状态
	public function getStatus($product_id,$uid){
		$ProductsCollect = new ProductsCollect();
        try{
		$ProductsCollects = $ProductsCollect->select('status')->where('product_id','=',$product_id)->where('uid','=',$uid)->get();
        }catch (Exception $e){
            return 'not find ProductsCollect';
        }
		return $ProductsCollects;
	}	
	
	/**
     * get all brands count
     * @DateTime 2017-12-27
     * @return   array
     */
    public function getCount()
    {
		$product = new Product();
		$count = $product->count();
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
        $species  = request('species','');
        $level = request('level','');
        $price = request('price','');
        $specifications = request('specifications','');
        $net_weight = request('net_weight','');
		$view_count = request('view_count','');
        $status = request('status','');
       



        $created_at_from = request('created_at_from' ,'');
        $created_at_to = request('created_at_to' ,'');
        $updated_at_from = request('updated_at_from' ,'');
        $updated_at_to = request('updated_at_to' ,'');
		$orders = request('order', []);

        $product = new Product();
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
                $v['actionButton'] = $v->getActionButtonAttribute(true);
            }
        }
        return [
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $products,
        ];
    }
	//web品牌中心产品列表
    public function ajaxWebIndex()
    {
        $draw = request('draw', 1);/*获取请求次数*/
        $start = request('start', config('admin.golbal.list.start')); /*获取开始*/
        $length = request('length', config('admin.golbal.list.length')); ///*获取条数*/

        $search_pattern = true; /*是否启用模糊搜索*/
        $product = new Product();		
        $count = $product->count();
        $product = $product->offset($start)->limit($length);
        //$products = $product->select('id','thumb','name','brand_name','specifications','price','net_weight','view_count')->orderBy("id", "desc")->get();
        $products = $product->orderBy("id", "desc")->get();
        if ($products) {
            foreach ($products as &$v) {
                $v['actionButton'] = $v->getActionButtonAttribute(true);
            }
        }
		return [
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $products,
        ];
    }
	//小程序产品列表
	public function ajaxList()
    {
        $draw = request('draw', 1);/*获取请求次数*/
        $start = request('start', config('admin.golbal.list.start')); /*获取开始*/
        $length = request('length', config('admin.golbal.list.length')); ///*获取条数*/

        $search_pattern = true; /*是否启用模糊搜索*/

        $name = request('name' ,'');
        $brand_name = request('brand_name' ,'');
		$species  = request('species','');
        $level = request('level','');

        $product = new Product();
        /*产品名*/
        if(!empty($name)){
            $product = $product->where('name', 'like', '%'.$name.'%');
        }else{
			$product = $product->where('brand_name', $brand_name);
		}

        /*品牌名*/
        if(!empty($brand_name)){
            if($search_pattern){
                $product = $product->where('brand_name', 'like','%'. $brand_name.'%');
            }else{
                $product = $product->where('brand_name', $brand_name);
            }
        } 

		/*种类*/
        if(!empty($species)){
            $product = $product->where('species', $species);
        }  
		
		
		/*等级*/
        if(!empty($level)){
            $product = $product->where('level', $level);
        }        
		
        $count = $product->count();
        $product = $product->limit(20);
        $products = $product->select('id','thumb','name','brand_name','specifications','price','net_weight','view_count')->orderBy("id", "desc")->get();
		return $products;
    }
	//【找肉】全部品牌 id、name、logo、sort
	public function getBrandsList(){
		$brand = new Brand();
		$brands = $brand->select('id','logo','name','sort')->where('status','=','1')->orderBy("sort", "asc")->get();
        return $brands;
	}
	//【找肉】全部产品筛选
	public function ProductListOrder()
    {
		$product = new Product();
        $draw = request('draw', 1);/*获取请求次数*/
        $start = request('start', config('admin.golbal.list.start')); /*获取开始*/
        $length = request('length', config('admin.golbal.list.length')); ///*获取条数*/

        $search_pattern = true; /*是否启用模糊搜索*/
        $brand1 = request('brand1');
        $brand2 = request('brand2');
        $brand3 = request('brand3');
        $species = request('species');
        $recommended = request('recommended');
        $level = request('level');
        $price = request('price');
        $Selling_way = request('Selling_way');
		if($brand1 || $brand2 || $brand3){
            $product = $product->
			where(function($query) use ($brand1,$brand2,$brand3){
				$query->where('brand_id','=', $brand1)->
				orwhere('brand_id','=', $brand2)->
				orwhere('brand_id','=', $brand3);
			});
        }elseif($brand1){
			$product = $product->where('brand_id', $brand1);
		}elseif($brand2){
			$product = $product->where('brand_id', $brand2);
		}elseif($brand3){
			$product = $product->where('brand_id', $brand3);
		}else{
			$product = $product->where('status', '1');
		}

		if($species){
            $product = $product->where('species', $species);
        }
		if($recommended){
            $product = $product->where('recommended', $recommended);
        }
		if($level){
            $product = $product->where('level', $level);
        }
		if($price == 1){
            $product = $product->orderBy("price", "desc");
        }else{
			$product = $product->orderBy("price", "asc");
		}
		if($Selling_way){
            $product = $product->where('Selling_way', $Selling_way);
        }
		$products = $product->select('id','thumb','name','brand_name','price','specifications','view_count','net_weight','level','Country_of_origin')->offset($start)->paginate(10);
		return $products;
    }
	
    public function getProductById($id) {
        try{
           $Product = Product::findOrFail($id);

        }catch (Exception $e){
            return 'not find Product';
        }
        return $Product->toArray();
    }

    public function store($request)
    {
        $data = $request->all();
        //$data['content'] = $data['content'];
        $result = Product::create($data);
        return $result;
    }
	
	//create product collect
	public function ProductCollect($request){
		$data = $request->all();
        $result = ProductsCollect::create($data);
        return $result;
	}
	
	//select product collect
	public function SelectProductCollect($uid,$product_id){
		$ProductsCollect = new ProductsCollect();
		$ProductsCollects = $ProductsCollect->select('id')->where('status','=','1')->where('uid','=',$uid)->where('product_id','=',$product_id)->get();
        return $ProductsCollects;
	}
	
	//product collect list
	public function CollectList($uid){
		$CollectList = DB::table('products')->join('products_collect','products.id','=','products_collect.product_id')
		->select('products.id as product_id', 'products.thumb','products.name','products.species','products.level','products.price','products.specifications','products.describe','products.Country_of_origin','products_collect.id')->where('products_collect.uid','=',$uid)->orderBy("products_collect.id", "desc")->get();
        return $CollectList;
	}
	
	//cancel Product collect
	public function CancelProductCollect($product_id,$uid)
    {
		$is_status = ProductsCollect::where('product_id','=',$product_id)->where('uid','=',$uid)->get();
		foreach($is_status as $val){
			$id = $val['id'];
		}
        $result = ProductsCollect::destroy($id);
		if($result){
			return true;
		}else{
			return false;
		}
    }
	
    public function destroy($id)
    {
        $result = Product::destroy($id);
        
        if($result) {
            return true;
        }else {
            return false;
        }
    }

    public function update($request,$id)
    {
        $product = Product::find($id);
        $data = $request->all();
        //$data['content'] = $data['content'];

        $result = $product->fill($data)->save();

        if($result){
            return true;
        } else{
            return false;

        }
    }
	
	/**
	 * 推荐产品
	 * @author jtipsy
	 * @date   2018-01-30
	 * @param  [type]                   $id     [description]
	 * @param  [type]                   $status [description]
	 * @return [type]                           [description]
	 */
	public function recomd($id,$status)
	{
		$product = Product::find($id);
		if ($product) {
			$product->recommended = $status;
			if ($product->save()) {
				Flash::success(trans('alerts.product.recomd_success'));
				return true;
			}
			Flash::error(trans('alerts.product.recomd_error'));
			return false;
		}
		abort(404);
	}
	
	/**
	 * 修改产品状态
	 * @author jtipsy
	 * @date   2018-01-30
	 * @param  [type]                   $id     [description]
	 * @param  [type]                   $status [description]
	 * @return [type]                           [description]
	 */
	public function mark($id,$status)
	{
		$Product = Product::find($id);
		if ($Product) {
			$Product->status = $status;
			if ($Product->save()) {
				Flash::success(trans('alerts.product.updated_success'));
				return true;
			}
			Flash::error(trans('alerts.product.updated_error'));
			return false;
		}
		abort(404);
	}
    /**
     * 更新浏览数
     *
     * @param $article_id
     * @return int
     */
    public function updateViewCount($id)
    {
		$res = Product::whereId($id)->increment("view_count",mt_rand(1,3));
        return $res;
    }

}


