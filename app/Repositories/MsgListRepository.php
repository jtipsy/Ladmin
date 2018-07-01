<?php

namespace App\Repositories;

use App\Models\Msglist;
use Mockery\CountValidator\Exception;

class MsgListRepository {	
    /**
     * Msglist dataTables data
     *
     * @return array
     */
    public function ajaxIndex($uid)
    {
        $start = request('start', config('admin.golbal.list.start')); /*获取开始*/
		$list = new Msglist();
        $lists = $list->where('openid','=',$uid)->offset($start)->paginate(5);
		return $lists;
    }

}


