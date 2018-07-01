<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\WebBrandRepository;
use Auth;
use Flash;

class BrandManagementEditController extends Controller
{
	private $user_cookie;
	private $user_id;
	private $user_name;
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
	
    public function Index($id , WebBrandRepository $repository)
    {
		$user_cookie = $this->user_cookie;
		$user_id = $this->user_id;
		$user_name = $this->user_name;
        $brand = $repository->getBrandById($id);

        return view("brand.brand_edit",compact('brand','user_cookie','user_id','user_name'));
    }
	
    public function Edit(Request $request , WebBrandRepository $brand)
    {
        $id = request('id');
        $result = $brand->update($request,$id);
        if($result) {
            Flash::success(trans("alerts.brand.updated_success"));
        }else{
            Flash::error(trans("alerts.serviceBusy"));
        }
        return redirect('/37fb591be38db52dd1d5f04b689008f9/'.$id."/edit");
    }
}
