

/* Alter table in target */
alter table `__PREFIX__goods` 
	add column `exchange_integral` int(10)   not null default 0 comment '积分兑换：0不参与积分兑换，积分和现金的兑换比例100：1' after `give_integral` , 
	add column `suppliers_id` smallint(5) unsigned   not null default 0 comment '供货商ID' after `exchange_integral` , 
	change `sales_sum` `sales_sum` int(11)   null default 0 comment '商品销量' after `suppliers_id` , 
	change `prom_type` `prom_type` tinyint(1)   null default 0 comment '0 普通订单,1 限时抢购, 2 团购 , 3 促销优惠' after `sales_sum` , 
	change `prom_id` `prom_id` int(11)   null default 0 comment '优惠活动id' after `prom_type` , 
	change `commission` `commission` decimal(10,2)   null default 0.00 comment '佣金用于分销分成' after `prom_id` , 
	change `spu` `spu` varchar(128)  collate utf8_general_ci null default '' comment 'SPU' after `commission` , 
	change `sku` `sku` varchar(128)  collate utf8_general_ci null default '' comment 'SKU' after `spu` ; 



/* Create table in target */
create table `__PREFIX__pick_up`(
	`pickup_id` int(11) not null  auto_increment comment '自提点id' , 
	`pickup_name` varchar(255) collate utf8_general_ci not null  comment '自提点名称' , 
	`pickup_address` varchar(255) collate utf8_general_ci not null  comment '自提点地址' , 
	`pickup_phone` varchar(30) collate utf8_general_ci not null  comment '自提点电话' , 
	`pickup_contact` varchar(20) collate utf8_general_ci not null  comment '自提点联系人' , 
	`province_id` int(11) not null  comment '省id' , 
	`city_id` int(11) not null  comment '市id' , 
	`district_id` int(11) not null  comment '区id' , 
	`suppliersid` int(11) not null  comment '供应商id' , 
	primary key (`pickup_id`) 
)  default charset='utf8' collate='utf8_general_ci' comment='自提点表';


/* Alter table in target */
alter table `__PREFIX__prom_goods` 
	add column `prom_img` varchar(150)  collate utf8_general_ci null comment '活动宣传图片' after `group` ; 

/* Alter table in target */
alter table `__PREFIX__rebate_log` 
	add column `confirm` int(11)   null default 0 comment '确定收货时间' after `create_time` , 
	change `status` `status` tinyint(1)   null default 0 comment '0未付款,1已付款, 2等待分成(已收货) 3已分成, 4已取消' after `confirm` , 
	change `confirm_time` `confirm_time` int(11)   null default 0 comment '确定分成或者取消时间' after `status` , 
	change `remark` `remark` varchar(1024)  collate utf8_bin null default '' comment '如果是取消, 有取消备注' after `confirm_time` ;


/* Create table in target */
create table `__PREFIX__suppliers`(
	`suppliers_id` smallint(5) unsigned not null  auto_increment comment '供应商ID' , 
	`suppliers_name` varchar(255) collate utf8_general_ci not null  default '' comment '供应商名称' , 
	`suppliers_desc` mediumtext collate utf8_general_ci not null  comment '供应商描述' , 
	`is_check` tinyint(1) unsigned not null  default 1 comment '供应商状态' , 
	`suppliers_contacts` varchar(255) collate utf8_general_ci not null  default '' comment '供应商联系人' , 
	`suppliers_phone` varchar(20) collate utf8_general_ci not null  default '' comment '供应商名字' , 
	primary key (`suppliers_id`) 
)  default charset='utf8' collate='utf8_general_ci';


/* Create table in target */
create table `__PREFIX__system_menu`(
	`id` smallint(6) unsigned not null  auto_increment , 
	`name` varchar(50) collate utf8_general_ci null  comment '权限名字' , 
	`group` varchar(20) collate utf8_general_ci null  comment '所属分组' , 
	`right` text collate utf8_general_ci null  comment '权限码(控制器+动作)' , 
	`is_del` tinyint(1) null  default 0 comment '删除状态 1删除,0正常' , 
	primary key (`id`) 
)  default charset='utf8' collate='utf8_general_ci';

