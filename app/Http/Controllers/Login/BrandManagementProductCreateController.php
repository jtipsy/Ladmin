<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\WebProductRepository;
use App\Http\Requests\BrandProductRequest;
use Auth;
use Flash;
use DB;

class BrandManagementProductCreateController extends Controller
{
	private $user_id;
	private $user_name;
    public function __construct()
    {
		if (Auth::guard('front')->user()){
			$this->user_id = Auth::guard('front')->user()->id;
			$this->user_name = Auth::guard('front')->user()->username;
			Flash::success("欢迎访问品牌管理中心");
		}else{
			Flash::error("亲,你还没有登陆哦");
		}
    }
    /*
		*产品新增页面
		*@author Jtipsy
		*date 2018-01-19 12:07
		*@return [type]
	*/
	public function Index(WebProductRepository $product){
		$admin_id = $this->user_id;
		$admin_name = $this->user_name;
		$brand = $product->getBrandId($admin_id);
		return view("brand.product_create",compact('admin_id','admin_name','brand'));
	}
	
    /*
		*产品新增
		*@author Jtipsy
		*date 2018-01-29 12:07
		*@return [type]
	*/
    public function Create(BrandProductRequest $request , WebProductRepository $product){
		
		$result = $product->store($request);
        if( $result) {
            Flash::success(trans("alerts.brand.created_success"));
        }else {
            Flash::error(trans("alerts.serviceBusy"));
        }
        return redirect(url("/37fb591be38db52dd1d5f04b689008f5"));
    }
}
