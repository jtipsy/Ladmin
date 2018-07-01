<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Repositories\WebBrandRepository;
use App\Repositories\WebProductRepository;
use Validator;
use App\Models\FrontUser;
use Auth;
use Flash;
use Illuminate\Http\Request;

class BrandManagementController extends Controller
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
				$this->user_cookie = $user_cookie;
		   }
		   Flash::success("欢迎访问品牌管理中心");
		}else{
			Flash::error("亲,你还没有登陆哦");
		}
    }
    public function index(WebBrandRepository $WebBrand,WebProductRepository $WebProduct){
		
		$user_id = $this->user_id;
		$user_cookie = $this->user_cookie;
		$brand = $WebBrand->getBrand($user_id);
		$product = $WebProduct->getProduct($user_id);
		return view("brand.index",compact('user_cookie','brand','product'));
		
    }
}