insert  into `__PREFIX__system_menu`(`id`,`name`,`group`,`right`,`is_del`) values (1,'文章管理','content','ArticleController@articleList,ArticleController@article,ArticleController@aticleHandle',0),(2,'文章分类','content','ArticleController@categoryList,ArticleController@category,ArticleController@categoryHandle',0),(3,'帮助管理','content','ArticleController@help_list',0),(4,'广告管理','content','ArticleController@notice_list',0),(5,'网站设置','system','SystemController@index,SystemController@handle',0),(6,'权限资源','system','SystemController@right_list,SystemController@edit_right',0),(7,'前台导航设置','system','SystemController@navigationList,SystemController@addEditNav,SystemController@delNav',0),(8,'管理员管理','system','AdminController@index,AdminController@admin_info,AdminController@adminHandle',0),(9,'角色管理','system','AdminController@role,AdminController@role_info,AdminController@roleSave,AdminController@roleDel',0),(10,'供应商管理','system','AdminController@supplier,AdminController@supplier_info,AdminController@supplierHandle',0),(11,'会员添加','member','UserController@add_user',0),(12,'会员资金','member','UserController@account_log,UserController@account_edit',0),(13,'会员管理','member','UserController@index,UserController@ajaxindex,UserController@detail,UserController@address,UserController@delete,UserController@search_user',0),(14,'会员等级','member','UserController@level,UserController@levelList,UserController@levelHandle',0),(15,'商品类型','goods','GoodsController@goodsTypeList,GoodsController@addEditGoodsType,GoodsController@delGoodsType',0),(16,'商品编辑','goods','GoodsController@addEditGoods,GoodsController@delGoods,GoodsController@del_goods_images',0),(17,'商品列表','goods','GoodsController@goodsList,GoodsController@ajaxGoodsList,GoodsController@updateField',0),(18,'商品规格','goods','GoodsController@ajaxGetSpecList,GoodsController@delGoodsSpec,GoodsController@addEditSpec,GoodsController@ajaxSpecList,GoodsController@specList,GoodsController@ajaxGetSpecSelect',0),(19,'商品分类','goods','GoodsController@categoryList,GoodsController@addEditCategory,GoodsController@delGoodsCategory',0),(20,'商品属性','goods','GoodsController@ajaxGetAttrList,GoodsController@goodsAttributeList,GoodsController@ajaxGoodsAttributeList,GoodsController@addEditGoodsAttribute,GoodsController@ajaxGetAttrInput',0),(21,'商品品牌','goods','GoodsController@brandList,GoodsController@delBrand,GoodsController@addEditBrand',0),(22,'广告列表','content','AdController@adList,AdController@adHandle,AdController@ad,AdController@changeAdField',0),(23,'广告位','content','AdController@position,AdController@positionList,AdController@positionHandle',0),(24,'团购管理','marketing','PromotionController@group_buy,PromotionController@group_buy_list,PromotionController@groupbuyHandle',0),(25,'限时抢购','marketing','PromotionController@flash_sale,PromotionController@flash_sale_info,PromotionController@flash_sale_del',0),(26,'促销管理','marketing','PromotionController@prom_goods_list,PromotionController@prom_goods_info,PromotionController@prom_goods_save,PromotionController@prom_goods_del,PromotionController@get_goods,PromotionController@search_goods',0),(27,'订单列表','order','OrderController@index,OrderController@ajaxindex,OrderController@detail',0),(28,'订单发货','order','OrderController@deliveryHandle,OrderController@delivery_info,OrderController@delivery_list',0),(29,'退换货处理','order','OrderController@return_del,OrderController@return_info,OrderController@add_return_goods,OrderController@ajax_return_list',0),(30,'拆分订单','order','OrderController@split_order,OrderController@search_goods',0),(31,'修改订单','system','OrderController@edit_order,OrderController@search_goods',0),(32,'添加订单','order','OrderController@add_order,OrderController@search_goods',0),(33,'处理订单','order','OrderController@pay_cancel,OrderController@delete_order,OrderController@order_action,OrderController@editprice,OrderController@order_log',0),(34,'导出订单','order','OrderController@export_order',0),(35,'打印订单','order','OrderController@order_print,OrderController@shipping_print',0),(36,'插件列表','tools','PluginController@index,PluginController@install,PluginController@setting',0),(37,'打印设置','tools','PluginController@shipping_list,PluginController@shipping_desc,PluginController@shipping_print,PluginController@edit_shipping_print,PluginController@shipping_list_edit,PluginController@del_area',0),(38,'数据备份','tools','ToolsController@index,ToolsController@backup,ToolsController@optimize,ToolsController@repair',0),(39,'数据还原','tools','ToolsController@restore,ToolsController@restoreData,ToolsController@restoreUpload,ToolsController@downFile,ToolsController@delSqlFiles',0),(40,'地区管理','tools','ToolsController@region,ToolsController@regionHandle',0),(41,'公众号设置','marketing','WechatController@index,WechatController@setting,WechatController@get_access_token,WechatController@select_goods',0),(42,'文本回复','tools','WechatController@text,WechatController@add_text,WechatController@del_text',0),(43,'微信菜单','tools','WechatController@menu,WechatController@del_menu,WechatController@pub_menu',0),(44,'图文回复','tools','WechatController@img,WechatController@add_img,WechatController@del_img,WechatController@preview',0),(45,'模板管理','system','TemplateController@templateList,TemplateController@changeTemplate',0),(46,'销售概况','count','ReportController@index,ReportController@finance,ReportController@user',0),(47,'销售排行','count','ReportController@saleTop,ReportController@userTop,ReportController@saleList',0),(48,'专题管理','content','TopicController@topic,TopicController@topicList,TopicController@topicHandle',0),(49,'操作日志','system','AdminController@log,OrderController@order_log',0),(50,'评论咨询','goods','CommentController@index,CommentController@detail,CommentController@ask_list,CommentController@ajax_ask_list,CommentController@del,CommentController@op,CommentController@consult_info,CommentController@ask_handle',0),(51,'优惠券','marketing','CouponController@coupon_info,CouponController@index,CouponController@make_coupon,CouponController@ajax_get_user,CouponController@send_coupon,CouponController@send_cancel,CouponController@del_coupon,CouponController@coupon_list,CouponController@coupon_list_del',0),(52,'友情链接','content','ArticleController@link,ArticleController@linkList,ArticleController@linkHandle',0),(53,'分销管理','marketing','DistributController@set,DistributController@remittance,DistributController@tree,DistributController@rebate_log,DistributController@ajax_lower,DistributController@withdrawals,DistributController@editRebate,DistributController@delWithdrawals,DistributController@editWithdrawals',0),(60,'自提点管理','system','PickupController@index,PickupController@ajaxPickupList,PickupController@add,PickupController@edit_address',0);	


/* Alter table in target */
alter table `__PREFIX__user_address` 
	add column `is_pickup` tinyint(1)   null default 0 after `is_default`; 

	


/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;