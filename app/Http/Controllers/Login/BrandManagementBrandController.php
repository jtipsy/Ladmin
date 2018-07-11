<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\WebBrandRepository;
use Auth;
use Flash;

class BrandManagementBrandController extends Controller
{
	private $user_id;
    public function __construct()
    {
		if (Auth::guard('front')->user()){
			$this->user_id = Auth::guard('front')->user()->id;
			Flash::success("欢迎访问品牌管理中心");
		}else{
			Flash::error("亲,你还没有登陆哦");
		}
    }
    public function index(WebBrandRepository $repository){
		$user_id = $this->user_id;
	    if(request()->ajax()) {
            $data = $repository->ajaxWebIndex($user_id);
            return response()->json($data);
        }
		return view("brand.brand_list",compact('user_id'));
	}
}
