<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\WebProductRepository;
use Auth;
use Flash;

class BrandManagementProductListController extends Controller
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
    public function index(WebProductRepository $repository){
		$user_cookie = $this->user_cookie;
		$user_id = $this->user_id;
	    if(request()->ajax()) {
			$products = $repository->getAll($user_id);
			foreach($products as $p){
				$pid = $p['id'];
				$update = $repository->updateViewCount($pid);
			}
            $data = $repository->ajaxWebIndex($user_id);
			return response()->json($data);
        }
		return view("brand.product_list",compact('user_cookie','user_id'));
	}
    public function delete($id,$status,WebProductRepository $repository)
    {
        $result = $repository->destroy($id);
        if($result) {
            Flash::success(trans("alerts.brand.soft_deleted_success"));
        }else {
            Flash::error(trans("alerts.serviceBusy"));
        }
        return redirect('/37fb591be38db52dd1d5f04b689008f5');
    }
}