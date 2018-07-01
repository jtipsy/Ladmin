<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		
        //////////
        //站内信管理//
        //////////
        Permission::create([
            'name' => 'Msg manage',
            'slug' => 'admin.msg.manage',
            'description' => '站内信'
        ]);       
		Permission::create([
            'name' => 'Msg send',
            'slug' => 'admin.msg.send',
            'description' => '消息群发'
        ]);		
		Permission::create([
            'name' => 'Msg send list',
            'slug' => 'admin.msg.sendlist',
            'description' => '已发列表'
        ]);
		
        //////////
        //系统管理//
        //////////
        Permission::create([
            'name' => 'systems manage',
            'slug' => 'admin.systems.manage',
            'description' => '系统管理'
        ]);
        //////////////////
        ///登录后台权限 //
        /////////////////

        Permission::create([
            'name' => 'login backend',
            'slug' => 'admin.systems.login',
            'description' => '登录后台权限'
        ]);

        Permission::create([
            'name' => 'backend index',
            'slug' => 'admin.systems.index',
            'description' => '后台首页'
        ]);

        Permission::create([
            'name' => 'Show Log All',
            'slug' => 'admin.logs.all',
            'description' => '显示日志总览'
        ]);

        Permission::create([
            'name' => 'Show Log List',
            'slug' => 'admin.logs.list',
            'description' => '显示日志列表'
        ]);



        /**
         * 显示菜单列表
         */
        Permission::create([
            'name' => 'Show Menus list',
            'slug' => 'admin.menus.list',
            'description' => '显示菜单列表'
        ]);

        /**
         * 创建菜单
         */
        Permission::create([
            'name' => 'Menus create',
            'slug' => 'admin.menus.create',
            'description' => '创建菜单'
        ]);

        /**
         * 删除菜单
         */
        Permission::create([
            'name' => 'Menus delete',
            'slug' => 'admin.menus.delete',
            'description' => '删除菜单'
        ]);

        /**
         * 修改菜单
         */
        Permission::create([
            'name' => 'Menus edit',
            'slug' => 'admin.menus.edit',
            'description' => '修改菜单'
        ]);

        /////////////
        //角色管理 //
        ////////////

        /**
         * 显示角色列表
         */
        Permission::create([
            'name' => 'Show roles list',
            'slug' => 'admin.roles.list',
            'description' => '显示角色列表'
        ]);

        /**
         * 创建角色
         */
        Permission::create([
            'name' => 'roles create',
            'slug' => 'admin.roles.create',
            'description' => '创建角色'
        ]);

        /**
         * 删除角色
         */
        Permission::create([
            'name' => 'roles delete',
            'slug' => 'admin.roles.delete',
            'description' => '删除角色'
        ]);

        /**
         * 修改角色
         */
        Permission::create([
            'name' => 'roles edit',
            'slug' => 'admin.roles.edit',
            'description' => '修改角色'
        ]);

        /**
         * 通过角色
         */
        Permission::create([
            'name' => 'roles audit',
            'slug' => 'admin.roles.audit',
            'description' => '通过角色'
        ]);

        /**
         * 禁用角色
         */
        Permission::create([
            'name' => 'roles trash',
            'slug' => 'admin.roles.trash',
            'description' => '禁用角色'
        ]);

        /**
         * 恢复角色
         */
        Permission::create([
            'name' => 'roles.undo',
            'slug' => 'admin.roles.undo',
            'description' => '恢复角色'
        ]);

        /**
         * 查看角色权限
         */
        Permission::create([
            'name' => 'roles.show',
            'slug' => 'admin.roles.show',
            'description' => '查看角色权限'
        ]);


        /////////////
        //权限管理 //
        ////////////

        /**
         * 显示权限列表
         */
        Permission::create([
            'name' => 'Show permissions list',
            'slug' => 'admin.permissions.list',
            'description' => '显示权限列表'
        ]);

        /**
         * 创建权限
         */
        Permission::create([
            'name' => 'permissions create',
            'slug' => 'admin.permissions.create',
            'description' => '创建权限'
        ]);

        /**
         * 删除权限
         */
        Permission::create([
            'name' => 'permissions delete',
            'slug' => 'admin.permissions.delete',
            'description' => '删除权限'
        ]);

        /**
         * 修改权限
         */
        Permission::create([
            'name' => 'permissions edit',
            'slug' => 'admin.permissions.edit',
            'description' => '修改权限'
        ]);
        /**
         * 禁用权限
         */
        Permission::create([
            'name' => 'permissions trash',
            'slug' => 'admin.permissions.trash',
            'description' => '禁用权限'
        ]);

        /**
         * 恢复权限
         */
        Permission::create([
            'name' => 'permissions undo',
            'slug' => 'admin.permissions.undo',
            'description' => '恢复权限'
        ]);

        /**
         * 通过权限
         */
        Permission::create([
            'name' => 'permissions audit',
            'slug' => 'admin.permissions.audit',
            'description' => '通过权限'
        ]);

        /////////////
        //用户管理 //
        ////////////

        /**
         * 显示用户列表
         */
        Permission::create([
            'name' => 'Show users list',
            'slug' => 'admin.users.list',
            'description' => '显示用户列表'
        ]);

        /**
         * 创建用户
         */
        Permission::create([
            'name' => 'users create',
            'slug' => 'admin.users.create',
            'description' => '创建用户'
        ]);

        /**
         * 删除用户
         */
        Permission::create([
            'name' => 'users delete',
            'slug' => 'admin.users.delete',
            'description' => '删除用户'
        ]);

        /**
         * 修改用户
         */
        Permission::create([
            'name' => 'users edit',
            'slug' => 'admin.users.edit',
            'description' => '修改用户'
        ]);

        /**
         * 通过用户
         */
        Permission::create([
            'name' => 'users audit',
            'slug' => 'admin.users.audit',
            'description' => '通过用户'
        ]);

        /**
         * 禁用用户
         */
        Permission::create([
            'name' => 'users trash',
            'slug' => 'admin.users.trash',
            'description' => '禁用用户'
        ]);

        /**
         * 恢复用户
         */
        Permission::create([
            'name' => 'users undo',
            'slug' => 'admin.users.undo',
            'description' => '恢复用户'
        ]);

        /**
         * 查看用户信息
         */
        Permission::create([
            'name' => 'users show',
            'slug' => 'admin.users.show',
            'description' => '查看用户信息'
        ]);

        /**
         * 修改用户密码
         */
        Permission::create([
            'name' => 'users reset',
            'slug' => 'admin.users.reset',
            'description' => '修改用户密码'
        ]);

        /**
         * 操作日志记录
         */
        Permission::create([
            'name' => 'action list',
            'slug' => 'admin.actionlog.list',
            'description' => '操作日志记录'
        ]);

        /**
         * 图片管理
         */
        Permission::create([
            'name' => 'image manage',
            'slug' => 'admin.image.manage',
            'description' => '图片管理'
        ]);

        /**
         * 图片上传
         */
        Permission::create([
            'name' => 'image upload',
            'slug' => 'admin.image.upload',
            'description' => '图片上传'
        ]);

        /**
         * 轮播列表
         */
        Permission::create([
            'name' => 'image select',
            'slug' => 'admin.image.select',
            'description' => '轮播列表'
        ]);        
		/**
         * 产品报价
         */
        Permission::create([
            'name' => 'image product offer',
            'slug' => 'admin.image.productoffer',
            'description' => '产品报价'
        ]);

        /**
         * 图片列表      
         */
        Permission::create([
            'name' => 'action show',
            'slug' => 'admin.actionlog.show',
            'description' => '图片选择器'
        ]);

        Permission::create([
            'name' => 'web setting',
            'slug' => 'admin.setting.manage',
            'description' => '网站设置'
        ]);

        Permission::create([
            'name' => 'function switch',
            'slug' => 'admin.setting.switch',
            'description' => '功能开关'
        ]);

        Permission::create([
            'name' => 'setting email',
            'slug' => 'admin.setting.email',
            'description' => '邮件模板设置'
        ]);

        Permission::create([
            'name' => 'article manage',
            'slug' => 'admin.article.manage',
            'description' => '文章管理'
        ]);

        Permission::create([
            'name' => 'article list',
            'slug' => 'admin.article.list',
            'description' => '文章列表'
        ]);

        Permission::create([
            'name' => 'article create',
            'slug' => 'admin.article.create',
            'description' => '文章添加'
        ]);

        Permission::create([
            'name' => 'article edit',
            'slug' => 'admin.article.edit',
            'description' => '文章编辑'
        ]);

        Permission::create([
            'name' => 'admin delete',
            'slug' => 'admin.article.delete',
            'description' => '文章删除'
        ]);

        Permission::create([
            'name' => 'article ban',
            'slug' => 'admin.article.trash',
            'description' => '文章禁用'
        ]);

        Permission::create([
            'name' => 'article category list',
            'slug' => 'admin.article.categorylist',
            'description' => '文章分类列表'
        ]);

        Permission::create([
            'name' => 'article_category create',
            'slug' => 'admin.article.categorycreate',
            'description' => '文章分类创建'
        ]);

        Permission::create([
            'name' => 'articleCategory edit',
            'slug' => 'admin.articlecategory.edit',
            'description' => '文章分类编辑'
        ]);
		/*********************品牌***********************/
        Permission::create([
            'name' => 'Brand manage',
            'slug' => 'admin.brand.manage',
            'description' => '品牌管理'
        ]);
        Permission::create([
            'name' => 'Brand Create',
            'slug' => 'admin.brand.create',
            'description' => '品牌新增'
        ]);      
        Permission::create([
            'name' => 'Brand edit',
            'slug' => 'admin.brand.edit',
            'description' => '品牌编辑'
        ]);
        Permission::create([
            'name' => 'Brand delete',
            'slug' => 'admin.brand.delete',
            'description' => '品牌删除'
        ]);
        Permission::create([
            'name' => 'Brand ban',
            'slug' => 'admin.brand.trash',
            'description' => '品牌禁用'
        ]);		
		Permission::create([
            'name' => 'Show brand list',
            'slug' => 'admin.brand.list',
            'description' => '品牌列表'
        ]);
		Permission::create([
            'name' => 'Brand audit',
            'slug' => 'admin.brand.audit',
            'description' => '入驻审核'
        ]);		
		Permission::create([
            'name' => 'Brand recomd',
            'slug' => 'admin.brand.recomd',
            'description' => '品牌推荐'
        ]);
		Permission::create([
            'name' => 'Brand cancel recomd',
            'slug' => 'admin.brand.cancelrecomd',
            'description' => '取消推荐'
        ]);
		/*********************求购*********************/
		
        Permission::create([
            'name' => 'Supply manage',
            'slug' => 'admin.supply.manage',
            'description' => '求购管理'
        ]);        
		Permission::create([
            'name' => 'Supply list',
            'slug' => 'admin.supply.list',
            'description' => '求购列表'
        ]);
		
		/*********************直营店*********************/
        Permission::create([
            'name' => 'Brand store manage',
            'slug' => 'admin.store.manage',
            'description' => '店铺管理'
        ]);
		Permission::create([
            'name' => 'Show store list',
            'slug' => 'admin.store.list',
            'description' => '店铺列表'
        ]);
		Permission::create([
            'name' => 'Brand Store Create',
            'slug' => 'admin.brand.storecreate',
            'description' => '品牌下增加直营店'
        ]);		
		Permission::create([
            'name' => 'Store edit',
            'slug' => 'admin.store.edit',
            'description' => '店铺编辑'
        ]);		
		Permission::create([
            'name' => 'Store delete',
            'slug' => 'admin.store.delete',
            'description' => '店铺删除'
        ]);		
		Permission::create([
            'name' => 'Store ban',
            'slug' => 'admin.store.trash',
            'description' => '店铺禁用'
        ]);		
		Permission::create([
            'name' => 'Store audit',
            'slug' => 'admin.store.audit',
            'description' => '店铺通过'
        ]);		
		Permission::create([
            'name' => 'Store recomd',
            'slug' => 'admin.store.recomd',
            'description' => '店铺推荐'
        ]);		
		Permission::create([
            'name' => 'Store cancel recomd',
            'slug' => 'admin.store.cancelrecomd',
            'description' => '取消推荐'
        ]);
		
		/**********************产品**********************/
		Permission::create([
            'name' => 'Product manage',
            'slug' => 'admin.product.manage',
            'description' => '产品管理'
        ]);		
		Permission::create([
            'name' => 'Show product list',
            'slug' => 'admin.product.list',
            'description' => '产品列表'
        ]);		
