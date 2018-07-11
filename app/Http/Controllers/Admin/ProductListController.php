<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BrandProductRepository;
use App\Http\Requests\BrandProductRequest;
use Flash;

class ProductListController extends Controller
{
    /*
		*产品列表
		*@author Jtipsy
		*date 2018-01-19 12:46
		*@return [type]
	*/
    public function index( BrandProductRepository $repository)
    {
        if(request()->ajax()) {
            $data = $repository->ajaxIndex();
            return response()->json($data);
        }
		
		return view('admin.product.list');
    }
	
	//edit下显示要修改的数据
    public function edit($id , BrandProductRepository $repository)
    {
        $product = $repository->getProductById($id);

        return view("admin.product.edit",compact('product'));
    }
	//执行修改函数
    public function update(BrandProductRequest $request , BrandProductRepository $product)
    {
        $id = request('id');
        $result = $product->update($request,$id);
        if($result) {
            Flash::success(trans("alerts.product.updated_success"));
        }else{
            Flash::error(trans("alerts.serviceBusy"));
        }
        return redirect('/admin/product/list/'.$id."/edit");
    }
	//执行删除函数
	public function delete($id,$status,BrandProductRepository $product){
        $result = $product->destroy($id);
        if($result) {
            Flash::success(trans("alerts.product.soft_deleted_success"));
        }else {
            Flash::error(trans("alerts.serviceBusy"));
        }
        return redirect('/admin/product/list');
    }
	//关闭产品->产品下架
	public function mark($id,$status,BrandProductRepository $product){
        $product->mark($id,$status);
        return redirect('admin/product/list');
    }
	//推荐产品
	public function recomd($id,$status,BrandProductRepository $product){
        $product->recomd($id,$status);
        return redirect('admin/product/list');
    }
}
