<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
  
//后台路由
Route::group(['domain'=>env('ADMIN_DOMAIN'),'middleware' => ['web']],function(){
    Route::auth();
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' => ['auth']], function ($router) {

        $router->get('/', 'IndexController@index');
        $router->get('/i18n', 'IndexController@dataTableI18n');

        /*用户*/
        require(__DIR__ . '/Routes/UserRoute.php');
        //权限
        require(__DIR__ . '/Routes/PermissionRoute.php');
        /*菜单*/
        require(__DIR__ . '/Routes/MenuRoute.php');
        // 角色
        require(__DIR__ . '/Routes/RoleRoute.php');
        //图片
        $router->get('/image/show', 'ImageController@showImageUpload');
        //$router->post('/image/upload_image', 'ImageController@postImageUpload');
        //$router->get('/image/select', 'ImageController@showImageSelect');
        $router->get('/image/lib', 'ImageController@showImageLib');
        $router->get('/image/image_list', 'ImageController@showImageList');
        $router->post('/image/destroy/{id}', 'ImageController@destroy');

        //操作日志
        $router->get('/actionlog', 'ActionLogController@actionList');
        $router->get('/action/ajax', 'ActionLogController@ajaxIndex');

        //锁屏
        $router->get('/lock','IndexController@lockScreen');
        $router->post('/unlock','IndexController@unlock');

        //设置
        $router->get('/setting/switch','SettingController@webSwitch');
        $router->get('/setting/email','SettingController@emailTemple');

		//站内信
		$router->resource('/msg/send','MsgSendController@index');
		//群发
		$router->resource('/msg/sending','MsgSendController@send');
		//已发列表
		$router->resource('/msg/sendlist','MsgSendController@sendlist');
		
		//广告列表
		$router->resource('/image/select','ImageSelectController');
		//上传广告
		$router->post('/image/upload_image', 'ImageSelectController@postImageUpload');
		//广告删除
		$router->get('/image/select/{id}/delete/{status}', 'ImageSelectController@delete')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);	

		//求购列表
		$router->resource('/supply/list','SuppleyListController');
		$router->get('/supply/list/{id}/mark/{status}', 'SuppleyListController@mark')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);
		
        //文章
        $router->resource('article','ArticleController');
		//推荐文章
		$router->get('/article/{id}/mark/{status}', 'ArticleController@mark')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);

        //文章分类
        $router->resource('ae_category','ArticleCategoryController');
		
		//图片上传
        $router->any('upload','CommonController@upload');		
		//编辑器图片上传
        $router->post('editor','CommonController@editor');
		
		//品牌列表
		$router->resource('/brand/list','BrandListController');
		//品牌增加产品页
		$router->get('/brand/list/{id}/create', 'BrandListController@create');
		
		//店铺列表
		$router->resource('/store/list','BrandStoreController');
		//店铺模型
		$router->resource('/brand/store/create','BrandStoreController');
		//推荐店铺
		$router->get('/store/list/{id}/recomd/{status}', 'BrandStoreController@recomd')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);
		//禁用/通过店铺
		$router->get('/store/list/{id}/mark/{status}', 'BrandStoreController@mark')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);	
		//店铺删除
		$router->get('/store/list/{id}/delete/{status}', 'BrandStoreController@delete')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);
		//店铺修改view页
		$router->get('/store/list/{id}/edit', 'BrandStoreController@edit');
		//店铺修改
		$router->get('/store/list/{id}/update', 'BrandStoreController@update');
		
		//品牌增加店铺页
		$router->get('/brand/list/{id}/store','BrandStoreController@CreateStore');
		//品牌增加产品
		$router->resource('/brand/list/create','BrandListController');
		//品牌删除
		$router->get('/brand/list/{id}/delete/{status}', 'BrandListController@delete')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);	
		//禁用/通过品牌
		$router->get('/brand/list/{id}/mark/{status}', 'BrandListController@mark')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);			
		//推荐品牌
		$router->get('/brand/list/{id}/recomd/{status}', 'BrandListController@recomd')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);
		//品牌新增页
		$router->resource('/brand/create','BrandCreateController@index');
		$router->resource('/brand/create2','BrandCreateController@create_brand');
		//入驻审核
		$router->resource('/brand/audit','BrandAuditController');
		
		//产品列表
		$router->resource('/product/list','ProductListController');
		//产品新增
		$router->resource('/product/create','ProductCreateController');			
		//产品删除
		$router->get('/product/list/{id}/delete/{status}', 'ProductListController@delete')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);	
		//禁用/通过产品
		$router->get('/product/list/{id}/mark/{status}', 'ProductListController@mark')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);		
		//推荐产品
		$router->get('/product/list/{id}/recomd/{status}', 'ProductListController@recomd')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);
			
		//物流动态
		$router->resource('/logistics/dynamic','LogisticsDynamicController');
		//动态新增view
		$router->resource('/logistics/dynamic/create','LogisticsDynamicController@create');
		//动态新增
		$router->resource('/logistics/dynamic/add','LogisticsDynamicController@add');
		//处理物流订单
		$router->get('/logistics/dynamic/{id}/mark/{status}', 'LogisticsDynamicController@mark')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.active').'|'.
		   				config('admin.global.status.ban')
		  	]);
		//删除物流订单/动态
		$router->get('/logistics/dynamic/{id}/delete/{status}', 'LogisticsDynamicController@delete')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);

    });
});

//前台路由
Route::group(['domain'=>env('FRONT_DOMAIN'),'middleware' => ['web'] ],function($router){

    require(__DIR__ . '/Routes/web.php');
});

//登录路由
Route::group(['domain'=>env('LOGIN_DOMAIN')],function($router){
    
    require(__DIR__ . '/Routes/login.php');
});


//Api 路由
Route::group(['domain'=>env('API_DOMAIN'),'middleware' => ['web','sso'] ],function($router){
 
    require(__DIR__ . '/Routes/api.php');
});