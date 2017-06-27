/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/* Alter table in target */
ALTER TABLE `__PREFIX__cart` 
	ADD COLUMN `sku` varchar(128)  COLLATE utf8_general_ci NULL DEFAULT '' COMMENT 'sku' after `prom_id` ;

/* Alter table in target */
ALTER TABLE `__PREFIX__goods` 
	CHANGE `cat_id` `cat_id` int(11) unsigned   NOT NULL DEFAULT 0 COMMENT '分类id' after `goods_id` , 
	CHANGE `extend_cat_id` `extend_cat_id` int(11)   NULL DEFAULT 0 COMMENT '扩展分类id' after `cat_id` , 
	ADD COLUMN `spu` varchar(128)  COLLATE utf8_general_ci NULL DEFAULT '' COMMENT 'SPU' after `commission` , 
	ADD COLUMN `sku` varchar(128)  COLLATE utf8_general_ci NULL DEFAULT '' COMMENT 'SKU' after `spu` ;

/* Alter table in target */
ALTER TABLE `__PREFIX__goods_consult` 
	ADD COLUMN `is_show` tinyint(1)   NULL DEFAULT 0 COMMENT '是否显示' after `parent_id` ;

/* Alter table in target */
ALTER TABLE `__PREFIX__order_goods` 
	ADD COLUMN `sku` varchar(128)  COLLATE utf8_general_ci NULL DEFAULT '' COMMENT 'sku' after `delivery_id` ;

/* Alter table in target */
ALTER TABLE `__PREFIX__plugin` 
	CHANGE `version` `version` varchar(255)  COLLATE utf8_general_ci NULL COMMENT '插件的版本' after `name` ;

/* Alter table in target */
ALTER TABLE `__PREFIX__return_goods` 
	ADD COLUMN `spec_key` varchar(64)  COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '商品规格key 对应__PREFIX__spec_goods_price 表' after `user_id` ;

/* Alter table in target */
ALTER TABLE `__PREFIX__spec_goods_price` 
	ADD COLUMN `sku` varchar(128)  COLLATE utf16_general_ci NULL DEFAULT '' COMMENT 'SKU' after `bar_code` ;

/* Alter table in target */
ALTER TABLE `__PREFIX__system_module` 
	CHANGE `module` `module` enum('top','menu','module')  COLLATE utf8_general_ci NULL DEFAULT 'module' after `mod_id` , 
	CHANGE `ctl` `ctl` varchar(20)  COLLATE utf8_general_ci NULL DEFAULT '' after `level` , 
	CHANGE `act` `act` varchar(30)  COLLATE utf8_general_ci NULL DEFAULT '' after `ctl` , 
	CHANGE `title` `title` varchar(20)  COLLATE utf8_general_ci NULL DEFAULT '' after `act` , 
	CHANGE `visible` `visible` tinyint(1)   NULL DEFAULT 1 after `title` , 
	CHANGE `parent_id` `parent_id` smallint(6)   NULL DEFAULT 0 after `visible` , 
	CHANGE `orderby` `orderby` smallint(6)   NULL DEFAULT 50 after `parent_id` , 
	CHANGE `icon` `icon` varchar(30)  COLLATE utf8_general_ci NULL after `orderby` ;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;