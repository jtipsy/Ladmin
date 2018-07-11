<?php

namespace App\Http\Controllers\Admin;

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
    /*
		*品牌列表
		*@author Jtipsy
		*date 2018-01-19 11:07
		*@return [type]
	*/
    public function index( BrandRepository $repository)
    {
        if(request()->ajax()) {
            $data = $repository->ajaxIndex();
            return response()->json($data);
        }
		return view('admin.brand.list');
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
    public function store(BrandRequest $request , BrandProductRepository $brandProduct)
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
    public function update(Request $request , BrandRepository $brand)
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
