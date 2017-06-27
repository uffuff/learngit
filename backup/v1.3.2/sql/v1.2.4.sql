
/* Alter table in target */
ALTER TABLE `__PREFIX__config` 
	CHANGE `name` `name` varchar(64)  COLLATE utf8_general_ci NULL COMMENT '配置的key键名' after `id` , 
	CHANGE `inc_type` `inc_type` varchar(64)  COLLATE utf8_general_ci NULL COMMENT '配置分组' after `value` ; 

/* Alter table in target */
ALTER TABLE `__PREFIX__goods` 
	ADD COLUMN `extend_cat_id` smallint(2)   NULL DEFAULT 0 COMMENT '扩展分类id' after `cat_id` , 
	CHANGE `goods_sn` `goods_sn` varchar(60)  COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '商品编号' after `extend_cat_id` , 
	CHANGE `goods_name` `goods_name` varchar(120)  COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '商品名称' after `goods_sn` , 
	CHANGE `click_count` `click_count` int(10) unsigned   NOT NULL DEFAULT 0 COMMENT '点击数' after `goods_name` , 
	CHANGE `brand_id` `brand_id` smallint(5) unsigned   NOT NULL DEFAULT 0 COMMENT '品牌id' after `click_count` , 
	CHANGE `store_count` `store_count` smallint(5) unsigned   NOT NULL DEFAULT 10 COMMENT '库存数量' after `brand_id` , 
	CHANGE `comment_count` `comment_count` smallint(5)   NULL DEFAULT 0 COMMENT '商品评论数' after `store_count` , 
	CHANGE `weight` `weight` int(11) unsigned   NOT NULL DEFAULT 0 COMMENT '商品重量克为单位' after `comment_count` , 
	CHANGE `market_price` `market_price` decimal(10,2) unsigned   NOT NULL DEFAULT 0.00 COMMENT '市场价' after `weight` , 
	CHANGE `shop_price` `shop_price` decimal(10,2) unsigned   NOT NULL DEFAULT 0.00 COMMENT '本店价' after `market_price` , 
	CHANGE `cost_price` `cost_price` decimal(10,2)   NULL DEFAULT 0.00 COMMENT '商品成本价' after `shop_price` , 
	CHANGE `keywords` `keywords` varchar(255)  COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '商品关键词' after `cost_price` , 
	CHANGE `goods_remark` `goods_remark` varchar(255)  COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '商品简单描述' after `keywords` , 
	CHANGE `goods_content` `goods_content` text  COLLATE utf8_general_ci NULL COMMENT '商品详细描述' after `goods_remark` , 
	CHANGE `original_img` `original_img` varchar(255)  COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '商品上传原始图' after `goods_content` , 
	CHANGE `is_real` `is_real` tinyint(3) unsigned   NOT NULL DEFAULT 1 COMMENT '是否为实物' after `original_img` , 
	CHANGE `is_on_sale` `is_on_sale` tinyint(1) unsigned   NOT NULL DEFAULT 1 COMMENT '是否上架' after `is_real` , 
	CHANGE `is_free_shipping` `is_free_shipping` tinyint(1) unsigned   NOT NULL DEFAULT 0 COMMENT '是否包邮0否1是' after `is_on_sale` , 
	CHANGE `on_time` `on_time` int(10) unsigned   NOT NULL DEFAULT 0 COMMENT '商品上架时间' after `is_free_shipping` , 
	CHANGE `sort` `sort` smallint(4) unsigned   NOT NULL DEFAULT 50 COMMENT '商品排序' after `on_time` , 
	CHANGE `is_recommend` `is_recommend` tinyint(1) unsigned   NOT NULL DEFAULT 0 COMMENT '是否推荐' after `sort` , 
	CHANGE `is_new` `is_new` tinyint(1) unsigned   NOT NULL DEFAULT 0 COMMENT '是否新品' after `is_recommend` , 
	CHANGE `is_hot` `is_hot` tinyint(1)   NULL DEFAULT 0 COMMENT '是否热卖' after `is_new` , 
	CHANGE `last_update` `last_update` int(10) unsigned   NOT NULL DEFAULT 0 COMMENT '最后更新时间' after `is_hot` , 
	CHANGE `goods_type` `goods_type` smallint(5) unsigned   NOT NULL DEFAULT 0 COMMENT '商品所属类型id，取值表goods_type的cat_id' after `last_update` , 
	CHANGE `spec_type` `spec_type` smallint(5)   NULL DEFAULT 0 COMMENT '商品规格类型，取值表goods_type的cat_id' after `goods_type` , 
	CHANGE `give_integral` `give_integral` mediumint(8)   NULL DEFAULT 0 COMMENT '购买商品赠送积分' after `spec_type` , 
	CHANGE `sales_sum` `sales_sum` int(11)   NULL DEFAULT 0 COMMENT '商品销量' after `give_integral` , 
	CHANGE `prom_type` `prom_type` tinyint(1)   NULL DEFAULT 0 COMMENT '0 普通订单,1 限时抢购, 2 团购 , 3 促销优惠' after `sales_sum` , 
	CHANGE `prom_id` `prom_id` int(11)   NULL DEFAULT 0 COMMENT '优惠活动id' after `prom_type` , 
	ADD COLUMN `commission` decimal(10,2)   NULL DEFAULT 0.00 COMMENT '佣金用于分销分成' after `prom_id` ; 


