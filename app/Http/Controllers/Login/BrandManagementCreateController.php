<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\WebBrandRepository;
use App\Http\Requests\WebBrandRequest;
use Auth;
use Flash;

class BrandManagementCreateController extends Controller
{
	private $user_cookie;
	private $user_id;
    public function __construct()
    {
		$user_cookie = isset($_COOKIE['ticket']) ? $_COOKIE['ticket'] : null; 
		if($user_cookie){
		   if(request()->session()->has($user_cookie)){
				$users = session($user_cookie);
				$this->user_id = $users['id'];
				$this->user_name = $users['username'];
				$this->user_cookie = $user_cookie;
		   }
		   Flash::success("欢迎访问品牌管理中心");
		}else{
			Flash::error("亲,你还没有登陆哦");
		}
    }
    /*
		*品牌新增页面
		*@author Jtipsy
		*date 2018-01-19 12:07
		*@return [type]
	*/
	public function index(){
		$user_cookie = $this->user_cookie;
		$admin_id = $this->user_id;
		$admin_name = $this->user_name;
		return view("brand.brand_create",compact('user_cookie','admin_id','admin_name'));
	}
	
    /*
		*品牌新增
		*@author Jtipsy
		*date 2018-01-29 12:07
		*@return [type]
	*/
    public function Create(WebBrandRequest $request , WebBrandRepository $brand){
		
		$result = $brand->store($request);
        if( $result) {
            Flash::success(trans("alerts.brand.created_success"));
        }else {
            Flash::error(trans("alerts.serviceBusy"));
        }
        return redirect(url("/37fb591be38db52dd1d5f04b689008f9"));
    }
}
