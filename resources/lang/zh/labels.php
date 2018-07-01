<?php
return [
	'action' => '操作',
	'id' => 'ID',
	'close' => '关闭',
	'menuLevel' => '顶级菜单',
	'logout' => '退出',
	'profile' => '我的资料',
	'lock'  => '锁屏',
	'created_at' => '创建时间',
	'updated_at' => '修改时间',
	'view' => '查看',
	'user' => [
		'id' => '序号',
		'name' => '用户名',
		'email' => '邮箱',
		'password' => '密码',
		'status' => '状态',
		'created_at' => '创建时间',
		'updated_at' => '修改时间',
		'remember_token' => 'token',
		'list' => '用户列表',
		'confirm_email' => '邮箱验证',
		'show' => '查看用户信息',
		'reset' => '修改密码',
		'permission' => '额外权限',
		'confirm' => '已验证',
		'active' => '<span class="label label-success"> 已验证 </span>',
		'audit' => '<span class="label label-warning"> 未验证 </span>',
		'notice' => '<strong>注意!</strong> 当某个角色的用户需要额外权限时添加.',
		'info' => '暂无额外权限',
	],
	'permission' => [
		'id' => '序号',
		'name' => '权限名称',
		'slug' => '权限',
		'description' => '描述',
		'model' => '模型',
		'status' => '状态',
		'created_at' => '创建时间',
		'updated_at' => '修改时间',
		'list' => '权限列表'
	],
	'role' => [
		'id' => '序号',
		'name' => '角色名称',
		'slug' => '角色',
		'description' => '描述',
		'level' => '等级',
		'status' => '状态',
		'created_at' => '创建时间',
		'updated_at' => '修改时间',
		'list' => '角色列表',
		'permission' => '权限',
		'module' => '模块',
		'show' => '查看角色权限',
	],
	'menu' => [
		'id' => 'ID',
		'name' => '名称',
		'pid' => '一级菜单',
		'language' => '语言',
		'icon' => '图标',
		'slug' => '权限',
		'url' => '地址',
		'description' => '描述',
		'sort' => '排序',
		'status' => '状态',
		'created_at' => '创建时间',
		'updated_at' => '修改时间',
		'detail' => '<i class="fa fa-cog"></i> 菜单属性',
		'show' => '查看',
	],
	'action_log' => [
		'list' => '行为日志列表',
		'username' => '用户名',
		'type' => '类型',
		'ip' => 'ip地址',
		'browser' => '浏览器',
		'system' => '操作系统',
		'url' => '操作地址',
	],
	'article' =>[
		'list' => '文章列表',
		'title' => '标题',
		'desc' => '描述',
		'author' => '作者',
		'from' => '来源',
		'content' => '文章内容',
		'thumb' => '封面',
		'status' => '状态',
	],
	'article_category' =>[
		'list' => '文章分类列表',
		'name' => '分类名称',
		'pid' => '上级分类',
		'status' => '文章分类状态',
	],
	'brand' => [
		'id' => '序号',
		'logo' => 'LOGO',
		'brand_logo' => '品牌LOGO',
		'title' => '品牌列表',
		'name' => '品牌名',
		'describe' => '介绍',
		'admin' => '管理员',
		'enterprise' => '归属企业',
		'address' => '公司地址',
		'producer' => '生产基地',
		'producer_instructions' => '例如：内蒙古锡盟东乌珠穆沁旗',
		'phone' =>'客服电话',
		'status' =>'状态',
		'created_at' =>'创建时间',
		'sort' =>'排序',
		'atlas' =>'品牌图集',
		'atlas1' =>'上传图集1',
		'atlas2' =>'上传图集2',
		'atlas3' =>'上传图集3',
		'atlas4' =>'上传图集4',
		'off' =>'关闭',
		'on' =>'开启',
		'level' => '等级',
		'level1' =>'普通',
		'level2' =>'绿色',
		'level3' =>'有机',
		'level4' =>'无公害',
		'level5' =>'原生态',
		'recommended' => '推荐',
		
	],
	'brand_product' =>[
		'title' => '产品列表',
		'thumb' => '缩略图',
		'name' => '产品名',
		'brand_name' => '品牌名',
		'species' => '种类',
		'level' => '等级',
		'price' => '价格',
		'specifications' => '规格',
		'view_count' => '浏览次数',
		'label' => '标签',
		'describe' => '描述',
		'net_weight' => '净重',
		'atlas' => '产品图集',
		'atlas1' =>'上传图集1',
		'atlas2' =>'上传图集2',
		'atlas3' =>'上传图集3',
		'atlas4' =>'上传图集4',
		'Country_of_origin' => '原产地',
		'Shipping_method' => '运送方式',
		'cold'		=> '冷链',
		'empty'		=> '空运',
		'courier'	=> '快递',
		'Shipping_agency' => '运送机构',
		'Selling_way' => '售卖方式',
		'retail' => '零售',
		'wholesale' => '批发',
		'halal' => '是否清真',
		'yes' => '是',
		'no' => '否',
		'varieties' => '品种',
		'Shelf_life' => '保质期',
		'Storage_way' => '储藏方式',
		'temperature' => '储藏温度',
		'warehouse_address' => '仓库地址',
		'Production_license_number' => '生产许可证编号',
		'Production_standard_no' => '生产标准号',
		'view_count' => '浏览次数',
		'status' => '状态',
		
	],
	'store' =>[
		'title' => '店铺列表',
		'name' => '店铺名称',
		'phone' => '店铺电话',
		'brand_name' => '所属品牌',
		'type' => '店铺类型',
		'address' => '店铺地址',
		'describe' => '店铺描述',
		'label' => '标签',
		'more1' => '售多地',
		'more2' => '售本地',
		'status' => '状态',
		
	],
	'breadcrumb' => [
		'home' => '<i class="fa fa-home"></i> 主页',
		'permissionList' => '<i class="fa fa-bars"></i> 权限列表',
		'permissionCreate' => '<i class="fa fa-paper-plane-o"></i> 创建权限',
		'permissionEdit' => '<i class="fa fa-pencil"></i> 修改权限',
		'roleList' => '<i class="fa fa-bars"></i> 角色列表',
		'roleCreate' => '<i class="fa fa-user-plus"></i> 创建角色',
		'roleEdit' => '<i class="fa fa-pencil"></i> 修改角色',
		'userList' => '<i class="fa fa-bars"></i> 用户列表',
		'userCreate' => '<i class="fa fa-user-plus"></i> 创建用户',
		'userEdit' => '<i class="fa fa-pencil"></i> 修改用户',
		'userReset' => '<i class="fa fa-lock"></i> 修改密码',
		'userShow' => '<i class="fa fa-user"></i> 用户信息',
		'menuList' => '<i class="fa fa-cogs"></i> 菜单管理',
		'logList' => '<i class="fa fa-cogs"></i> 系统日志',
		'logs' => '<i class="fa fa-navicon"></i> 日志列表',
		'logDetail' => '<i class="fa fa-television"></i> 日志详情',
		'imageUpload' => '<i class="fa fa-cloud-upload"></i> 图片上传',
		'imageSelect' => '<i class="fa fa-photo"></i> 轮播列表',
		'imageList' => '<i class="fa fa-photo"></i> 图片列表',
		'action_log' => '<i class="fa fa-bell"></i> 操作日志',
		'functionSwitch' => '<i class="fa fa-power-off"></i> 功能开关',
		'emailTemple' => '<i class="fa fa-envelope-o"></i> 邮件模板',
		'changeProfile' =>'<i class="fa fa-cog"></i> 修改资料',
		'articleList' => '<i class="fa fa-cog"></i> 文章列表',
		'articleCreate' => '<i class="fa fa-cog"></i> 文章添加',
		'articleEdit' => '<i class="fa fa-cog"></i> 文章编辑',
		'articleCategoryList' => '<i class="fa fa-cog"></i> 文章分类列表',
		'articleCategoryCreate' => '<i class="fa fa-cog"></i> 文章分类添加',
		'brandList' => '<i class="fa fa-cogs"></i> 品牌列表',
		'storeList' => '<i class="fa fa-cogs"></i> 店铺列表',
		'brandCreate' => '<i class="fa fa-cog"></i> 品牌添加',
		'brandEdit' => '<i class="fa fa-cog"></i> 品牌编辑',
		'brandShow' => '<i class="fa fa-cog"></i> 品牌详情',
		'productList' => '<i class="fa fa-cogs"></i> 产品列表',
		'brandCreateProduct' => '<i class="fa fa-cog"></i> 产品添加',
		'CreateStore' => '<i class="fa fa-cog"></i> 直营店添加',

	]
];