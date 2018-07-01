<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\SuppleyRepository;

class SuppleyListController extends Controller
{
    /*
		*求购列表
		*@author Jtipsy
		*date 2018-06-06 11:08
		*@return [type]
	*/
    public function index( SuppleyRepository $repository)
    {
		if(request()->ajax()) {
            $data = $repository->ajaxIndex();
            return response()->json($data);
        }
		return view('admin.suppley.list');
    }
	
	//处理求购信息
	public function mark($id,$status,SuppleyRepository $repository){
        $repository->mark($id,$status);
        return redirect('admin/supply/list');
    }
}
