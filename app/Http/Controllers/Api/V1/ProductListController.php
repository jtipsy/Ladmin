<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BrandProductRepository;
use App\Http\Requests\BrandProductRequest;
use Flash;

class ProductListController extends Controller
{
    /**
     * @api {get} /product/index/37fb591be38db52dd1d5f04b689008f6 【首页】推荐产品
     * @apiVersion 0.0.1
     * @apiName Product-Index
     * @apiGroup Product
     *
     * @apiSuccess {Int} id 产品id
     * @apiSuccess {String} name	产品名称
     * @apiSuccess {String} brand_name 所属品牌
     * @apiSuccess {Decimal} price 产品报价
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "获取产品成功！",
     *       "data": {
     *           "id": 1,
     *           "name": 蒙高丽亚后腿切块,
     *           "brand_name": 蒙高丽亚,
     *           "price": 78.00
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "message": "暂无数据！",
     *       "status_code": 404
     *   }
     */
    public function index( BrandProductRepository $repository)
    {
        $Data = $repository->getAll();
		if($Data){
			return response()->json(['status_code'=>200,'msg'=>'获取产品成功！','data'=>$Data]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'暂无数据','data'=>false]); 
		}
    }
	
    /**
     * @api {get} /products/list/37fb591be38db52dd1d5f04b689008f6?brand1=1&brand2=2&brand3=3 【找肉】全部产品
     * @apiVersion 0.0.1
     * @apiName Products-List
     * @apiGroup Product
     *
     * @apiParam (params) {Int} brand1  品牌id
     * @apiParam (params) {Int} brand2  品牌id
     * @apiParam (params) {Int} brand3  品牌id
     * @apiParam (params) {Int} brand3  品牌id
     * @apiParam (params) {Int} species  种类:1其他、2羊、3牛、4驼、5猪、6鸡、7鸭、8鹅、9鱼、10驴、11马
     * @apiParam (params) {Int} recommended  推荐状态 1：推荐 2否 
     * @apiParam (params) {Int} level  等级 1:普通 2：绿色 3：有机 4:无公害 5：原生态
     * @apiParam (params) {Decimal} price  价格
     * @apiParam (params) {Int} Selling_way  售卖方式：1零售、2批发
	 *
     * @apiSuccess {Int} total 总条数
     * @apiSuccess {Int} per_page 每页条数
     * @apiSuccess {Int} current_page 当前页
     * @apiSuccess {Int} last_page 总页数
     * @apiSuccess {String} next_page_url 下一页
     * @apiSuccess {String} prev_page_url 上一页
     * @apiSuccess {Int} from 从
     * @apiSuccess {Int} to 至
	 
     * @apiSuccess {Int} id 产品id 
     * @apiSuccess {String} thumb 缩略图
     * @apiSuccess {String} name 产品名
     * @apiSuccess {String} brand_name 品牌名
     * @apiSuccess {String} price 价格
     * @apiSuccess {String} specifications 规格 1：件 2：袋 3：条 4：盒 5：箱 6：块 7：个 8：吨 9：卷 10：斤 11：公斤 12：g 13：kg
     * @apiSuccess {String} view_count 浏览量
     * @apiSuccess {String} net_weight 净含量
     * @apiSuccess {Int} id 品牌id
     * @apiSuccess {String} logo 品牌Logo
     * @apiSuccess {String} name 品牌名
     * @apiSuccess {String} sort 按字母排序
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "请求成功！",
     *       "products": {
     *           "total": 327,
     *           "per_page": 10,
     *           "current_page": 1,
     *           "last_page": 33,
     *           "next_page_url": "http://api.meathome.com.cn/api/products/list/37fb591be38db52dd1d5f04b689008f6?page=2",
     *           "prev_page_url": "http://api.meathome.com.cn/api/products/list/37fb591be38db52dd1d5f04b689008f6?page=1",
     *           "from": 11,
     *           "to": 20,
     *           "data":[
     *               {
     *                   "id": 1,
     *                   "thumb": https://images.mongoliaci.com/backend/uploads/20180423/20180423142113585.jpg,
     *                   "name": 蒙高丽亚后腿切块,
     *                   "brand_name": 蒙高丽亚,
     *                   "price": "26.00",
     *                   "specifications": 1,
     *                   "view_count": 0,
     *                   "net_weight": "0.5"
     *               }
     *           ]
     *       },
     *       "sort":{
	 *			 "id": 1,
	 *			 "logo": https://images.mongoliaci.com/backend/uploads/20180423/20180423135321575.jpg,
	 *			 "name": 蒙高丽亚,
	 *			 "sort": M,
	 *	     }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 404,
     *       "msg": "暂无数据！",
     *       
     *   }
     */
	public function ProductListOrder(Request $request,BrandProductRepository $repository){
		$Products = $repository->ProductListOrder($request);
		$Brands = $repository->getBrandsList();
		$Data = array();
		foreach($Brands as $val){
			$brand = array();
			$brand['id'] = $val['id'];
			$brand['logo'] = $val['logo'];
			$brand['name'] = $val['name'];
			$brand['sort'] = $val['sort'];
			$Data[] = $brand;
		}
		foreach($Data as $key=>$val){
			$sort[$val['sort']][] = $val;
		}
		foreach($Products as $p){
			$pid = $p['id'];
			$update = $repository->updateViewCount($pid);
		}
		if($Products->count()){
			return response()->json(['status_code'=>200,'msg'=>'请求成功！','products'=>$Products,'sort'=>$sort]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'暂无数据！','products'=>array('data'=>Null),'sort'=>$sort]);
		}
	}
	
    /**
     * @api {post} /product/list/37fb591be38db52dd1d5f04b689008f6?name=羊肉&brand_name=蒙高丽亚&species=1&level=1 【首页】搜索产品
     * @apiVersion 0.0.1
     * @apiName Product-List
     * @apiGroup Product
     *
     * @apiParam (params) {String} name  产品名称
     * @apiParam (params) {String} brand_name  品牌名称
     * @apiParam (params) {Int} species  种类:1其他、2羊、3牛、4驼、5猪、6鸡、7鸭、8鹅、9鱼、10驴、11马
     * @apiParam (params) {Int} level  等级 1:普通 2：绿色 3：有机 4:无公害 5：原生态
	 
     * @apiSuccess {String} name	产品名称
     * @apiSuccess {String} brand_name 品牌名称
     * @apiSuccess {Int} species 种类:1其他、2羊、3牛、4驼、5猪、6鸡、7鸭、8鹅、9鱼、10驴、11马
     * @apiSuccess {Int} level 等级 1:普通 2：绿色 3：有机 4:无公害 5：原生态
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "获取产品成功！",
     *       "data": [
     *          {
     *             "id": 329,
     *             "thumb": "https://assets.meathome.com.cn/FjzWEE5FK4yJo3scnYu-0XeoUHLY",
     *             "name": "羊肉卷",
     *             "brand_name": "九月花",
     *             "specifications": 1,
     *             "price": "38.00",
     *             "net_weight": "0.5",
     *             "view_count": 0
     *           },
     *       ]
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 404,
     *       "msg": "未找到产品！",
     *       "data": false
     *   }
     */
    public function getProductList( BrandProductRepository $repository)
    {
        $Data = $repository->ajaxList();
		if($Data->count()){
			return response()->json(['status_code'=>200,'msg'=>'获取产品成功！','data'=>$Data]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'未找到产品！','data'=>false]);
		}
		
    }
	/**
     * @api {get} /product/detail/37fb591be38db52dd1d5f04b689008f6?uid=openid&product_id=1&brand_id=1 产品详情
     * @apiVersion 0.0.1
     * @apiName Product-Detail
     * @apiGroup Product
     *
     * @apiParam (params) {String} uid  微信用户openid
     * @apiParam (params) {Int} product_id  产品id
     * @apiParam (params) {Int} brand_id  品牌id
     * @apiSuccess {Int} id	产品自增id
     * @apiSuccess {String} thumb 产品缩略图
     * @apiSuccess {String} name	产品名称
     * @apiSuccess {Int} brand_id	品牌id
     * @apiSuccess {String} brand_name 品牌名称
     * @apiSuccess {Int} species 种类:1其他、2羊、3牛、4驼、5猪、6鸡、7鸭、8鹅、9鱼、10驴、11马
     * @apiSuccess {Int} status 状态 1：开启 2关闭 产品下架功能
     * @apiSuccess {Int} recommended 推荐状态 1：推荐 2否 
     * @apiSuccess {Int} level 等级 1:普通 2：绿色 3：有机 4:无公害 5：原生态
     * @apiSuccess {Decimal} price 价格
     * @apiSuccess {Int} specifications 规格 1：件 2：袋 3：条 4：盒 5：箱 6：块 7：个 8：吨 9：卷 10：斤 11：公斤 12：g 13：kg
     * @apiSuccess {String} describe 产品描述
     * @apiSuccess {String} net_weight 净含量
     * @apiSuccess {String} atlas1 产品图集1
     * @apiSuccess {String} atlas2 产品图集2
     * @apiSuccess {String} atlas3 产品图集3
     * @apiSuccess {String} atlas4 产品图集4
     * @apiSuccess {String} Country_of_origin 产品原产地
     * @apiSuccess {Int} cold  运送方式：1冷链、0无
     * @apiSuccess {Int} empty 运送方式：2空运、0无
     * @apiSuccess {Int} courier 运送方式3：快递、0无
     * @apiSuccess {String} Shipping_agency 运送机构
     * @apiSuccess {Int} Selling_way 售卖方式：1零售、2批发
     * @apiSuccess {Int} halal 是否清真：1是、2否
     * @apiSuccess {String} varieties 品种
     * @apiSuccess {String} Shelf_life 保质期
     * @apiSuccess {String} Storage_wap 储藏方式
     * @apiSuccess {String} temperature 储藏温度
     * @apiSuccess {String} warehouse_address 仓库地址
     * @apiSuccess {String} Production_license_number 生产许可证编号
     * @apiSuccess {String} Prodution_standard_no 生产标准号
     * @apiSuccess {Int} view_count 浏览量
     * @apiSuccess {Timestamp} created_at 添加时间
     * @apiSuccess {Timestamp} updated_at 更新时间	 
     * @apiSuccess {Int} store_id 店铺id
     * @apiSuccess {String} store_name 店铺名称
     * @apiSuccess {Int} store_type 店铺类型 1直营店、2专营店、3综合店、4代理商
     * @apiSuccess {String} store_phone 店铺电话
     * @apiSuccess {String} store_address 店铺地址
     * @apiSuccess {Int} store_more1 标签：售多地 0：无效 1：有效
     * @apiSuccess {Int} store_more2 标签：售本地 0：无效 1：有效
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "请求成功",
     *       "product": [
     *            {
     *                "id": 1,
     *                "thumb": https://images.mongoliaci.com/backend/uploads/20180423/20180423142113585.jpg,
     *                "name": 蒙高丽亚后腿切块,
	 *                "brand_id": 1,
     *                "brand_name": 蒙高丽亚,
     *                "species": 羊肉,
     *                "level": 1,
     *                "price": 78.00,
     *                "specifications": 1,
     *                "describe": 食于自然、忠于生活,
     *                "net_weight": 4,
     *                "atlas1": https://images.mongoliaci.com/backend/uploads/20180423/20180423142428235.jpg,
     *                "atlas2": https://images.mongoliaci.com/backend/uploads/20180423/20180423142428235.jpg,
     *                "atlas3": https://images.mongoliaci.com/backend/uploads/20180423/20180423142428235.jpg,
     *                "atlas4": https://images.mongoliaci.com/backend/uploads/20180423/20180423142428235.jpg,
     *                "Country_of_origin": 内蒙古新林浩特市,
     *                "cold": 1,
     *                "empty": 0,
     *                "courier": 0,
     *                "Shipping_agency": "",
     *                "Selling_way": 1,
     *                "halal": 1,
     *                "varieties": 这是品种,
     *                "Shelf_life": 12个月,
     *                "Storage_way": 冷冻,
     *                "temperature": -20℃",
     *                "warehouse_address": 这是仓库地址,
     *                "Production_license_number": 生产许可证编号,
     *                "Production_standard_no": 生产标准号,
     *                "view_count": 100,
     *                "created_at": 2018-04-23 14:25:21,
     *                "updated_at": 2018-04-23 16:53:48,
     *                "logo": "https://assets.meathome.com.cn/FiXq1JJ0EA_OBfb67aZnf1T9WQ9I",
     *                "enterprise": "锡林郭勒盟蒙高丽亚农牧业发展有限公司"
     *            }
     *         ],
     *         "Store":  [
     *            {
     *               "store_id": 1,
     *               "store_name": 蒙高丽亚直营店
     *               "store_type": 1
     *               "store_phone": 400-8000-02
     *               "store_address": 店铺地址
     *               "store_more1": 1
     *               "store_more2": 1
     *            }
     *         ],
     *         "status": {
     *              "status": 0
     *         }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 404,
     *       "msg": "暂无数据",
     *       "product":false,
     *       "store":false
     *   }
     */
	public function getProductDetail(BrandProductRepository $repository){
		$brand_id = request('brand_id');
		$product_id = request('product_id');
		$uid = request('uid');
		$Product = $repository->getDetail($product_id);
		$Store = $repository->getStoreDetail($brand_id);
		$data = $repository->getStatus($product_id,$uid);
		//产品 店铺
		if($Store || $Product){
			$code = 200;
			$msg = "请求成功!";
		}else{
			$code = 404;
			$msg = "暂无数据!";
		}
		$StoreData = $Store ? $Store : false;
		$ProductData = $Product ? $Product : false;
		$status = "";
		$sts = array('status'=>0);
		foreach($data as $val){
			$status = $val;
		}
		if($status){
			$ttus = $status;
		}else{
			$ttus = $sts;
		}
		return response()->json(['status_code'=>$code,'msg'=>$msg,'product'=>$ProductData,'Store'=>$StoreData,'status'=>$ttus]);
	}
	
    /**
     * @api {get} /product/collect/37fb591be38db52dd1d5f04b689008f6?uid=openid&product_id=1 收藏产品
     * @apiVersion 0.0.1
     * @apiName Product-Collect
     * @apiGroup Product
     *
     * @apiParam (params) {String} uid  微信用户openid
     * @apiParam (params) {String} product_id  产品id
     * @apiSuccess {String} uid 微信用户openid
     * @apiSuccess {Int} product_id 产品id
     * @apiSuccess {Timestamp} created_at 收藏时间
     * @apiSuccess {Timestamp} updated_at 更新时间
     * @apiSuccess {Int} id 收藏自增id
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "收藏成功！",
     *       "ProductCollect": {
     *           "uid": odzwM5Ma7Hbei5bQWgaB_LTwFn1Y,
     *           "product_id": 1,
     *           "created_at": 2018-04-16 17:38:35,
     *           "updated_at": 2018-04-16 17:38:35,
     *           "id": 1
     *       },
     *       "meta": {
     *           "status_code": 200,
     *           "msg": "已经收藏过了！",
     *           "data": [
     *               {
     *                   "id":1
     *               }
     *           ]
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 403,
     *       "msg": "非法请求"
     *       
     *   }
     */
	public function ProductCollect(Request $request,BrandProductRepository $repository){
		$uid = request('uid');
		$product_id = request('product_id');
		if(!$uid || !$product_id) {
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
        $SelectProductCollect = $repository->SelectProductCollect($uid,$product_id);
		if($SelectProductCollect->count()){
			return response()->json(['status_code'=>200,'msg'=>'已经收藏过了！','data'=>$SelectProductCollect]);
			exit();
		}
        $ProductCollect = $repository->ProductCollect($request);
		return response()->json(['status_code'=>200,'msg'=>'收藏成功！','ProductCollect'=>$ProductCollect]);
	}
    /**
     * @api {get} /product/collect/list/37fb591be38db52dd1d5f04b689008f6?uid=openid 产品收藏列表
     * @apiVersion 0.0.1
     * @apiName Product-Collect-List
     * @apiGroup Product
     *
     * @apiParam (params) {String} uid  微信用户openid
     * @apiSuccess {String} uid 微信用户openid
     * @apiSuccess {Int} product_id 产品id
     * @apiSuccess {String} thumb 产品logo
     * @apiSuccess {String} name 产品名称
     * @apiSuccess {Int} species 产品种类
     * @apiSuccess {Int} level 产品等级(1:普通 2：绿色 3：有机 4:无公害 5：原生态)
     * @apiSuccess {Decimal} price 产品价格
     * @apiSuccess {Int} specifications 产品规格(1：件 2：袋 3：条 4：盒 5：箱 6：块 7：个 8：吨 9：卷 10：斤 11：公斤 12：g 13：kg)
     * @apiSuccess {String} describe 产品描述
     * @apiSuccess {String} Country_of_origin 原产地
     * @apiSuccess {Int} id 收藏id
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "请求成功！",
     *       "CollectList": {
     *           "product_id": 1,
     *           "thumb": /backend/uploads/20180329/20180329094349617.jpg,
     *           "name": 羔羊方砖,
     *           "species": 1,
     *           "level": 1,
     *           "price": 600.00,
     *           "specifications": 1,
     *           "describe": 羔羊方砖的描述内容,
     *           "Country_of_origin": 内蒙古巴彦淖尔国家级经济技术开发区,
     *           "id": 1,
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 403,
     *       "msg": "非法请求",
     *       
     *   }
     */
	public function ProductCollectList(Request $request,BrandProductRepository $repository){
		$uid = request('uid');
		if(!$uid) {
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
        $CollectList = $repository->CollectList($uid);
		if($CollectList){
			return response()->json(['status_code'=>200,'msg'=>'请求成功！','CollectList'=>$CollectList]);
		}else{
			return response()->json(['status_code'=>200,'msg'=>'暂无数据！','CollectList'=>false]);
		}
		
	}
    /**
     * @api {get} /product/collect/cancel/37fb591be38db52dd1d5f04b689008f6?uid=openid&collect_id=1 取消收藏
     * @apiVersion 0.0.1
     * @apiName Product-Collect-Cancel
     * @apiGroup Product
     *
     * @apiParam (params) {String} uid  微信用户openid
     * @apiParam (params) {Int} collect_id  产品收藏id
     * @apiSuccess {String} uid 微信用户openid
     * @apiSuccess {Int} collect_id 产品收藏id
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "请求成功！",
     *       "data":true;
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 403,
     *       "msg": "非法请求",
     *       
     *   }
     */
    public function CancelProductCollect(Request $request,BrandProductRepository $repository)
    {
		$uid = request('uid');
		$product_id = request('product_id');
		if(!$uid || !$product_id){
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
        $result = $repository->CancelProductCollect($product_id,$uid);
		if($result){
			return response()->json(['status_code'=>200,'msg'=>'请求成功！','data'=>$result]);
		}else{
			return response()->json(['status_code'=>500,'msg'=>'数据异常!','data'=>false]);
		}
		
    }
}
