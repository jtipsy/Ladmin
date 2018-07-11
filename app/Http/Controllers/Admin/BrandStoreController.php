<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BrandRepository;
use App\Repositories\BrandStoreRepository;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\BrandStoreRequest;
use Flash;

class BrandStoreController extends Controller
{
	
    /*
		*品牌列表
		*@author Jtipsy
		*date 2018-01-19 11:07
		*@return [type]
	*/
    public function index( BrandStoreRepository $BrandStore)
    {
        if(request()->ajax()) {
            $data = $BrandStore->ajaxIndex();
            return response()->json($data);
		}
		return view('admin.store.list');
    }
	//CreateStore下显示要增加的品牌直营店表单
    public function CreateStore($id , BrandRepository $repository){
        $brand = $repository->getBrandById($id);
        return view("admin.brand.create_store",compact('brand'));
    }
    /*
		*店铺新增
		*@author Jtipsy
		*date 2018-01-29 12:07
		*@return [type]
	*/
    public function store(Request $request , BrandStoreRepository $BrandStore)
    {
        $result = $BrandStore->store($request);
        if( $result) {
            Flash::success(trans("alerts.BrandStroe.created_success"));
        }else {
            Flash::error(trans("alerts.serviceBusy"));
        }
        return redirect('/admin/store/list');
    }
	
	//edit下显示要修改的数据
    public function edit($id ,BrandStoreRepository $BrandStore)
    {
        $store = $BrandStore->getStoreById($id);

        return view("admin.store.edit",compact('store'));
    }
	//执行修改函数
    public function update(Request $request ,  BrandStoreRepository $BrandStore)
    {
        $id = request('id');
        $result = $BrandStore->update($request,$id);
        if($result) {
            Flash::success(trans("alerts.brand.updated_success"));
        }else{
            Flash::error(trans("alerts.serviceBusy"));
        }
        return redirect('/admin/store/list/'.$id."/edit");
    }
	//执行删除函数
    public function delete($id,$status, BrandStoreRepository $BrandStore)
    {
        $result = $BrandStore->destroy($id);
        if($result) {
            Flash::success(trans("alerts.brand.soft_deleted_success"));
        }else {
            Flash::error(trans("alerts.serviceBusy"));
        }
        return redirect('/admin/store/list');
    }
	//关闭店铺
	public function mark($id,$status, BrandStoreRepository $BrandStore){
        $BrandStore->mark($id,$status);
        return redirect('admin/store/list');
    }
	//推荐店铺
	public function recomd($id,$status, BrandStoreRepository $BrandStore){
        $BrandStore->recomd($id,$status);
        return redirect('admin/store/list');
    }
}
