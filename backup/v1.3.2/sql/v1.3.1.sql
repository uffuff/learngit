ALTER TABLE `__PREFIX__article_cat` 
	CHANGE `cat_type` `cat_type` smallint(6)   NULL DEFAULT 0 COMMENT 'ϵͳ����' after `cat_name`; 

CREATE TABLE `__PREFIX__wx_msg`(
	`msgid` int(11) NOT NULL  auto_increment , 
	`admin_id` int(11) NOT NULL  COMMENT 'ϵͳ�û�ID' , 
	`titile` varchar(100) COLLATE utf8_general_ci NOT NULL  , 
	`content` text COLLATE utf8_general_ci NOT NULL  , 
	`createtime` int(11) NOT NULL  DEFAULT 0 COMMENT '����ʱ��' , 
	`sendtime` int(11) NOT NULL  DEFAULT 0 COMMENT '����ʱ��' , 
	`issend` tinyint(1) NULL  DEFAULT 0 COMMENT '0δ����1�ɹ�2ʧ��' , 
	`sendtype` tinyint(1) NULL  DEFAULT 1 COMMENT '0����1����' , 
	PRIMARY KEY (`msgid`) , 
	KEY `uid`(`admin_id`) , 
	KEY `createymd`(`sendtime`) , 
	KEY `fake_id`(`titile`) 
) DEFAULT CHARSET='utf8' COLLATE='utf8_general_ci';

