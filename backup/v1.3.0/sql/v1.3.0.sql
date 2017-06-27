
alter table `__PREFIX__goods` 
	change `exchange_integral` `exchange_integral` int(10)   not null default 0 comment '���ֶһ���0��������ֶһ������ֺ��ֽ�Ķһ���������̨����' after `give_integral`; 

create table `__PREFIX__message`(
	`message_id` int(11) not null  auto_increment , 
	`admin_id` smallint(5) unsigned not null  default 0 comment '������id' , 
	`message` text collate utf8_general_ci not null  comment 'վ��������' , 
	`type` tinyint(1) unsigned not null  default 0 comment '������Ϣ��0��ȫ����Ϣ1' , 
	`category` tinyint(1) unsigned not null  default 0 comment ' ϵͳ��Ϣ��0�����Ϣ��1' , 
	`send_time` timestamp not null  default '0000-00-00 00:00:00' on update current_timestamp comment '����ʱ��' , 
	primary key (`message_id`) 
) default charset='utf8' collate='utf8_general_ci';

create table `__PREFIX__recharge`(
	`order_id` bigint(20) not null  auto_increment , 
	`user_id` bigint(20) not null  comment '��ԱID' , 
	`nickname` varchar(50) collate utf8_general_ci null  comment '��Ա�ǳ�' , 
	`order_sn` varchar(30) collate utf8_general_ci not null  comment '��ֵ����' , 
	`account` float(10,2) null  default 0.00 comment '��ֵ���' , 
	`ctime` int(11) null  comment '��ֵʱ��' , 
	`pay_time` int(11) null  comment '֧��ʱ��' , 
	`pay_code` varchar(20) collate utf8_general_ci null  , 
	`pay_name` varchar(80) collate utf8_general_ci null  comment '֧����ʽ' , 
	`pay_status` tinyint(1) null  default 0 comment '��ֵ״̬0:��֧�� 1:��ֵ�ɹ� 2:���׹ر�' , 
	primary key (`order_id`) 
) default charset='utf8' collate='utf8_general_ci';


create table `__PREFIX__user_message`(
	`rec_id` int(11) not null  auto_increment , 
	`user_id` mediumint(8) unsigned not null  default 0 comment '�û�id' , 
	`message_id` int(11) unsigned not null  default 0 comment '��Ϣid' , 
	`category` tinyint(1) unsigned not null  default 0 comment 'ϵͳ��Ϣ0�����Ϣ' , 
	`status` tinyint(1) unsigned not null  default 0 comment '�鿴״̬��0δ�鿴��1�Ѳ鿴' , 
	primary key (`rec_id`) , 
	key `user_id`(`user_id`) , 
	key `message_id`(`message_id`) 
)  default charset='utf8' collate='utf8_general_ci';


alter table `__PREFIX__wx_user` 
	change `wxid` `wxid` varchar(64)  collate utf8_general_ci not null comment '���ں�ԭʼID' after `appsecret` , 
	change `weixin` `weixin` char(64)  collate utf8_general_ci not null comment '΢�ź�' after `wxid` , 
	change `create_time` `create_time` int(11)   not null comment 'create_time' after `w_token` , 
	change `updatetime` `updatetime` int(11)   not null comment 'updatetime' after `create_time` , 
	change `web_expires` `web_expires` int(11)   not null comment '����ʱ��' after `web_refresh_token`; 
