<?php

namespace App\Repositories;

use App\Models\Image;
use DB;
use Mockery\CountValidator\Exception;
use Flash;

class OfferRepository {

    /**
     * get all focus[iamge] list
     * @DateTime 2018-6-8
     * @return   array
     */
	public function getAll(){
		$Offer = new Image();
		$Offers = $Offer->select('path')->where('category_id','=',2)->orderBy("id", "desc")->limit(1)->get();
        return $Offers;
	}
	
}


