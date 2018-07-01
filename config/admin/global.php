<?php
/**
 * 后台全局配置
 */
return[
	/**
	 * 全局状态
	 * addit 	待审核
	 * active 	正常
	 * ban 		禁用
	 * trash	回收站
	 * destory 	彻底删除
	 * other    其他
	 * mutton   羊肉
	 * beef     牛肉
	 * camel    驼肉
	 * pork     猪肉
	 * chicken  鸡肉
	 * goose    鹅肉
	 * duck     鸭肉
	 * fish     鱼肉
	 * donkey   驴肉
	 * horse    马肉
	 *a1		件
	 *bag		袋
	 *article	条
	 *box		盒
	 *bbox		箱
	 *block 	块
	 *a2 		个
	 *tons		吨
	 *volume	卷
	 *jin		斤
	 *gjin		公斤
	 *g 		g
	 *kg		kg
	 */
	'status' => [
		'audit' 	=> 2,
		'active' 	=> 1,
		'ban' 		=> 2,
		'trash' 	=> 99,
		'destroy' 	=> -1,
		//种类
		'other' 	=> 1,
		'mutton'	=> 2,
		'beef'  	=> 3,
		'camel' 	=> 4,
		'pork' 		=> 5,
		'chicken'	=> 6,
		'goose' 	=> 7,
		'duck' 		=> 8,
		'fish'	 	=> 9,
		'donkey' 	=> 10,
		'horse'	 	=> 11,
		//规格
		'a1'		=> 1,
		'bag'  		=> 2,
		'article' 	=> 3,
		'box' 		=> 4,
		'bbox'		=> 5,
		'block' 	=> 6,
		'a2' 		=> 7,
		'tons'	 	=> 8,
		'volume'	=> 9,
		'jin' 		=> 10,
		'gjin'	 	=> 11,
		'g' 		=> 12,
		'kg' 		=> 13,
		//等级
		'ordinary'		 => 1,
		'green'  		 => 2,
		'organic' 	     => 3,
		'pollution-free' => 4,
		'ecological'	 => 5,
		//清真
		'yes'  => 1,
		'no'   => 2,
		//售卖方式
		'retail' => 1,
		'wholesale' => 2,
		//状态
		'off' => 2,
		'on'  => 1,
		//店铺类型
		'store1'	=>	1,
		'store2'	=>	2,
		'store3'	=>	3,
		'store4'	=>	4,
	],
	//分页
	'lsit' => [
		'start' => 0,
		'length' => 10
	],
	//权限
	'permission' => [
		// 控制是否显示查看按钮
		'show' => false,
		// trait 中的 action 参数
		'action' => 'permission',
	],
	//角色
	'role' => [
		// 控制是否显示查看按钮
		'show' => true,
		// trait 中的 action 参数
		'action' => 'role',
	],
	//用户
	'user' => [
		// 控制是否显示查看按钮
		'show' => true,
		// trait 中的 action 参数
		'action' => 'user',
	],
	//操作日志
	'actionlog' => [
	// 控制是否显示查看按钮
	'show' => true,
	// trait 中的 action 参数
	'action' => 'actionlog',
	],
	//文章
	'article' => [
		// 控制是否显示查看按钮
		'show' => true,
		// trait 中的 action 参数
		'action' => 'article',
	],
	//文章
	'articleCategory' => [
		// 控制是否显示查看按钮
		'show' => true,
		// trait 中的 action 参数
		'action' => 'articleCategory',
	],
	//品牌
	'brand/list' => [
		// 控制是否显示查看按钮
		'show' => true,
		// trait 中的 action 参数
		'action' => 'brand/list',
	],	
	//产品
	'product/list' => [
		// 控制是否显示查看按钮
		'show' => true,
		// trait 中的 action 参数
		'action' => 'product/list',
	],	
	//店铺
	'store/list' => [
		// 控制是否显示查看按钮
		'show' => true,
		// trait 中的 action 参数
		'action' => 'store/list',
	],	
	//web brand
	'37fb591be38db52dd1d5f04b689008f9' => [
		// 控制是否显示查看按钮
		'show' => true,
		// trait 中的 action 参数
		'action' => '37fb591be38db52dd1d5f04b689008f9',
	],	
	//web product
	'37fb591be38db52dd1d5f04b689008f5' => [
		// 控制是否显示查看按钮
		'show' => true,
		// trait 中的 action 参数
		'action' => '37fb591be38db52dd1d5f04b689008f5',
	],	
	//web store
	'37fb591be38db52dd1d5f04b689008f2' => [
		// 控制是否显示查看按钮
		'show' => true,
		// trait 中的 action 参数
		'action' => '37fb591be38db52dd1d5f04b689008f2',
	],
	//adv list
	'admin/image/select' => [
		// 控制是否显示查看按钮
		'show' => true,
		// trait 中的 action 参数
		'action' => 'admin/image/select',
	],	
	//adv list
	'admin/supply/list' => [
		// 控制是否显示查看按钮
		'show' => true,
		// trait 中的 action 参数
		'action' => 'admin/supply/list',
	],	
	//adv list
	'admin/logistics/dynamic' => [
		// 控制是否显示查看按钮
		'show' => true,
		// trait 中的 action 参数
		'action' => 'admin/logistics/dynamic',
	],

];