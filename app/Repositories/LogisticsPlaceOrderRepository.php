<?php

namespace App\Repositories;

use App\Models\LogisticsDynamic;
use DB;
use Mockery\CountValidator\Exception;
use Flash;

class LogisticsPlaceOrderRepository {
	 
    /**
     * create placeorder
     *
     * @itas
     * @DateTime 2018-6-8
     * @return   result
     */
    public function store($request)
    {
        $data = $request->all();
        $result = LogisticsDynamic::create($data);
        return $result;
    }
}


