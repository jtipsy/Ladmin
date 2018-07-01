<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;
class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $index = new Menu;
        $index->name = "控制台";
        $index->pid = 0;
        $index->language = "zh";
        $index->icon = "fa fa-dashboard";
        $index->slug = "admin.systems.index";
        $index->url = "admin";
        $index->description = "后台首页";
        $index->save();	
		
		/******************************************************/
		
		$msg = new Menu;
        $msg->name = "站内信";
        $msg->pid = 0;
        $msg->language = "zh";
        $msg->icon = "fa fa-cog";
        $msg->slug = "admin.systems.manage";
        $msg->url = "admin/msg/send*,admin/msg/sendlist*";
        $msg->description = "站内信功能管理";
        $msg->save();

        $msgsend = new Menu;
        $msgsend->name = "消息群发";
        $msgsend->pid = $msg->id;
        $msgsend->language = "zh";
        $msgsend->icon = "fa fa-users";
        $msgsend->slug = "admin.msg.send";
        $msgsend->url = "admin/msg/send";
        $msgsend->description = "消息群发";
        $msgsend->save();		        
		
		$msgsendlist = new Menu;
        $msgsendlist->name = "已发列表";
        $msgsendlist->pid = $msg->id;
        $msgsendlist->language = "zh";
        $msgsendlist->icon = "fa fa-users";
        $msgsendlist->slug = "admin.msg.sendlist";
        $msgsendlist->url = "admin/msg/sendlist";
        $msgsendlist->description = "已发列表";
        $msgsendlist->save();
		
		/******************************************************/
		
        $system = new Menu;
        $system->name = "系统管理";
        $system->pid = 0;
        $system->language = "zh";
        $system->icon = "fa fa-cog";
        $system->slug = "admin.systems.manage";
        $system->url = "admin/role*,admin/permission*,admin/user*,admin/menu*,admin/log-viewer*";
        $system->description = "系统功能管理";
        $system->save();

        $user = new Menu;
        $user->name = "用户管理";
        $user->pid = $system->id;
        $user->language = "zh";
        $user->icon = "fa fa-users";
        $user->slug = "admin.users.list";
        $user->url = "admin/user";
        $user->description = "显示用户管理";
        $user->save();


        $role = new Menu;
        $role->name = "角色管理";
        $role->pid = $system->id;
        $role->language = "zh";
        $role->icon = "fa fa-male";
        $role->slug = "admin.roles.list";
        $role->url = "admin/role";
        $role->description = "显示角色管理";
        $role->save();


        $permission = new Menu;
        $permission->name = "权限管理";
        $permission->pid = $system->id;
        $permission->language = "zh";
        $permission->icon = "fa fa-paper-plane";
        $permission->slug = "admin.permissions.list";
        $permission->url = "admin/permission";
        $permission->description = "显示权限管理";
        $permission->save();

        $log = new Menu;
        $log->name = "系统日志";
        $log->pid = $system->id;
        $log->language = "zh";
        $log->icon = "fa fa-file-text-o";
        $log->slug = "admin.logs.all";
        $log->url = "admin/log-viewer";
        $log->description = "显示系统日志";
        $log->save();

        $menu = new Menu;
        $menu->name = "菜单管理";
        $menu->pid = $system->id;
        $menu->language = "zh";
        $menu->icon = "fa fa-navicon";
        $menu->slug = "admin.menus.list";
        $menu->url = "admin/menu";
        $menu->description = "显示菜单管理";
        $menu->save();

        $menu = new Menu;
        $menu->name = "操作日志";
        $menu->pid = $system->id;
        $menu->language = "zh";
        $menu->icon = "fa fa-heart";
        $menu->slug = "admin.actionlog.list";
        $menu->url = "admin/actionlog";
        $menu->description = "操作日志";
        $menu->save();

        $image = new Menu;
        $image->name = "图片管理";
        $image->pid = 0;
        $image->language = "zh";
        $image->icon = "fa fa-heart";
        $image->slug = "admin.image.manage";
        $image->url = "admin/image/show*,admin/image/select*,admin/image/image_list*,admin/image/productoffer*";
        $image->description = "图片管理";
        $image->save();

        $imageUpload = new Menu;
        $imageUpload->name = "图片上传";
        $imageUpload->pid = $image->id;
        $imageUpload->language = "zh";
        $imageUpload->icon = "fa fa-cloud-upload";
        $imageUpload->slug = "admin.image.upload";
        $imageUpload->url = "admin/image/show";
        $imageUpload->description = "图片上传";
        $imageUpload->save();

        $imageSelect = new Menu;
        $imageSelect->name = "轮播列表";
        $imageSelect->pid = $image->id;
        $imageSelect->language = "zh";
        $imageSelect->icon = "fa fa-photo";
        $imageSelect->slug = "admin.image.select";
        $imageSelect->url = "admin/image/select";
        $imageSelect->description = "轮播列表";
        $imageSelect->save();

        $imageproductoffer = new Menu;
        $imageproductoffer->name = "产品报价";
        $imageproductoffer->pid = $image->id;
        $imageproductoffer->language = "zh";
        $imageproductoffer->icon = "fa fa-photo";
        $imageproductoffer->slug = "admin.image.productoffer";
        $imageproductoffer->url = "admin/image/productoffer";
        $imageproductoffer->description = "产品报价";
        $imageproductoffer->save();        
		
		$imageList = new Menu;
        $imageList->name = "图片列表";
        $imageList->pid = $image->id;
        $imageList->language = "zh";
        $imageList->icon = "fa fa-photo";
        $imageList->slug = "admin.image.imagelist";
        $imageList->url = "admin/image/image_list";
        $imageList->description = "图片列表";
        $imageList->save();

        $website = new Menu;
        $website->name = "网站设置";
        $website->pid = 0;
        $website->language = "zh";
        $website->icon = "fa fa-globe";
        $website->slug = "admin.setting.manage";
        $website->url = "admin/setting/switch*,admin/setting/email*";
        $website->description = "网站设置相关";
        $website->save();


        $websiteSwitch = new Menu;
        $websiteSwitch->name = "功能开关";
        $websiteSwitch->pid = $website->id;
        $websiteSwitch->language = "zh";
        $websiteSwitch->icon = "fa fa-power-off";
        $websiteSwitch->slug = "admin.setting.switch";
        $websiteSwitch->url = "admin/setting/switch";
        $websiteSwitch->description = "网站功能开关";
        $websiteSwitch->save();

        $websiteSwitch = new Menu;
        $websiteSwitch->name = "邮件模板";
        $websiteSwitch->pid = $website->id;
        $websiteSwitch->language = "zh";
        $websiteSwitch->icon = "fa fa-envelope-o";
        $websiteSwitch->slug = "admin.setting.email";
        $websiteSwitch->url = "admin/setting/email";
        $websiteSwitch->description = "邮件模板";
        $websiteSwitch->save();

        $article = new Menu;
        $article->name = "文章管理";
        $article->pid = 0;
        $article->language = "zh";
        $article->icon = "fa fa-heart";
        $article->slug = "admin.article.manage";
        $article->url = "admin/article*,admin/ae_category*";
        $article->description = "文章管理";
        $article->save();

        $articleList = new Menu;
        $articleList->name = "文章列表";
        $articleList->pid = $article->id;
        $articleList->language = "zh";
        $articleList->icon = "fa fa-heart";
        $articleList->slug = "admin.article.list";
        $articleList->url = "admin/article";
        $articleList->description = "文章列表";
        $articleList->save();

        $articleCategory = new Menu;
        $articleCategory->name = "分类列表";
        $articleCategory->pid = $article->id;
        $articleCategory->language = "zh";
        $articleCategory->icon = "fa fa-heart";
        $articleCategory->slug = "admin.article.categorylist";
        $articleCategory->url = "admin/ae_category";
        $articleCategory->description = "分类列表";
        $articleCategory->save();
		
		/******************************************************/
		
		$supply = new Menu;
        $supply->name = "求购管理";
        $supply->pid = 0;
        $supply->language = "zh";
        $supply->icon = "fa fa-envelope-o";
        $supply->slug = "admin.supply.manage";
        $supply->url = "admin/supply/list*";
        $supply->description = "求购管理相关";
        $supply->save();
		
		$supplylist = new Menu;
		$supplylist->name = '求购列表';
		$supplylist->pid =$supply->id;
		$supplylist->language = "zh";
		$supplylist->icon = "fa fa-file-text-o";
		$supplylist->slug = "admin.supply.list";
		$supplylist->url = "admin/supply/list";
		$supplylist->description = "求购列表相关";
		$supplylist->save();	
		
		/******************************************************/
		
		$store = new Menu;
        $store->name = "店铺管理";
        $store->pid = 0;
        $store->language = "zh";
        $store->icon = "fa fa-envelope-o";
        $store->slug = "admin.store.manage";
        $store->url = "admin/store/list*";
        $store->description = "店铺管理相关";
        $store->save();
		
		$storelist = new Menu;
		$storelist->name = '店铺列表';
		$storelist->pid =$store->id;
		$storelist->language = "zh";
		$storelist->icon = "fa fa-file-text-o";
		$storelist->slug = "admin.store.list";
		$storelist->url = "admin/store/list";
		$storelist->description = "店铺列表相关";
		$storelist->save();		
		
		/******************************************************/
		
		$product = new Menu;
        $product->name = "产品管理";
        $product->pid = 0;
        $product->language = "zh";
        $product->icon = "fa fa-envelope-o";
        $product->slug = "admin.product.manage";
        $product->url = "admin/product/list*,admin/product/create*";
        $product->description = "产品管理相关";
        $product->save();
		
		$productlist = new Menu;
		$productlist->name = '产品列表';
		$productlist->pid =$product->id;
		$productlist->language = "zh";
		$productlist->icon = "fa fa-file-text-o";
		$productlist->slug = "admin.product.list";
		$productlist->url = "admin/product/list";
		$productlist->description = "产品列表相关";
		$productlist->save();		
		
		$productcreate = new Menu;
		$productcreate->name = '产品新增';
		$productcreate->pid =$product->id;
		$productcreate->language = "zh";
		$productcreate->icon = "fa fa-file-text-o";
		$productcreate->slug = "admin.product.create";
		$productcreate->url = "admin/product/create";
		$productcreate->description = "产品列表相关";
		$productcreate->save();	
		
		/******************************************************/
		
		$brand = new Menu;
        $brand->name = "品牌管理";
        $brand->pid = 0;
        $brand->language = "zh";
        $brand->icon = "fa fa-heart";
        $brand->slug = "admin.brand.manage";
        $brand->url = "admin/brand/list*,admin/brand/audit*";
        $brand->description = "品牌管理相关";
        $brand->save();
		
        $brandlist = new Menu;
        $brandlist->name = "品牌列表";
        $brandlist->pid = $brand->id;
        $brandlist->language = "zh";
        $brandlist->icon = "fa fa-file-text-o";
        $brandlist->slug = "admin.brand.list";
        $brandlist->url = "admin/brand/list";
        $brandlist->description = "品牌列表相关";
        $brandlist->save();        
		
		$brandaudit = new Menu;
        $brandaudit->name = "入驻审核";
        $brandaudit->pid = $brand->id;
        $brandaudit->language = "zh";
        $brandaudit->icon = "fa fa-file-text-o";
        $brandaudit->slug = "admin.brand.audit";
        $brandaudit->url = "admin/brand/audit";
        $brandaudit->description = "品牌入驻审核相关";
        $brandaudit->save();		
		
		/******************************************************/
		
		$Logistics = new Menu;
        $Logistics->name = "物流管理";
        $Logistics->pid = 0;
        $Logistics->language = "zh";
        $Logistics->icon = "fa fa-heart";
        $Logistics->slug = "admin.logistics.manage";
        $Logistics->url = "admin/logistics/dynamic*,admin/logistics/list*";
        $Logistics->description = "物流管理相关";
        $Logistics->save();		
		
		$Logisticsdynamic = new Menu;
        $Logisticsdynamic->name = "订单列表";
        $Logisticsdynamic->pid = $Logistics->id;;
        $Logisticsdynamic->language = "zh";
        $Logisticsdynamic->icon = "fa fa-file-text-o";
        $Logisticsdynamic->slug = "admin.logistics.dynamic";
        $Logisticsdynamic->url = "admin/logistics/dynamic";
        $Logisticsdynamic->description = "物流管理相关";
        $Logisticsdynamic->save();	


    }
}