/* Alter table in target */
ALTER TABLE `__PREFIX__goods_category` 
	ADD COLUMN `commission_rate` tinyint(1)   NULL DEFAULT 0 COMMENT '分佣比例' after `cat_group` ; 


/* Alter table in target */
ALTER TABLE `__PREFIX__order` 
	CHANGE `coupon_price` `coupon_price` decimal(10,2)   NULL DEFAULT 0.00 COMMENT '优惠券抵扣' after `user_money` , 
	ADD COLUMN `shipping_time` int(11)   NULL DEFAULT 0 COMMENT '最后新发货时间' after `add_time` , 
	CHANGE `confirm_time` `confirm_time` int(10)   NULL DEFAULT 0 COMMENT '收货确认时间' after `shipping_time` , 
	CHANGE `pay_time` `pay_time` int(10) unsigned   NOT NULL DEFAULT 0 COMMENT '支付时间' after `confirm_time` , 
	CHANGE `order_prom_id` `order_prom_id` smallint(6)   NOT NULL DEFAULT 0 COMMENT '活动id' after `pay_time` , 
	CHANGE `order_prom_amount` `order_prom_amount` decimal(10,2)   NOT NULL DEFAULT 0.00 COMMENT '活动优惠金额' after `order_prom_id` , 
	CHANGE `discount` `discount` decimal(10,2)   NOT NULL DEFAULT 0.00 COMMENT '价格调整' after `order_prom_amount` , 
	CHANGE `user_note` `user_note` varchar(255)  COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '用户备注' after `discount` , 
	CHANGE `admin_note` `admin_note` varchar(255)  COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '管理员备注' after `user_note` , 
	CHANGE `parent_sn` `parent_sn` varchar(100)  COLLATE utf8_general_ci NULL COMMENT '父单单号' after `admin_note` , 
	ADD COLUMN `is_distribut` tinyint(1)   NULL DEFAULT 0 COMMENT '是否已分成0未分成1已分成' after `parent_sn` ; 

/* Alter table in target */
ALTER TABLE `__PREFIX__order_action` 
	CHANGE `action_user` `action_user` int(11)   NULL DEFAULT 0 COMMENT '操作人 0 为管理员操作' after `order_id` ; 

/* Create table in target */
CREATE TABLE `__PREFIX__rebate_log`(
	`id` int(11) NOT NULL  auto_increment COMMENT '分成记录表' , 
	`user_id` int(11) NULL  DEFAULT 0 COMMENT '获佣用户' , 
	`buy_user_id` int(11) NULL  DEFAULT 0 COMMENT '购买人id' , 
	`nickname` varchar(32) COLLATE utf8_bin NULL  DEFAULT '' COMMENT '购买人名称' , 
	`order_sn` varchar(32) COLLATE utf8_bin NULL  DEFAULT '' COMMENT '订单编号' , 
	`order_id` int(11) NULL  DEFAULT 0 COMMENT '订单id' , 
	`goods_price` decimal(10,2) NULL  DEFAULT 0.00 COMMENT '订单商品总额' , 
	`money` decimal(10,2) NULL  DEFAULT 0.00 COMMENT '获佣金额' , 
	`level` tinyint(1) NULL  DEFAULT 1 COMMENT '获佣用户级别' , 
	`create_time` int(11) NULL  DEFAULT 0 COMMENT '分成记录生成时间' , 
	`status` tinyint(1) NULL  DEFAULT 0 COMMENT '0未付款,1已付款, 2等待分成(已收货) 3已分成, 4已取消' , 
	`confirm_time` int(11) NULL  DEFAULT 0 COMMENT '确定分成或者取消时间' , 
	`remark` varchar(1024) COLLATE utf8_bin NULL  DEFAULT '' COMMENT '如果是取消, 有取消备注' , 
	PRIMARY KEY (`id`) 
)  DEFAULT CHARSET='utf8' COLLATE='utf8_general_ci';


