<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BrandRepository;
use App\Repositories\BrandProductRepository;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\BrandProductRequest;
use Flash;

class BrandListController extends Controller
{
    /**
     * @api {get} /brand/index/37fb591be38db52dd1d5f04b689008f6 【首页】推荐品牌
     * @apiVersion 0.0.1
     * @apiName Brand-Index
     * @apiGroup Brand
     *
     * @apiSuccess {Int} id 品牌id
     * @apiSuccess {String} logo  LOGO
     * @apiSuccess {String} name	品牌名称
     * @apiSuccess {String} phone 客服电话
     * @apiSuccess {Int} view_count 浏览量
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
	 *       "status_code": 200,
	 *       "msg": "获取品牌成功！",
     *       "brand": {
     *           "id": 1,
     *           "logo": https://assets.meathome.com.cn/FieZhfZTM9bDIMhH-2Bcf51LL0J5,
     *           "name": 蒙高丽亚,
     *           "phone": 15034889912,
     *           "view_count": 1
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 404,
     *       "msg": "获取品牌失败！",
     *       "article": false
     *   }
     */
    public function index( BrandRepository $repository)
    {
        $brand = $repository->getAll();
		if($brand){
			return response()->json(['status_code'=>200,'msg'=>'获取品牌成功！','brand'=>$brand]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'获取品牌失败！','brand'=>false]);
		}
		
    }
	
    /**
     * @api {get} /brand/detail/37fb591be38db52dd1d5f04b689008f6?id=1 品牌详情
     * @apiVersion 0.0.1
     * @apiName Brand-Detail
     * @apiGroup Brand
     *
     * @apiParam (params) {Int} id  品牌id
     * @apiSuccess {Int} id  品牌id
     * @apiSuccess {String} name	品牌名称
     * @apiSuccess {String} logo 品牌Logo
     * @apiSuccess {String} phone 联系电话
     * @apiSuccess {String} describe 品牌介绍
     * @apiSuccess {String} enterprise 归属企业
     * @apiSuccess {String} atlas1 品牌图集1
     * @apiSuccess {String} atlas2 品牌图集2
     * @apiSuccess {String} atlas3 品牌图集3
     * @apiSuccess {String} atlas4 品牌图集4
     * @apiSuccess {Int} level1 普通 value = 1
     * @apiSuccess {Int} level2 绿色 value = 2
     * @apiSuccess {Int} level3 有机 value = 3
     * @apiSuccess {Int} level4 无公害 value = 4
     * @apiSuccess {Int} level5 原生态 value = 5
     * @apiSuccess {Int} store_id 店铺id
     * @apiSuccess {String} store_name 店铺名称
     * @apiSuccess {Int} store_type 店铺类型：1直营店、2专营店、3综合店、4代理商
     * @apiSuccess {String} store_phone 店铺电话
     * @apiSuccess {String} store_address 店铺地址
     * @apiSuccess {String} store_describe 店铺描述
     * @apiSuccess {Int} store_more1 标签：售多地 0：无效 1：有效
     * @apiSuccess {Int} store_more2 标签：售本地 0：无效 1：有效
     * @apiSuccess {Int} store_recommended 推荐：1推荐 2否
     * @apiSuccess {Int} product_id 产品id
     * @apiSuccess {String} product_thumb 产品图片
     * @apiSuccess {String} product_name 产品名称
     * @apiSuccess {String} product_species 产品种类
     * @apiSuccess {Int} product_recommended 产品推荐状态 1：推荐 2否 
     * @apiSuccess {Int} product_level 产品等级 1:普通 2：绿色 3：有机 4:无公害 5：原生态
     * @apiSuccess {Decimal} product_price 产品价格
     * @apiSuccess {Int} product_specifications 产品规格 1：件 2：袋 3：条 4：盒 5：箱 6：块 7：个 8：吨 9：卷 10：斤 11：公斤 12：g 13：kg
     * @apiSuccess {String} product_describe 产品描述
     * @apiSuccess {String} product_Country_of_origin 产品原产地
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "获取品牌详情成功！",
     *       "brand": {
     *           "id": 1,
     *           "logo": http://images.meathome.com.cn/backend/uploads/20180206/20180206182903697.jpg,
     *           "name": 蒙高丽亚,
     *           "phone": 15034889912,
     *           "describe": 食于自然、忠于生活,
     *           "enterprise": 锡林郭勒盟蒙高丽亚农牧业发展有限公司,
     *           "level1": 1,
     *           "level2": 2,
     *           "level3": 3,
     *           "level4": 4,
     *           "level5": 5
	 *       },
	 *       "store": {
     *           "store_id": 1,
     *           "store_name": 蒙高丽亚直营店,
     *           "store_type": 1,
     *           "store_phone": 400-8000-02,
     *           "store_address": 店铺地址,
     *           "store_describe": 店铺描述,
     *           "store_more1": 1,
     *           "store_more2": 1,
     *           "store_recommended": 2
     *       },
     *       "product": {
     *           "brand_id": 1,
     *           "product_id": 1,
     *           "product_thumb": /backend/uploads/20180329/20180329093943155.jpg,
     *           "product_name": 羔羊肋排,
     *           "product_species": 2,
     *           "product_recommended": 1,
     *           "product_level": 2,
     *           "product_price": 550.00,
     *           "product_specifications": 13,
     *           "product_describe": 此处为产品描述,
     *           "product_Country_of_origin": 内蒙古巴彦淖尔国家级经济技术开发区,
     *       },
     *       "status": {
     *       	"status": 0
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 404,
     *       "msg": "获取品牌详情失败！",
     *       "brand": false
     *       "store": false
     *       "product": false
     *       "status": {
	 *			"status": 0
	 *   	 }
     *   }
     */
	public function getDetail(Request $request,BrandRepository $repository){
		$id = request('id');
		$uid = request('uid');
		$Brand = $repository->getDetail($id);
		$Store = $repository->getStoreDetail($id);
		$Product = $repository->getProductDetail($id);
		$data = $repository->getStatus($id,$uid);
		foreach($Product as $p){
				$pid = $p['product_id'];
				$update = $repository->updateProductViewCount($pid);
		}
		//品牌 店铺 产品
		if($Brand->count() || $Store->count() && $Product->count()){
			$code = 200;
			$msg = "获取品牌详情成功!";
		}else{
			$code = 404;
			$msg = "获取品牌详情失败!";
		}
		$BrandData = $Brand->count() ? $Brand : false;
		$StoreData = $Store->count() ? $Store : false;
		$ProductData = $Product->count() ? $Product : false;
		//状态
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
		return response()->json(['status_code'=>$code,'msg'=>$msg,'brand'=>$BrandData,'store'=>$StoreData,'product'=>$ProductData,'status'=>$ttus]);
	}
    /**
     * @api {get} /brand/collect/37fb591be38db52dd1d5f04b689008f6?uid=openid&brand_id=1 收藏品牌
     * @apiVersion 0.0.1
     * @apiName Brand-Collect
     * @apiGroup Brand
     *
     * @apiParam (params) {String} uid  微信用户Openid
     * @apiParam (params) {Int} brand_id  品牌id
     * @apiSuccess {Int} uid 微信用户Openid
     * @apiSuccess {Int} brand_id 品牌id
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "收藏成功"
     *       "data": {
     *           "uid": odzwM5Ma7Hbei5bQWgaB_LTwFn1Y,
     *           "brand_id": 1,
     *           "created_at": 2018-04-16 17:38:35,
     *           "updated_at": 2018-04-16 17:38:35,
     *           "id": 1,
     *       },
     *       "meta": {
     *           "status_code": 200,
     *           "msg": "已经收藏过了",
     *           "data": [
     *              {
     *                 "id": 1
     *              }
     *           ]
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 403
	 *		 "msg": "非法请求",
     *   }
     */
	public function BrandCollect(Request $request,BrandRepository $repository){
		$uid = request('uid');
		$brand_id = request('brand_id');
		if(!$uid || !$brand_id) {
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
        $SelectBrandCollect = $repository->SelectBrandCollect($uid,$brand_id);
		if($SelectBrandCollect->count()){
			return response()->json(['status_code'=>200,'msg'=>'已经收藏过了！','data'=>$SelectBrandCollect]);
			exit();
		}
        $BrandCollect = $repository->BrandCollect($request);
		return response()->json(['status_code'=>200,'msg'=>'收藏成功！','BrandCollect'=>$BrandCollect]);
	}
    /**
     * @api {get} /brand/collect/list/37fb591be38db52dd1d5f04b689008f6?uid=openid 品牌收藏列表
     * @apiVersion 0.0.1
     * @apiName Brand-Collect-List
     * @apiGroup Brand
     *
     * @apiParam (params) {String} uid  微信用户Openid
     * @apiSuccess {String} uid  微信用户Openid
     * @apiSuccess {Int} brand_id 品牌id
     * @apiSuccess {String} logo 品牌logo
     * @apiSuccess {String} name 品牌名称
     * @apiSuccess {Int} id 收藏id
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "请求成功！",
     *       "CollectList": {
     *           "brand_id": 1,
     *           "logo": /backend/uploads/20180418/20180418154924993.jpg,
     *           "name": 蒙高丽亚,
     *           "id": 1
     *       }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 404,
     *       "msg": "请求失败！",
     *       "CollectList": false
     *   }     
	 *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 403,
     *       "msg": "非法请求"
     *   }
     */
	public function BrandCollectList(Request $request,BrandRepository $repository){
		$uid = request('uid');
		if(!$uid) {
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
        $CollectList = $repository->CollectList($uid);
		if($CollectList){
			return response()->json(['status_code'=>200,'msg'=>'请求成功！','CollectList'=>$CollectList]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'请求失败！','CollectList'=>false]);
		}
		
	}
    /**
     * @api {get} /brand/collect/cancel/37fb591be38db52dd1d5f04b689008f6?uid=openid&brand_id=1 取消收藏
     * @apiVersion 0.0.1
     * @apiName Brand-Collect-Cancel
     * @apiGroup Brand
     *
     * @apiParam (params) {String} uid  微信用户Openid
     * @apiParam (params) {Int} brand_id  品牌id
     * @apiSuccess {Int} uid 微信用户Openid
     * @apiSuccess {Int} brand_id 品牌id
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "msg": "请求成功！",
     *       "data":true
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 403,
     *       "msg": "非法请求"
     *   }
     */
    public function CancelBrandCollect(Request $request,BrandRepository $repository)
    {
		$uid = request('uid');
		$brand_id = request('brand_id');
		if(!$uid || !$brand_id) {
			return response()->json(['status_code'=>403,'msg'=>'非法请求！']);
			exit();
		}
        $result = $repository->CancelBrandCollect($brand_id,$uid);
		return response()->json(['status_code'=>200,'msg'=>'请求成功！','data'=>$result]);
    }
	
    /**
     * @api {get} /brand/list/37fb591be38db52dd1d5f04b689008f6?sheep=1&cow=1&pig=1&chicken=1&duck=1 【找肉】全部品牌
     * @apiVersion 0.0.1
     * @apiName Brand-List
     * @apiGroup Brand
     *
     * @apiParam (params) {Int} sheep 羊肉：1
     * @apiParam (params) {Int} cow 牛肉：1
     * @apiParam (params) {Int} pig 猪肉：1
     * @apiParam (params) {Int} chicken 鸡肉：1
     * @apiParam (params) {Int} duck 鸭肉：1
     * @apiParam (params) {Int} goose 鹅肉：1
     * @apiParam (params) {Int} fish 鱼肉：1
     * @apiParam (params) {Int} camel 驼肉：1
     * @apiParam (params) {Int} donkey 驴肉：1
     * @apiParam (params) {Int} horse 马肉：1
     * @apiParam (params) {Int} other 其他：1
     * @apiParam (params) {Int} level1 普通：1
     * @apiParam (params) {Int} level2 绿色：1
     * @apiParam (params) {Int} level3 有机：1
     * @apiParam (params) {Int} level4 无公害：1
     * @apiParam (params) {Int} level5 原生态：1
     * @apiSuccess {Int} id 品牌id
     * @apiSuccess {Int} logo 品牌logo
     * @apiSuccess {Int} name 品牌名
     * @apiSuccess {Int} sort 排序
     *
     * @apiSuccessExample 成功响应:
     *
     *   {
     *       "status_code": 200,
     *       "message": "请求成功！",
     *       "data":{
	 *			  "id": 1, 
	 *			  "logo": https://images.mongoliaci.com/backend/uploads/20180423/20180423141310207.jpg, 
	 *			  "name": 蒙高丽亚, 
	 *			  "sort": M, 
	 *		 }
     *   }
     *
     *  @apiErrorExample 失败响应:
     *   {
     *       "status_code": 404,
     *       "msg": "没有找到！",
     *   }
     */
	public function BrandListOrder(Request $request,BrandRepository $repository){
		$Data = $repository->BrandListOrder($request);
		if(!$Data->count()){
			return response()->json(['status_code'=>404,'msg'=>'没有找到！','sort'=>NULL]);
			exit;
		}
		$brands = array();
		foreach($Data as $val){
			$brand = array();
			$brand['id'] = $val['id'];
			$brand['logo'] = $val['logo'];
			$brand['name'] = $val['name'];
			$brand['sort'] = $val['sort'];
			$brands[] = $brand;
		}
		foreach($brands as $key=>$val){
			$sort[$val['sort']][] = $val;
		}
		if($sort){
			$data = $sort;
		}else{
			$data = NULL;
		}
		return response()->json(['status_code'=>200,'msg'=>'请求成功！','sort'=>$data]);
	}
	
	//create下显示要增加的品牌产品表单
    public function create($id , BrandRepository $repository)
    {
        $brand = $repository->getBrandById($id);

        return view("admin.brand.create_product",compact('brand'));
    }	
	
    /*
		*产品新增
		*@author Jtipsy
		*date 2018-01-29 12:07
		*@return [type]
	*/
    public function store(BrandProductRequest $request , BrandProductRepository $brandProduct)
    {

        $result = $brandProduct->store($request);
        if( $result) {
            Flash::success(trans("alerts.product.created_success"));
        }else {
            Flash::error(trans("alerts.serviceBusy"));
        }
        return redirect('/admin/product/list');
    }
	
	//edit下显示要修改的数据
    public function edit($id , BrandRepository $repository)
    {
        $brand = $repository->getBrandById($id);

        return view("admin.brand.edit",compact('brand'));
    }
	//执行修改函数
    public function update(BrandRequest $request , BrandRepository $brand)
    {
        $id = request('id');
        $result = $brand->update($request,$id);
        if($result) {
            Flash::success(trans("alerts.brand.updated_success"));
        }else{
            Flash::error(trans("alerts.serviceBusy"));
        }
        return redirect('/admin/brand/list/'.$id."/edit");
    }
	//执行删除函数
    public function delete($id,$status,BrandRepository $brand)
    {
        $result = $brand->destroy($id);
        if($result) {
            Flash::success(trans("alerts.brand.soft_deleted_success"));
        }else {
            Flash::error(trans("alerts.serviceBusy"));
        }
        return redirect('/admin/brand/list');
    }
	//关闭品牌
	public function mark($id,$status,BrandRepository $brand){
        $brand->mark($id,$status);
        return redirect('admin/brand/list');
    }	
	//推荐品牌
	public function recomd($id,$status,BrandRepository $brand){
        $brand->recomd($id,$status);
        return redirect('admin/brand/list');
    }
}
