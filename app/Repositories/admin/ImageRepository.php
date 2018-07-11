 <?php
namespace App\Repositories\admin;
use App\Models\Image;
class ImageRepository {


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
     * 获取图片列表
     */
    public function getList()
    {
      
        $list = Image::paginate(10);

        return $list;
    }

    public function getCount()
    {
        return Image::count();
    }


    public function getDelete($id)
    {
        $res = Image::destroy($id);

        return $res;
    }
	
	public function ajaxIndex()
    {
        $draw = request('draw', 1);/*获取请求次数*/
        $start = request('start', config('admin.golbal.list.start')); /*获取开始*/
        $length = request('length', config('admin.golbal.list.length')); ///*获取条数*/
        $search_pattern = true; /*是否启用模糊搜索*/

        $category_id = request('category_id' ,'');
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

        $Image = $Image->limit(20);
        $Images = $Image->orderBy("id", "desc")->get();
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

}

