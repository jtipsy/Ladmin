<?php

namespace App\Repositories;

use App\Models\Image;
use DB;
use Mockery\CountValidator\Exception;
use Flash;

class FocusListRepository {

    /**
     * get all focus[iamge] list
     * @DateTime 2018-6-8
     * @return   array
     */
	public function getAll(){
		$FocusList = new Image();
		$FocusLists = $FocusList->select('path')->where('category_id','=',1)->orderBy("id", "desc")->limit(5)->get();
        return $FocusLists;
	}
	
}


