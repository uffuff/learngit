

/* Alter table in target */
alter table `__PREFIX__goods` 
	add column `exchange_integral` int(10)   not null default 0 comment '���ֶһ���0��������ֶһ������ֺ��ֽ�Ķһ�����100��1' after `give_integral` , 
	add column `suppliers_id` smallint(5) unsigned   not null default 0 comment '������ID' after `exchange_integral` , 
	change `sales_sum` `sales_sum` int(11)   null default 0 comment '��Ʒ����' after `suppliers_id` , 
	change `prom_type` `prom_type` tinyint(1)   null default 0 comment '0 ��ͨ����,1 ��ʱ����, 2 �Ź� , 3 �����Ż�' after `sales_sum` , 
	change `prom_id` `prom_id` int(11)   null default 0 comment '�Żݻid' after `prom_type` , 
	change `commission` `commission` decimal(10,2)   null default 0.00 comment 'Ӷ�����ڷ����ֳ�' after `prom_id` , 
	change `spu` `spu` varchar(128)  collate utf8_general_ci null default '' comment 'SPU' after `commission` , 
	change `sku` `sku` varchar(128)  collate utf8_general_ci null default '' comment 'SKU' after `spu` ; 



/* Create table in target */
create table `__PREFIX__pick_up`(
	`pickup_id` int(11) not null  auto_increment comment '�����id' , 
	`pickup_name` varchar(255) collate utf8_general_ci not null  comment '���������' , 
	`pickup_address` varchar(255) collate utf8_general_ci not null  comment '������ַ' , 
	`pickup_phone` varchar(30) collate utf8_general_ci not null  comment '�����绰' , 
	`pickup_contact` varchar(20) collate utf8_general_ci not null  comment '�������ϵ��' , 
	`province_id` int(11) not null  comment 'ʡid' , 
	`city_id` int(11) not null  comment '��id' , 
	`district_id` int(11) not null  comment '��id' , 
	`suppliersid` int(11) not null  comment '��Ӧ��id' , 
	primary key (`pickup_id`) 
)  default charset='utf8' collate='utf8_general_ci' comment='������';


/* Alter table in target */
alter table `__PREFIX__prom_goods` 
	add column `prom_img` varchar(150)  collate utf8_general_ci null comment '�����ͼƬ' after `group` ; 

/* Alter table in target */
alter table `__PREFIX__rebate_log` 
	add column `confirm` int(11)   null default 0 comment 'ȷ���ջ�ʱ��' after `create_time` , 
	change `status` `status` tinyint(1)   null default 0 comment '0δ����,1�Ѹ���, 2�ȴ��ֳ�(���ջ�) 3�ѷֳ�, 4��ȡ��' after `confirm` , 
	change `confirm_time` `confirm_time` int(11)   null default 0 comment 'ȷ���ֳɻ���ȡ��ʱ��' after `status` , 
	change `remark` `remark` varchar(1024)  collate utf8_bin null default '' comment '�����ȡ��, ��ȡ����ע' after `confirm_time` ;


/* Create table in target */
create table `__PREFIX__suppliers`(
	`suppliers_id` smallint(5) unsigned not null  auto_increment comment '��Ӧ��ID' , 
	`suppliers_name` varchar(255) collate utf8_general_ci not null  default '' comment '��Ӧ������' , 
	`suppliers_desc` mediumtext collate utf8_general_ci not null  comment '��Ӧ������' , 
	`is_check` tinyint(1) unsigned not null  default 1 comment '��Ӧ��״̬' , 
	`suppliers_contacts` varchar(255) collate utf8_general_ci not null  default '' comment '��Ӧ����ϵ��' , 
	`suppliers_phone` varchar(20) collate utf8_general_ci not null  default '' comment '��Ӧ������' , 
	primary key (`suppliers_id`) 
)  default charset='utf8' collate='utf8_general_ci';


