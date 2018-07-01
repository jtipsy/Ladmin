<?php
return[
	'permission' => [
		'create' 	=> 'admin.permissions.create',
		'edit' 		=> 'admin.permissions.edit',
		'destroy' 	=> 'admin.permissions.delete',
		'trash' 	=> 'admin.permissions.trash',
		'undo' 		=> 'admin.permissions.undo',
		'list' 		=> 'admin.permissions.list',
		'audit'		=> 'admin.permissions.audit'
	],
	'role' => [
		'create' 	=> 'admin.roles.create',
		'edit' 		=> 'admin.roles.edit',
		'destroy' 	=> 'admin.roles.delete',
		'trash' 	=> 'admin.roles.trash',
		'undo' 		=> 'admin.roles.undo',
		'list' 		=> 'admin.roles.list',
		'audit'		=> 'admin.roles.audit',
		'show'		=> 'admin.roles.show',
	],
	'user' => [
		'create' 	=> 'admin.users.create',
		'edit' 		=> 'admin.users.edit',
		'destroy' 	=> 'admin.users.delete',
		'trash' 	=> 'admin.users.trash',
		'undo' 		=> 'admin.users.undo',
		'list' 		=> 'admin.users.list',
		'audit'		=> 'admin.users.audit',
		'show'		=> 'admin.users.show',
		'reset'		=> 'admin.users.reset',
	],
	'menu' => [
		'create' 	=> 'admin.menus.create',
		'edit' 		=> 'admin.menus.edit',
		'destroy' 	=> 'admin.menus.delete',
	],
	'actionlog'=> [
		'show' 	=> 'admin.actionlog.show',

	],
	'article' =>[
		'create' 	=> 'admin.article.create',
		'edit' 		=> 'admin.article.edit',
		'destroy' 	=> 'admin.article.delete',
		'trash' 	=> 'admin.article.trash',
		'undo' 		=> 'admin.article.undo',
		'audit'		=> 'admin.article.audit',
		'show'		=> 'admin.article.list',
	],
	'articleCategory' =>[
		'create' 	=> 'admin.articleCategory.create',
		'edit' 		=> 'admin.articleCategory.edit',
		'destroy' 	=> 'admin.articleCategory.delete',
		'trash' 	=> 'admin.article.trash',
		'undo' 		=> 'admin.article.undo',
		'audit'		=> 'admin.article.audit',
		'show'		=> 'admin.article.list',
	],
	'brand/list' => [
		'ProductCreate' => 'admin.brand.create',
		'CreateStore'	=> 'admin.brand.storecreate',
		'edit' 		=> 'admin.brand.edit',
		'delete' 	=> 'admin.brand.delete',
		'trash' 	=> 'admin.brand.trash',
		'audit'		=> 'admin.brand.audit',
		'recomd'	=> 'admin.brand.recomd',
		'cancelrecomd'	=> 'admin.brand.cancelrecomd',
	],	
	'product/list' => [
		'edit' 		=> 'admin.product.edit',
		'delete' 	=> 'admin.product.delete',
		'trash' 	=> 'admin.product.trash',
		'audit'		=> 'admin.product.audit',
		'recomd'	=> 'admin.product.recomd',
		'cancelrecomd'	=> 'admin.product.cancelrecomd',
	],	
	'store/list' => [
		'edit' 		=> 'admin.store.edit',
		'delete' 	=> 'admin.store.delete',
		'trash' 	=> 'admin.store.trash',
		'audit'		=> 'admin.store.audit',
		'recomd'	=> 'admin.store.recomd',
		'cancelrecomd'	=> 'admin.store.cancelrecomd',
	],
	//web brand list
	'37fb591be38db52dd1d5f04b689008f9' => [
		'edit' 		=> 'brand.edit',
		'delete' 	=> 'brand.delete',
	],	
	//web product list
	'37fb591be38db52dd1d5f04b689008f5' => [
		'edit' 		=> 'product.edit',
		'delete' 	=> 'product.delete',
	],	
	//web store list
	'37fb591be38db52dd1d5f04b689008f2' => [
		'edit' 		=> 'store.edit',
		'delete' 	=> 'store.delete',
	],	
	//adv list
	'admin/image/select' => [
		'delete' 	=> 'admin.image.delete',
	],	
	//supply list
	'admin/supply/list' => [
		'delete' 	=> 'admin.supply.list',
	],	
	//logistics dynamic
	'admin/logistics/dynamic' => [
		'delete' 	=> '	admin.logistics.dynamic',
	],
];