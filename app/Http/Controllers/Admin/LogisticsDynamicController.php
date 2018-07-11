<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\LogisticsDynamicRepository;
use Flash;

class LogisticsDynamicController extends Controller
{
	 /*
		*物流列表
		*@author Jtipsy
		*date 2018-06-07 10:20
		*@return [type]
	*/
    public function index(LogisticsDynamicRepository $repository){
		
		if(request()->ajax()) {
            $data = $repository->ajaxIndex();
            return response()->json($data);
        }
		
		return view('admin.logistics.dynamic');	
	}   
	
	 /*
		*物流新增view
		*@author Jtipsy
		*date 2018-06-07 17:46
		*@return [type]
	*/
	
	public function create(){
		
		return view('admin.logistics.dynamic_create');	
	}
	
	 /*
		*物流新增
		*@author Jtipsy
		*date 2018-06-07 17:46
		*@return [type]
	*/
	public function add(Request $request,LogisticsDynamicRepository $repository){
		$this->validate($request, [
			'shop_name' => 'required',
            'weight' => 'required',
			'delivery_address' =>  'required',
			'shipping_address' =>  'required',
		]);
		$result = $repository->store($request);
        if( $result) {
            Flash::success(trans("alerts.BrandStroe.created_success"));
        }else {
            Flash::error(trans("alerts.serviceBusy"));
        }
        return redirect('/admin/logistics/dynamic/create');
	}
	//执行删除函数
    public function delete($id,$status, LogisticsDynamicRepository $repository)
    {
        $result = $repository->destroy($id);
        if($result) {
            Flash::success(trans("alerts.brand.soft_deleted_success"));
        }else {
            Flash::error(trans("alerts.serviceBusy"));
        }
        return redirect('/admin/logistics/dynamic');
    }
	
	/*
		*处理物流订单
		*@author Jtipsy
		*date 2018-06-07 17:46
		*@return [type]
	*/
	public function mark($id,$status,LogisticsDynamicRepository $repository){
        $repository->mark($id,$status);
        return redirect('admin/logistics/dynamic');
    }
}
