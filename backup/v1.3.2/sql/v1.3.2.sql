ALTER TABLE `__PREFIX__goods` 
	ADD COLUMN `shipping_area_ids` varchar(255)  COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '��������shipping_area_id,�Զ��ŷָ�' after `sku` ; 

ALTER TABLE `__PREFIX__message` 
	CHANGE `send_time` `send_time` int(10) unsigned   NOT NULL COMMENT '����ʱ��' after `category` ;

ALTER TABLE `__PREFIX__spec` 
	CHANGE `search_index` `search_index` tinyint(1)   NULL DEFAULT 1 COMMENT '�Ƿ���Ҫ������1�ǣ�0��' after `order` ; 

insert into `__PREFIX__config` values(null, 'regis_smtp_enable', '1', 'smtp', NULL);

