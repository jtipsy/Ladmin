<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\MsgSendRepository;
use Flash;

class MsgSendController extends Controller
{
    /*
		*消息列表
		*@author Jtipsy
		*date 2018-06-06 11:08
		*@return [type]
	*/
    public function index( MsgSendRepository $repository)
    {
		return view('admin.msg.send');
    }
	
	//群发消息
	public function send(Request $request,MsgSendRepository $repository){
        $result = $repository->send($request);
        if( $result) {
            Flash::success('消息已发出');
        }else {
            Flash::error('发送失败');
        }
        return redirect('admin/msg/sendlist');
    }
	//已发列表
	public function sendlist(Request $request,MsgSendRepository $repository){
        if(request()->ajax()) {
            $data = $repository->ajaxIndex();
            return response()->json($data);
		}
		return view('admin.msg.list');
    }
}
