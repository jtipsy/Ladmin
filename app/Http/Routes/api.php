<?php

// 接管路由
$api = app('Dingo\Api\Routing\Router');

// 配置api版本和路由
$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\V1'], function ($api) {
	
	$_Token = md5("wechat+api");
	//37fb591be38db52dd1d5f04b689008f6
	
	//小程序首页
	$api->get('/brand/index/'.$_Token, 'BrandListController@index');
	$api->get('/product/index/'.$_Token, 'ProductListController@index');
	
	//文章
	$api->get('/article/index/'.$_Token, 'ArticleListController@index');
	//文章详情
	$api->get('/article/detail/'.$_Token, 'ArticleDetailController@index');
	
	//推荐文章
	$api->get('/article/recommend/'.$_Token, 'ArticleRecommendController@index');
	//市场报价
	$api->get('/article/offer/'.$_Token, 'ArticleOfferController@index');
	//政策法规
	$api->get('/article/policy/'.$_Token, 'ArticlePolicyController@index');
	//行业资讯
	$api->get('/article/industry/'.$_Token, 'ArticleIndustryController@index');
	
	//轮播图
	$api->get('/focus/index/'.$_Token, 'FocusListController@index');
	//产品报价
	$api->get('/offer/index/'.$_Token, 'OfferController@index');
	
	//全部品牌->按种类、等级排序筛选
	$api->get('/brand/list/'.$_Token, 'BrandListController@BrandListOrder');
	
	//全部产品->按品牌、种类、等级、单位、价格、推荐
	$api->get('/products/list/'.$_Token, 'ProductListController@ProductListOrder');
	//小程序搜索
	$api->post('/product/list/'.$_Token, 'ProductListController@getProductList');
	
	//品牌详情
	$api->get('/brand/detail/'.$_Token, 'BrandListController@getDetail');
	//收藏品牌
	$api->get('/brand/collect/'.$_Token, 'BrandListController@BrandCollect');
	//取消收藏
	$api->get('/brand/collect/cancel/'.$_Token, 'BrandListController@CancelBrandCollect');
	//收藏列表
	$api->get('/brand/collect/list/'.$_Token, 'BrandListController@BrandCollectList');
	
	//产品详情
	$api->get('/product/detail/'.$_Token, 'ProductListController@getProductDetail');
	//收藏产品
	$api->get('/product/collect/'.$_Token, 'ProductListController@ProductCollect');	
	//取消收藏
	$api->get('/product/collect/cancel/'.$_Token, 'ProductListController@CancelProductCollect');
	//收藏列表
	$api->get('/product/collect/list/'.$_Token, 'ProductListController@ProductCollectList');
	
	//冷链物流->快速下单
	$api->post('/logistics/placeorder/'.$_Token, 'LogisticsPlaceOrderController@index');
	//冷链物流->物流动态
	$api->get('/logistics/dynamic/'.$_Token, 'LogisticsDynamicController@index');
	
	//供应列表
	$api->get('/discover/index/'.$_Token, 'DiscoverListController@index');
	//发布供应
	$api->get('/create/discover/'.$_Token, 'WechatController@InsertDiscover');
	//评论列表
	$api->get('/reply/list/'.$_Token, 'DiscoverListController@reply');
	//发布评论
	$api->get('/discover/reply/'.$_Token, 'DiscoverReplyController@index');

	//wechat api
	$api->post('/wechat/info/'.$_Token, 'WechatController@AuthLogin');
	$api->get('/wechat/key/'.$_Token, 'WechatController@GetSessionKey');
	$api->post('/wechat/image/'.$_Token, 'WechatController@WechatImage');
	
	//发送短信验证
	$api->get('/send/mobile/code/'.$_Token, 'CertificationController@Code');
	//短信验证及认证审核
	$api->get('/mobile/verify/code/'.$_Token, 'CertificationController@SelectMobileCode');
	//上传营业执照
	$api->post('/business/licensee/'.$_Token, 'CertificationController@Image');
	//补全认证信息
	$api->get('/completion/certification/'.$_Token, 'CertificationController@upImage');
	
	//会员中心下->我的发布 传uid
	$api->get('/my/discover/index/'.$_Token, 'DiscoverListController@mydiscover');
	//会员中心下->我的消息->回复的消息列表 传uid
	$api->get('/my/discover/reply/'.$_Token, 'DiscoverListController@getMyDiscoverReply');
	//会员中心下->我的消息
	$api->get('/my/msg/list/'.$_Token, 'MsgListController@MyMsg');
	//会员中心下->我的信息->查看消息->标记已读 传uid 评论id
	$api->get('/my/discover/reply/read/'.$_Token, 'DiscoverListController@InsertRead');
	//会员中心下->认证状态、消息状态 传uid
	$api->get('/my/certification/business_license/message/'.$_Token, 'DiscoverListController@getCBLmessage');
	//会员中心->补全信息状态
	$api->get('/my/certification/licensee/status/'.$_Token, 'CertificationController@GetCount');
	//会员中心下->修改昵称
	$api->get('/wechat/name/edit/'.$_Token, 'WechatController@EditName');
	
});
// 配置api版本和路由
$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\V2'], function ($api){
	
	$_Token = md5("wechat+api");
	//37fb591be38db52dd1d5f04b689008f6
	//文章
	$api->get('/article/index2/'.$_Token, 'ArticleListController@index');	
	
});