<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seo = [
            'title'    => '肉之家品牌管理系统',
            'desc'     => '肉之家品牌管理系统是一个肉类资讯平台，使用html5响应式设计，兼容多客户端友好使用.',
            'keywords' => '肉之家、肉类、资讯平台',
        ];
       
       
        return view('web.index',compact('seo'));
    }


    /**
     * 打赏
     * 
     * @itas
     * @DateTime 2016-10-13
     * @return   [type]     [description]
     */
    public function reward()
    {
    	return view('web.reward');
    }

    /**
     * 小应用
     * @itas
     * @DateTime 2017-04-20
     * @return   [type]     [description]
     */
    public function application()
    {
        $seo = [
            'title'    => 'Easycms 管理系统-小应用',
            'desc'     => 'Easycms',
            'keywords' => 'Ladmin,Easycms,Laravel,后台管理系统,小应用',
        ];

        return view('web.application',compact('seo'));
    }
    
}
