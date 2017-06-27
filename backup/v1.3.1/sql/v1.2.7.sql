/* Alter table in target */
ALTER TABLE `__PREFIX__remittance` 
	CHANGE `status` `status` tinyint(1)   NULL DEFAULT 0 COMMENT '0汇款失败 1汇款成功' after `money` ;
/* Alter table in target */
ALTER TABLE `__PREFIX__wx_user` 
	ADD COLUMN `wait_access` tinyint(1)   NULL DEFAULT 0 COMMENT '微信接入状态,0待接入1已接入' after `menu_config`;