/* Create table in target */
CREATE TABLE `__PREFIX__remittance`(
	`id` int(11) NOT NULL  auto_increment COMMENT '分销用户转账记录表' , 
	`user_id` int(11) NULL  DEFAULT 0 COMMENT '汇款的用户id' , 
	`bank_name` varchar(32) COLLATE utf8_bin NULL  DEFAULT '' COMMENT '收款银行名称' , 
	`account_bank` varchar(32) COLLATE utf8_bin NULL  DEFAULT '' COMMENT '银行账号' , 
	`account_name` varchar(32) COLLATE utf8_bin NULL  DEFAULT '' COMMENT '开户人名称' , 
	`money` decimal(10,2) NULL  DEFAULT 0.00 COMMENT '汇款金额' , 
	`status` tinyint(1) NULL  COMMENT '0汇款失败 1汇款成功' , 
	`create_time` int(11) NULL  DEFAULT 0 COMMENT '汇款时间' , 
	`remark` varchar(1024) COLLATE utf8_bin NULL  DEFAULT '' COMMENT '汇款备注' , 
	`admin_id` int(11) NULL  DEFAULT 0 COMMENT '管理员id' , 
	`withdrawals_id` int(11) NULL  DEFAULT 0 COMMENT '提现申请表id' , 
	PRIMARY KEY (`id`) 
)  DEFAULT CHARSET='utf8' COLLATE='utf8_general_ci';

/* Alter table in target */
ALTER TABLE `__PREFIX__users` 
	ADD COLUMN `distribut_money` decimal(10,2)   NULL DEFAULT 0.00 COMMENT '累积分佣金额' after `frozen_money` , 
	CHANGE `pay_points` `pay_points` int(10) unsigned   NOT NULL DEFAULT 0 COMMENT '消费积分' after `distribut_money` , 
	CHANGE `address_id` `address_id` mediumint(8) unsigned   NOT NULL DEFAULT 0 COMMENT '默认收货地址' after `pay_points` , 
	CHANGE `reg_time` `reg_time` int(10) unsigned   NOT NULL DEFAULT 0 COMMENT '注册时间' after `address_id` , 
	CHANGE `last_login` `last_login` int(11) unsigned   NOT NULL DEFAULT 0 COMMENT '最后登录时间' after `reg_time` , 
	CHANGE `last_ip` `last_ip` varchar(15)  COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '最后登录ip' after `last_login` , 
	CHANGE `qq` `qq` varchar(20)  COLLATE utf8_general_ci NOT NULL COMMENT 'QQ' after `last_ip` , 
	CHANGE `mobile` `mobile` varchar(20)  COLLATE utf8_general_ci NOT NULL COMMENT '手机号码' after `qq` , 
	CHANGE `mobile_validated` `mobile_validated` tinyint(3) unsigned   NOT NULL DEFAULT 0 COMMENT '是否验证手机' after `mobile` , 
	CHANGE `oauth` `oauth` varchar(10)  COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '第三方来源 wx weibo alipay' after `mobile_validated` , 
	CHANGE `openid` `openid` varchar(100)  COLLATE utf8_general_ci NULL COMMENT '第三方唯一标示' after `oauth` , 
	CHANGE `head_pic` `head_pic` varchar(255)  COLLATE utf8_general_ci NULL COMMENT '头像' after `openid` , 
	CHANGE `province` `province` int(6)   NULL DEFAULT 0 COMMENT '省份' after `head_pic` , 
	CHANGE `city` `city` int(6)   NULL DEFAULT 0 COMMENT '市区' after `province` , 
	CHANGE `district` `district` int(6)   NULL DEFAULT 0 COMMENT '县' after `city` , 
	CHANGE `email_validated` `email_validated` tinyint(1) unsigned   NOT NULL DEFAULT 0 COMMENT '是否验证电子邮箱' after `district` , 
	CHANGE `nickname` `nickname` varchar(50)  COLLATE utf8_general_ci NULL COMMENT '第三方返回昵称' after `email_validated` , 
	CHANGE `level` `level` tinyint(1)   NULL DEFAULT 1 COMMENT '会员等级' after `nickname` , 
	CHANGE `discount` `discount` decimal(10,2)   NULL DEFAULT 1.00 COMMENT '会员折扣，默认1不享受' after `level` , 
	CHANGE `total_amount` `total_amount` decimal(10,2)   NULL DEFAULT 0.00 COMMENT '消费累计额度' after `discount` , 
	CHANGE `is_lock` `is_lock` tinyint(1)   NULL DEFAULT 0 COMMENT '是否被锁定冻结' after `total_amount` , 
	ADD COLUMN `is_distribut` tinyint(1)   NULL DEFAULT 0 COMMENT '是否为分销商 0 否 1 是' after `is_lock` , 
	ADD COLUMN `first_leader` int(11)   NULL DEFAULT 0 COMMENT '第一个上级' after `is_distribut` , 
	ADD COLUMN `second_leader` int(11)   NULL DEFAULT 0 COMMENT '第二个上级' after `first_leader` , 
	ADD COLUMN `third_leader` int(11)   NULL DEFAULT 0 COMMENT '第三个上级' after `second_leader` ; 

