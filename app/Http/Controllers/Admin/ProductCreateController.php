<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductCreateController extends Controller
{
    /*
		*产品新增
		*@author Jtipsy
		*date 2018-01-19 12:48
		*@return [type]
	*/
	public function index(){
		return view('admin.product.create');
	}
}
