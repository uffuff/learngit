ALTER TABLE `__PREFIX__article_cat` 
	CHANGE `cat_type` `cat_type` smallint(6)   NULL DEFAULT 0 COMMENT '系统分组' after `cat_name`; 

CREATE TABLE `__PREFIX__wx_msg`(
	`msgid` int(11) NOT NULL  auto_increment , 
	`admin_id` int(11) NOT NULL  COMMENT '系统用户ID' , 
	`titile` varchar(100) COLLATE utf8_general_ci NOT NULL  , 
	`content` text COLLATE utf8_general_ci NOT NULL  , 
	`createtime` int(11) NOT NULL  DEFAULT 0 COMMENT '创建时间' , 
	`sendtime` int(11) NOT NULL  DEFAULT 0 COMMENT '发送时间' , 
	`issend` tinyint(1) NULL  DEFAULT 0 COMMENT '0未发送1成功2失败' , 
	`sendtype` tinyint(1) NULL  DEFAULT 1 COMMENT '0单人1所有' , 
	PRIMARY KEY (`msgid`) , 
	KEY `uid`(`admin_id`) , 
	KEY `createymd`(`sendtime`) , 
	KEY `fake_id`(`titile`) 
) DEFAULT CHARSET='utf8' COLLATE='utf8_general_ci';