/* Create table in target */
create table `__PREFIX__system_menu`(
	`id` smallint(6) unsigned not null  auto_increment , 
	`name` varchar(50) collate utf8_general_ci null  comment 'Ȩ������' , 
	`group` varchar(20) collate utf8_general_ci null  comment '��������' , 
	`right` text collate utf8_general_ci null  comment 'Ȩ����(������+����)' , 
	`is_del` tinyint(1) null  default 0 comment 'ɾ��״̬ 1ɾ��,0����' , 
	primary key (`id`) 
)  default charset='utf8' collate='utf8_general_ci';

insert  into `__PREFIX__system_menu`(`id`,`name`,`group`,`right`,`is_del`) values (1,'���¹���','content','ArticleController@articleList,ArticleController@article,ArticleController@aticleHandle',0),(2,'���·���','content','ArticleController@categoryList,ArticleController@category,ArticleController@categoryHandle',0),(3,'��������','content','ArticleController@help_list',0),(4,'������','content','ArticleController@notice_list',0),(5,'��վ����','system','SystemController@index,SystemController@handle',0),(6,'Ȩ����Դ','system','SystemController@right_list,SystemController@edit_right',0),(7,'ǰ̨��������','system','SystemController@navigationList,SystemController@addEditNav,SystemController@delNav',0),(8,'����Ա����','system','AdminController@index,AdminController@admin_info,AdminController@adminHandle',0),(9,'��ɫ����','system','AdminController@role,AdminController@role_info,AdminController@roleSave,AdminController@roleDel',0),(10,'��Ӧ�̹���','system','AdminController@supplier,AdminController@supplier_info,AdminController@supplierHandle',0),(11,'��Ա���','member','UserController@add_user',0),(12,'��Ա�ʽ�','member','UserController@account_log,UserController@account_edit',0),(13,'��Ա����','member','UserController@index,UserController@ajaxindex,UserController@detail,UserController@address,UserController@delete,UserController@search_user',0),(14,'��Ա�ȼ�','member','UserController@level,UserController@levelList,UserController@levelHandle',0),(15,'��Ʒ����','goods','GoodsController@goodsTypeList,GoodsController@addEditGoodsType,GoodsController@delGoodsType',0),(16,'��Ʒ�༭','goods','GoodsController@addEditGoods,GoodsController@delGoods,GoodsController@del_goods_images',0),(17,'��Ʒ�б�','goods','GoodsController@goodsList,GoodsController@ajaxGoodsList,GoodsController@updateField',0),(18,'��Ʒ���','goods','GoodsController@ajaxGetSpecList,GoodsController@delGoodsSpec,GoodsController@addEditSpec,GoodsController@ajaxSpecList,GoodsController@specList,GoodsController@ajaxGetSpecSelect',0),(19,'��Ʒ����','goods','GoodsController@categoryList,GoodsController@addEditCategory,GoodsController@delGoodsCategory',0),(20,'��Ʒ����','goods','GoodsController@ajaxGetAttrList,GoodsController@goodsAttributeList,GoodsController@ajaxGoodsAttributeList,GoodsController@addEditGoodsAttribute,GoodsController@ajaxGetAttrInput',0),(21,'��ƷƷ��','goods','GoodsController@brandList,GoodsController@delBrand,GoodsController@addEditBrand',0),(22,'����б�','content','AdController@adList,AdController@adHandle,AdController@ad,AdController@changeAdField',0),(23,'���λ','content','AdController@position,AdController@positionList,AdController@positionHandle',0),(24,'�Ź�����','marketing','PromotionController@group_buy,PromotionController@group_buy_list,PromotionController@groupbuyHandle',0),(25,'��ʱ����','marketing','PromotionController@flash_sale,PromotionController@flash_sale_info,PromotionController@flash_sale_del',0),(26,'��������','marketing','PromotionController@prom_goods_list,PromotionController@prom_goods_info,PromotionController@prom_goods_save,PromotionController@prom_goods_del,PromotionController@get_goods,PromotionController@search_goods',0),(27,'�����б�','order','OrderController@index,OrderController@ajaxindex,OrderController@detail',0),(28,'��������','order','OrderController@deliveryHandle,OrderController@delivery_info,OrderController@delivery_list',0),(29,'�˻�������','order','OrderController@return_del,OrderController@return_info,OrderController@add_return_goods,OrderController@ajax_return_list',0),(30,'��ֶ���','order','OrderController@split_order,OrderController@search_goods',0),(31,'�޸Ķ���','system','OrderController@edit_order,OrderController@search_goods',0),(32,'��Ӷ���','order','OrderController@add_order,OrderController@search_goods',0),(33,'������','order','OrderController@pay_cancel,OrderController@delete_order,OrderController@order_action,OrderController@editprice,OrderController@order_log',0),(34,'��������','order','OrderController@export_order',0),(35,'��ӡ����','order','OrderController@order_print,OrderController@shipping_print',0),(36,'����б�','tools','PluginController@index,PluginController@install,PluginController@setting',0),(37,'��ӡ����','tools','PluginController@shipping_list,PluginController@shipping_desc,PluginController@shipping_print,PluginController@edit_shipping_print,PluginController@shipping_list_edit,PluginController@del_area',0),(38,'���ݱ���','tools','ToolsController@index,ToolsController@backup,ToolsController@optimize,ToolsController@repair',0),(39,'���ݻ�ԭ','tools','ToolsController@restore,ToolsController@restoreData,ToolsController@restoreUpload,ToolsController@downFile,ToolsController@delSqlFiles',0),(40,'��������','tools','ToolsController@region,ToolsController@regionHandle',0),(41,'���ں�����','marketing','WechatController@index,WechatController@setting,WechatController@get_access_token,WechatController@select_goods',0),(42,'�ı��ظ�','tools','WechatController@text,WechatController@add_text,WechatController@del_text',0),(43,'΢�Ų˵�','tools','WechatController@menu,WechatController@del_menu,WechatController@pub_menu',0),(44,'ͼ�Ļظ�','tools','WechatController@img,WechatController@add_img,WechatController@del_img,WechatController@preview',0),(45,'ģ�����','system','TemplateController@templateList,TemplateController@changeTemplate',0),(46,'���۸ſ�','count','ReportController@index,ReportController@finance,ReportController@user',0),(47,'��������','count','ReportController@saleTop,ReportController@userTop,ReportController@saleList',0),(48,'ר�����','content','TopicController@topic,TopicController@topicList,TopicController@topicHandle',0),(49,'������־','system','AdminController@log,OrderController@order_log',0),(50,'������ѯ','goods','CommentController@index,CommentController@detail,CommentController@ask_list,CommentController@ajax_ask_list,CommentController@del,CommentController@op,CommentController@consult_info,CommentController@ask_handle',0),(51,'�Ż�ȯ','marketing','CouponController@coupon_info,CouponController@index,CouponController@make_coupon,CouponController@ajax_get_user,CouponController@send_coupon,CouponController@send_cancel,CouponController@del_coupon,CouponController@coupon_list,CouponController@coupon_list_del',0),(52,'��������','content','ArticleController@link,ArticleController@linkList,ArticleController@linkHandle',0),(53,'��������','marketing','DistributController@set,DistributController@remittance,DistributController@tree,DistributController@rebate_log,DistributController@ajax_lower,DistributController@withdrawals,DistributController@editRebate,DistributController@delWithdrawals,DistributController@editWithdrawals',0),(60,'��������','system','PickupController@index,PickupController@ajaxPickupList,PickupController@add,PickupController@edit_address',0);	


/* Alter table in target */
alter table `__PREFIX__user_address` 
	add column `is_pickup` tinyint(1)   null default 0 after `is_default`; 

	


/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;