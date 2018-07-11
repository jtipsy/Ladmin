<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\oss;

class BrandProductStoreImageController extends Controller
{
    //brand product store upload images
    public function Image(Request $request)
    {
        $file = $request->file('Filedata');
        // 文件是否上传成功
        if ($file->isValid()) {
			//扩展名
            $ext = $file->getClientOriginalExtension();
            //上传文件
            $filename = date('YmdHis').mt_rand(100,999).'.'.$ext;
			//创建目录
			$directory = date('Ymd');
			//文件临时路径
			$file = $file->getRealPath();
            //上传文件到指定目录
			$result = OSS::upload($directory."/".$filename, $file);
			//$ImageUrl =  OSS::getUrl($directory."/".$filename);
			$ImageUrl =  getenv('IMAGE_PATH')."/".$directory."/".$filename;
			return $ImageUrl;
        }
    }
	
    // 文件上传方法
    public function Editor(Request $request)
    {
        $file = $request->file('editormd-image-file');
        // 文件是否上传成功
        if ($file->isValid()) {

			//扩展名
            $ext = $file->getClientOriginalExtension();
            //上传文件
            $filename = date('YmdHis').mt_rand(100,999).'.'.$ext;
			//创建目录
			$directory = date('Ymd');			
            //上传文件到指定目录
			OSS::upload($directory."/".$filename, $file);
			//$ImageUrl =  OSS::getUrl($directory."/".$filename);
			$ImageUrl =  getenv('IMAGE_PATH')."/".$directory."/".$filename;
			//return $filepath;
			$message="系统异常，文件保存失败";
			$data = array(
				'success' => 1,  //1：上传成功  0：上传失败
				'message' => '上传成功',
				'url' => $ImageUrl
			);
			header('Content-Type:application/json;charset=utf8');
			exit(json_encode($data));
        }
    }
}
