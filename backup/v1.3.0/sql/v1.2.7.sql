/* Alter table in target */
ALTER TABLE `__PREFIX__remittance` 
	CHANGE `status` `status` tinyint(1)   NULL DEFAULT 0 COMMENT '0���ʧ�� 1���ɹ�' after `money` ;
/* Alter table in target */
ALTER TABLE `__PREFIX__wx_user` 
	ADD COLUMN `wait_access` tinyint(1)   NULL DEFAULT 0 COMMENT '΢�Ž���״̬,0������1�ѽ���' after `menu_config`;