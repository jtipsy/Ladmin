<?php

namespace App\Repositories;

use App\Models\Article;
use Mockery\CountValidator\Exception;

class ArticleDetailRepository {	
    /**
     * article dataTables data
     *
     * @return array
     */
    public function getDetail($id)
    {
		$article = Article::where('id',$id)->get();
		return $article;
    }

	/**
     * 更新文章浏览数
     *
     * @param $article_id
     * @return int
     */
    public function updateViewCount($id)
    {
        $res = Article::whereId($id)->increment("view_count",mt_rand(1,3));
        return $res;
    }
}


