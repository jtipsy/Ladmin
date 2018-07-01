<?php

namespace App\Repositories;

use App\Models\Article;
use Mockery\CountValidator\Exception;

class ArticleRecommendRepository {	
    /**
     * article dataTables data
     *
     * @return array
     */
    public function ajaxIndex()
    {
        $start = request('start', config('admin.golbal.list.start')); /*获取开始*/
		$article = new Article();
        $articles = $article->where('recommended','=',2)->offset($start)->paginate(5);
		return $articles;
    }

    /**
     * 更新文章浏览数
     *
     * @param $article_id
     * @return int
     */
    public function updateViewCount($article_id)
    {
        $res = Article::whereId($article_id)->increment("view_count",1);
        return $res;
    }

}


