/* Alter table in target */
alter table `__PREFIX__users` 
	add column `token` varchar(64)  collate utf8_general_ci null default '' comment '����app ��Ȩ������session_id' after `third_leader`;