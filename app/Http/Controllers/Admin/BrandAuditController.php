<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BrandAuditController extends Controller
{
    /*
		*品牌审核
		*@author Jtipsy
		*date 2018-01-19 12:07
		*@return [type]
	*/
	public function index(){
		return view('admin.brand.audit');
	}
}