/* Create table in target */
CREATE TABLE `__PREFIX__withdrawals`(
	`id` int(11) NOT NULL  auto_increment COMMENT '提现申请表' , 
	`user_id` int(11) NULL  DEFAULT 0 COMMENT '用户id' , 
	`create_time` int(11) NULL  DEFAULT 0 COMMENT '申请日期' , 
	`money` decimal(10,2) NULL  DEFAULT 0.00 COMMENT '提现金额' , 
	`bank_name` varchar(32) COLLATE utf8_bin NULL  DEFAULT '' COMMENT '银行名称 如支付宝 微信 中国银行 农业银行等' , 
	`account_bank` varchar(32) COLLATE utf8_bin NULL  DEFAULT '' COMMENT '银行账号' , 
	`account_name` varchar(32) COLLATE utf8_bin NULL  DEFAULT '' COMMENT '银行账户名 可以是支付宝可以其他银行' , 
	`remark` varchar(1024) COLLATE utf8_bin NULL  DEFAULT '' COMMENT '提现备注' , 
	`status` tinyint(1) NULL  DEFAULT 0 COMMENT '提现状态0申请中1申请成功2申请失败' , 
	PRIMARY KEY (`id`) 
)  DEFAULT CHARSET='utf8' COLLATE='utf8_general_ci';


alter table `__PREFIX__user_address`
change `country` `country` int(11) default 0 not null comment '国家',
change `province` `province` int(11) default 0 not null comment '省份',
change `city` `city` int(11) default 0 not null comment '城市',
change `district` `district` int(11) default 0 not null comment '地区',
change `twon` `twon` int(11) default 0 null comment '乡镇'; 

Alter table `__PREFIX__order`
change `country` `country` int(11) UNSIGNED DEFAULT 0 NOT NULL COMMENT '国家',
change `province` `province` int(11) UNSIGNED DEFAULT 0 NOT NULL COMMENT '省份',
change `city` `city` int(11) UNSIGNED DEFAULT 0 NOT NULL COMMENT '城市',
change `district` `district` int(11) UNSIGNED DEFAULT 0 NOT NULL COMMENT '县区',
change `twon` `twon` int(11) DEFAULT 0 NULL COMMENT '乡镇'; 

alter table `__PREFIX__area_region`
change `shipping_area_id` `shipping_area_id` int(11) unsigned default 0 not null comment '物流配置id',
change `region_id` `region_id` int(11) unsigned default 0 not null comment '地区id对应region表id' ;