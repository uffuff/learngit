
alter table `__PREFIX__goods` 
	change `exchange_integral` `exchange_integral` int(10)   not null default 0 comment '积分兑换：0不参与积分兑换，积分和现金的兑换比例见后台配置' after `give_integral`; 

create table `__PREFIX__message`(
	`message_id` int(11) not null  auto_increment , 
	`admin_id` smallint(5) unsigned not null  default 0 comment '管理者id' , 
	`message` text collate utf8_general_ci not null  comment '站内信内容' , 
	`type` tinyint(1) unsigned not null  default 0 comment '个体消息：0，全体消息1' , 
	`category` tinyint(1) unsigned not null  default 0 comment ' 系统消息：0，活动消息：1' , 
	`send_time` timestamp not null  default '0000-00-00 00:00:00' on update current_timestamp comment '发送时间' , 
	primary key (`message_id`) 
) default charset='utf8' collate='utf8_general_ci';

create table `__PREFIX__recharge`(
	`order_id` bigint(20) not null  auto_increment , 
	`user_id` bigint(20) not null  comment '会员ID' , 
	`nickname` varchar(50) collate utf8_general_ci null  comment '会员昵称' , 
	`order_sn` varchar(30) collate utf8_general_ci not null  comment '充值单号' , 
	`account` float(10,2) null  default 0.00 comment '充值金额' , 
	`ctime` int(11) null  comment '充值时间' , 
	`pay_time` int(11) null  comment '支付时间' , 
	`pay_code` varchar(20) collate utf8_general_ci null  , 
	`pay_name` varchar(80) collate utf8_general_ci null  comment '支付方式' , 
	`pay_status` tinyint(1) null  default 0 comment '充值状态0:待支付 1:充值成功 2:交易关闭' , 
	primary key (`order_id`) 
) default charset='utf8' collate='utf8_general_ci';


create table `__PREFIX__user_message`(
	`rec_id` int(11) not null  auto_increment , 
	`user_id` mediumint(8) unsigned not null  default 0 comment '用户id' , 
	`message_id` int(11) unsigned not null  default 0 comment '消息id' , 
	`category` tinyint(1) unsigned not null  default 0 comment '系统消息0，活动消息' , 
	`status` tinyint(1) unsigned not null  default 0 comment '查看状态：0未查看，1已查看' , 
	primary key (`rec_id`) , 
	key `user_id`(`user_id`) , 
	key `message_id`(`message_id`) 
)  default charset='utf8' collate='utf8_general_ci';


alter table `__PREFIX__wx_user` 
	change `wxid` `wxid` varchar(64)  collate utf8_general_ci not null comment '公众号原始ID' after `appsecret` , 
	change `weixin` `weixin` char(64)  collate utf8_general_ci not null comment '微信号' after `wxid` , 
	change `create_time` `create_time` int(11)   not null comment 'create_time' after `w_token` , 
	change `updatetime` `updatetime` int(11)   not null comment 'updatetime' after `create_time` , 
	change `web_expires` `web_expires` int(11)   not null comment '过期时间' after `web_refresh_token`; 
