<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lib\FileUpload;
use App\Repositories\ImageSelectRepository;
use Flash;

class ImageSelectController extends Controller
{
	
    /*
		*品牌列表
		*@author Jtipsy
		*date 2018-01-19 11:07
		*@return [type]
	*/
    public function index(ImageSelectRepository $ImageSelect)
    {
        if(request()->ajax()) {
            $data = $ImageSelect->ajaxIndex();
            return response()->json($data);
		}
		return view('admin.image.select');
    }
	
    /**
     * 图片上传
     */
    public function postImageUpload(ImageSelectRepository $ImageSelect)
    {

        $file_name = FileUpload::Upload();
        $data = array(
            'file_id' => str_random(20),
            'path' => $file_name,
            'category_id' =>request()->get('category_id'),
            'created_at' => date("Y-m-d H:i:s"),
        );
        $ImageSelect->addImage($data);
    }
	
    public function delete($id,$status,ImageSelectRepository $ImageSelect)
    {
        $result = $ImageSelect->destroy($id);
        if($result) {
            Flash::success(trans("alerts.brand.soft_deleted_success"));
        }else {
            Flash::error(trans("alerts.serviceBusy"));
        }
        return redirect('admin/image/select');
    }
}
