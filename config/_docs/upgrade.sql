
----------------   24/09/2012 - Owner Album   -----------------

ALTER TABLE `xinh_album` ADD COLUMN `owner_id` INT(11) NULL AFTER `keyword`;
ALTER TABLE `xinh.like.vn`.`xinh_album` ADD COLUMN `isdeleted` TINYINT(4) NULL AFTER `owner_id`; 
ALTER TABLE `xinh_album` ADD COLUMN `deleted_date` INT(10) DEFAULT 0 NULL AFTER `isdeleted`;
UPDATE xinh_album SET owner_id = created_by ; 

----- 26/09/2012 add people album -----
ALTER TABLE `xinh.like.vn`.`xinh_tag_category_friend` ADD COLUMN `updated_date` INT(10) NULL AFTER `approved`; 
ALTER TABLE `xinhlikevn_log`.`xinh_log` ADD COLUMN `group_id` INT(11) DEFAULT 0 NULL AFTER `owner_name`; 

----- 06/10/2012 apply themes -----
-- photo size avatar
/*[11:18:54 AM][32 ms]*/ UPDATE `xinh.like.vn`.`xinh_photo_size` SET `width`='120',`height`='120' WHERE `id`='9'; 
/*[11:22:42 AM][45 ms]*/ INSERT INTO `xinh.like.vn`.`xinh_photo_size`(`id`,`name`,`width`,`height`,`isdefault`,`type`,`prefix`) VALUES ( NULL,'AVATAR-BIG','220','220','0',NULL,NULL); 
/*[11:22:55 AM][43 ms]*/ UPDATE `xinh.like.vn`.`xinh_photo_size` SET `type`='GetShow',`prefix`='avatar' WHERE `id`='16'; 
/*[11:23:13 AM][52 ms]*/ INSERT INTO `xinh.like.vn`.`xinh_photo_size`(`id`,`name`,`width`,`height`,`isdefault`,`type`,`prefix`) VALUES ( NULL,'AVATAR-SMALL','60','60','0',NULL,NULL); 
/*[11:23:15 AM][26 ms]*/ UPDATE `xinh.like.vn`.`xinh_photo_size` SET `type`='GetShow' WHERE `id`='17'; 
/*[11:23:18 AM][28 ms]*/ UPDATE `xinh.like.vn`.`xinh_photo_size` SET `prefix`='avatar' WHERE `id`='17'; 
/*[11:26:18 AM][30 ms]*/ INSERT INTO `xinh.like.vn`.`xinh_photo_size`(`id`,`name`,`width`,`height`,`isdefault`,`type`,`prefix`) VALUES ( NULL,'THUMB-MID','175','187','0',NULL,NULL); 
/*[11:26:22 AM][32 ms]*/ UPDATE `xinh.like.vn`.`xinh_photo_size` SET `type`='GetShow',`prefix`='thumb' WHERE `id`='18'; 
/*[11:26:49 AM][41 ms]*/ INSERT INTO `xinh.like.vn`.`xinh_photo_size`(`id`,`name`,`width`,`height`,`isdefault`,`type`,`prefix`) VALUES ( NULL,'THUMB-SMALL','118','126','0',NULL,NULL); 
/*[11:26:51 AM][14 ms]*/ UPDATE `xinh.like.vn`.`xinh_photo_size` SET `type`='GetShow' WHERE `id`='19'; 
/*[11:26:53 AM][32 ms]*/ UPDATE `xinh.like.vn`.`xinh_photo_size` SET `prefix`='thumb' WHERE `id`='19'; 
/*[11:27:32 AM][28 ms]*/ UPDATE `xinh.like.vn`.`xinh_photo_size` SET `width`='266',`height`='284' WHERE `id`='5'; 

----- 23/10/2012 album update -----
ALTER TABLE `xinh.like.vn`.`xinh_album` ADD COLUMN `taken` INT(10) NULL AFTER `state`, ADD COLUMN `equip` VARCHAR(128) NULL AFTER `taken`; 