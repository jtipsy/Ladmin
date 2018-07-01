<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BrandsRequest;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    // 文件上传方法
    public function upload(Request $request)
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
			if (!file_exists($directory)) {
				@mkdir(base_path().'/public/backend/uploads/'.$directory);
			}				
            //上传文件到指定目录
            $path = $file->move(base_path().'/public/backend/uploads/'.$directory,$filename);
            $filepath = getenv('IMAGE_PATH').'/backend/uploads/'.$directory.'/'.$filename;
			return $filepath;
        }
    }
	
    // 文件上传方法
    public function editor(Request $request)
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
			if (!file_exists($directory)) {
				@mkdir(base_path().'/public/backend/uploads/'.$directory);
			}				
            //上传文件到指定目录
            $path = $file->move(base_path().'/public/backend/uploads/'.$directory,$filename);
            $filepath = getenv('IMAGE_PATH').'/backend/uploads/'.$directory.'/'.$filename;
			//return $filepath;
			$message="系统异常，文件保存失败";
			$data = array(
				'success' => 1,  //1：上传成功  0：上传失败
				'message' => '上传成功',
				'url' => $filepath
			);
			header('Content-Type:application/json;charset=utf8');
			exit(json_encode($data));
        }
    }
}
