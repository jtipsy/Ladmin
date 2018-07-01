<?php

Route::group(['namespace'=>'Login','middleware' => ['web'] ], function() {
	
	Route::get('/i18n', 'IndexController@dataTableI18n');
    Route::get('/login','LoginController@showLoginForm');
    Route::post('/login','LoginController@login');

    // 注册路由...
    Route::get('/register', 'LoginController@getRegister');
    Route::post('/register', 'LoginController@postRegister');


    Route::get('/logout', 'LoginController@logout');
	//Jump brand management
    Route::get('/37fb591be38db52dd1d5f04b689008f6', 'BrandManagementController@Index');
	
	//Show brand list
	Route::get('/37fb591be38db52dd1d5f04b689008f9', 'BrandManagementBrandController@Index');
	//Create brand index
	Route::get('/37fb591be38db52dd1d5f04b689008f8', 'BrandManagementCreateController@Index');
	//Create brand
	Route::post('/37fb591be38db52dd1d5f04b689008a8', 'BrandManagementCreateController@Create');
	//Edit brand index
	Route::get('/37fb591be38db52dd1d5f04b689008f9/{id}/edit', 'BrandManagementEditController@Index');
	//Edit brand
	Route::get('/37fb591be38db52dd1d5f04b689008f7/{id}', 'BrandManagementEditController@Edit');
	
	//Show products list
	Route::get('/37fb591be38db52dd1d5f04b689008f5', 'BrandManagementProductListController@Index');
	//Create product index
	Route::get('/37fb591be38db52dd1d5f04b689008a5', 'BrandManagementProductCreateController@Index');
	//Create product
	Route::post('/37fb591be38db52dd1d5f04b689008f4', 'BrandManagementProductCreateController@Create');
	//Edit product index
	Route::get('/37fb591be38db52dd1d5f04b689008f5/{id}/edit', 'BrandManagementProductEditController@Index');
	//Edit product
	Route::get('/37fb591be38db52dd1d5f04b689008f3/{id}', 'BrandManagementProductEditController@Edit');	
	//Delete product
	Route::get('/37fb591be38db52dd1d5f04b689008f5/{id}/delete/{status}', 'BrandManagementProductListController@delete')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);		
	
	//Show store list
	Route::get('/37fb591be38db52dd1d5f04b689008f2', 'BrandManagementStoreListController@Index');
	//Create store index
	Route::get('/37fb591be38db52dd1d5f04b689008a2', 'BrandManagementStoreCreateController@Index');
	//Create store
	Route::post('/37fb591be38db52dd1d5f04b689008f1', 'BrandManagementStoreCreateController@Create');
	//Edit store index
	Route::get('/37fb591be38db52dd1d5f04b689008f2/{id}/edit', 'BrandManagementStoreEditController@Index');
	Route::get('/37fb591be38db52dd1d5f04b689008f0/{id}', 'BrandManagementStoreEditController@Edit');
	//Delete store
	Route::get('/37fb591be38db52dd1d5f04b689008f2/{id}/delete/{status}', 'BrandManagementStoreListController@delete')
		   ->where([
		   	'id' => '[0-9]+',
		   	'status' => config('admin.global.status.trash').'|'.
		   				config('admin.global.status.audit').'|'.
		   				config('admin.global.status.active')
		  	]);	
	
	//upload images
	Route::post('/37fb591be38db52dd1d5f04b689008a0', 'BrandProductStoreImageController@Image');	
	//upload editor image
	Route::post('/37fb591be38db52dd1d5f04b689008a1', 'BrandProductStoreImageController@Editor');	
	
   //get userinfo 
    Route::get('/sso/user_info', 'SSOServerController@getUserInfo');
});