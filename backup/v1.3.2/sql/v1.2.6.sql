/* Alter table in target */
ALTER TABLE `__PREFIX__spec_goods_price` 
	CHANGE `sku` `sku` varchar(128)  COLLATE utf8_bin NULL DEFAULT '' COMMENT 'SKU' after `bar_code`;