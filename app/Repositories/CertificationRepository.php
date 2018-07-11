<?php

namespace App\Repositories;

use App\Models\VerifyCode;
use App\Models\Certification;
use DB;
use Mockery\CountValidator\Exception;
use Flash;

class CertificationRepository {

    public function store($request)
    {
        $data = $request->all();
        //$data['content'] = $data['content'];
        $result = VerifyCode::create($data);
        return $result;
    }
	
	//send code
    public function SendCode($uid,$mobile){
		$InserCode = new VerifyCode;
		$code = $InserCode->code = mt_rand(111111,999999);
		$InserCode->mobile = $mobile;
        $result = $InserCode->save();
		if($result){
			$smsapi = "https://api.smsbao.com/";
			$user = "meathome";
			$pass = md5("madio123");
			$phone = $mobile;
			$content ='【肉之家】您的验证码为：'.$code;
			$sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
			$r =file_get_contents($sendurl);
			$res=array();
			if($r=='0'){
				$res['status']=true;
			}else{
				$res['status']=$r;
			}
		}
        return $res;
    }
	
	//select mobile code 
	public function SelectMobileCode($request,$mobile,$code){
		$VerifyCode = new VerifyCode;
		$MobileCode = $VerifyCode->where('status','=','0')->where('code','=',$code)->where('mobile','=',$mobile)->get();
		$mobile_code = array();
		foreach($MobileCode as $val){
			$mobile_id = $val['id'];
			$mobile_code = $val['code'];
			$mobile_mobile = $val['mobile'];
		}
		$isCode = Certification::where('mobile','=',$mobile)->get();
		if($isCode->count()){
			return false;
		}else{
			if($mobile_code == $code || $mobile_mobile == $mobile){
				$data = $request->all();
				$result = Certification::create($data);
				//update mobile code status
				if($result){
					$code_status = VerifyCode::find($mobile_id);
					$code_status->status = 1;
					$code_status->save();
				}
				return true;
			}
			return true;
		}
	}

	public function InsertImage($request,$uid,$filepath){
		$isUid = Certification::where('uid','=',$uid)->get();
		foreach($isUid as $val){
			$id = $val['id'];
			$business_license = $val['business_license'];
		}
		if($isUid->count()){
			//update mobile code status
			if($business_license == null){
				$insert = Certification::find($id);
				$insert->business_license = $filepath;
				$insert->save();
				return $insert;
			}
			return false;
			
		}else{
			return false;
		}
	}
	
	public function GetCount($uid){
		$certification = Certification::select('business_license')->where('uid','=',$uid)->get();
		return $certification;
	}
	
    /**
     * 更新文章浏览数
     *
     * @param $article_id
     * @return int
     */
    public function updateViewCount($id)
    {
        $res = Brand::whereId($id)->increment("view_count",1);
        return $res;
    }

}


