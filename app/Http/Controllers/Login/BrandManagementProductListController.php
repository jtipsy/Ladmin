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
    public function index(WebProductRepository $repository){
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
		return view("brand.product_list",compact('user_id'));
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