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
	
	//Show brand
	Route::get('/37fb591be38db52dd1d5f04b689008f9', 'BrandManagementBrandController@Index');
	//Create brand index
	Route::get('/37fb591be38db52dd1d5f04b689008f8', 'BrandManagementCreateController@Index');
	//Create brand
	Route::post('/37fb591be38db52dd1d5f04b689008a8', 'BrandManagementCreateController@Create');
	//Edit brand
	Route::get('/37fb591be38db52dd1d5f04b689008f7', 'BrandManagementEditController@Edit');
	
	//Show products list
	Route::get('/37fb591be38db52dd1d5f04b689008f5', 'BrandManagementProductListController@Index');
	//Create product index
	Route::get('/37fb591be38db52dd1d5f04b689008a5', 'BrandManagementProductCreateController@Index');
	//Create product
	Route::post('/37fb591be38db52dd1d5f04b689008f4', 'BrandManagementProductCreateController@Create');
	//Edit product
	Route::get('/37fb591be38db52dd1d5f04b689008f3', 'BrandManagementProductEditController@Edit');
	
	//Show store list
	Route::get('/37fb591be38db52dd1d5f04b689008f2', 'BrandManagementStoreListController@Index');
	//Create store
	Route::get('/37fb591be38db52dd1d5f04b689008f1', 'BrandManagementStoreCreateController@Create');
	//Edit store
	Route::get('/37fb591be38db52dd1d5f04b689008f0', 'BrandManagementStoreEditController@Edit');
	
	//upload images
	Route::post('/37fb591be38db52dd1d5f04b689008a0', 'BrandProductStoreImageController@Image');	
	
   //get userinfo 
    Route::get('/sso/user_info', 'SSOServerController@getUserInfo');
});