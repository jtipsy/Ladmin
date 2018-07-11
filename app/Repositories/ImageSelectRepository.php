<?php

namespace App\Repositories;

use App\Models\Image;
use Mockery\CountValidator\Exception;
use Flash;

class ImageSelectRepository {
	
    /**
     * brands dataTables data
     *
     * @return array
     */    
    public function ajaxIndex()
    {
        $draw = request('draw', 1);/*获取请求次数*/
        $start = request('start', config('admin.golbal.list.start')); /*获取开始*/
        $length = request('length', config('admin.golbal.list.length')); ///*获取条数*/

        $search_pattern = true; /*是否启用模糊搜索*/
        $category_id  = request('category_id','');


        $created_at_from = request('created_at_from' ,'');
        $created_at_to = request('created_at_to' ,'');
		$orders = request('order', []);

        $Image = new Image();        
		
		/*类型*/
        if($category_id){
            $Image = $Image->where('category_id', $category_id);
        }
		
        /*创建时间搜索*/
        if($created_at_from){
            $Image = $Image->where('created_at', '>=', getTime($created_at_from));
        }
		
        if($created_at_to){
            $Image = $Image->where('created_at', '<=', getTime($created_at_to, false));
        }
		
        $count = $Image->count();
		
		if($orders){
			$orderName = request('columns.' . request('order.0.column') . '.name');
			$orderDir = request('order.0.dir');
			$Image = $Image->orderBy($orderName, $orderDir);
		}

        $Image = $Image->offset($start)->limit($length);
        $Images = $Image->orderBy("id", "asc")->get();
        if ($Images) {
            foreach ($Images as &$v) {
                $v['webactionButton'] = $v->getActionButtonAttribute(true);
            }
        }
        return [
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $Images,
        ];
    }
	
    /**
     * 添加图片
     * @param $data
     * @return mixed
     */
    public function addImage($data)
    {
        $id = Image::InsertGetId($data);
        return $id;
    }

	 /**
     * delete store
     *
     * @itas
     * @DateTime 2018-6-4
     * @return   result
     */
    public function destroy($id)
    {
        $result = Image::destroy($id);
        
        if($result) {
            return true;
        }else {
            return false;
        }
    }

}


