<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BrandRepository;
use App\Http\Requests\BrandRequest;
use Flash;

class BrandCreateController extends Controller
{
    /*
		*品牌新增页面
		*@author Jtipsy
		*date 2018-01-19 12:07
		*@return [type]
	*/
	public function index(){
		return view('admin.brand.create');
	}
	
    /*
		*品牌新增
		*@author Jtipsy
		*date 2018-01-29 12:07
		*@return [type]
	*/
    public function create_brand(BrandRequest $request , BrandRepository $brand){
        $result = $brand->store($request);
		
        if( $result) {
            Flash::success(trans("alerts.brand.created_success"));
        }else {
            Flash::error(trans("alerts.serviceBusy"));
        }
        return redirect(url("/admin/brand/list"));
    }
}
