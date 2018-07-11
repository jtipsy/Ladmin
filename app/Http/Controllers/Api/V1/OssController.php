<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\oss;

class OssController extends Controller{

 
	//upload wechat images api
    public function Image(Request $request){
		$images = "";
		foreach($request->file('pic') as $pic) {
			$pic = $pic->getRealPath();
			$key = time() . mt_rand(10000, 99999999) . '.jpg';
			$keypath = date('YmdH')."/".$key;
			$result = OSS::upload($keypath, $pic);
			$images[] = OSS::getUrl($keypath);
		}
		$image = implode(",", $images);
		if($result){
			return response()->json(['status_code'=>200,'msg'=>'返回URL','ImgUrl'=>$image]);
		}else{
			return response()->json(['status_code'=>404,'msg'=>'上传数据丢失']);
		}
		
	}
}