/* 		Permission::create([
            'name' => 'Product create',
            'slug' => 'admin.product.create',
            'description' => '产品新增'
        ]); */
        Permission::create([
            'name' => 'Product edit',
            'slug' => 'admin.product.edit',
            'description' => '产品编辑'
        ]);
        Permission::create([
            'name' => 'Product delete',
            'slug' => 'admin.product.delete',
            'description' => '产品删除'
        ]);
        Permission::create([
            'name' => 'Product trash',
            'slug' => 'admin.product.trash',
            'description' => '产品禁用'
        ]);        
		Permission::create([
            'name' => '	Product audit',
            'slug' => 'admin.product.audit',
            'description' => '通过产品'
        ]);		
		Permission::create([
            'name' => 'Brand Product Create',
            'slug' => 'admin.product.productcreate',
            'description' => '品牌下增加产品'
        ]);
		Permission::create([
            'name' => 'Product recomd',
            'slug' => 'admin.product.recomd',
            'description' => '产品推荐'
        ]);		
		Permission::create([
            'name' => 'Product cancel recomd',
            'slug' => 'admin.product.cancelrecomd',
            'description' => '取消推荐'
        ]);
		
		/**********************物流**********************/
		Permission::create([
            'name' => 'Logistics manage',
            'slug' => 'admin.logistics.manage',
            'description' => '物流管理'
        ]);
		Permission::create([
            'name' => 'Logistics dynamic',
            'slug' => 'admin.logistics.dynamic',
            'description' => '订单列表'
        ]);
		
    }
}
