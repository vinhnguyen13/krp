/*
SQLyog Ultimate v9.51 
MySQL - 5.5.8 : Database - kelreport
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kelreport` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `kelreport`;

/*Table structure for table `action` */

DROP TABLE IF EXISTS `action`;

CREATE TABLE `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `comment` text,
  `subject` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `action` */

/*Table structure for table `auth_assignment` */

DROP TABLE IF EXISTS `auth_assignment`;

CREATE TABLE `auth_assignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_assignment` */

/*Table structure for table `auth_item` */

DROP TABLE IF EXISTS `auth_item`;

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_item` */

/*Table structure for table `auth_item_children` */

DROP TABLE IF EXISTS `auth_item_children`;

CREATE TABLE `auth_item_children` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_children_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_children_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_item_children` */

/*Table structure for table `auth_item_membership` */

DROP TABLE IF EXISTS `auth_item_membership`;

CREATE TABLE `auth_item_membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(64) DEFAULT NULL,
  `itemname` varchar(64) DEFAULT NULL,
  `price` double DEFAULT NULL COMMENT 'Price (when using membership module)',
  `duration` int(11) DEFAULT NULL COMMENT 'How long a membership is valid',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_code` (`code`),
  KEY `auth_item_properties_fk_1` (`itemname`),
  CONSTRAINT `auth_item_properties_fk_1` FOREIGN KEY (`itemname`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_item_membership` */

/*Table structure for table `auth_item_membership_order` */

DROP TABLE IF EXISTS `auth_item_membership_order`;

CREATE TABLE `auth_item_membership_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(64) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(64) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `giftcode` varchar(100) DEFAULT NULL,
  `order_date` int(11) NOT NULL,
  `expire_date` int(11) DEFAULT NULL,
  `approve_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_item_membership_fk_1` (`itemname`),
  CONSTRAINT `auth_item_membership_fk_1` FOREIGN KEY (`itemname`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_item_membership_order` */

/*Table structure for table `cms_article` */

DROP TABLE IF EXISTS `cms_article`;

CREATE TABLE `cms_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `last_modify` int(11) DEFAULT NULL,
  `ispublic` int(11) DEFAULT NULL,
  `public_time` int(11) DEFAULT NULL,
  `meta_description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `html_title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `related` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `related_id` int(11) DEFAULT '0',
  `author_name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1: Post, 2: Statics Page',
  `views` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cms_article` */

insert  into `cms_article`(`id`,`title`,`slug`,`description`,`body`,`thumbnail`,`created`,`creator`,`last_modify`,`ispublic`,`public_time`,`meta_description`,`meta_keywords`,`html_title`,`related`,`related_id`,`author_name`,`type`,`views`) values (1,'Mecury Rising','mecury-rising-6','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>&nbsp;</p>','../uploads/Article/1.jpg',1378147158,1,1378150694,1,1378103505,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','','MECURY RISING',NULL,0,'admin',1,0),(2,'Mecury Rising','mecury-rising-2','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>&nbsp;</p>','',1378147158,1,1378147720,1,1378103505,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','','MECURY RISING',NULL,0,'admin',1,0),(3,'Mecury Rising','mecury-rising-3','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>&nbsp;</p>','',1378147158,1,1378147725,1,1378103505,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','','MECURY RISING',NULL,0,'admin',1,0),(4,'Mecury Rising','mecury-rising-4','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>&nbsp;</p>','',1378147158,1,1378147730,1,1378103505,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','','MECURY RISING',NULL,0,'admin',1,0),(5,'Mecury Rising','mecury-rising-5','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>&nbsp;</p>','',1378147158,1,1378147749,1,1378103505,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','','MECURY RISING',NULL,0,'admin',1,0),(6,'Mecury Rising','mecury-rising','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>&nbsp;</p>','',1378147158,1,1378147291,1,1378103505,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','','MECURY RISING',NULL,0,'admin',1,0),(7,'Mecury Rising','mecury-rising','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>&nbsp;</p>','',1378147158,1,1378147291,1,1378103505,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','','MECURY RISING',NULL,0,'admin',1,0),(8,'Mecury Rising','mecury-rising','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>&nbsp;</p>','',1378147158,1,1378147291,1,1378103505,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','','MECURY RISING',NULL,0,'admin',1,0),(9,'Mecury Rising','mecury-rising','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>&nbsp;</p>','',1378147158,1,1378147291,1,1378103505,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','','MECURY RISING',NULL,0,'admin',1,0),(10,'Mecury Rising','mecury-rising','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>&nbsp;</p>','',1378147158,1,1378147291,1,1378103505,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','','MECURY RISING',NULL,0,'admin',1,0),(11,'Mecury Rising','mecury-rising','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>&nbsp;</p>','',1378147158,1,1378147291,1,1378103505,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','','MECURY RISING',NULL,0,'admin',1,0),(12,'Mecury Rising','mecury-rising','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>&nbsp;</p>','',1378147158,1,1378147291,1,1378103505,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','','MECURY RISING',NULL,0,'admin',1,0),(13,'Mecury Rising','mecury-rising','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>&nbsp;</p>','',1378147158,1,1378147291,1,1378103505,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','','MECURY RISING',NULL,0,'admin',1,0),(14,'Mecury Rising','mecury-rising','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>&nbsp;</p>','',1378147158,1,1378147291,1,1378103505,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','','MECURY RISING',NULL,0,'admin',1,0),(15,'Mecury Rising','mecury-rising','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>&nbsp;</p>','',1378147158,1,1378147291,1,1378103505,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','','MECURY RISING',NULL,0,'admin',1,0),(16,'Mecury Rising','mecury-rising','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>&nbsp;</p>','',1378147158,1,1378147291,1,1378103505,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','','MECURY RISING',NULL,0,'admin',1,0),(17,'Mecury Rising','mecury-rising','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>&nbsp;</p>','',1378147158,1,1378147291,1,1378103505,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','','MECURY RISING',NULL,0,'admin',1,0),(18,'Mecury Rising','mecury-rising','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>&nbsp;</p>','',1378147158,1,1378147291,1,1378103505,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','','MECURY RISING',NULL,0,'admin',1,0),(19,'Mecury Rising','mecury-rising','Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.</p>\r\n<p>&nbsp;</p>','',1378147158,1,1378147291,1,1378103505,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor.','','MECURY RISING',NULL,0,'admin',1,0);

/*Table structure for table `cms_article_category` */

DROP TABLE IF EXISTS `cms_article_category`;

CREATE TABLE `cms_article_category` (
  `article_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`article_id`,`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cms_article_category` */

/*Table structure for table `cms_article_event` */

DROP TABLE IF EXISTS `cms_article_event`;

CREATE TABLE `cms_article_event` (
  `article_id` int(11) NOT NULL,
  `title_display` varchar(255) DEFAULT NULL,
  `allDay` tinyint(1) DEFAULT '0',
  `start` int(10) DEFAULT NULL,
  `end` int(10) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cms_article_event` */

/*Table structure for table `cms_article_section` */

DROP TABLE IF EXISTS `cms_article_section`;

CREATE TABLE `cms_article_section` (
  `article_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  PRIMARY KEY (`article_id`,`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cms_article_section` */

insert  into `cms_article_section`(`article_id`,`section_id`) values (1,1),(2,1),(3,1),(4,1),(5,2),(6,2),(7,2),(8,2),(9,3),(10,3),(11,3),(12,3),(13,4),(15,4),(16,4),(17,4),(18,4),(19,4);

/*Table structure for table `cms_article_tag` */

DROP TABLE IF EXISTS `cms_article_tag`;

CREATE TABLE `cms_article_tag` (
  `article_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`article_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cms_article_tag` */

/*Table structure for table `cms_calendar` */

DROP TABLE IF EXISTS `cms_calendar`;

CREATE TABLE `cms_calendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `allday` int(11) DEFAULT NULL,
  `url` tinytext COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cms_calendar` */

/*Table structure for table `cms_category` */

DROP TABLE IF EXISTS `cms_category`;

CREATE TABLE `cms_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cms_category` */

/*Table structure for table `cms_layout` */

DROP TABLE IF EXISTS `cms_layout`;

CREATE TABLE `cms_layout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme_id` int(11) DEFAULT '0',
  `title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `css_path` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_path` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cms_layout` */

/*Table structure for table `cms_layout_widget` */

DROP TABLE IF EXISTS `cms_layout_widget`;

CREATE TABLE `cms_layout_widget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `layout_id` int(11) NOT NULL DEFAULT '0',
  `widget_id` int(11) NOT NULL DEFAULT '0',
  `position` varchar(255) DEFAULT NULL,
  `properties` text,
  `order` int(10) DEFAULT NULL,
  `access` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cms_layout_widget` */

/*Table structure for table `cms_section` */

DROP TABLE IF EXISTS `cms_section`;

CREATE TABLE `cms_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `displayorder` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cms_section` */

insert  into `cms_section`(`id`,`title`,`slug`,`image`,`description`,`parent_id`,`status`,`displayorder`) values (1,'Fashion','fashion','../uploads/Section/1.jpg','Fashion 1',NULL,1,NULL),(2,'Beauty & Fitness','beauty-fitness','../uploads/Section/2.jpg','Beauty & Fitness',NULL,1,NULL),(3,'Deals','deals','../uploads/Section/3.jpg','Deals',NULL,1,NULL),(4,'Lifestyle','lifestyle','../uploads/Section/4.jpg','Lifestyle',NULL,1,NULL);

/*Table structure for table `cms_tag` */

DROP TABLE IF EXISTS `cms_tag`;

CREATE TABLE `cms_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cms_tag` */

/*Table structure for table `cms_themes` */

DROP TABLE IF EXISTS `cms_themes`;

CREATE TABLE `cms_themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `layout` varchar(50) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT '0',
  `path_css` varchar(255) DEFAULT NULL,
  `path_images` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cms_themes` */

/*Table structure for table `cms_url_manager` */

DROP TABLE IF EXISTS `cms_url_manager`;

CREATE TABLE `cms_url_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `layout_id` int(11) DEFAULT '0',
  `url` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cms_url_manager` */

/*Table structure for table `cms_widget` */

DROP TABLE IF EXISTS `cms_widget`;

CREATE TABLE `cms_widget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_alias` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enable` tinyint(1) DEFAULT NULL COMMENT '1, Enable, 2, Disable',
  `params` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cms_widget` */

/*Table structure for table `cms_widget_item` */

DROP TABLE IF EXISTS `cms_widget_item`;

CREATE TABLE `cms_widget_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `widget_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(500) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `display_order` tinyint(4) DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `cms_widget_item` */

/*Table structure for table `cms_widget_tag` */

DROP TABLE IF EXISTS `cms_widget_tag`;

CREATE TABLE `cms_widget_tag` (
  `widget_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`widget_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cms_widget_tag` */

/*Table structure for table `config` */

DROP TABLE IF EXISTS `config`;

CREATE TABLE `config` (
  `key` varchar(100) COLLATE utf8_bin NOT NULL,
  `value` text COLLATE utf8_bin,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `config` */

/*Table structure for table `friendship` */

DROP TABLE IF EXISTS `friendship`;

CREATE TABLE `friendship` (
  `inviter_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `acknowledgetime` int(11) DEFAULT NULL,
  `requesttime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`inviter_id`,`friend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `friendship` */

/*Table structure for table `friendship_following` */

DROP TABLE IF EXISTS `friendship_following`;

CREATE TABLE `friendship_following` (
  `inviter_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `acknowledgetime` int(11) DEFAULT NULL,
  `requesttime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`inviter_id`,`friend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `friendship_following` */

/*Table structure for table `gal` */

DROP TABLE IF EXISTS `gal`;

CREATE TABLE `gal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) DEFAULT NULL,
  `tr_title` varchar(128) DEFAULT NULL,
  `g_desc` varchar(512) DEFAULT NULL,
  `tr_desc` varchar(512) DEFAULT NULL,
  `order` text,
  `gal_id` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Galleries';

/*Data for the table `gal` */

/*Table structure for table `gallery` */

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `versions_data` text NOT NULL,
  `name` tinyint(1) NOT NULL DEFAULT '1',
  `description` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `gallery` */

insert  into `gallery`(`id`,`versions_data`,`name`,`description`) values (1,'a:2:{s:5:\"small\";a:1:{s:6:\"resize\";a:2:{i:0;i:200;i:1;N;}}s:6:\"medium\";a:1:{s:6:\"resize\";a:2:{i:0;i:800;i:1;N;}}}',1,1);

/*Table structure for table `gallery_photo` */

DROP TABLE IF EXISTS `gallery_photo`;

CREATE TABLE `gallery_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '0',
  `name` varchar(512) NOT NULL DEFAULT '',
  `description` text,
  `file_name` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `fk_gallery_photo_gallery1` (`gallery_id`),
  CONSTRAINT `fk_gallery_photo_gallery1` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `gallery_photo` */

/*Table structure for table `images` */

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `file_id` varchar(80) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `basename` varchar(45) DEFAULT NULL,
  `extension` varchar(6) DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `tr_title` varchar(256) DEFAULT NULL,
  `desc` varchar(512) DEFAULT NULL,
  `tr_desc` varchar(512) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `path` varchar(256) DEFAULT NULL,
  `url` varchar(256) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gal_FK` (`gid`),
  CONSTRAINT `gal_FK` FOREIGN KEY (`gid`) REFERENCES `gal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `images` */

/*Table structure for table `membership` */

DROP TABLE IF EXISTS `membership`;

CREATE TABLE `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membership_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_date` int(11) NOT NULL,
  `end_date` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `payment_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `membership` */

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` int(10) DEFAULT '0',
  `timestamp` int(10) unsigned NOT NULL,
  `from_user_id` int(10) unsigned NOT NULL,
  `to_user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text,
  `message_read` tinyint(1) NOT NULL,
  `answered` tinyint(1) DEFAULT NULL,
  `draft` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `message` */

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `payment` */

/*Table structure for table `permission` */

DROP TABLE IF EXISTS `permission`;

CREATE TABLE `permission` (
  `principal_id` int(11) NOT NULL,
  `subordinate_id` int(11) NOT NULL DEFAULT '0',
  `type` enum('user','role') NOT NULL,
  `action` int(11) NOT NULL,
  `template` tinyint(1) NOT NULL,
  `comment` text,
  PRIMARY KEY (`principal_id`,`subordinate_id`,`type`,`action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `permission` */

/*Table structure for table `privacysetting` */

DROP TABLE IF EXISTS `privacysetting`;

CREATE TABLE `privacysetting` (
  `user_id` int(10) unsigned NOT NULL,
  `message_new_friendship` tinyint(1) NOT NULL DEFAULT '1',
  `message_new_message` tinyint(1) NOT NULL DEFAULT '1',
  `message_new_profilecomment` tinyint(1) NOT NULL DEFAULT '1',
  `appear_in_search` tinyint(1) NOT NULL DEFAULT '1',
  `show_online_status` tinyint(1) NOT NULL DEFAULT '1',
  `log_profile_visits` tinyint(1) NOT NULL DEFAULT '1',
  `ignore_users` varchar(255) DEFAULT NULL,
  `public_profile_fields` bigint(15) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `privacysetting` */

/*Table structure for table `profile` */

DROP TABLE IF EXISTS `profile`;

CREATE TABLE `profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `timestamp` int(10) NOT NULL DEFAULT '0',
  `privacy` enum('protected','private','public') NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `show_friends` tinyint(1) DEFAULT '1',
  `allow_comments` tinyint(1) DEFAULT '1',
  `email` varchar(255) NOT NULL DEFAULT '',
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `about` text,
  `occupation` varchar(255) NOT NULL DEFAULT '',
  `birthday` int(10) NOT NULL DEFAULT '0',
  `mobile` varchar(12) NOT NULL DEFAULT '',
  `yahoo` varchar(50) NOT NULL DEFAULT '',
  `skype` varchar(50) NOT NULL DEFAULT '',
  `website` varchar(150) NOT NULL DEFAULT '',
  `status` varchar(255) NOT NULL DEFAULT '',
  `horoscope` varchar(500) DEFAULT NULL,
  `hobbies` varchar(500) DEFAULT NULL,
  `im` text,
  `social_link` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `profile` */

/*Table structure for table `profile_comment` */

DROP TABLE IF EXISTS `profile_comment`;

CREATE TABLE `profile_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `createtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `profile_comment` */

/*Table structure for table `profile_field` */

DROP TABLE IF EXISTS `profile_field`;

CREATE TABLE `profile_field` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `hint` text NOT NULL,
  `field_type` varchar(50) NOT NULL DEFAULT '',
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(255) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  `related_field_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `profile_field` */

/*Table structure for table `profile_visit` */

DROP TABLE IF EXISTS `profile_visit`;

CREATE TABLE `profile_visit` (
  `visitor_id` int(11) NOT NULL,
  `visited_id` int(11) NOT NULL,
  `timestamp_first_visit` int(11) NOT NULL,
  `timestamp_last_visit` int(11) NOT NULL,
  `num_of_visits` int(11) NOT NULL,
  PRIMARY KEY (`visitor_id`,`visited_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `profile_visit` */

/*Table structure for table `referal` */

DROP TABLE IF EXISTS `referal`;

CREATE TABLE `referal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain_id` int(10) DEFAULT NULL,
  `url` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_refer` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `visited_date` int(10) DEFAULT NULL,
  `ip_refer` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `referal` */

/*Table structure for table `referal_category` */

DROP TABLE IF EXISTS `referal_category`;

CREATE TABLE `referal_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `domain` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `referal_category` */

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_membership_possible` tinyint(1) NOT NULL DEFAULT '0',
  `price` double DEFAULT NULL COMMENT 'Price (when using membership module)',
  `duration` int(11) DEFAULT NULL COMMENT 'How long a membership is valid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `role` */

/*Table structure for table `server_upload` */

DROP TABLE IF EXISTS `server_upload`;

CREATE TABLE `server_upload` (
  `server_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ip_upload` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `port_upload` int(10) DEFAULT '21',
  `username` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `domain` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ftp_root` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `folder_upload` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`server_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `server_upload` */

/*Table structure for table `session` */

DROP TABLE IF EXISTS `session`;

CREATE TABLE `session` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `session` */

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`expire`,`data`) values ('63a04ii9dtdg0anistaghbk7r1',1378151626,''),('7glvkme5rmjodmis17qibugcv7',1378151089,''),('7ourf7rvikaamvtghb4m0j67d7',1378151070,''),('d0r7kouji29m0p6umfmk2ou645',1378151632,''),('dkdd0jetmbc1nnu6brnq2v0a16',1378151627,''),('iaip7hm3b9k48etrsgvmjukbk4',1378151085,''),('j7luk4lk5ohrok6hbb6qepgl77',1378151141,''),('jleglfbf0t5pu1pbqc7uh7bov3',1378151599,''),('kaqcr0ce53qqlv7g76dsuh0b21',1378151816,''),('klv6v88f264mudjttlrhueq880',1378151194,''),('up22uc2kabge5jto60lnaljsb3',1378151605,''),('uu3mneua3ckbuofh7c25d9m115',1378151615,'');

/*Table structure for table `translation` */

DROP TABLE IF EXISTS `translation`;

CREATE TABLE `translation` (
  `message` varbinary(255) NOT NULL,
  `translation` varchar(255) NOT NULL,
  `language` varchar(5) NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`message`,`language`,`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `translation` */

insert  into `translation`(`message`,`translation`,`language`,`category`) values ('About','Über','de','yum'),('About','Acerca','es','yum'),('About','me concernant ??','fr','yum'),('About','Info','it','yum'),('About','Info','pl','yum'),('Access control','Zugangskontrolle','de','yum'),('Access control','Controle d acces','fr','yum'),('Access control','Controllo accesso','it','yum'),('Action','Aktion','de','yum'),('Action','Acción','es','yum'),('Action','Action','fr','yum'),('Action','Azione','it','yum'),('Actions','Aktionen','de','yum'),('Actions','Acciones','es','yum'),('Actions','Actions','fr','yum'),('Actions','Azioni','it','yum'),('Activated','erstmalig Aktiviert','de','yum'),('Activated','PremiÃ¨re activation de votre compte','fr','yum'),('Activated','Attivato','it','yum'),('Active','Aktiv','de','yum'),('Active','Activo','es','yum'),('Active','Actif','fr','yum'),('Active','Attiv','it','yum'),('Active','Aktiv','pl','yum'),('Active','ÐÐºÑ‚Ð¸Ð²Ð¸Ñ€Ð¾Ð²Ð°Ð½','ru','yum'),('Active - First visit','Aktiv - erster Besuch','de','yum'),('Active - First visit','Actif - premiÃ¨re visite','fr','yum'),('Active - First visit','Attivo - Priva visita','it','yum'),('Active users','Aktive Benutzer','de','yum'),('Active users','Usuarios activos','es','yum'),('Active users','Utiliateurs actifs','fr','yum'),('Active users','Utenti attivi','it','yum'),('Active users','Aktywni uÅ¼ytkownicy','pl','yum'),('Activities','Aktivitäten','de','yum'),('Activities','Actividades','es','yum'),('Activities','ActivitÃ©s','fr','yum'),('Activities','AttivitÃ ','it','yum'),('Add as a friend','Zur Kontaktliste hinzufügen','de','yum'),('Add as a friend','Agregar como amigo','es','yum'),('Add as a friend','Ajouter Ã  ma liste de contact','fr','yum'),('Add as a friend','Aggiungi un contatto','it','yum'),('Admin inbox','Administratorposteingang','de','yum'),('Admin inbox','Bandeja de entrada de Admin','es','yum'),('Admin inbox','Boite e-mail de l administrateur','fr','yum'),('Admin inbox','Admin - Posta in arrivo','it','yum'),('Admin inbox','ZarzÄ…dzaj skrzynkÄ… odbiorczÄ…','pl','yum'),('Admin sent messages','Gesendete Nachrichten des Administrators','de','yum'),('Admin sent messages','Mensajes enviados de Admin','es','yum'),('Admin sent messages','E-mail envoyÃ© par l administrateur','fr','yum'),('Admin sent messages','Admin - Messaggi inviati','it','yum'),('Admin sent messages','WiadomoÅ›ci wysÅ‚ane przez administratora','pl','yum'),('Admin users','Administratoren','de','yum'),('Admin users','Usuarios administradores','es','yum'),('Admin users','Administrateur','fr','yum'),('Admin users','Utenti admin','it','yum'),('Admin users','Administratorzy','pl','yum'),('Admin users can not be deleted!','Administratoren können nicht gelöscht werden','de','yum'),('Admin users can not be deleted!','¡No se pueden eliminar los usuarios Administradores!','es','yum'),('Admin users can not be deleted!','UN compte administrateur ne peut pas Ãªtre supprimÃ©','fr','yum'),('Admin users can not be deleted!','Utente admin non cancellabile!','it','yum'),('Admin users can not be deleted!','Nie moÅ¼na usunÄ…Ä‡ konta administratora','pl','yum'),('All','Alle','de','yum'),('All','Ade tous','fr','yum'),('All','Tutto','it','yum'),('Allow profile comments','Profilkommentare erlauben','de','yum'),('Allow profile comments','Permitir comentarios en perfiles','es','yum'),('Allow profile comments','Autoriser les commentaires de profil','fr','yum'),('Allow profile comments','Consenti commenti profili','it','yum'),('Allowed are lowercase letters and digits.','Erlaubt sind Kleinbuchstaben und Ziffern.','de','yum'),('Allowed are lowercase letters and digits.','Se permiten letras minúsculas y dígitos','es','yum'),('Allowed are lowercase letters and digits.','Seules les minuscule et les chiffres sont autorisÃ©s.','fr','yum'),('Allowed are lowercase letters and digits.','Sono consentiti lettere minuscole e numeri.','it','yum'),('Allowed are lowercase letters and digits.','Erlaubt sind Kleinbuchstaben und Ziffern.','pl','yum'),('Allowed lowercase letters and digits.','Consenti lettere minuscole e numeri.','it','yum'),('Allowed lowercase letters and digits.','Ð”Ð¾Ð¿ÑƒÑÐºÐ°ÑŽÑ‚ÑÑ ÑÑ‚Ñ€Ð¾Ñ‡Ð½Ñ‹Ðµ Ð±ÑƒÐºÐ²Ñ‹ Ð¸ Ñ†Ð¸Ñ„Ñ€Ñ‹.','ru','yum'),('Allowed roles','Erlaubte Rollen','de','yum'),('Allowed roles','Roles permitidos','es','yum'),('Allowed roles','Permission rÃ´le','fr','yum'),('Allowed roles','Ruoli autorizzati','it','yum'),('Allowed roles','DostÄ™pne role','pl','yum'),('Allowed users','Erlaubte Benutzer','de','yum'),('Allowed users','Usuarios permitidos','es','yum'),('Allowed users','Permission utilisateur','fr','yum'),('Allowed users','Utenti autorizzati','it','yum'),('Allowed users','DostÄ™pni uÅ¼ytkownicy','pl','yum'),('Already exists.','Existiert bereits.','de','yum'),('Already exists.','Ya existe.','es','yum'),('Already exists.','Existe dÃ©jÃ .','fr','yum'),('Already exists.','GiÃ  esistente','it','yum'),('Already exists.','Existiert bereits.','pl','yum'),('Already exists.','Ð£Ð¶Ðµ ÑÑƒÑ‰ÐµÑÑ‚Ð²ÑƒÐµÑ‚.','ru','yum'),('An error occured while saving your changes','Es ist ein Fehler aufgetreten.','de','yum'),('An error occured while saving your changes','Ocurrió un error al guardar los cambios','es','yum'),('An error occured while saving your changes','Une erreur est survenue.','fr','yum'),('An error occured while saving your changes','Si Ã¨ verificato un errore durante il salvataggio delle modifiche.','it','yum'),('An error occured while saving your changes','WystÄ…piÅ‚ bÅ‚Ä…d podczas zapisywania Twoich zmian.','pl','yum'),('An error occured while uploading your avatar image','Ein Fehler ist beim hochladen ihres Profilbildes aufgetreten','de','yum'),('An error occured while uploading your avatar image','Une erreur est survenue lors du chargement de votre photo de profil','fr','yum'),('An error occured while uploading your avatar image','Si Ã¨ verificato un errore durante il caricamento dell\'immagine','it','yum'),('Answer','Antworten','de','yum'),('Appear in search','In der Suche erscheinen','de','yum'),('Appear in search','Je souhaite apparaitre dans les rÃ©sultats de recherche','fr','yum'),('Appear in search','Mostra nelle ricerche','it','yum'),('Are you really sure you want to delete your Account?','Sind Sie Sicher, dass Sie Ihren Zugang löschen wollen?','de','yum'),('Are you really sure you want to delete your Account?','¿Seguro que desea eliminar su cuenta?','es','yum'),('Are you really sure you want to delete your Account?','Etes vous sur de vouloir supprimer votre compte?','fr','yum'),('Are you really sure you want to delete your Account?','Sicuro di voler cancellare il tuo account?','it','yum'),('Are you really sure you want to delete your Account?','Czy jesteÅ› pewien, Å¼e chcesz usunÄ…Ä‡ konto?','pl','yum'),('Are you sure to delete this item?','Sind Sie sicher, dass Sie dieses Element wirklich löschen wollen? ','de','yum'),('Are you sure to delete this item?','¿Seguro desea eliminar este elemento?','es','yum'),('Are you sure to delete this item?','Etes vous sur de supprimÃ© cet elÃ©ment? ','fr','yum'),('Are you sure to delete this item?','Sicuro di cancellare questo elemento?','it','yum'),('Are you sure to delete this item?','Ð’Ñ‹ Ð´ÐµÐ¹ÑÑ‚Ð²Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾ Ñ…Ð¾Ñ‚Ð¸Ñ‚Ðµ ÑƒÐ´Ð°Ð»Ð¸Ñ‚ÑŒ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ñ?','ru','yum'),('Are you sure to remove this comment from your profile?','Sind Sie sicher, dass sie diesen Kommentar entfernen wollen?','de','yum'),('Are you sure to remove this comment from your profile?','¿Estás seguro que deseas borrar este comentario?','es','yum'),('Are you sure to remove this comment from your profile?','Etes vous sur de vouloir supprimer ce commentaire?','fr','yum'),('Are you sure to remove this comment from your profile?','Sicuro di voler eliminare il commento dal tuo profilo?','it','yum'),('Are you sure you want to remove this friend?','Sind Sie sicher, dass Sie diesen Kontakt aus ihrer Liste entfernen wollen?','de','yum'),('Are you sure you want to remove this friend?','ÃŠtes vous sur de vouloir suprimer ce membre de votre liste de contact?','fr','yum'),('Are you sure you want to remove this friend?','Sicuro di voler rimuovere questo contatto?','it','yum'),('Assign this role to new users automatically','Rolle automatisch an neue Benutzer zuweisen','de','yum'),('Assign this role to new users automatically','RÃ´le automatique pour un nouveau membre','fr','yum'),('Assign this role to new users automatically','Assegna questo ruolo automaticamente ai nuovi utenti','it','yum'),('Avatar image','Profilbild','de','yum'),('Avatar image','Tu Avatar','es','yum'),('Avatar image','Image de profil','fr','yum'),('Avatar image','Avatar','it','yum'),('Back','Zurück','de','yum'),('Back','Volver','es','yum'),('Back','Retour','fr','yum'),('Back','Indietro','it','yum'),('Back to inbox','Zurück zum Posteingang','de','yum'),('Back to inbox','Volver a la bandeja de entrada','es','yum'),('Back to inbox','Retour Ã  la boite mail','fr','yum'),('Back to inbox','Torna alla posta in arrivo','it','yum'),('Back to my Profile','Zurück zu meinem Profil','de','yum'),('Back to my Profile','Volver a mi Perfil','es','yum'),('Back to my Profile','Retour Ã  mon profil','fr','yum'),('Back to my Profile','Torna al mio profilo','it','yum'),('Back to profile','Zurück zum Profil','de','yum'),('Back to profile','Volver a perfil','es','yum'),('Back to profile','Retour au profil','fr','yum'),('Back to profile','Torna al mio profilo','it','yum'),('Back to profile','ZurÃ¼ck zum Profil','pl','yum'),('Banned','Verbannt','de','yum'),('Banned','Excluido','es','yum'),('Banned','Membre banni','fr','yum'),('Banned','Bannato','it','yum'),('Banned','Verbannt','pl','yum'),('Banned','Ð—Ð°Ð±Ð»Ð¾ÐºÐ¸Ñ€Ð¾Ð²Ð°Ð½','ru','yum'),('Banned users','Gesperrte Benuter','de','yum'),('Banned users','Usuarios excluidos','es','yum'),('Banned users','Utilisateur bloquÃ©','fr','yum'),('Banned users','Utenti bannati','it','yum'),('Banned users','Zbanowani uÅ¼ytkownicy','pl','yum'),('Browse','Durchsuchen','de','yum'),('Browse groups','Buscar grupos','es','yum'),('Browse logged user activities','Benutzeraktivitäten','de','yum'),('Browse logged user activities','Consultar bitácora de actividades del usuario','es','yum'),('Browse logged user activities','ActivitÃ© des membres','fr','yum'),('Browse logged user activities','Naviga attivitÃ  utenti loggati','it','yum'),('Browse memberships','Mitgliedschaften kaufen','de','yum'),('Browse memberships','Mitgliedschaften kaufen ??','fr','yum'),('Browse memberships','Naviga iscrizioni','it','yum'),('Browse user activities','Tätigkeitenhistorie','de','yum'),('Browse user activities','ActivitÃ© de mon compte','fr','yum'),('Browse user activities','Naviga attivitÃ  utenti','it','yum'),('Browse user groups','Benutzergruppen durchsuchen','de','yum'),('Browse user groups','Buscar grupos de usuarios','es','yum'),('Browse user groups','Rechercher dans un grouppe d utilisateurs','fr','yum'),('Browse user groups','Naviga gruppi utenti','it','yum'),('Browse usergroups','Gruppen durchsuchen','de','yum'),('Browse usergroups','Rechercher dans les grouppes','fr','yum'),('Browse usergroups','Naviga gruppi utenti','it','yum'),('Browse users','Benutzer durchsuchen','de','yum'),('Browse users','Buscar usuarios','es','yum'),('Browse users','Rechercher dans la liste des membres','fr','yum'),('Browse users','Naviga utenti','it','yum'),('Cancel','Abbrechen','de','yum'),('Cancel','Cancelar','es','yum'),('Cancel','Annuler','fr','yum'),('Cancel','Cancella','it','yum'),('Cancel deletion','Löschvorgang abbrechen','de','yum'),('Cancel deletion','Cancelar eliminación','es','yum'),('Cancel deletion','Stopper la suppression','fr','yum'),('Cancel deletion','Annulla cancellazione','it','yum'),('Cancel deletion','Anuluj usuwanie','pl','yum'),('Cancel request','Anfrage zurückziehen','de','yum'),('Cancel request','Annuler la demande de contact','fr','yum'),('Cancel request','Cancella richiesta','it','yum'),('Cannot set password. Try again.','No pudimos guardar tu contraseña. Inténtalo otra vez','es','yum'),('Category','Kategorie','de','yum'),('Change Password','Ð˜Ð·Ð¼ÐµÐ½Ð¸Ñ‚ÑŒ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ','ru','yum'),('Change admin Password','Administratorpasswort ändern','de','yum'),('Change admin Password','Cambiar contraseña de Admin','es','yum'),('Change admin Password','Changer le mot de passe de l administrateur','fr','yum'),('Change admin Password','Modifica password admin','it','yum'),('Change admin Password','ZmieÅ„ hasÅ‚o administratora','pl','yum'),('Change password','Passwort ändern','de','yum'),('Change password','Cambiar contraseña','es','yum'),('Change password','Modification du mot de ','fr','yum'),('Change password','Cambia password','it','yum'),('Change password','Passwort Ã¤ndern','pl','yum'),('Changes','Änderungen','de','yum'),('Changes','Cambios','es','yum'),('Changes','Modification','fr','yum'),('Changes','Modifiche','it','yum'),('Changes','Zmiany','pl','yum'),('Changes are saved','Änderungen wurden gespeichert.','de','yum'),('Changes are saved','Cambios guardados','es','yum'),('Changes are saved','Les modifications ont bien Ã©tÃ© enregistrÃ©es.','fr','yum'),('Changes are saved','Modifiche salvate.','it','yum'),('Changes are saved','Zmiany zostaÅ‚y zapisane.','pl','yum'),('Changes is saved.','Änderungen wurde gespeichert.','de','yum'),('Changes is saved.','Cambio guardado','es','yum'),('Changes is saved.','Modifications mÃ©morisÃ©es.','fr','yum'),('Changes is saved.','Modifiche salvate','it','yum'),('Changes is saved.','Ð˜Ð·Ð¼ÐµÐ½ÐµÐ½Ð¸Ñ ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½Ñ‹.','ru','yum'),('Choose All','Alle auswählen','de','yum'),('Choose All','Seleccionar todos','es','yum'),('Choose All','SÃ©lectioner tout','fr','yum'),('Choose All','Scegli tutti','it','yum'),('Choose All','Wybierz wszystkie','pl','yum'),('City','Stadt','de','yum'),('City','Ciudad','es','yum'),('City','Ville','fr','yum'),('City','CittÃ ','it','yum'),('City','Miasto','pl','yum'),('Column Field type in the database.','Spaltentyp in der Datenbank','de','yum'),('Column Field type in the database.','Columna tipo de Campo en la base de datos','es','yum'),('Column Field type in the database.','Type de la colone dans la banque de donnÃ©e','fr','yum'),('Column Field type in the database.','Tipo di colonna nel database','it','yum'),('Column Field type in the database.','Spaltentyp in der Datenbank','pl','yum'),('Comment','Kommentar','de','yum'),('Comment','Comentario','es','yum'),('Comment','Commentaire','fr','yum'),('Comment','Commento','it','yum'),('Compose','Nachricht schreiben','de','yum'),('Compose','Ecrire un message','fr','yum'),('Compose','Scrivi','it','yum'),('Compose new message','Nachricht schreiben','de','yum'),('Compose new message','Crear mensaje nuevo','es','yum'),('Compose new message','Ecrire un nouveau message','fr','yum'),('Compose new message','Scrivi nuovo messaggio','it','yum'),('Composing new message','Nachricht schreiben','de','yum'),('Composing new message','Creando mensaje nuevo','es','yum'),('Composing new message','Ecrire un nouveau message','fr','yum'),('Composing new message','Scrittura nuovo messaggio','it','yum'),('Confirm','Bestätigen','de','yum'),('Confirm','Confirmar','es','yum'),('Confirm','Confirmer','fr','yum'),('Confirm','Conferma','it','yum'),('Confirm deletion','Löschvorgang bestätigen','de','yum'),('Confirm deletion','Confirmar eliminación','es','yum'),('Confirm deletion','Confirmation de suppression','fr','yum'),('Confirm deletion','Conferma cancellazione','it','yum'),('Confirm deletion','PotwierdÅº usuwanie','pl','yum'),('Confirmation pending','Bestätigung ausstehend','de','yum'),('Confirmation pending','Esperando confirmación','es','yum'),('Confirmation pending','Confirmation en attente','fr','yum'),('Confirmation pending','In attesa di conferma','it','yum'),('Content','Inhalt','de','yum'),('Content','Texte du message','fr','yum'),('Content','Contenuto','it','yum'),('Create','Anlegen','de','yum'),('Create','Crear','es','yum'),('Create','CÃ©er','fr','yum'),('Create','Aggiungi','it','yum'),('Create','Dodaj','pl','yum'),('Create','ÐÐ¾Ð²Ñ‹Ð¹','ru','yum'),('Create Action','Crea azione','it','yum'),('Create Profile Field','Profilfeld anlegen','de','yum'),('Create Profile Field','Crear Campo de Perfil','es','yum'),('Create Profile Field','Nouveau champ de profil','fr','yum'),('Create Profile Field','Aggiungi campo Profilo','it','yum'),('Create Profile Field','Dodaj pole profilu','pl','yum'),('Create Profile Field','Ð”Ð¾Ð±Ð°Ð²Ð¸Ñ‚ÑŒ','ru','yum'),('Create Role','Rolle anlegen','de','yum'),('Create Role','Crear Rol','es','yum'),('Create Role','CrÃ©er un rÃ´le','fr','yum'),('Create Role','Crea ruolo','it','yum'),('Create Role','Dodaj rolÄ™','pl','yum'),('Create User','Benutzer anlegen','de','yum'),('Create User','Crear Usuario','es','yum'),('Create User','CrÃ©er un nouvel utilisateur','fr','yum'),('Create User','Nuovo utente','it','yum'),('Create User','ÐÐ¾Ð²Ñ‹Ð¹','ru','yum'),('Create Usergroup','Neue Gruppe erstellen','de','yum'),('Create Usergroup','Crea gruppo utenti','it','yum'),('Create my profile','Mein Profil anlegen','de','yum'),('Create my profile','Crea profilo','it','yum'),('Create new Translation','Neue Übersetzung erstellen','de','yum'),('Create new User','Neuen Benutzer anlegen','de','yum'),('Create new Usergroup','Neue Gruppe erstellen','de','yum'),('Create new Usergroup','Crear nuevo grupo de usuarios','es','yum'),('Create new action','Neue Aktion','de','yum'),('Create new action','Crear acción nueva','es','yum'),('Create new action','Nouvelle action','fr','yum'),('Create new action','Nuova azione','it','yum'),('Create new field group','Neue Feldgruppe erstellen','de','yum'),('Create new field group','Crear campo de grupo nuevo','es','yum'),('Create new field group','CrÃ©er un nouveau champs dans le groupe','fr','yum'),('Create new field group','Nuovo campo gruppo','it','yum'),('Create new field group','Dodaj nowÄ… grupÄ™ pÃ³l','pl','yum'),('Create new payment type','Neue Zahlungsart hinzufügen','de','yum'),('Create new payment type','CrÃ©er un nouveau mode de paiement','fr','yum'),('Create new payment type','Nuovo tipo pagamento','it','yum'),('Create new role','Neue Rolle anlegen','de','yum'),('Create new role','Crear rol nuevo','es','yum'),('Create new role','CrÃ©er un nouveau rÃ´le','fr','yum'),('Create new role','Nuovo ruolo','it','yum'),('Create new role','Dodaj nowÄ… rolÄ™','pl','yum'),('Create new settings profile','Neues Einstellungsprofil erstellen','de','yum'),('Create new settings profile','Crear ajuste de perfil nuevo','es','yum'),('Create new settings profile','crÃ©er une nouvelle configuration de profil.','fr','yum'),('Create new settings profile','Nuova opzion profilo','it','yum'),('Create new settings profile','Dodaj nowe ustawienia profilu','pl','yum'),('Create new user','Crear usuario nuevo','es','yum'),('Create new user','CrÃ©er un nouveau membre','fr','yum'),('Create new user','Nuovo utente','it','yum'),('Create new user','Dodaj nowego uÅ¼ytkownika','pl','yum'),('Create new usergroup','Neue Gruppe erstellen','de','yum'),('Create new usergroup','CrÃ©er un nouveau grouppe','fr','yum'),('Create new usergroup','Nuovo usergroup','it','yum'),('Create payment type','Zahlungsart anlegen','de','yum'),('Create payment type','Crea tipo pagamento','it','yum'),('Create profile field','Ein neues Profilfeld erstellen','de','yum'),('Create profile field','Crear campo de perfil','es','yum'),('Create profile field','CrÃ©er un nouveau champ de profil','fr','yum'),('Create profile field','Crea campo profilo','it','yum'),('Create profile field','Dodaj pole do profilu','pl','yum'),('Create profile fields group','Crear grupo de campos de perfil','es','yum'),('Create profile fields group','Nuovo gruppo di campi profilo','it','yum'),('Create profile fields group','Dodaj grupÄ™ pÃ³l do profilu','pl','yum'),('Create role','Neue Rolle anlegen','de','yum'),('Create role','Crear rol','es','yum'),('Create role','CrÃ©er un nouveau rÃ´le','fr','yum'),('Create role','Crea ruolo','it','yum'),('Create role','Dodaj rolÄ™','pl','yum'),('Create user','Benutzer anlegen','de','yum'),('Create user','Crear usuario','es','yum'),('Create user','CrÃ©er un membre','fr','yum'),('Create user','Crea utente','it','yum'),('Create user','Dodaj uÅ¼ytkownika','pl','yum'),('Date','Datum','de','yum'),('Date','Fecha','es','yum'),('Date','Date','fr','yum'),('Date','Data','it','yum'),('Date','Data','pl','yum'),('Default','Default','de','yum'),('Default','Predeterminado','es','yum'),('Default','Default','fr','yum'),('Default','Predefinito','it','yum'),('Default','ÐŸÐ¾ ÑƒÐ¼Ð¾Ð»Ñ‡Ð°Ð½Ð¸ÑŽ','ru','yum'),('Delete Account','Zugang löschen','de','yum'),('Delete Account','Eliminar Cuenta','es','yum'),('Delete Account','Supprimer le compte','fr','yum'),('Delete Account','Cancella account','it','yum'),('Delete Profile Field','Cancella campo Profilo','it','yum'),('Delete Profile Field','Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ','ru','yum'),('Delete User','Benutzer löschen','de','yum'),('Delete User','Eliminar Usuario','es','yum'),('Delete User','Supprimer le membre','fr','yum'),('Delete User','Cancella utente','it','yum'),('Delete User','Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ','ru','yum'),('Delete account','Zugang löschen','de','yum'),('Delete account','Eliminar cuenta','es','yum'),('Delete account','Supprimer ce compte','fr','yum'),('Delete account','Cancella account','it','yum'),('Delete account','UsuÅ„ konto','pl','yum'),('Delete file','Cancella file','it','yum'),('Delete message','Nachricht löschen','de','yum'),('Delete message','Eliminar mensaje','es','yum'),('Delete message','Supprimer le message','fr','yum'),('Delete message','Cancella messaggio','it','yum'),('Deleted','Gelöscht','de','yum'),('Deleted','SupprimÃ©','fr','yum'),('Deleted','Cancella','it','yum'),('Deny','Ablehnen','de','yum'),('Deny','Negar','es','yum'),('Deny','Refuser','fr','yum'),('Deny','Vietao','it','yum'),('Description','Beschreibung','de','yum'),('Description','Descripción','es','yum'),('Description','Description','fr','yum'),('Description','Descrizione','it','yum'),('Description','Opis','pl','yum'),('Different users logged in today','Anzahl der heute angemeldeten Benutzer','de','yum'),('Different users logged in today','Diferentes usuarios iniciaron sesión hoy','es','yum'),('Different users logged in today','Nombre d utilisateurs inscrits/connectÃ©s aujourd hui.','fr','yum'),('Different users logged in today','Numero di utenti connessi oggi','it','yum'),('Different users logged in today','Liczba dzisiejszych unikalnych logowaÅ„','pl','yum'),('Different viewn Profiles','Insgesamt betrachtete Profile','de','yum'),('Different viewn Profiles','Perfiles diferentes vistos','es','yum'),('Different viewn Profiles','Total des profils consultÃ©s','fr','yum'),('Different viewn Profiles','Visualizzazioni profilo','it','yum'),('Display order of fields.','Reihenfolgenposition, in der das Feld angezeigt wird','de','yum'),('Display order of fields.','Mostrar orden de los campos','es','yum'),('Display order of fields.','Ordre de position dans laquelle le champ apparaitra','fr','yum'),('Display order of fields.','Mostra ordine dei campi.','it','yum'),('Display order of fields.','KolejnoÅ›Ä‡ wyÅ›wietlania pÃ³l.','pl','yum'),('Display order of fields.','ÐŸÐ¾Ñ€ÑÐ´Ð¾Ðº Ð¾Ñ‚Ð¾Ð±Ñ€Ð°Ð¶ÐµÐ½Ð¸Ñ Ð¿Ð¾Ð»ÐµÐ¹.','ru','yum'),('Display order of group.','Anzeigereihenfolge der Gruppe.','de','yum'),('Display order of group.','Mostrar orden del grupo','es','yum'),('Display order of group.','Annonces ordonnÃ©es du grouppe.','fr','yum'),('Display order of group.','Ordine di visualizzazione del gruppo.','it','yum'),('Display order of group.','WyÅ›wietl kolejnoÅ›Ä‡ grup.','pl','yum'),('Do not appear in search','Nicht in der Suche erscheinen','de','yum'),('Do not appear in search','Ne pas paraitre dans les rÃ©sultat de recherche','fr','yum'),('Do not appear in search','Non mostrare nelle ricerche','it','yum'),('Do not show my online status','Status verstecken','de','yum'),('Do not show my online status','Ne pas rendre mon profil visible lorsque je suis en ligne','fr','yum'),('Do not show my online status','Non mostrare il mio stato online','it','yum'),('Do not show the owner of a profile when i visit him','Niemandem zeigen, wen ich besucht habe','de','yum'),('Do not show the owner of a profile when i visit him','Ne pas montrer les profils que j ai visitÃ©','fr','yum'),('Do not show the owner of a profile when i visit him','Non mostrare al proprietario quando visito il suo profilo','it','yum'),('Duration in days','Gültigkeitsdauer in Tagen','de','yum'),('Duration in days','ValiditÃ© en jours','fr','yum'),('Duration in days','Durata in giorni','it','yum'),('E-Mail address','E-Mail Adresse','de','yum'),('E-Mail address','Correo electrónico','es','yum'),('E-Mail address','Adresse e-mail','fr','yum'),('E-Mail address','Indirizzo email','it','yum'),('E-Mail already in use. If you have not registered before, please contact our System administrator.','Este correo ya está siendo usado por alguien. Si no te habías registrado antes entonces contáctanos','es','yum'),('E-mail','E-mail','de','yum'),('E-mail','Correo electrónico','es','yum'),('E-mail','E-mail','fr','yum'),('E-mail','E-mail','it','yum'),('E-mail','Mejl','pl','yum'),('E-mail','Ð­Ð»ÐµÐºÑ‚Ñ€Ð¾Ð½Ð½Ð°Ñ Ð¿Ð¾Ñ‡Ñ‚Ð°','ru','yum'),('Edit','Bearbeiten','de','yum'),('Edit','Editar','es','yum'),('Edit','Editer','fr','yum'),('Edit','Modifica','it','yum'),('Edit','Bearbeiten','pl','yum'),('Edit','Ð ÐµÐ´Ð°ÐºÑ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ','ru','yum'),('Edit personal data','Persönliche Daten bearbeiten','de','yum'),('Edit personal data','Editar datos personales','es','yum'),('Edit personal data','Modifier mes donnÃ©es personnelles','fr','yum'),('Edit personal data','Modifica dati personali','it','yum'),('Edit profile','Profil bearbeiten','de','yum'),('Edit profile','Editar perfil','es','yum'),('Edit profile','Editer le profil','fr','yum'),('Edit profile','Modifica profilo','it','yum'),('Edit profile','Meine Profildaten bearbeiten','pl','yum'),('Edit profile','Ð ÐµÐ´Ð°ÐºÑ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð¸Ðµ Ð¿Ñ€Ð¾Ñ„Ð¸Ð»Ñ','ru','yum'),('Edit profile field','Profilfeld bearbeiten','de','yum'),('Edit profile field','Editar campo del perfil','es','yum'),('Edit profile field','Editer les champ du profil','fr','yum'),('Edit profile field','Modifica campi profilo','it','yum'),('Edit profile field','Profilfeld bearbeiten','pl','yum'),('Edit text','Modifica testo','it','yum'),('Edit this role','Diese Rolle bearbeiten','de','yum'),('Edit this role','Editar este rol','es','yum'),('Edit this role','Modifier ce rÃ´le','fr','yum'),('Edit this role','Modifica questo ruolo','it','yum'),('Edit this role','ZmieÅ„ tÄ™ rolÄ™','pl','yum'),('Email is incorrect.','E-Mail ist nicht korrekt.','de','yum'),('Email is incorrect.','Email incorrecto','es','yum'),('Email is incorrect.','L adresse e-mail est incorrecte.','fr','yum'),('Email is incorrect.','Email non corretta.','it','yum'),('Email is incorrect.','Mejl jest niepoprawny.','pl','yum'),('Email is incorrect.','ÐŸÐ¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÑŒ Ñ Ñ‚Ð°ÐºÐ¸Ð¼ ÑÐ»ÐµÐºÑ‚Ñ€Ð¾Ð½Ñ‹Ð¼ Ð°Ð´Ñ€ÐµÑÐ¾Ð¼ Ð½Ðµ Ð·Ð°Ñ€ÐµÐ³Ð¸ÑÑ‚Ñ€Ð¸Ñ€Ð¾Ð²Ð°Ð½.','ru','yum'),('Email is not set when trying to send Registration Email','Debes colocar el correo electrónico para enviar el correo de registro','es','yum'),('Enable Captcha','Captcha Überprüfung aktivieren','de','yum'),('Enable Captcha','Habilitar Captcha','es','yum'),('Enable Captcha','Activer le controle par Captcha','fr','yum'),('Enable Captcha','Attiva Captcha','it','yum'),('Enable Captcha','WÅ‚Ä…cz Captcha','pl','yum'),('Enable Email Activation','Aktivierung per E-Mail einschalten','de','yum'),('Enable Email Activation','Habilitar Activación por Email','es','yum'),('Enable Email Activation','Activer l activation par e-mail','fr','yum'),('Enable Email Activation','Attiva attivazione via Email','it','yum'),('Enable Email Activation','WÅ‚Ä…cz aktywacjÄ™ mejlem','pl','yum'),('Enable Profile History','Profilhistorie einschalten','de','yum'),('Enable Profile History','Habilitar Historial de Perfil','es','yum'),('Enable Profile History','Activer le protocole des profils','fr','yum'),('Enable Profile History','Attiva storico Profilo','it','yum'),('Enable Profile History','WÅ‚Ä…cz historiÄ™ profilÃ³w','pl','yum'),('Enable Recovery','Wiederherstellung einschalten','de','yum'),('Enable Recovery','Habilitar Recuperación','es','yum'),('Enable Recovery','Activer la restauration','fr','yum'),('Enable Recovery','Attiva rispristino','it','yum'),('Enable Recovery','WÅ‚Ä…cz odzyskiwanie haseÅ‚','pl','yum'),('Enable Registration','Registrierung einschalten','de','yum'),('Enable Registration','Habilitar Registro','es','yum'),('Enable Registration','Activer l enregistrement','fr','yum'),('Enable Registration','Attiva registrazione','it','yum'),('Enable Registration','WÅ‚Ä…cz rejestracjÄ™','pl','yum'),('End date','Enddatum','de','yum'),('End date','Data scadenza','it','yum'),('Ends at','Endet am','de','yum'),('Ends at','Scade il','it','yum'),('Error Message','Fehlermeldung','de','yum'),('Error Message','Mensaje de Error','es','yum'),('Error Message','Message d erreur','fr','yum'),('Error Message','Messaggio d\'errore','it','yum'),('Error Message','Ð¡Ð¾Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ðµ Ð¾Ð± Ð¾ÑˆÐ¸Ð±ÐºÐµ','ru','yum'),('Error message when Validation fails.','Fehlermeldung falls die Validierung fehlschlägt','de','yum'),('Error message when Validation fails.','Mensaje de error cuando la Validación falla','es','yum'),('Error message when Validation fails.','Message d erreur pour le cas ou la validation Ã©choue','fr','yum'),('Error message when Validation fails.','Messaggio d\'errore se fallisce la validazione','it','yum'),('Error message when you validate the form.','Messaggio d\'errore durante la validazione del form.','it','yum'),('Error message when you validate the form.','Ð¡Ð¾Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ðµ Ð¾Ð± Ð¾ÑˆÐ¸Ð±ÐºÐµ Ð¿Ñ€Ð¸ Ð¿Ñ€Ð¾Ð²ÐµÑ€ÐºÐµ Ñ„Ð¾Ñ€Ð¼Ñ‹.','ru','yum'),('Error while processing new avatar image : {error_message}; File was uploaded without resizing','Das Bild konnte nicht richtig skaliert werden: {error_message}. Es wurde trotzdem erfolgreich hochgeladen und in ihrem Profil aktiviert.','de','yum'),('Error while processing new avatar image : {error_message}; File was uploaded without resizing','L image n a pas pu Ãªtre retaillÃ©e automatiquement lors du chargement. : {error_message}. elle a Ã©tÃ© cependant chargÃ©e avec succÃ¨s et activÃ©e dans votre profil','fr','yum'),('Error while processing new avatar image : {error_message}; File was uploaded without resizing','Errore processando il nuovo avatar: {error_message}. File caricato senza ridimensionamento.','it','yum'),('Field','Feld','de','yum'),('Field','Campo','es','yum'),('Field','Champ','fr','yum'),('Field','Campo','it','yum'),('Field','Pole','pl','yum'),('Field Size','Feldgröße','de','yum'),('Field Size','Tamaño del Campo','es','yum'),('Field Size','Longueur du champ','fr','yum'),('Field Size','Dimensione campo','it','yum'),('Field Size','Ð Ð°Ð·Ð¼ÐµÑ€ Ð¿Ð¾Ð»Ñ','ru','yum'),('Field Size min','min Feldgröße','de','yum'),('Field Size min','Tamaño mínimo del campo','es','yum'),('Field Size min','longueur du champ minimum','fr','yum'),('Field Size min','Dimesione minima campo','it','yum'),('Field Size min','ÐœÐ¸Ð½Ð¸Ð¼Ð°Ð»ÑŒÐ½Ð¾Ðµ Ð·Ð½Ð°Ñ‡ÐµÐ½Ð¸Ðµ','ru','yum'),('Field Type','Feldtyp','de','yum'),('Field Type','Tipo de Campo','es','yum'),('Field Type','Type du champ','fr','yum'),('Field Type','Tipo campo','it','yum'),('Field Type','Ð¢Ð¸Ð¿ Ð¿Ð¾Ð»Ñ','ru','yum'),('Field group','Feldgruppe','de','yum'),('Field group','Grupo de Campos','es','yum'),('Field group','Champ des groupes','fr','yum'),('Field group','Campi gruppo','it','yum'),('Field group','Grupa pÃ³l','pl','yum'),('Field name on the language of \"sourceLanguage\".','Feldname in der Ursprungssprache','de','yum'),('Field name on the language of \"sourceLanguage\".','Nombre del campo en el idioma \"sourceLanguage\".','es','yum'),('Field name on the language of \"sourceLanguage\".','Non du champ dans la langue standard','fr','yum'),('Field name on the language of \"sourceLanguage\".','Nome campo per il linguaggio di \"sourceLanguage\".','it','yum'),('Field name on the language of \"sourceLanguage\".','Feldname in der Ursprungssprache','pl','yum'),('Field name on the language of \"sourceLanguage\".','ÐÐ°Ð·Ð²Ð°Ð½Ð¸Ðµ Ð¿Ð¾Ð»Ñ Ð½Ð° ÑÐ·Ñ‹ÐºÐµ \"sourceLanguage\".','ru','yum'),('Field size','Feldgröße','de','yum'),('Field size','Tamaño del campo','es','yum'),('Field size','Longueur du champ','fr','yum'),('Field size','Dimensione campo','it','yum'),('Field size','FeldgrÃ¶ÃŸe','pl','yum'),('Field size column in the database.','Dimensione campo nel database','it','yum'),('Field size column in the database.','Ð Ð°Ð·Ð¼ÐµÑ€ Ð¿Ð¾Ð»Ñ ÐºÐ¾Ð»Ð¾Ð½ÐºÐ¸ Ð² Ð±Ð°Ð·Ðµ Ð´Ð°Ð½Ð½Ñ‹Ñ…','ru','yum'),('Field size in the database.','Feldgröße in der Datenbank','de','yum'),('Field size in the database.','Tamaño del campo en la base de datos','es','yum'),('Field size in the database.','Longueur du champ dans la banque de donnÃ©e','fr','yum'),('Field size in the database.','Dimensione campo nel database','it','yum'),('Field size in the database.','FeldgrÃ¶ÃŸe in der Datenbank','pl','yum'),('Field type','Feldtyp','de','yum'),('Field type','Tipo de campo','es','yum'),('Field type','Type de champ','fr','yum'),('Field type','Tipo campo','it','yum'),('Field type','Feldtyp','pl','yum'),('Field type column in the database.','Tipo campo nel database.','it','yum'),('Field type column in the database.','Ð¢Ð¸Ð¿ Ð¿Ð¾Ð»Ñ ÐºÐ¾Ð»Ð¾Ð½ÐºÐ¸ Ð² Ð±Ð°Ð·Ðµ Ð´Ð°Ð½Ð½Ñ‹Ñ….','ru','yum'),('Fields with <span class=\"required\">*</span> are required.','Felder mit <span class=\"required\">*</span> sind Pflichtfelder.','de','yum'),('First Name','Nome','it','yum'),('First Name','Ð˜Ð¼Ñ','ru','yum'),('First name','Vorname','de','yum'),('First name','Nombre','es','yum'),('First name','PrÃ©nom','fr','yum'),('First name','Cognome','it','yum'),('First name','Vorname','pl','yum'),('For all','Für alle','de','yum'),('For all','Para todos','es','yum'),('For all','Pour tous','fr','yum'),('For all','Per tutti','it','yum'),('For all','Ð”Ð»Ñ Ð²ÑÐµÑ…','ru','yum'),('Form validation error','Error en la validación del formulario','es','yum'),('Friends','Kontakte','de','yum'),('Friends','Amigos','es','yum'),('Friends','Mes contacts','fr','yum'),('Friends','Contatti','it','yum'),('Friends of {username}','Kontakte von {username}','de','yum'),('Friends of {username}','Contact de {username}','fr','yum'),('Friends of {username}','Contatti di {username}','it','yum'),('Friendship','Kontakt','de','yum'),('Friendship','Amistades','es','yum'),('Friendship','Contact','fr','yum'),('Friendship','Contatto','it','yum'),('Friendship confirmed','Freundschaft bestätigt','de','yum'),('Friendship confirmed','Amistad confirmada','es','yum'),('Friendship confirmed','Demande de contact confirmÃ©e','fr','yum'),('Friendship confirmed','Contatto confermato','it','yum'),('Friendship rejected','Kontaktanfrage abgelehnt','de','yum'),('Friendship rejected','Demande de contact refusÃ©e','fr','yum'),('Friendship rejected','Amizicia rigettata','it','yum'),('Friendship request already sent','Kontaktbestätigung ausstehend','de','yum'),('Friendship request already sent','Ya se envió la solicitud de amistad','es','yum'),('Friendship request already sent','En attente de confirmation','fr','yum'),('Friendship request already sent','Richiesta di contatto giÃ  inviata','it','yum'),('Friendship request for {username} has been sent','Kontaktanfrage an {username} gesendet','de','yum'),('Friendship request for {username} has been sent','La solicitud de amistad a {username} ha sido enviada','es','yum'),('Friendship request for {username} has been sent','Demande de contact envoyÃ©e Ã  {username}','fr','yum'),('Friendship request for {username} has been sent','Inviata richiesta di contatto a {username}','it','yum'),('Friendship request has been rejected','Kontaktanfrage zurückgewiesen','de','yum'),('Friendship request has been rejected','Solicitud de amistad rechazada','es','yum'),('Friendship request has been rejected','Votre demande de contact a Ã©tÃ© rejetÃ©e','fr','yum'),('Friendship request has been rejected','Richiesta di contatto respinta','it','yum'),('From','Von','de','yum'),('From','Desde','es','yum'),('From','De','fr','yum'),('From','Da','it','yum'),('From','Od','pl','yum'),('General','Allgemein','de','yum'),('General','Generale','it','yum'),('Generate Demo Data','Zufallsbenutzer erzeugen','de','yum'),('Generate Demo Data','Genera datos de prueba','es','yum'),('Generate Demo Data','GÃ©nÃ©rer un compte membre-dÃ©mo','fr','yum'),('Generate Demo Data','Genera dati demo','it','yum'),('Go to profile of {username}','Zum Profil von {username}','de','yum'),('Go to profile of {username}','Ir al perfil de {username}','es','yum'),('Go to profile of {username}','Voir le profil de {username}','fr','yum'),('Go to profile of {username}','Vai al profilo di {username}','it','yum'),('Grant permission','Berechtigung zuweisen','de','yum'),('Grant permission','Otorgar permiso','es','yum'),('Grant permission','Attribuer une permission ','fr','yum'),('Grant permission','Assegna permesso','it','yum'),('Group Name','Gruppenname','de','yum'),('Group Name','Nombre de grupo','es','yum'),('Group Name','Nom du groupe','fr','yum'),('Group Name','Nome gruppo','it','yum'),('Group Name','Nazwa grupy','pl','yum'),('Group name on the language of \"sourceLanguage\".','Gruppenname in der Basissprache.','de','yum'),('Group name on the language of \"sourceLanguage\".','Nombre del grupo en el idioma \"sourceLanguage\".','es','yum'),('Group name on the language of \"sourceLanguage\".','Nom du groupe dans la langue principale.','fr','yum'),('Group name on the language of \"sourceLanguage\".','Il nome del gruppo nella lingua di base.','it','yum'),('Group name on the language of \"sourceLanguage\".','Nazwa grupy w jÄ™zyku uÅ¼ytkownika.','pl','yum'),('Group owner','Gruppeneigentümer','de','yum'),('Group owner','Dueño del grupo','es','yum'),('Group owner','PropriÃ©taire du grouppe','fr','yum'),('Group owner','Proprietario gruppo','it','yum'),('Group title','Titel der Gruppe','de','yum'),('Group title','Título del grupo','es','yum'),('Group title','Titre du grouppe','fr','yum'),('Group title','Titolo gruppo','it','yum'),('Having','Anzeigen','de','yum'),('Having','Annonce','fr','yum'),('Having','Visualizza','it','yum'),('Hidden','Verstecken','de','yum'),('Hidden','Escondido','es','yum'),('Hidden','CachÃ©','fr','yum'),('Hidden','Nascosto','it','yum'),('Hidden','Ð¡ÐºÑ€Ñ‹Ñ‚','ru','yum'),('How expensive is a membership?','Preis der Mitgliedschaft','de','yum'),('How expensive is a membership?','Prix de l abbonement','fr','yum'),('How expensive is a membership?','Quanto costa l\'iscrizione?','it','yum'),('How many days will the membership be valid after payment?','Wie viele Tage ist die Mitgliedschaft nach Zahlungseingang gültig?','de','yum'),('How many days will the membership be valid after payment?','Nombre de jours pour la validitÃ© d un abbonement aprÃ¨s paiement?','fr','yum'),('How many days will the membership be valid after payment?','Quanti giorni Ã¨ valida l\'iscrizione dopo il pagamento?','it','yum'),('Ignore','Ignorieren','de','yum'),('Ignore','Ignorar','es','yum'),('Ignore','Ignorer','fr','yum'),('Ignore','Ignora','it','yum'),('Ignored users','Ignorierliste','de','yum'),('Ignored users','Usuarios ignorados','es','yum'),('Ignored users','Liste noire','fr','yum'),('Ignored users','Utenti ignorati','it','yum'),('Inactive users','Inaktive Benutzer','de','yum'),('Inactive users','Usuarios inactivos','es','yum'),('Inactive users','Utilisateur inactif','fr','yum'),('Inactive users','Utenti inattivi','it','yum'),('Inactive users','Nieaktywni uÅ¼ytkownicy','pl','yum'),('Incorrect activation URL','El enlace de activación que usaste es incorrecto','es','yum'),('Incorrect activation URL.','Falsche Aktivierungs URL.','de','yum'),('Incorrect activation URL.','URL de activación incorrecta.','es','yum'),('Incorrect activation URL.','Le lien d activation de votre compte est incorrect ou pÃ©rimÃ©. Consultez notre FAQ: mot clÃ©= inscription ou contactez gratuitement notre Help-Center en ligne sur la page d aide.','fr','yum'),('Incorrect activation URL.','URL di attivazione incorretto','it','yum'),('Incorrect activation URL.','Falsche Aktivierungs URL.','pl','yum'),('Incorrect activation URL.','ÐÐµÐ¿Ñ€Ð°Ð²Ð¸Ð»ÑŒÐ½Ð°Ñ ÑÑÑ‹Ð»ÐºÐ° Ð°ÐºÑ‚Ð¸Ð²Ð°Ñ†Ð¸Ð¸ ÑƒÑ‡ÐµÑ‚Ð½Ð¾Ð¹ Ð·Ð°Ð¿Ð¸ÑÐ¸.','ru','yum'),('Incorrect password (minimal length 4 symbols).','Falsches Passwort (minimale Länge 4 Zeichen).','de','yum'),('Incorrect password (minimal length 4 symbols).','Contraseña incorrecta (debe tener mínimo 4 caracteres).','es','yum'),('Incorrect password (minimal length 4 symbols).','Mot de passe incorrect (longueur minimal de 4 charactÃ¨res).','fr','yum'),('Incorrect password (minimal length 4 symbols).','Password sbagliata (lunga almeno 4 caratteri).','it','yum'),('Incorrect password (minimal length 4 symbols).','Falsches Passwort (minimale LÃ¤nge 4 Zeichen).','pl','yum'),('Incorrect password (minimal length 4 symbols).','ÐœÐ¸Ð½Ð¸Ð¼Ð°Ð»ÑŒÐ½Ð°Ñ Ð´Ð»Ð¸Ð½Ð° Ð¿Ð°Ñ€Ð¾Ð»Ñ 4 ÑÐ¸Ð¼Ð²Ð¾Ð»Ð°.','ru','yum'),('Incorrect recovery link.','Recovery link ist falsch.','de','yum'),('Incorrect recovery link.','Enlace de recuperación que usaste es incorrecto','es','yum'),('Incorrect recovery link.','Le lien de restauration est incorrect ou pÃ©rimÃ©.','fr','yum'),('Incorrect recovery link.','Link ripristino incorretto.','it','yum'),('Incorrect recovery link.','Recovery link ist falsch.','pl','yum'),('Incorrect recovery link.','ÐÐµÐ¿Ñ€Ð°Ð²Ð¸Ð»ÑŒÐ½Ð°Ñ ÑÑÑ‹Ð»ÐºÐ° Ð²Ð¾ÑÑ‚Ð°Ð½Ð¾Ð²Ð»ÐµÐ½Ð¸Ñ Ð¿Ð°Ñ€Ð¾Ð»Ñ.','ru','yum'),('Incorrect symbol\'s. (A-z0-9)','Im Benutzernamen sind nur Buchstaben und Zahlen erlaubt.','de','yum'),('Incorrect symbol\'s. (A-z0-9)','Caracteres incorrectos. (A-z0-9)','es','yum'),('Incorrect symbol\'s. (A-z0-9)','Pour le choix de votre nom d utilisateur seules les lettres de l alphabet et les chiffres sont acceptÃ©s .','fr','yum'),('Incorrect symbol\'s. (A-z0-9)','Sono consentiti solo lettere e numeri','it','yum'),('Incorrect symbol\'s. (A-z0-9)','Im Benutzernamen sind nur Buchstaben und Zahlen erlaubt.','pl','yum'),('Incorrect symbol\'s. (A-z0-9)','Ð’ Ð¸Ð¼ÐµÐ½Ð¸ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ñ Ð´Ð¾Ð¿ÑƒÑÐºÐ°ÑŽÑ‚ÑÑ Ñ‚Ð¾Ð»ÑŒÐºÐ¾ Ð»Ð°Ñ‚Ð¸Ð½ÑÐºÐ¸Ðµ Ð±ÑƒÐºÐ²Ñ‹ Ð¸ Ñ†Ð¸Ñ„Ñ€Ñ‹.','ru','yum'),('Incorrect username (length between 3 and 20 characters).','Falscher Benutzername (Länge zwischen 3 und 20 Zeichen).','de','yum'),('Incorrect username (length between 3 and 20 characters).','Nombre de usuario incorrecto (debe tener longitud entre 3 y 20 caracteres)','es','yum'),('Incorrect username (length between 3 and 20 characters).','Nom d utilisateur incorrect (Longueur comprise entre 3 et 20 charactÃ¨res).','fr','yum'),('Incorrect username (length between 3 and 20 characters).','Username errato (lunghezza tra i 3 e i 20 caratteri).','it','yum'),('Incorrect username (length between 3 and 20 characters).','Falscher Benutzername (LÃ¤nge zwischen 3 und 20 Zeichen).','pl','yum'),('Incorrect username (length between 3 and 20 characters).','Ð”Ð»Ð¸Ð½Ð° Ð¸Ð¼ÐµÐ½Ð¸ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ñ Ð¾Ñ‚ 3 Ð´Ð¾ 20 ÑÐ¸Ð¼Ð²Ð¾Ð»Ð¾Ð².','ru','yum'),('Instructions have been sent to you. Please check your email.','Weitere Anweisungen wurden an ihr E-Mail Postfach geschickt. Bitte prüfen Sie ihre E-Mails','de','yum'),('Instructions have been sent to you. Please check your email.','Se enviarion instrucciones a tu correo. Por favor, ve tu cuenta de correo.','es','yum'),('Instructions have been sent to you. Please check your email.','Merci pour votre inscription.Controlez votre boite e-mail, le code d activation de votre compte vous a Ã©tÃ© envoyÃ© par e-mail. *IMPORTANT:pour le cas ou notre e-mail ne vous serais pas parvenu, il est possible que notre e-mail ai Ã©tÃ© filtrÃ© par votre','fr','yum'),('Instructions have been sent to you. Please check your email.','Istruzioni inviate per email. Controlla la tua casella di posta elettronica.','it','yum'),('Invalid recovery key','Fehlerhafter Wiederherstellungsschlüssel','de','yum'),('Invitation','Einladung','de','yum'),('Invitation','Invitaciones','es','yum'),('Invitation','Invitation','fr','yum'),('Invitation','Invito','it','yum'),('Is membership possible','Mitgliedschaft möglich?','de','yum'),('Is membership possible','Inscription possible?','fr','yum'),('Is membership possible','Iscrizione possibile?','it','yum'),('Join group','Beitreten','de','yum'),('Join group','Collega al gruppo','it','yum'),('Jump to profile','Zum Profil','de','yum'),('Jump to profile','Consulter le profil','fr','yum'),('Jump to profile','Vai al profilo','it','yum'),('Language','Sprache','de','yum'),('Language','Idioma','es','yum'),('Language','	Langue','fr','yum'),('Language','Lingua','it','yum'),('Last Name','Cognome','it','yum'),('Last Name','Ð¤Ð°Ð¼Ð¸Ð»Ð¸Ñ','ru','yum'),('Last name','Nachname','de','yum'),('Last name','Apellido','es','yum'),('Last name','Nom de famille','fr','yum'),('Last name','Nome','it','yum'),('Last name','Nachname','pl','yum'),('Last visit','Letzter Besuch','de','yum'),('Last visit','òltima visita','es','yum'),('Last visit','DernÃ¨re visite','fr','yum'),('Last visit','Ultima visita','it','yum'),('Last visit','Letzter Besuch','pl','yum'),('Last visit','ÐŸÐ¾ÑÐ»ÐµÐ´Ð½Ð¸Ð¹ Ð²Ð¸Ð·Ð¸Ñ‚','ru','yum'),('Let me appear in the search','Ich möchte in der Suche erscheinen','de','yum'),('Let me appear in the search','Je ne souhaite pas apparaitre dans les rÃ©sultats des moteurs de recherche','fr','yum'),('Let me appear in the search','Mostrami nei risultati','it','yum'),('Let the user choose in privacy settings','Den Benutzer entscheiden lassen','de','yum'),('Let the user choose in privacy settings','Laisser l utilisateur choisir lui-mÃªme','fr','yum'),('Let the user choose in privacy settings','Consentire all\'utente di scegliere le impostazioni della privacy','it','yum'),('Letters are not case-sensitive.','Zwischen Groß-und Kleinschreibung wird nicht unterschieden.','de','yum'),('Letters are not case-sensitive.','Las letras nos son sensibles a mayúsculas y minúsculas.','es','yum'),('Letters are not case-sensitive.','Aucune importance ne sera apportÃ©e aux minuscules ou majuscules.','fr','yum'),('Letters are not case-sensitive.','La ricerca non Ã¨ case sensitive.','it','yum'),('Letters are not case-sensitive.','Zwischen GroÃŸ-und Kleinschreibung wird nicht unterschieden.','pl','yum'),('Letters are not case-sensitive.','Ð ÐµÐ³Ð¸ÑÑ‚Ñ€ Ð·Ð½Ð°Ñ‡ÐµÐ½Ð¸Ðµ Ð½Ðµ Ð¸Ð¼ÐµÐµÑ‚.','ru','yum'),('List Profile Field','Lista campi Profilo','it','yum'),('List Profile Field','Ð¡Ð¿Ð¸ÑÐ¾Ðº','ru','yum'),('List User','Lista utenti','it','yum'),('List User','Ð¡Ð¿Ð¸ÑÐ¾Ðº Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÐµÐ¹','ru','yum'),('List roles','Rollen anzeigen','de','yum'),('List roles','Listar roles','es','yum'),('List roles','liste des rÃ´les','fr','yum'),('List roles','Lista ruoli','it','yum'),('List roles','Lista rÃ³l','pl','yum'),('List user','Benutzer auflisten','de','yum'),('List user','Listar usuario','es','yum'),('List user','Liste complÃ¨tes des membres','fr','yum'),('List user','Lista utenti','it','yum'),('List user','Benutzer auflisten','pl','yum'),('List users','Benutzer anzeigen','de','yum'),('List users','Listar usuarios','es','yum'),('List users','Liste des membres','fr','yum'),('List users','Lista utenti','it','yum'),('List users','Lista uÅ¼ytkownikÃ³w','pl','yum'),('Log profile visits','Meine Profilbesuche anzeigen','de','yum'),('Log profile visits','Voir les statistiques des visiteurs de mon profil','fr','yum'),('Log profile visits','Log visite profilo','it','yum'),('Logged in as','Angemeldet als','de','yum'),('Logged in as','ConnectÃ© en tant que','fr','yum'),('Logged in as','Loggato come','it','yum'),('Login','Anmeldung','de','yum'),('Login','Iniciar sesión','es','yum'),('Login','Inscription','fr','yum'),('Login','Entra','it','yum'),('Login','Logowanie','pl','yum'),('Login','Ð’Ñ…Ð¾Ð´','ru','yum'),('Login Type','Anmeldungsart','de','yum'),('Login Type','Tipo de inicio de sesión','es','yum'),('Login Type','Mode de connection','fr','yum'),('Login Type','Tipo login','it','yum'),('Login Type','Rodzaj logowania','pl','yum'),('Login allowed by Email and Username','Anmeldung per Benutzername oder E-Mail adresse','de','yum'),('Login allowed by Email and Username','Inicio de sesión por Email y Nombre de usuario','es','yum'),('Login allowed by Email and Username','Connection avec le nom d utilisateur ou adresse e-mail.','fr','yum'),('Login allowed by Email and Username','Login con il nome utente o l\'indirizzo e-mail','it','yum'),('Login allowed by Email and Username','Logowanie przez nazwÄ™ lub mejl','pl','yum'),('Login allowed only by Email','Anmeldung nur per E-Mail adresse','de','yum'),('Login allowed only by Email','Inicio de sesión sólo por Email','es','yum'),('Login allowed only by Email','COnnection avec l adresse e-mail seulement','fr','yum'),('Login allowed only by Email','Login solo tramite email','it','yum'),('Login allowed only by Email','Logowanie poprzez mejl','pl','yum'),('Login allowed only by Username','Anmeldung nur per Benutzername','de','yum'),('Login allowed only by Username','Inicio de sesión sólo por Nombre de usuario','es','yum'),('Login allowed only by Username','Connection avec le nom d utilisateur seulement','fr','yum'),('Login allowed only by Username','Login solo tramite username','it','yum'),('Login allowed only by Username','Logowanie poprzez nazwÄ™','pl','yum'),('Login is not possible with the given credentials','Anmeldung mit den angegebenen Werten nicht möglich','de','yum'),('Logout','Abmelden','de','yum'),('Logout','Cerrar sesión','es','yum'),('Logout','DÃ©connection','fr','yum'),('Logout','Esci','it','yum'),('Logout','Wyloguj','pl','yum'),('Logout','Ð’Ñ‹Ð¹Ñ‚Ð¸','ru','yum'),('Lost Password?','Password dimenticata?','it','yum'),('Lost Password?','Ð—Ð°Ð±Ñ‹Ð»Ð¸ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ?','ru','yum'),('Lost password?','Passwort vergessen?','de','yum'),('Lost password?','¿Olvidó la contraseña?','es','yum'),('Lost password?','Mot de passe oubliÃ©?','fr','yum'),('Lost password?','Password dimenticata?','it','yum'),('Lost password?','Passwort vergessen?','pl','yum'),('Mail send method','Nachrichtenversandmethode','de','yum'),('Mail send method','Método de envío de correo','es','yum'),('Mail send method','Mode d envoie des messages','fr','yum'),('Mail send method','Metodo invio mail','it','yum'),('Mail send method','Metoda wysyÅ‚ania mejli','pl','yum'),('Make {field} public available','Das Feld {field} öffentlich machen','de','yum'),('Make {field} public available','Rendre publique le champ {field}','fr','yum'),('Make {field} public available','Rendi pubblico il campo {field}','it','yum'),('Manage','Verwalten','de','yum'),('Manage','Administrar','es','yum'),('Manage','Gestion','fr','yum'),('Manage','Gestione','it','yum'),('Manage','Ð£Ð¿Ñ€Ð°Ð²Ð»ÐµÐ½Ð¸Ðµ','ru','yum'),('Manage Actions','Gestione azioni','it','yum'),('Manage Profile Field','Profilfeld verwalten','de','yum'),('Manage Profile Field','Administrar Campos de Perfil','es','yum'),('Manage Profile Field','GÃ©rer le champ de profil','fr','yum'),('Manage Profile Field','Gestione campi profilo','it','yum'),('Manage Profile Field','ZarzÄ…dzaj polem profilu','pl','yum'),('Manage Profile Field','ÐÐ°ÑÑ‚Ñ€Ð¾Ð¹ÐºÐ° Ð¿Ð¾Ð»ÐµÐ¹','ru','yum'),('Manage Profile Fields','Profilfelder verwalten','de','yum'),('Manage Profile Fields','Administrar Campos de Perfil','es','yum'),('Manage Profile Fields','GÃ©rer les champs de profils','fr','yum'),('Manage Profile Fields','Gestione campi Profilo','it','yum'),('Manage Profile Fields','ZarzÄ…dzaj polami profilu','pl','yum'),('Manage Profile Fields','ÐÐ°ÑÑ‚Ñ€Ð¾Ð¹ÐºÐ° Ð¿Ð¾Ð»ÐµÐ¹','ru','yum'),('Manage Profiles','Profile verwalten','de','yum'),('Manage Profiles','Administrar Perfiles','es','yum'),('Manage Profiles','GÃ©rer les profils','fr','yum'),('Manage Profiles','Gestione profili','it','yum'),('Manage Roles','Rollenverwaltung','de','yum'),('Manage Roles','Administrar Roles','es','yum'),('Manage Roles','Gestion des rÃ´les','fr','yum'),('Manage Roles','Gestione Ruoli','it','yum'),('Manage Roles','ZarzÄ…dzaj rolami','pl','yum'),('Manage User','Benutzerverwaltung','de','yum'),('Manage User','Administrar Usuario','es','yum'),('Manage User','Gestion utilisateur','fr','yum'),('Manage User','Gestione utente','it','yum'),('Manage User','Benutzerverwaltung','pl','yum'),('Manage User','Ð£Ð¿Ñ€Ð°Ð²Ð»ÐµÐ½Ð¸Ðµ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÑÐ¼Ð¸','ru','yum'),('Manage Users','Benutzerverwaltung','de','yum'),('Manage Users','Administrar Usuarios','es','yum'),('Manage Users','Gestion des membres','fr','yum'),('Manage Users','Gestione utenti','it','yum'),('Manage field groups','Feldgruppen verwalten','de','yum'),('Manage field groups','Administrar grupos de campos','es','yum'),('Manage field groups','GÃ©rer les champs des groupes','fr','yum'),('Manage field groups','Gestione campo gruppi','it','yum'),('Manage field groups','ZarzÄ…dzaj grupami pÃ³l','pl','yum'),('Manage friends','Freundschaftsverwaltung','de','yum'),('Manage friends','Administrar amigos','es','yum'),('Manage friends','Gestion des contacts','fr','yum'),('Manage friends','Gestione contatti','it','yum'),('Manage my users','Meine Benutzer verwalten','de','yum'),('Manage my users','Administrar mis usuarios','es','yum'),('Manage my users','GÃ©rer mes membres','fr','yum'),('Manage my users','Gestione utenti','it','yum'),('Manage my users','ZarzÄ…dzaj moimi uÅ¼ytkownikami','pl','yum'),('Manage payments','Zahlungsarten verwalten','de','yum'),('Manage payments','Gestione pagamenti','it','yum'),('Manage permissions','Berechtigungen verwalten','de','yum'),('Manage permissions','Gestione permessi','it','yum'),('Manage profile Fields','Profilfelder verwalten','de','yum'),('Manage profile Fields','Administrar Campos de Perfil','es','yum'),('Manage profile Fields','GÃ©rer les champs du profil','fr','yum'),('Manage profile Fields','Gestione campi profilo','it','yum'),('Manage profile Fields','Profilfelder verwalten','pl','yum'),('Manage profile field groups','Administrar grupos de campos de perfiles','es','yum'),('Manage profile field groups','GÃ©rer les champs des profils de grouppes','fr','yum'),('Manage profile field groups','Gestione campo profilo gruppi','it','yum'),('Manage profile field groups','ZarzÄ…dzaj grupami pÃ³l w profilu','pl','yum'),('Manage profile fields','Profilfelder verwalten','de','yum'),('Manage profile fields','GÃ©rer les champs de profils','fr','yum'),('Manage profile fields','Gestione campi profilo','it','yum'),('Manage profile fields','ZarzÄ…dzaj polami profilu','pl','yum'),('Manage profile fields groups','Gestione campi profilo gruppi ','it','yum'),('Manage profile fields groups','ZarzÄ…dzaj grupami pÃ³l w profilu','pl','yum'),('Manage profiles','Profile verwalten','de','yum'),('Manage profiles','Administrar perfiles','es','yum'),('Manage profiles','GÃ©rer les profils','fr','yum'),('Manage profiles','Gestione profili','it','yum'),('Manage profiles','ZarzÄ…dzaj profilem','pl','yum'),('Manage roles','Rollen verwalten','de','yum'),('Manage roles','Adminsitrar roles','es','yum'),('Manage roles','GÃ©rer les rÃ´les','fr','yum'),('Manage roles','Gestione Ruoli','it','yum'),('Manage roles','ZarzÄ…dzaj rolami','pl','yum'),('Manage text settings','Texteinstellungen','de','yum'),('Manage text settings','Administrar configuración de texto','es','yum'),('Manage text settings','Option de texte','fr','yum'),('Manage text settings','Impostazioni di testo','it','yum'),('Manage this profile','dieses Profil bearbeiten','de','yum'),('Manage this profile','Administrar este perfil','es','yum'),('Manage this profile','Modifier ce profil','fr','yum'),('Manage this profile','Modifica profilo','it','yum'),('Manage this profile','ZarzÄ…dzaj tym profilem','pl','yum'),('Manage user Groups','Benutzergruppen verwalten','de','yum'),('Manage user Groups','Administrar Grupos de usuario','es','yum'),('Manage user Groups','Gerer les utilisateurs des grouppes','fr','yum'),('Manage user Groups','Gestine gruppi','it','yum'),('Manage users','Benutzer verwalten','de','yum'),('Manage users','Administrar usuarios','es','yum'),('Manage users','GÃ©rer les membres','fr','yum'),('Manage users','Gestione utenti','it','yum'),('Manage users','ZarzÄ…dzaj uÅ¼ytkownikaki','pl','yum'),('Mange Profile Field','Mange Profil Field','de','yum'),('Mange Profile Field','Administrar Campo del Perfil','es','yum'),('Mange Profile Field','Gestione campo profilo','it','yum'),('Mark as read','Als gelesen markieren','de','yum'),('Mark as read','Marquer comme lu','fr','yum'),('Mark as read','Segna come letto','it','yum'),('Match','Treffer','de','yum'),('Match','Combinar','es','yum'),('Match','RÃ©sultat','fr','yum'),('Match','Corrispondenza (RegExp)','it','yum'),('Match','Ð¡Ð¾Ð²Ð¿Ð°Ð´ÐµÐ½Ð¸Ðµ (RegExp)','ru','yum'),('Membership','Mitgliedschaft','de','yum'),('Membership','Devenir membre','fr','yum'),('Membership','Iscrizione','it','yum'),('Membership ends at: {date}','Mitgliedschaft endet am: {date}','de','yum'),('Membership ends at: {date}','Iscrizione termina il: {date}','it','yum'),('Membership has not been payed yet','Zahlungseingang noch nicht erfolgt','de','yum'),('Membership has not been payed yet','Iscrizione non pagata','it','yum'),('Membership payed at: {date}','Zahlungseingang erfolgt am: {date}','de','yum'),('Membership payed at: {date}','Iscrizione pagata il: {date}','it','yum'),('Memberships','Mitgliedschaften','de','yum'),('Memberships','Iscrizioni','it','yum'),('Message','Nachricht','de','yum'),('Message','Mensaje','es','yum'),('Message','Message','fr','yum'),('Message','Messaggio','it','yum'),('Message \"{message}\" has been sent to {to}','Nachricht \"{message}\" wurde an {to} gesendet','de','yum'),('Message \"{message}\" has been sent to {to}','Message \"{message}\" a Ã©tÃ© envoyÃ© {to} ','fr','yum'),('Message \"{message}\" has been sent to {to}','Messaggio \"{message}\" Ã¨ stato inviato a {to}','it','yum'),('Message \"{message}\" was marked as read','Nachricht \"{message}\" wurde als gelesen markiert.','de','yum'),('Message \"{message}\" was marked as read','Message \"{message}\" marquer comme lu.','fr','yum'),('Message \"{message}\" was marked as read','Messaggio \"{message}\" Ã¨ stato contrassegnato come letto.','it','yum'),('Message count','Anzahl Nachrichten','de','yum'),('Message from','Nachricht von','de','yum'),('Message from','Message de','fr','yum'),('Message from','Messaggio da','it','yum'),('Message from ','Nachricht von ','de','yum'),('Message from ','Mensaje de','es','yum'),('Message from ','Message de ','fr','yum'),('Message from ','Messaggio da ','it','yum'),('Message from ','Nachricht von ','pl','yum'),('Messages','Nachrichten','de','yum'),('Messages','Mensajes','es','yum'),('Messages','Message','fr','yum'),('Messages','Messagi','it','yum'),('Messages','WiadomoÅ›ci','pl','yum'),('Messaging system','Nachrichtensystem','de','yum'),('Messaging system','Sistema de mensajes','es','yum'),('Messaging system','Message-Board','fr','yum'),('Messaging system','Sistema messaggistica','it','yum'),('Messaging system','System wiadomoÅ›ci','pl','yum'),('Minimal password length 4 symbols.','Minimale Länge des Passworts 4 Zeichen.','de','yum'),('Minimal password length 4 symbols.','Mínimo 4 caracteres para la contraseña','es','yum'),('Minimal password length 4 symbols.','La longueur de votre mot de passe doit comporter au moins quatre charactÃ¨res.','fr','yum'),('Minimal password length 4 symbols.','Lunghezza minima password di 4 caratteri.','it','yum'),('Minimal password length 4 symbols.','Minimale LÃ¤nge des Passworts 4 Zeichen.','pl','yum'),('Minimal password length 4 symbols.','ÐœÐ¸Ð½Ð¸Ð¼Ð°Ð»ÑŒÐ½Ð°Ñ Ð´Ð»Ð¸Ð½Ð° Ð¿Ð°Ñ€Ð¾Ð»Ñ 4 ÑÐ¸Ð¼Ð²Ð¾Ð»Ð°.','ru','yum'),('Module settings','Moduleinstellungen','de','yum'),('Module settings','Ajustes del módulo','es','yum'),('Module settings','RÃ©glage des modules','fr','yum'),('Module settings','Opzioni modulo','it','yum'),('Module settings','Ustawienia moduÅ‚u','pl','yum'),('Module text settings','Ajustes de texto del módulo','es','yum'),('Module text settings','Opzioni testo modulo','it','yum'),('Module text settings','Ustawienia tekstÃ³w moduÅ‚u','pl','yum'),('My Inbox','Posteingang','de','yum'),('My Inbox','Mi bandeja de entrada','es','yum'),('My Inbox','Boite e-mail','fr','yum'),('My Inbox','Moja skrzynka odbiorcza','pl','yum'),('My friends','Meine Kontakte','de','yum'),('My friends','Mis amigos','es','yum'),('My friends','Mes contact','fr','yum'),('My friends','Contatti','it','yum'),('My groups','Meine Gruppen','de','yum'),('My groups','Mis grupos','es','yum'),('My groups','Mes grouppes','fr','yum'),('My groups','Gruppi','it','yum'),('My inbox','Mein Posteingang','de','yum'),('My inbox','Mi bandeja de entrada','es','yum'),('My inbox','Ma boite e-mail','fr','yum'),('My inbox','Posta in arrivo','it','yum'),('My memberships','Meine Mitgliedschaften','de','yum'),('My memberships','Options de mon compte','fr','yum'),('My memberships','Iscrizioni','it','yum'),('My profile','Mein Profil','de','yum'),('My profile','Mi perfil','es','yum'),('My profile','Mon profil','fr','yum'),('My profile','Profilo','it','yum'),('New friendship request','nueva solicitud de amistad','es','yum'),('New friendship request from {username}','neue Kontaktanfrage von {username}','de','yum'),('New friendship request from {username}','Nouvelle demande de contact de {username}','fr','yum'),('New friendship request from {username}','Nuova richiesta di contatto da {username}','it','yum'),('New friendship requests','Neue Freundschaftsanfragen','de','yum'),('New friendship requests','Nueva solicitud de amistad','es','yum'),('New friendship requests','Nouvelle demande de contact','fr','yum'),('New friendship requests','Nuova richiesta contatto','it','yum'),('New messages','Neue Nachrichten','de','yum'),('New messages','Nouveaux mÃ©ssages','fr','yum'),('New messages','Nuovo messaggio','it','yum'),('New password','Neues Passwort','de','yum'),('New password','Nouveau mot de passe','fr','yum'),('New password','Nuovo Password','it','yum'),('New password is saved.','Neues Passwort wird gespeichert.','de','yum'),('New password is saved.','La contraseña nueva ha sido guardada','es','yum'),('New password is saved.','Votre nouveau mot de passe a bien Ã©tÃ© mÃ©morisÃ©.','fr','yum'),('New password is saved.','Nuova passowrd salvata','it','yum'),('New password is saved.','Neues Passwort wird gespeichert.','pl','yum'),('New password is saved.','ÐÐ¾Ð²Ñ‹Ð¹ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½.','ru','yum'),('New profile comment','Nuevo comentario de perfil','es','yum'),('New profile comment from {username}','Neuer Profilkommentar von {username}','de','yum'),('New profile comment from {username}','Nouveau commentaire pour le profil de {username}','fr','yum'),('New profile comment from {username}','Nuovo commento per il profilo {username}','it','yum'),('New settings profile','Neues Einstellungsprofil','de','yum'),('New settings profile','Nuevos ajustes de perfil','es','yum'),('New settings profile','Nouvelle configuration de profil','fr','yum'),('New settings profile','Nuova preferenze profilo','it','yum'),('New settings profile','Nowe ustawienia profilu','pl','yum'),('New translation','Neue Übersetzung','de','yum'),('New value','Neuer Wert','de','yum'),('New value','Valor nuevo','es','yum'),('New value','Nouvelle valeur','fr','yum'),('New value','Nuovo valore','it','yum'),('New value','Nowa wartoÅ›Ä‡','pl','yum'),('No','Nein','de','yum'),('No','No','es','yum'),('No','Non','fr','yum'),('No','No','it','yum'),('No','Nein','pl','yum'),('No','ÐÐµÑ‚','ru','yum'),('No friendship requested','Keine Freundschaft angefragt','de','yum'),('No friendship requested','No hay solicitud de amistad','es','yum'),('No friendship requested','Pas de demande de contact','fr','yum'),('No friendship requested','Contatto non richiesto','it','yum'),('No new messages','Keine neuen Nachrichten','de','yum'),('No new messages','Pas de nouveaux mÃ©ssages','fr','yum'),('No new messages','Nessun nuovo messaggio','it','yum'),('No profile changes were made','Keine Profiländerungen stattgefunden','de','yum'),('No profile changes were made','No se hicieron cambios en el perfil','es','yum'),('No profile changes were made','pas de rÃ©sultat pour les profils modifiÃ©s','fr','yum'),('No profile changes were made','Nessun cambiamento al profilo','it','yum'),('No profile changes were made','Nie dokonano zmian w profilu','pl','yum'),('No, but show on registration form','Ja, und auf Registrierungsseite anzeigen','de','yum'),('No, but show on registration form','No, pero mostrar en formulario de registro','es','yum'),('No, but show on registration form','non et charger le formulaire d inscription','fr','yum'),('No, but show on registration form','No, ma mostra nel form di registrazione','it','yum'),('No, but show on registration form','Nie, ale pokaÅ¼ w formularzu rejestracji','pl','yum'),('No, but show on registration form','ÐÐµÑ‚, Ð½Ð¾ Ð¿Ð¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ Ð¿Ñ€Ð¸ Ñ€ÐµÐ³Ð¸ÑÑ‚Ñ€Ð°Ñ†Ð¸Ð¸','ru','yum'),('Nobody has commented your profile yet','Bisher hat niemand mein Profil kommentiert','de','yum'),('Nobody has commented your profile yet','Aucun commentaire pour votre profil','fr','yum'),('Nobody has commented your profile yet','Nessuno ha commentato il tuo profilo','it','yum'),('Nobody has visited your profile yet','Bisher hat noch niemand ihr Profil angesehen','de','yum'),('Nobody has visited your profile yet','Nadie ha visitado tu perfil todavía','es','yum'),('Nobody has visited your profile yet','Aucune visite rÃ©cente de votre profil.','fr','yum'),('Nobody has visited your profile yet','Fino ad ora nessuno ha visto il tuo profilo','it','yum'),('None','Keine','de','yum'),('None','Ninguno','es','yum'),('None','Aucun','fr','yum'),('None','Nessuno','it','yum'),('None','Å»aden','pl','yum'),('Not active','Nicht aktiv','de','yum'),('Not active','Innactivo','es','yum'),('Not active','Non actif','fr','yum'),('Not active','Non attivo','it','yum'),('Not active','Nicht aktiv','pl','yum'),('Not active','ÐÐµ Ð°ÐºÑ‚Ð¸Ð²Ð¸Ñ€Ð¾Ð²Ð°Ð½','ru','yum'),('Not assigned','Nicht zugewiesen','de','yum'),('Not assigned','No asignado','es','yum'),('Not assigned','Non assignÃ©','fr','yum'),('Not assigned','Non assegnato','it','yum'),('Not assigned','Nie przypisano','pl','yum'),('Not visited','Non visitato','it','yum'),('Ok','Ok','de','yum'),('Ok','Aceptar','es','yum'),('Ok','Ok','fr','yum'),('Ok','Ok','it','yum'),('Ok','Ok','pl','yum'),('Ok','Ok','ru','yum'),('Old value','Alter Wert','de','yum'),('Old value','Valor antiguo','es','yum'),('Old value','Ancienne valeur','fr','yum'),('Old value','Vecchio valore','it','yum'),('Old value','Stara wartoÅ›Ä‡','pl','yum'),('One of the recipients ({username}) has ignored you. Message will not be sent!','Einer der gewählten Benutzer ({username}) hat Sie auf seiner Ignorier-Liste. Die Nachricht wird nicht gesendet!','de','yum'),('One of the recipients ({username}) has ignored you. Message will not be sent!','Uno de los destinatarios ({username}) te ha ignorado. ¡No se enviará el mensaje!','es','yum'),('One of the recipients ({username}) has ignored you. Message will not be sent!','Un des membres sÃ©lectionnÃ© vous a mis sur sa liste noire ({username}). Ce message ne sera pas envoyÃ©!','fr','yum'),('One of the recipients ({username}) has ignored you. Message will not be sent!','Un destinatario ({username}) ti ha inserito nella lista degli ignorati. Messaggio non inviato!','it','yum'),('Only owner','Nur Besitzer','de','yum'),('Only owner','Sólo el dueño','es','yum'),('Only owner','PropriÃ©taire seulement','fr','yum'),('Only owner','Solo proprietario','it','yum'),('Only owner','Ð¢Ð¾Ð»ÑŒÐºÐ¾ Ð²Ð»Ð°Ð´ÐµÐ»ÐµÑ†','ru','yum'),('Only your friends are shown here','Nur ihre Kontakte werden hier angezeigt','de','yum'),('Only your friends are shown here','Seuls vos contacts seront visibles ici','fr','yum'),('Only your friends are shown here','Solo i tuoi contatti verranno visualizzati','it','yum'),('Order confirmed','Bestellbestätigung','de','yum'),('Order confirmed','Ordini confermati','it','yum'),('Order date','Bestelldatum','de','yum'),('Order date','Data ordine','it','yum'),('Order membership','Mitgliedschaft bestellen','de','yum'),('Order membership','Ordine iscrizione','it','yum'),('Order number','Bestellnummer','de','yum'),('Order number','Numero ordine','it','yum'),('Ordered at','Bestellt am','de','yum'),('Ordered at','Ordinato il','it','yum'),('Ordered memberships','Bestellte Mitgliedschaften','de','yum'),('Ordered memberships','Options complÃ©mentaires','fr','yum'),('Ordered memberships','Iscrizioni ordinate','it','yum'),('Other','Verschiedenes','de','yum'),('Other','Otro','es','yum'),('Other','Divers','fr','yum'),('Other','Altro','it','yum'),('Other','PozostaÅ‚e','pl','yum'),('Other Validator','Otro validador','es','yum'),('Other Validator','Autre validation','fr','yum'),('Other Validator','Altro validatore','it','yum'),('Other Validator','Ð”Ñ€ÑƒÐ³Ð¾Ð¹ Ð²Ð°Ð»Ð¸Ð´Ð°Ñ‚Ð¾Ñ€','ru','yum'),('Participant count','Anzahl Teilnehmer','de','yum'),('Participants','Teilnehmer','de','yum'),('Participants','Partecipanti','it','yum'),('Password','Passwort','de','yum'),('Password','Contraseña','es','yum'),('Password','Passwort','fr','yum'),('Password','Password','it','yum'),('Password','HasÅ‚o','pl','yum'),('Password Expiration Time','Ablaufzeit von Passwörtern','de','yum'),('Password Expiration Time','Tiempo de expiración de la contraseña','es','yum'),('Password Expiration Time','DurÃ©e de vie des mot de passe','fr','yum'),('Password Expiration Time','Scadenza password','it','yum'),('Password Expiration Time','Czas waÅ¼noÅ›ci hasÅ‚a','pl','yum'),('Password is incorrect.','Passwort ist falsch.','de','yum'),('Password is incorrect.','Contraseña incorrecta','es','yum'),('Password is incorrect.','Le mot de passe est incorrect.','fr','yum'),('Password is incorrect.','Password incorretta','it','yum'),('Password is incorrect.','Niepoprawne hasÅ‚o.','pl','yum'),('Password is incorrect.','ÐÐµÐ²ÐµÑ€Ð½Ñ‹Ð¹ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ.','ru','yum'),('Password recovery','Passwort wiederherstellen','de','yum'),('Password recovery','Recuperación de contraseña','es','yum'),('Passwords do not match','Las contraseñas no coinciden','es','yum'),('Payment','Zahlungsmethode','de','yum'),('Payment','Pagamento','it','yum'),('Payment arrived','Zahlungseingang bestätigt','de','yum'),('Payment arrived','Pagamento arrivato','it','yum'),('Payment date','Bezahlt am','de','yum'),('Payment date','Data pagamento','it','yum'),('Payment types','Zahlungsarten','de','yum'),('Payment types','Options de paiement','fr','yum'),('Payment types','Tipi pagamento','it','yum'),('Payments','Zahlungsarten','de','yum'),('Payments','Pagamenti','it','yum'),('Permissions','Berechtigungen','de','yum'),('Permissions','Permisos','es','yum'),('Permissions','Permissions','fr','yum'),('Permissions','Autorizzazioni','it','yum'),('Please activate you account go to {activation_url}','Perfavore attiva il tuo accounto all\'indirizzo {activation_url}','it','yum'),('Please check your email. An instructions was sent to your email address.','Bitte überprüfen Sie Ihre E-Mails. Eine Anleitung wurde an Ihre E-Mail-Adresse geschickt.','de','yum'),('Please check your email. An instructions was sent to your email address.','Por favor verifica tu e-mail a donde se han enviado más instrucciones.','es','yum'),('Please check your email. An instructions was sent to your email address.','Controlez votre boite e-mail, d autres instructions vous ont Ã©tÃ© envoyÃ©es par e-mail. *IMPORTANT:pour le cas ou notre e-mail ne vous serais pas parvenu, il est possible que notre e-mail ai Ã©tÃ© filtrÃ© par votre fournisseur  d accÃ¨s internet et placÃ','fr','yum'),('Please check your email. An instructions was sent to your email address.','Perfavore controlla la tua email con le istruzioni che ti abbiamo inviato','it','yum'),('Please check your email. An instructions was sent to your email address.','Bitte Ã¼berprÃ¼fen Sie Ihre E-Mails. Eine Anleitung wurde an Ihre E-Mail-Adresse geschickt.','pl','yum'),('Please check your email. An instructions was sent to your email address.','ÐÐ° Ð’Ð°Ñˆ Ð°Ð´Ñ€ÐµÑ ÑÐ»ÐµÐºÑ‚Ñ€Ð¾Ð½Ð½Ð¾Ð¹ Ð¿Ð¾Ñ‡Ñ‚Ñ‹ Ð±Ñ‹Ð»Ð¾ Ð¾Ñ‚Ð¿Ñ€Ð°Ð²Ð»ÐµÐ½Ð¾ Ð¿Ð¸ÑÑŒÐ¼Ð¾ Ñ Ð¸Ð½ÑÑ‚Ñ€ÑƒÐºÑ†Ð¸ÑÐ¼Ð¸.','ru','yum'),('Please check your email. Instructions have been sent to your email address.','Bitte schauen Sie in Ihr Postfach. Weitere Anweisungen wurden per E-Mail geschickt.','de','yum'),('Please check your email. Instructions have been sent to your email address.','Por favor revisa tu e-mail. Hemos enviado intrusiones a tu dirección de e-mail.','es','yum'),('Please check your email. Instructions have been sent to your email address.','Controlez votre boite e-mail. D autres instructions vous ont Ã©tÃ© envoyÃ©es par e-mail. *IMPORTANT:pour le cas ou notre e-mail ne vous serais pas parvenu, il est possible que notre e-mail ai Ã©tÃ© filtrÃ© par votre fournisseur  d accÃ¨s internet et placÃ','fr','yum'),('Please check your email. Instructions have been sent to your email address.','Si prega di controllare la casella di posta. Ulteriori istruzioni sono state inviate via e-mail.','it','yum'),('Please check your email. Instructions have been sent to your email address.','ProszÄ™ sprawdÅº TwÃ³j mejl. Instrukcje zostaÅ‚y wysÅ‚ane na TwÃ³j adres mejlowy.','pl','yum'),('Please enter a request Message up to 255 characters','Bitte geben Sie eine Nachricht bis zu 255 Zeichen an, die dem Benutzer bei der Kontaktanfrage mitgegeben wird','de','yum'),('Please enter a request Message up to 255 characters','Por favor escribe un mensaje no mayor a 255 caracteres','es','yum'),('Please enter a request Message up to 255 characters','Vous pouvez ajouter un message personalisÃ© de 255 charactÃ¨res Ã  votre demande de contact','fr','yum'),('Please enter a request Message up to 255 characters','Perfavore inserisci un messaggio di richiesta di massimo 255 caratteri','it','yum'),('Please enter the letters as they are shown in the image above.','Bitte geben Sie die, oben im Bild angezeigten, Buchstaben ein.','de','yum'),('Please enter the letters as they are shown in the image above.','Por favor escribe las letras que se muestran en la imagen.','es','yum'),('Please enter the letters as they are shown in the image above.','Recopiez les charactÃ¨res apparaissant dans l image au dessus.','fr','yum'),('Please enter the letters as they are shown in the image above.','Perfavore inserire le lettere mostrate nella seguente immagine.','it','yum'),('Please enter the letters as they are shown in the image above.','Bitte geben Sie die, oben im Bild angezeigten, Buchstaben ein.','pl','yum'),('Please enter the letters as they are shown in the image above.','ÐŸÐ¾Ð¶Ð°Ð»ÑƒÐ¹ÑÑ‚Ð°, Ð²Ð²ÐµÐ´Ð¸Ñ‚Ðµ Ð±ÑƒÐºÐ²Ñ‹, Ð¿Ð¾ÐºÐ°Ð·Ð°Ð½Ð½Ñ‹Ðµ Ð½Ð° ÐºÐ°Ñ€Ñ‚Ð¸Ð½ÐºÐµ Ð²Ñ‹ÑˆÐµ.','ru','yum'),('Please enter your login or email addres.','Perfavore inserisci il tuo username o l\'indirizzo mail.','it','yum'),('Please enter your login or email addres.','ÐŸÐ¾Ð¶Ð°Ð»ÑƒÐ¹ÑÑ‚Ð°, Ð²Ð²ÐµÐ´Ð¸Ñ‚Ðµ Ð’Ð°Ñˆ Ð»Ð¾Ð³Ð¸Ð½ Ð¸Ð»Ð¸ Ð°Ð´Ñ€ÐµÑ ÑÐ»ÐµÐºÑ‚Ñ€Ð¾Ð½Ð½Ð¾Ð¹ Ð¿Ð¾Ñ‡Ñ‚Ñ‹.','ru','yum'),('Please enter your login or email address.','Bitte geben Sie Ihren Benutzernamen oder E-Mail-Adresse ein.','de','yum'),('Please enter your login or email address.','Por favor escribe tu nombre de usuario o dirección de e-mail.','es','yum'),('Please enter your login or email address.','Indiquez dans ce champ, votre nom d utilisateur ou votre adresse e-mail.','fr','yum'),('Please enter your login or email address.','Inserisci il tuo nome utente o indirizzo e-mail.','it','yum'),('Please enter your login or email address.','Bitte geben Sie Ihren Benutzernamen oder E-Mail-Adresse ein.','pl','yum'),('Please enter your password to confirm deletion:','Bitte geben Sie Ihr Passwort ein, um den Löschvorgang zu bestätigen:','de','yum'),('Please enter your password to confirm deletion:','Por favor escribe tu contraseña para confirmar la eliminación:','es','yum'),('Please enter your password to confirm deletion:','Renseignez votre mot de passe, pour confirmer la suppression:','fr','yum'),('Please enter your password to confirm deletion:','Si prega di inserire la password per confermare l\'eliminazione:','it','yum'),('Please enter your password to confirm deletion:','ProszÄ™ wprowadÅº swoje hasÅ‚o w celu potwierdzenia usuwania:','pl','yum'),('Please enter your user name or email address.','Bitte geben Sie Ihren Benutzernamen oder E-mail Adresse ein','de','yum'),('Please enter your user name or email address.','Renseignez votre nom d utilisateur ou votre adresse e-mail','fr','yum'),('Please enter your user name or email address.','Inserisci il tuo nome utente o indirizzo e-mail','it','yum'),('Please fill out the following form with your login credentials:','Bitte geben Sie ihre Login-Daten ein:','de','yum'),('Please fill out the following form with your login credentials:','Por favor llena el formulario con tu información de inicio de sesión:','es','yum'),('Please fill out the following form with your login credentials:','Entrez dans le champ vos donnÃ©es de connection:','fr','yum'),('Please fill out the following form with your login credentials:','Perfavore inserisci le tue credenziali d\'accesso:','it','yum'),('Please fill out the following form with your login credentials:','Bitte geben Sie ihre Login-Daten ein:','pl','yum'),('Please fill out the following form with your login credentials:','ÐŸÐ¾Ð¶Ð°Ð»ÑƒÐ¹ÑÑ‚Ð°, Ð·Ð°Ð¿Ð¾Ð»Ð½Ð¸Ñ‚Ðµ ÑÐ»ÐµÐ´ÑƒÑŽÑ‰ÑƒÑŽ Ñ„Ð¾Ñ€Ð¼Ñƒ Ñ Ð²Ð°ÑˆÐ¸Ð¼Ð¸ Ð›Ð¾Ð³Ð¸Ð½ Ð¸ Ð¿Ð°Ñ€Ð¾Ð»ÐµÐ¼:','ru','yum'),('Please log in into the application.','Por favor, entra a la aplicación','es','yum'),('Please verify your E-Mail address','Por favor verifica tu dirección de correo','es','yum'),('Position','Position','de','yum'),('Position','Posición','es','yum'),('Position','Position','fr','yum'),('Position','Posizioe','it','yum'),('Position','ÐŸÐ¾Ð·Ð¸Ñ†Ð¸Ñ','ru','yum'),('Predefined values (example: 1, 2, 3, 4, 5;).','Vordefinierter Bereich (z.B. 1, 2, 3, 4, 5),','de','yum'),('Predefined values (example: 1, 2, 3, 4, 5;).','Valores predefinidos (ejemplo: 1,2,3,4,5;).','es','yum'),('Predefined values (example: 1, 2, 3, 4, 5;).','Valeur prÃ©dÃ©finie (z.B. 1, 2, 3, 4, 5),','fr','yum'),('Predefined values (example: 1, 2, 3, 4, 5;).','Valori predefiniti (es. 1, 2, 3, 4, 5),','it','yum'),('Predefined values (example: 1, 2, 3, 4, 5;).','ÐŸÑ€ÐµÐ´Ð¾Ð¿Ñ€ÐµÐ´ÐµÐ»ÐµÐ½Ð½Ñ‹Ðµ Ð·Ð½Ð°Ñ‡ÐµÐ½Ð¸Ñ (Ð¿Ñ€Ð¸Ð¼ÐµÑ€: 1;2;3;4;5;).','ru','yum'),('Preseve Profiles','Profile aufbewahren','de','yum'),('Preseve Profiles','Preservar Perfiles','es','yum'),('Preseve Profiles','Profile aufbewahren ???','fr','yum'),('Preseve Profiles','Mantieni profili','it','yum'),('Preseve Profiles','Zachowaj profil','pl','yum'),('Price','Preis','de','yum'),('Price','Prix','fr','yum'),('Price','Prezzo','it','yum'),('Privacy','Privatsphäre','de','yum'),('Privacy','Privacidad','es','yum'),('Privacy','DonnÃ©es privÃ©es','fr','yum'),('Privacy','Privacy','it','yum'),('Privacy','PrivatsphÃ¤re','pl','yum'),('Privacy settings','Privatsphäre','de','yum'),('Privacy settings','Configuración de Privacidad','es','yum'),('Privacy settings','Vos donnÃ©es personnelles','fr','yum'),('Privacy settings','Privacy','it','yum'),('Privacy settings for {username}','Privatsphäreneinstellungen für {username}','de','yum'),('Privacy settings for {username}','Configuración de Privacidad para {username}','es','yum'),('Privacy settings for {username}','Configuration des donnÃ©es privÃ©es pour {username}','fr','yum'),('Privacy settings for {username}','Opzioni Privacy per {username}','it','yum'),('Privacysettings','Privatsphäre','de','yum'),('Privacysettings','Configuración de Privacidad','es','yum'),('Privacysettings','DonnÃ©es privÃ©es','fr','yum'),('Privacysettings','Opzioni privacy','it','yum'),('Profile','Profil','de','yum'),('Profile','Perfil','es','yum'),('Profile','Profil','fr','yum'),('Profile','Profilo','it','yum'),('Profile','Profil','pl','yum'),('Profile','ÐŸÑ€Ð¾Ñ„Ð¸Ð»ÑŒ','ru','yum'),('Profile Comments','Pinnwand','de','yum'),('Profile Comments','COmentarios de perfil','es','yum'),('Profile Comments','Pinnwand','fr','yum'),('Profile Comments','Commenti profilo','it','yum'),('Profile Fields','Profilfelder','de','yum'),('Profile Fields','Campos de Perfil','es','yum'),('Profile Fields','Champs des profils','fr','yum'),('Profile Fields','Campi profilo','it','yum'),('Profile Fields','Pola profilu','pl','yum'),('Profile Fields','ÐŸÐ¾Ð»Ñ Ð¿Ñ€Ð¾Ñ„Ð¸Ð»Ñ','ru','yum'),('Profile field groups','Profilfeldgruppen','de','yum'),('Profile field groups','Grupos de campos de perfil','es','yum'),('Profile field groups','Champs des profils de groupes.','fr','yum'),('Profile field groups','Campo profilo gruppi','it','yum'),('Profile field public options','Einstellungen der Profilfelder','de','yum'),('Profile field public options','Configuration des champs publique du profil','fr','yum'),('Profile field public options','Opzioni pubbliche campi profilo','it','yum'),('Profile field {fieldname}','Profilfeld {fieldname}','de','yum'),('Profile field {fieldname}','Campo de perfil {fieldname}','es','yum'),('Profile field {fieldname}','Camp de profil {fieldname}','fr','yum'),('Profile field {fieldname}','{fieldname} campo profilo','it','yum'),('Profile field {fieldname}','Pole profilu {fieldname}','pl','yum'),('Profile fields','Profilfeldverwaltung','de','yum'),('Profile fields','Campos de perfil','es','yum'),('Profile fields','Gestion des champs de profils','fr','yum'),('Profile fields','Campi profilo','it','yum'),('Profile fields','Pole profilu','pl','yum'),('Profile fields groups','Profilfeldgruppen','de','yum'),('Profile fields groups','Grupos de campos de perfil','es','yum'),('Profile fields groups','Champ des profils de groupes','fr','yum'),('Profile fields groups','Campi profilo gruppi','it','yum'),('Profile fields groups','Grupy pÃ³l w profilu','pl','yum'),('Profile history','Profilverlauf','de','yum'),('Profile history','Historial del perfil','es','yum'),('Profile history','Chronique du profil','fr','yum'),('Profile history','Storico profilo','it','yum'),('Profile history','Historia profilu','pl','yum'),('Profile number','Profilnummer: ','de','yum'),('Profile number','Número de perfil','es','yum'),('Profile number','NumÃ©ro du profil: ','fr','yum'),('Profile number','Numero profilo: ','it','yum'),('Profile number','Numer profilu: ','pl','yum'),('Profile of ','Profil von ','de','yum'),('Profile of ','Perfil de','es','yum'),('Profile of ','Profil de ','fr','yum'),('Profile of ','Profilo di ','it','yum'),('Profile visits','Profilbesuche','de','yum'),('Profile visits','Visiteurs de mon profil','fr','yum'),('Profile visits','Visite profilo','it','yum'),('Profiles','Profile','de','yum'),('Profiles','Perfiles','es','yum'),('Profiles','Profiles','fr','yum'),('Profiles','Profili','it','yum'),('Profiles','Profile','pl','yum'),('Range','Bereich','de','yum'),('Range','Rango','es','yum'),('Range','Intervallo','it','yum'),('Range','Ð ÑÐ´ Ð·Ð½Ð°Ñ‡ÐµÐ½Ð¸Ð¹','ru','yum'),('Read Only Profiles','Nur-Lese Profile','de','yum'),('Read Only Profiles','Perfiles de Sólo Lectura','es','yum'),('Read Only Profiles','Lecture seule des profil','fr','yum'),('Read Only Profiles','Profilo sola lettura','it','yum'),('Read Only Profiles','Profile tylko do odczytu','pl','yum'),('Receive a Email for new Friendship request','E-Mail Benachrichtigung bei neuer Kontaktanfrage','de','yum'),('Receive a Email for new Friendship request','Recibir un correo cuando recibas una nueva solicitud de amistad','es','yum'),('Receive a Email for new Friendship request','Informez moi par e-mail pour les nouvelles demandes de contact.','fr','yum'),('Receive a Email for new Friendship request','Email di notifica per nuovo contatto','it','yum'),('Receive a Email when a new profile comment was made','E-Mail Benachrichtigung bei Profilkommentar','de','yum'),('Receive a Email when a new profile comment was made','Recibir un correo cuando comenten en tu perfil','es','yum'),('Receive a Email when a new profile comment was made','Informez moi par e-mail e-mail pour les nouveaux commentaire de mon profil ','fr','yum'),('Receive a Email when a new profile comment was made','Email di notifica per nuovo commento al profilo','it','yum'),('Receive a Email when new Message arrives','E-Mail Benachrichtigung bei neuer interner Nachricht','de','yum'),('Receive a Email when new Message arrives','Recibir un correo cuanto te llegue un nuevo mensaje','es','yum'),('Receive a Email when new Message arrives','Informez moi par e-mail pour les nouveaux messages. ','fr','yum'),('Receive a Email when new Message arrives','Email di notifica per i nuovi messaggi','it','yum'),('Registered users','Registrierte Benutzer','de','yum'),('Registered users','Usuarios registrados','es','yum'),('Registered users','Membre enregistrÃ©','fr','yum'),('Registered users','Utenti registrati','it','yum'),('Registered users','Ð—Ð°Ñ€ÐµÐ³Ð¸ÑÑ‚Ñ€Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð½Ñ‹Ðµ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ð¸','ru','yum'),('Registration','Registrierung','de','yum'),('Registration','Registro','es','yum'),('Registration','Inscription','fr','yum'),('Registration','Reistrazione','it','yum'),('Registration','Rejestracja','pl','yum'),('Registration','Ð ÐµÐ³Ð¸ÑÑ‚Ñ€Ð°Ñ†Ð¸Ñ','ru','yum'),('Registration date','Anmeldedatum','de','yum'),('Registration date','Fecha de registro','es','yum'),('Registration date','Date d inscription','fr','yum'),('Registration date','Data registrazione','it','yum'),('Registration date','Anmeldedatum','pl','yum'),('Registration date','Ð”Ð°Ñ‚Ð° Ñ€ÐµÐ³Ð¸ÑÑ‚Ñ€Ð°Ñ†Ð¸Ð¸','ru','yum'),('Regular expression (example: \'/^[A-Za-z0-9s,]+$/u\').','Regulärer Ausdruck (z. B.: \'/^[A-Za-z0-9s,]+$/u\')','de','yum'),('Regular expression (example: \'/^[A-Za-z0-9s,]+$/u\').','Expresión regular (ejemplo: \'/^[A-Za-z0-9s,]+$/u\')','es','yum'),('Regular expression (example: \'/^[A-Za-z0-9s,]+$/u\').','Expression regulaire (exemple.: \'/^[A-Za-z0-9s,]+$/u\')','fr','yum'),('Regular expression (example: \'/^[A-Za-z0-9s,]+$/u\').','Espressione regolare (esempio: \'/^[A-Za-z0-9s,]+$/u\')','it','yum'),('Regular expression (example: \'/^[A-Za-z0-9s,]+$/u\').','Ð ÐµÐ³ÑƒÐ»ÑÑ€Ð½Ñ‹Ðµ Ð²Ñ‹Ñ€Ð°Ð¶ÐµÐ½Ð¸Ñ (Ð¿Ñ€Ð¸Ð¼ÐµÑ€: \'/^[A-Za-z0-9s,]+$/u\')','ru','yum'),('Remember me net time','ZapamiÄ™taj mnie nastÄ™pnym razem','pl','yum'),('Remember me next time','Angemeldet bleiben','de','yum'),('Remember me next time','Recordarme la próxima vez','es','yum'),('Remember me next time','Rester connectÃ©','fr','yum'),('Remember me next time','Ricordami','it','yum'),('Remember me next time','Ð—Ð°Ð¿Ð¾Ð¼Ð½Ð¸Ñ‚ÑŒ Ð¼ÐµÐ½Ñ','ru','yum'),('Remove','Entfernen','de','yum'),('Remove','Supprimer','fr','yum'),('Remove','Rimuovi','it','yum'),('Remove Avatar','Profilbild entfernen','de','yum'),('Remove Avatar','Borrar este Avatar','es','yum'),('Remove Avatar','Supprimer l image de profil','fr','yum'),('Remove Avatar','Rimuovi avatar','it','yum'),('Remove comment','Kommentar entfernen','de','yum'),('Remove comment','Borrar comentario','es','yum'),('Remove comment','Supprimer ce commentaire','fr','yum'),('Remove comment','Rimuovi commento','it','yum'),('Remove friend','Freundschaft kündigen','de','yum'),('Remove friend','Borrar amigo','es','yum'),('Remove friend','Supprimer ce contact de ma liste','fr','yum'),('Remove friend','Rimuovi contatto','it','yum'),('Reply','Antwort','de','yum'),('Reply','Responder','es','yum'),('Reply','RÃ©pondre','fr','yum'),('Reply','Rispondi','it','yum'),('Reply','Odpowiedz','pl','yum'),('Reply to Message','auf diese Nachricht antworten','de','yum'),('Reply to Message','Responder al Mensaje','es','yum'),('Reply to Message','RÃ©pondre Ã  ce message','fr','yum'),('Reply to Message','Rispondi al messaggio','it','yum'),('Reply to Message','Odpowiedz','pl','yum'),('Reply to message','Responder al mensaje','es','yum'),('Reply to message','Rispondi al messaggio','it','yum'),('Request friendship for user {username}','Kontaktanfrage für {username}','de','yum'),('Request friendship for user {username}','Solicitar amistar al usuario {username}','es','yum'),('Request friendship for user {username}','Demande de contact pour {username}','fr','yum'),('Request friendship for user {username}','Richiesta contatto per {username}','it','yum'),('Required','Benötigt','de','yum'),('Required','Requerido','es','yum'),('Required','Recquis','fr','yum'),('Required','Obbligatorio','it','yum'),('Required','ÐžÐ±ÑÐ·Ð°Ñ‚ÐµÐ»ÑŒÐ½Ð¾ÑÑ‚ÑŒ','ru','yum'),('Required field (form validator).','Campo obbligatorio (validazione form).','it','yum'),('Required field (form validator).','ÐžÐ±ÑÐ·Ð°Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ Ð¿Ð¾Ð»Ðµ (Ð¿Ñ€Ð¾Ð²ÐµÑ€ÐºÐ° Ñ„Ð¾Ñ€Ð¼Ñ‹).','ru','yum'),('Restore','Wiederherstellen','de','yum'),('Restore','Recuperar','es','yum'),('Restore','Restaurer','fr','yum'),('Restore','Ripristino','it','yum'),('Restore','Wiederherstellen','pl','yum'),('Restore','Ð’Ð¾ÑÑÑ‚Ð°Ð½Ð¾Ð²Ð¸Ñ‚ÑŒ','ru','yum'),('Retype Password','ÐŸÐ¾Ð²Ñ‚Ð¾Ñ€Ð¸Ñ‚Ðµ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ','ru','yum'),('Retype Password is incorrect.','ÐŸÐ°Ñ€Ð¾Ð»Ð¸ Ð½Ðµ ÑÐ¾Ð²Ð¿Ð°Ð´Ð°ÑŽÑ‚.','ru','yum'),('Retype password','Passwort wiederholen','de','yum'),('Retype password','Repite la contraseña','es','yum'),('Retype password','Redonnez votre mot de passe','fr','yum'),('Retype password','Conferma password','it','yum'),('Retype password','Passwort wiederholen','pl','yum'),('Retype password is incorrect.','Wiederholtes Passwort ist falsch.','de','yum'),('Retype password is incorrect.','Contraseña repetida incorrecta','es','yum'),('Retype password is incorrect.','Le mot de passe est a nouveau incorrect.','fr','yum'),('Retype password is incorrect.','Conferma password Ã¨ errata.','it','yum'),('Retype password is incorrect.','Wiederholtes Passwort ist falsch.','pl','yum'),('Retype your new password','Wiederholen Sie Ihr neues Passwort','de','yum'),('Retype your new password','Confirmez votre nouveau mot de passe','fr','yum'),('Retype your new password','Confermare la nuova password','it','yum'),('Retyped password is incorrect','Wiederholtes Passwort ist nicht identisch','de','yum'),('Retyped password is incorrect','Le mot de passe renseignÃ© n est pas identique au prÃ©cÃ©dent','fr','yum'),('Retyped password is incorrect','Password di conferma non identica','it','yum'),('Role Administration','Rollenverwaltung','de','yum'),('Role Administration','Administración de rol','es','yum'),('Role Administration','Gestion des rÃ´les','fr','yum'),('Role Administration','Gestione dei ruoli','it','yum'),('Role Administration','ZarzÄ…dzanie rolami','pl','yum'),('Roles','Rollen','de','yum'),('Roles','Roles','es','yum'),('Roles','RÃ´les','fr','yum'),('Roles','Ruoli','it','yum'),('Roles','Role','pl','yum'),('Roles / Access control','Rollen / Zugangskontrolle','de','yum'),('Save','Sichern','de','yum'),('Save','Guardar','es','yum'),('Save','MÃ©moriser','fr','yum'),('Save','Salva','it','yum'),('Save','Sichern','pl','yum'),('Save','Ð¡Ð¾Ñ…Ñ€Ð°Ð½Ð¸Ñ‚ÑŒ','ru','yum'),('Save payment type','Zahlungsart speichern','de','yum'),('Save payment type','Salva tipo pagamento','it','yum'),('Save profile changes','Profiländerungen speichern','de','yum'),('Save profile changes','Salva modifiche profilo','it','yum'),('Save role','Rolle speichern','de','yum'),('Save role','MÃ©moriser ce rÃ´le','fr','yum'),('Save role','Salva ruolo','it','yum'),('Search for username','Suche nach Benutzer','de','yum'),('Search for username','Recherche par nom d\'utilisateur','fr','yum'),('Search for username','Cerca per username','it','yum'),('Searchable','Suchbar','de','yum'),('Searchable','visible','fr','yum'),('Searchable','Ricercabile','it','yum'),('Select a month','Monatsauswahl','de','yum'),('Select a month','Seleziona un mese','it','yum'),('Select multiple recipients by holding the CTRL key','Wählen Sie mehrere Empfänger mit der STRG-Taste aus','de','yum'),('Select multiple recipients by holding the CTRL key','Selecciona varios destinatarios manteniendo presionada la tecla CTRL','es','yum'),('Select multiple recipients by holding the CTRL key','Choix multiple en laissant la touche STRG de votre clavier enfoncÃ©e','fr','yum'),('Select multiple recipients by holding the CTRL key','Seleziona destinatari multipli con il tasto CTRL','it','yum'),('Select the fields that should be public','Diese Felder sind öffentlich einsehbar','de','yum'),('Select the fields that should be public','Ces champs sont publiques et seront visibles','fr','yum'),('Select the fields that should be public','Scegli i campi da rendere publici','it','yum'),('Selectable on registration','Während der Registrierung wählbar','de','yum'),('Selectable on registration','Option Ã  selectionner au cours de l inscription','fr','yum'),('Selectable on registration','Selezionabile durante la registrazione','it','yum'),('Send','Senden','de','yum'),('Send','Enviar','es','yum'),('Send','Envoyer','fr','yum'),('Send','Invia','it','yum'),('Send','Senden','pl','yum'),('Send a message to this User','Diesem Benutzer eine Nachricht senden','de','yum'),('Send a message to this User','Enviar un mensaje a este Usuario','es','yum'),('Send a message to this User','Faire parvenir un message Ã  ce membre','fr','yum'),('Send a message to this User','Invia messaggio all\'utente','it','yum'),('Send invitation','Kontaktanfrage senden','de','yum'),('Send invitation','Enviar invitación','es','yum'),('Send invitation','Envoyer la demande de contact','fr','yum'),('Send invitation','Kontaktanfrage senden','it','yum'),('Send message notifier emails','Benachrichtigungen schicken','de','yum'),('Send message notifier emails','Enviar mensaje de e-mail de notificación','es','yum'),('Send message notifier emails','Envoie d une notification','fr','yum'),('Send message notifier emails','Notifiche e-mail','it','yum'),('Sent at','Gesendet am','de','yum'),('Sent at','Enviado al','es','yum'),('Sent at','ENvoyÃ© le','fr','yum'),('Sent at','Pubblicato il','it','yum'),('Sent at','WysÅ‚ano','pl','yum'),('Sent messages','Gesendete Nachrichten','de','yum'),('Sent messages','Mensajes enviados','es','yum'),('Sent messages','Message envoyÃ©','fr','yum'),('Sent messages','Messaggi inviati','it','yum'),('Sent messages','WysÅ‚ane wiadomoÅ›ci','pl','yum'),('Separate usernames with comma to ignore specified users','Benutzernamen mit Komma trennen, um sie zu ignorieren','de','yum'),('Separate usernames with comma to ignore specified users','Separa con coma los nombres de los usuarios que deseas ignorar','es','yum'),('Separate usernames with comma to ignore specified users','Ma liste noire, pour introduire plusieurs membres en une seule fois, sÃ©parer les noms d utilisateur avec une virgule','fr','yum'),('Separate usernames with comma to ignore specified users','Separa gli username con una virgola, per ignorare gli utenti specificati','it','yum'),('Set payment date to today','Zahlungseingang bestätigen','de','yum'),('Set payment date to today','Imposta data pagamento ad oggi','it','yum'),('Settings','Einstellungen','de','yum'),('Settings','Ajustes','es','yum'),('Settings','RÃ©glage','fr','yum'),('Settings','Impostazioni','it','yum'),('Settings','Ustawienia','pl','yum'),('Settings profiles','Einstellungsprofile','de','yum'),('Settings profiles','Ajustes de perfiles','es','yum'),('Settings profiles','RÃ©glages des profiles','fr','yum'),('Settings profiles','Impostazioni profili','it','yum'),('Settings profiles','Ustawienia profili','pl','yum'),('Show activities','Zeige Aktivitäten','de','yum'),('Show activities','Voir la chronique des activitÃ©s','fr','yum'),('Show activities','Mostra attivitÃ ','it','yum'),('Show administration Hierarchy','Hierarchie','de','yum'),('Show administration Hierarchy','Mostrar jerarquía de administración','es','yum'),('Show administration Hierarchy','Hierarchie','fr','yum'),('Show administration Hierarchy','Gerarchia','it','yum'),('Show administration Hierarchy','PokaÅ¼ hierarchiÄ™ administrowania','pl','yum'),('Show all','Mostra tutti','it','yum'),('Show friends','Kontaktliste veröffentlichen','de','yum'),('Show friends','Mostrar amigos','es','yum'),('Show friends','REndre ma liste de contacts visible','fr','yum'),('Show friends','Mostra contatti','it','yum'),('Show my online status to everyone','Meinen Online-Status veröffentlichen','de','yum'),('Show my online status to everyone','Montrer lorsque je suis en ligne','fr','yum'),('Show my online status to everyone','Mostra il mio stato a tutti','it','yum'),('Show online status','Online-Status anzeigen','de','yum'),('Show online status','Status en ligne visible','fr','yum'),('Show online status','Mostra lo stato online','it','yum'),('Show permissions','Berechtigungen anzeigen','de','yum'),('Show permissions','Mostrar permisos','es','yum'),('Show permissions','Montrer les permissions','fr','yum'),('Show permissions','Mostra autorizzazioni','it','yum'),('Show profile visits','Profilbesuche anzeigen','de','yum'),('Show profile visits','Mostrar perfil de visitas','es','yum'),('Show profile visits','Montrer les visites de profils','fr','yum'),('Show profile visits','Visualizza visite profilo','it','yum'),('Show roles','Rollen anzeigen','de','yum'),('Show roles','Mostrar roles','es','yum'),('Show roles','Voir les rÃ´les','fr','yum'),('Show roles','Mostra ruoli','it','yum'),('Show roles','PokaÅ¼ role','pl','yum'),('Show the owner when i visit his profile','Dem Profileigentümer erkenntlich machen, wenn ich sein Profil besuche','de','yum'),('Show the owner when i visit his profile','Montrer aux propriÃ©taires des profils lorsque je consulte leur profil','fr','yum'),('Show the owner when i visit his profile','Mostra al proprietario quando visito il suo profilo','it','yum'),('Show users','Benutzer anzeigen','de','yum'),('Show users','Mostrar usuarios','es','yum'),('Show users','Voir les membres','fr','yum'),('Show users','Mostra utenti','it','yum'),('Show users','PokaÅ¼ uÅ¼ytkownikow','pl','yum'),('Statistics','Benutzerstatistik','de','yum'),('Statistics','Estadísticas','es','yum'),('Statistics','Statistiques des membres','fr','yum'),('Statistics','Statistiche','it','yum'),('Statistics','Statystyki','pl','yum'),('Status','Status','de','yum'),('Status','Estado','es','yum'),('Status','Status','fr','yum'),('Status','Stato','it','yum'),('Status','Status','pl','yum'),('Status','Ð¡Ñ‚Ð°Ñ‚ÑƒÑ','ru','yum'),('Street','Straße','de','yum'),('Street','Calle','es','yum'),('Street','Rue','fr','yum'),('Street','Indirizzo','it','yum'),('Street','Ulica','pl','yum'),('Subject','Titel','de','yum'),('Subject','Sujet','fr','yum'),('Subject','Oggetto','it','yum'),('Success','Erfolgreich','de','yum'),('Success','Exitoso','es','yum'),('Success','RÃ©ussi','fr','yum'),('Success','Successo','it','yum'),('Superuser','Superuser','de','yum'),('Superuser','Superusuario','es','yum'),('Superuser','Superuser','fr','yum'),('Superuser','Superuser','it','yum'),('Superuser','Superuser','pl','yum'),('Superuser','Ð¡ÑƒÐ¿ÐµÑ€ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÑŒ','ru','yum'),('Text Email Activation','Text Email Konto-Aktivierung','de','yum'),('Text Email Activation','Texto de activación por correo','es','yum'),('Text Email Activation','Texte contenu dans l e-mail d activation de compte','fr','yum'),('Text Email Activation','Testo email d\'attivazione account','it','yum'),('Text Email Recovery','Text E-Mail Passwort wiederherstellen','de','yum'),('Text Email Recovery','Texto de recuperación de contraseña por correo','es','yum'),('Text Email Recovery','Texte contenu dans l e-Mail de renouvellement de mot de passe','fr','yum'),('Text Email Recovery','Testo email recupero password','it','yum'),('Text Email Registration','Text E-Mail Registrierung','de','yum'),('Text Email Registration','Texto de registro por correo','es','yum'),('Text Email Registration','Texte contenu dans l e-Mail d enregistrement','fr','yum'),('Text Email Registration','Testo email di registrazione','it','yum'),('Text Login Footer','Text im Login-footer','de','yum'),('Text Login Footer','Text im Login-footer','es','yum'),('Text Login Footer','Text im Login-footer','fr','yum'),('Text Login Footer','Testo nel piepagina del login','it','yum'),('Text Login Header','Text im Login-header','de','yum'),('Text Login Header','Text im Login-header','es','yum'),('Text Login Header','Texte de connection-header','fr','yum'),('Text Login Header','Testo nell\'intestazione del login','it','yum'),('Text Registration Footer','Text im Registrierung-footer','de','yum'),('Text Registration Footer','Text im Registrierung-footer','es','yum'),('Text Registration Footer','Texte d enregistrement-footer','fr','yum'),('Text Registration Footer','Testo nel piepagina della registrazione','it','yum'),('Text Registration Header','Text im Registrierung-header','de','yum'),('Text Registration Header','Text im Registrierung-header','es','yum'),('Text Registration Header','Texte d enregistrement-header','fr','yum'),('Text Registration Header','Testo nell\'intestazione della registrazione','it','yum'),('Text for new friendship request','Text für eine neue Kontaktanfrage','de','yum'),('Text for new friendship request','Text für eine neue Kontaktanfrage','es','yum'),('Text for new friendship request','Texte pour une nouvelle demande de contact','fr','yum'),('Text for new friendship request','Testo per una nuova richiesta di contatto','it','yum'),('Text for new profile comment','Text für neuen Profilkommentar','de','yum'),('Text for new profile comment','Text für neuen Profilkommentar','es','yum'),('Text for new profile comment','Texte pour un nouveau commentaire dans un profil','fr','yum'),('Text for new profile comment','Testo per un nuovo commento al profilo','it','yum'),('Text translations','Übersetzungstexte','de','yum'),('Thank you for your registration. Contact Admin to activate your account.','Grazie per la tua registrazione. Contatta l\'ammnistratore per attivare l\'account','it','yum'),('Thank you for your registration. Please check your email or login.','Vielen Dank für Ihre Anmeldung. Bitte überprüfen Sie Ihre E-Mails oder loggen Sie sich ein.','de','yum'),('Thank you for your registration. Please check your email or login.','Merci pour votre inscription.Controlez votre boite e-mail, le code d activation de votre compte vous a Ã©tÃ© envoyÃ© par e-mail.Attention! Par mesure de sÃ©curitÃ©, le lien contenu dans ce mail, n est valable que 48h *IMPORTANT:pour le cas ou notre e-mail','fr','yum'),('Thank you for your registration. Please check your email or login.','Grazie per la tua registrazione, controlla la tua email o effettua il login,','it','yum'),('Thank you for your registration. Please check your email or login.','Vielen Dank fÃ¼r Ihre Anmeldung. Bitte Ã¼berprÃ¼fen Sie Ihre E-Mails oder loggen Sie sich ein.','pl','yum'),('Thank you for your registration. Please check your email or login.','Ð ÐµÐ³Ð¸ÑÑ‚Ñ€Ð°Ñ†Ð¸Ñ Ð·Ð°Ð²ÐµÑ€ÑˆÐµÐ½Ð°. ÐŸÐ¾Ð¶Ð°Ð»ÑƒÐ¹ÑÑ‚Ð° Ð¿Ñ€Ð¾Ð²ÐµÑ€ÑŒÑ‚Ðµ ÑÐ²Ð¾Ð¹ ÑÐ»ÐµÐºÑ‚Ñ€Ð¾Ð½Ð½Ñ‹Ð¹ ÑÑ‰Ð¸Ðº Ð¸Ð»Ð¸ Ð²Ñ‹Ð¿Ð¾Ð»Ð½Ð¸Ñ‚Ðµ Ð²Ñ…Ð¾Ð´.','ru','yum'),('Thank you for your registration. Please check your email.','Vielen Dank für Ihre Anmeldung. Bitte überprüfen Sie Ihre E-Mails.','de','yum'),('Thank you for your registration. Please check your email.','Gracias por su registro. Por favor revise su email.','es','yum'),('Thank you for your registration. Please check your email.','Merci pour votre inscription.Controlez votre boite e-mail, le code d activation de votre compte vous a Ã©tÃ© envoyÃ© par e-mail. *IMPORTANT:pour le cas ou notre e-mail ne vous serais pas parvenu, il est possible que notre e-mail ai Ã©tÃ© filtrÃ© par votre','fr','yum'),('Thank you for your registration. Please check your email.','Grazie per la tua registrazione, controlla la tua email,','it','yum'),('Thank you for your registration. Please check your email.','Vielen Dank fÃ¼r Ihre Anmeldung. Bitte Ã¼berprÃ¼fen Sie Ihre E-Mails.','pl','yum'),('Thank you for your registration. Please check your email.','Ð ÐµÐ³Ð¸ÑÑ‚Ñ€Ð°Ñ†Ð¸Ñ Ð·Ð°Ð²ÐµÑ€ÑˆÐµÐ½Ð°. ÐŸÐ¾Ð¶Ð°Ð»ÑƒÐ¹ÑÑ‚Ð° Ð¿Ñ€Ð¾Ð²ÐµÑ€ÑŒÑ‚Ðµ ÑÐ²Ð¾Ð¹ ÑÐ»ÐµÐºÑ‚Ñ€Ð¾Ð½Ð½Ñ‹Ð¹ ÑÑ‰Ð¸Ðº.','ru','yum'),('Thank you for your registration. Please {{login}}.','Grazie per la tua registrazone. Effettua il {{login}}.','it','yum'),('The comment has been saved','Der Kommentar wurde gespeichert','de','yum'),('The comment has been saved','Der Kommentar wurde gespeichert','es','yum'),('The comment has been saved','Le commentaire a bien Ã©tÃ© mÃ©morisÃ©','fr','yum'),('The comment has been saved','Il commento Ã¨ stato salvato','it','yum'),('The file \"{file}\" is not an image.','Die Datei {file} ist kein Bild.','de','yum'),('The file \"{file}\" is not an image.','Este archivo {file} no es una imagen.','es','yum'),('The file \"{file}\" is not an image.','DLe fichier {file} n est pas un fichier image.','fr','yum'),('The file \"{file}\" is not an image.','Il file {file} non Ã¨ un\'immagine.','it','yum'),('The friendship request has been sent','Die Kontaktanfrage wurde gesendet','de','yum'),('The friendship request has been sent','Votre demande de contact Ã  bien Ã©tÃ© envoyÃ©e','fr','yum'),('The friendship request has been sent','La richiesta di contatto Ã¨ stata inviata','it','yum'),('The image \"{file}\" height should be \"{height}px\".','Die Datei {file} muss genau {height}px hoch sein.','de','yum'),('The image \"{file}\" height should be \"{height}px\".','La imagen {file} debe tener {height}px de largo.','es','yum'),('The image \"{file}\" height should be \"{height}px\".','La photo {file} doit avoir une hauteur maximum de {height}px .','fr','yum'),('The image \"{file}\" height should be \"{height}px\".','L\'immagine {file} deve essere {height}px.','it','yum'),('The image \"{file}\" width should be \"{width}px\".','Die Datei {file} muss genau {width}px breit sein.','de','yum'),('The image \"{file}\" width should be \"{width}px\".','La imagen {file} debe tener {width}px de ancho.','es','yum'),('The image \"{file}\" width should be \"{width}px\".','La photo {file} doit avoir une largeur maximum de {width}px .','fr','yum'),('The image \"{file}\" width should be \"{width}px\".','L\'immagine {file} deve essere larga {width}px.','it','yum'),('The image has been resized to {max_pixel}px width successfully','Das Bild wurde beim hochladen automatisch auf eine Breite von {max_pixel} skaliert','de','yum'),('The image has been resized to {max_pixel}px width successfully','Votre photo de profil a Ã©tÃ© retaillÃ©e automatiquement Ã  une taille de{max_pixel}','fr','yum'),('The image has been resized to {max_pixel}px width successfully','Immagine ridimensionata a {max_pixel}px con successo.','it','yum'),('The image should have at least 50px and a maximum of 200px in width and height. Supported filetypes are .jpg, .gif and .png','das Bild sollte mindestens 50px und maximal 200px in der Höhe und Breite betragen. Mögliche Dateitypen sind .jpg, .gif und .png','de','yum'),('The image should have at least 50px and a maximum of 200px in width and height. Supported filetypes are .jpg, .gif and .png','La imagen debe tener un mínimo de 50px y un máximo de 200px de ancho y largo. Los tipos de archivo soportados son .jpg, .gif y .png','es','yum'),('The image should have at least 50px and a maximum of 200px in width and height. Supported filetypes are .jpg, .gif and .png','La foto chargÃ©e doit avoir une largeur maximum de 50px  et une hauteur maximale de 200px. Les fichiers acceptÃ©s sont; .jpg, .gif und .png','fr','yum'),('The image should have at least 50px and a maximum of 200px in width and height. Supported filetypes are .jpg, .gif and .png','L\'immagine deve essere almeno 50px e massimo 200px in larghezza e altezza. Tipi di file supportati .jpg, .gif e .png','it','yum'),('The image was uploaded successfully','Das Bild wurde erfolgreich hochgeladen','de','yum'),('The image was uploaded successfully','L image a Ã©tÃ© chargÃ©e avec succÃ¨s','fr','yum'),('The image was uploaded successfully','Immagine caricata con successo','it','yum'),('The messages for your application language are not defined.','Los mensajes para el idioma de tu aplicación no están definidos','es','yum'),('The minimum value of the field (form validator).','Minimalwert des Feldes (Form-Validierung','de','yum'),('The minimum value of the field (form validator).','El valor mínimo del campo (validador de formulario)','es','yum'),('The minimum value of the field (form validator).','Valeur minimum du champ (Validation du formulaire)','fr','yum'),('The minimum value of the field (form validator).','Valore minimo del campo (validazione form).','it','yum'),('The minimum value of the field (form validator).','ÐœÐ¸Ð½Ð¸Ð¼Ð°Ð»ÑŒÐ½Ð¾Ðµ Ð·Ð½Ð°Ñ‡ÐµÐ½Ð¸Ðµ Ð¿Ð¾Ð»Ñ (Ð¿Ñ€Ð¾Ð²ÐµÑ€ÐºÐ° Ñ„Ð¾Ñ€Ð¼Ñ‹).','ru','yum'),('The new password has been saved','Das neue Passwort wurde gespeichert.','de','yum'),('The new password has been saved','Votre nouveau mot de passe a bien Ã©tÃ© mÃ©morisÃ©.','fr','yum'),('The new password has been saved','La nuova password Ã¨ stata salvata.','it','yum'),('The new password has been saved.','La nueva contraseña ha sido guardada','es','yum'),('The value of the default field (database).','Standard-Wert für die Datenbank','de','yum'),('The value of the default field (database).','El valor predeterminado del campo (base de datos).','es','yum'),('The value of the default field (database).','Valeur standard pour la banque de donnÃ©e','fr','yum'),('The value of the default field (database).','Valore del campo predefnito (database).','it','yum'),('The value of the default field (database).','DomyÅ›lna wartoÅ›Ä‡ pola (bazodanowego).','pl','yum'),('The value of the default field (database).','Ð—Ð½Ð°Ñ‡ÐµÐ½Ð¸Ðµ Ð¿Ð¾Ð»Ñ Ð¿Ð¾ ÑƒÐ¼Ð¾Ð»Ñ‡Ð°Ð½Ð¸ÑŽ (Ð±Ð°Ð·Ð° Ð´Ð°Ð½Ð½Ñ‹Ñ…).','ru','yum'),('There are a total of {messages} messages in your System.','Es gibt in ihrem System insgesamt {messages} Nachrichten.','de','yum'),('There are a total of {messages} messages in your System.','Hay un total de {messages} mensajes en su sistema.','es','yum'),('There are a total of {messages} messages in your System.','Il existe dans votre systÃ¨me {messages} messages.','fr','yum'),('There are a total of {messages} messages in your System.','Ci sno un totale di {messages} messaggi nel Sistema.','it','yum'),('There are a total of {messages} messages in your System.','Istnieje {messages} wiadomoÅ›ci w Twoim systemie.','pl','yum'),('There are {active_users} active and {inactive_users} inactive users in your System, from which {admin_users} are Administrators.',' Es gibt {active_users} aktive und {inactive_users} inaktive Benutzer in ihrem System, von denen {admin_users} Benutzer Administratoren sind.','de','yum'),('There are {active_users} active and {inactive_users} inactive users in your System, from which {admin_users} are Administrators.','Hay {active_users} usuarios activos y {inactive_users} usuarios inactivos en su sistema, de los cuales {admin_users} son Administradores.','es','yum'),('There are {active_users} active and {inactive_users} inactive users in your System, from which {admin_users} are Administrators.',' Il existe {active_users}  membres actifs et {inactive_users} membres inactifs dans votre systÃ©me, pour lesquels {admin_users} membres sont dÃ©signÃ©s en tant qu administrateurs.','fr','yum'),('There are {active_users} active and {inactive_users} inactive users in your System, from which {admin_users} are Administrators.',' Ci sono {active_users} utenti attivi e {inactive_users} utenti inattivi nel Sistema, di cui {admin_users} sono amministratori.','it','yum'),('There are {active_users} active and {inactive_users} inactive users in your System, from which {admin_users} are Administrators.','IstniejÄ… {active_users} aktywni i {inactive_users} nieaktywni uÅ¼ytkownicy w Twoim systemie, w tym {admin_users} administratorzy.','pl','yum'),('There are {profiles} profiles in your System. These consist of {profile_fields} profile fields in {profile_field_groups} profile field groups','Es gibt {profiles} Profile in ihren System. Diese bestehen aus {profile_fields} Profilfeldern, die sich in {profile_field_groups} Profilfeldgruppen aufteilen.','de','yum'),('There are {profiles} profiles in your System. These consist of {profile_fields} profile fields in {profile_field_groups} profile field groups','Hay {profiles} perfiles en su sistema. Estos consisten de {profile_fields} campos de perfiles en {profile_field_groups} grupos de campos de perfiles','es','yum'),('There are {profiles} profiles in your System. These consist of {profile_fields} profile fields in {profile_field_groups} profile field groups','Il existe {profiles} profils dans votre systÃ¨me. Ils se composent de {profile_fields} champs de profils, qui se dÃ©composent {profile_field_groups} en grouppe de champs de profils.','fr','yum'),('There are {profiles} profiles in your System. These consist of {profile_fields} profile fields in {profile_field_groups} profile field groups','Ci sono {profiles} profili nel Sistema. sono costituiti da {profile_fields} campi profili, in {profile_field_groups} campo profili gruppi.','it','yum'),('There are {profiles} profiles in your System. These consist of {profile_fields} profile fields in {profile_field_groups} profile field groups','IstniejÄ… {profiles} profile w Twoim systemie, ktÃ³re zawierajÄ… pola {profile_fields} w grupach {profile_field_groups}','pl','yum'),('There are {roles} roles in your System.','Es gibt {roles} Rollen in ihrem System','de','yum'),('There are {roles} roles in your System.','Hay {roles} roles en su sistema.','es','yum'),('There are {roles} roles in your System.','Il existe les {roles} rÃ´les suivant dans votre systÃ¨me','fr','yum'),('There are {roles} roles in your System.','Ci sono {roles} ruoli nel Sistema','it','yum'),('There are {roles} roles in your System.','Istnieje {roles} rÃ³l w Twoim systemie','pl','yum'),('There was an error saving the password','Fehler beim speichern des Passwortes','de','yum'),('There was an error saving the password','Erreur produite lors de la mÃ©morisation de votre mot de passe.','fr','yum'),('There was an error saving the password','Impossibile salvare la password','it','yum'),('This account is blocked.','Ihr Konto wurde blockiert.','de','yum'),('This account is blocked.','Esta cuenta está bloqueada.','es','yum'),('This account is blocked.','Votre compte a Ã©tÃ© bloquÃ©. Contactez nous.','fr','yum'),('This account is blocked.','Il tuo account Ã¨ stato bloccato.','it','yum'),('This account is blocked.','To konto jest zablokowane.','pl','yum'),('This account is not activated.','Ihr Konto wurde nicht aktiviert.','de','yum'),('This account is not activated.','Esta cuenta no está activada.','es','yum'),('This account is not activated.','Votre compte n a pas Ã©tÃ© activÃ©.','fr','yum'),('This account is not activated.','Il tuo account non Ã¨ attivato.','it','yum'),('This account is not activated.','To konto nie zostaÅ‚o jeszcze aktywowane.','pl','yum'),('This membership is still {days} days active','Die Mitgliedschaft ist noch {days} Tage aktiv','de','yum'),('This membership is still {days} days active','L\'iscrizione Ã¨ ancora attiva per {days} giorni','it','yum'),('This message will be sent to {username}','Diese Nachricht wird an {username} versandt','de','yum'),('This message will be sent to {username}','Este mensaje será enviado a {username}','es','yum'),('This message will be sent to {username}','Ce message sera envoyÃ© Ã  {username}','fr','yum'),('This message will be sent to {username}','Questo messaggio verrÃ  inviato a {username}','it','yum'),('This role can administer users of this roles','Este rol puede administrar usuarios de estos roles','es','yum'),('This role can administer users of this roles','Membres ayant ce rÃ´le peuvent administrer ces utilisateurs','fr','yum'),('This role can administer users of this roles','Questo ruolo puÃ² amministrare utenti di questo ruolo','it','yum'),('This user belongs to these roles:','Benutzer gehört diesen Rollen an:','de','yum'),('This user belongs to these roles:','Este usuario pertenece a estos roles:','es','yum'),('This user belongs to these roles:','A ce membre a Ã©tÃ© attribuÃ© ces rÃ´les:','fr','yum'),('This user belongs to these roles:','L\'Utente appartiene a questi ruoli:','it','yum'),('This user belongs to these roles:','UÅ¼ytkownik posiada role:','pl','yum'),('This user can administer this users','Dieser Benutzer kann diese Nutzer administrieren','de','yum'),('This user can administer this users','Este usuario puede administrar estos usuarios','es','yum'),('This user can administer this users','Ce membre peut gÃ©rer ces utilisateurs.','fr','yum'),('This user can administer this users','Gli utenti possono gestire questi utenti','it','yum'),('This user can administer this users:','Benutzer kann diese Benutzer verwalten:','de','yum'),('This user can administer this users:','Este usuario puede administrar estos usuarios:','es','yum'),('This user can administer this users:','Ce membre peut administrer ces membres:','fr','yum'),('This user can administer this users:','Gli utenti possono gestire questi utenti:','it','yum'),('This user can administer this users:','UÅ¼ytkownik moÅ¼e zarzÄ…dzaj nastÄ™pujÄ…cymi uÅ¼ytkownikami:','pl','yum'),('This user can administrate this users','UÅ¼ytkownik moÅ¼e administrowaÄ‡ podanymi uÅ¼ytkownikami','pl','yum'),('This user\'s email address already exists.','Indirizzo email esistente.','it','yum'),('This user\'s email adress already exists.','Der Benutzer E-Mail-Adresse existiert bereits.','de','yum'),('This user\'s email adress already exists.','La dirección de e-mail de este usuario ya existe.','es','yum'),('This user\'s email adress already exists.','Cette adresse e-mail existe dÃ©jÃ  dans notre banque de donnÃ©e.','fr','yum'),('This user\'s email adress already exists.','Indirizzo e-mail giÃ  esistente.','it','yum'),('This user\'s email adress already exists.','Podany adres melopwy jest w uÅ¼yciu','pl','yum'),('This user\'s email adress already exists.','ÐŸÐ¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÑŒ Ñ Ñ‚Ð°ÐºÐ¸Ð¼ ÑÐ»ÐµÐºÑ‚Ñ€Ð¾Ð½Ð½Ñ‹Ð¼ Ð°Ð´Ñ€ÐµÑÐ¾Ð¼ ÑƒÐ¶Ðµ ÑÑƒÑ‰ÐµÑÑ‚Ð²ÑƒÐµÑ‚.','ru','yum'),('This user\'s name already exists.','Der Benutzer Name existiert bereits.','de','yum'),('This user\'s name already exists.','Este nombre de usuario ya existe.','es','yum'),('This user\'s name already exists.','Ce nom d utilisateur existe dÃ©jÃ  dans notre banque de donnÃ©e.','fr','yum'),('This user\'s name already exists.','Nome esistenze','it','yum'),('This user\'s name already exists.','Podana nazwa uÅ¼ytkownika jest w uÅ¼yciu.','pl','yum'),('This user\'s name already exists.','ÐŸÐ¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÑŒ Ñ Ñ‚Ð°ÐºÐ¸Ð¼ Ð¸Ð¼ÐµÐ½ÐµÐ¼ ÑƒÐ¶Ðµ ÑÑƒÑ‰ÐµÑÑ‚Ð²ÑƒÐµÑ‚.','ru','yum'),('This users have a ordered memberships of this role','Diese Benutzer haben eine Mitgliedschaft in dieser Rolle','de','yum'),('This users have a ordered memberships of this role','Ces membres sont assignÃ©s Ã  ce rÃ´le','fr','yum'),('This users have a ordered memberships of this role','Questi utenti hanno ordinato l\'iscrizione a questo ruolo','it','yum'),('This users have been assigned to this Role','Diese Nutzer gehören dieser Rolle an: ','de','yum'),('This users have been assigned to this Role','Este usuario ha sido asignado a este Rol','es','yum'),('This users have been assigned to this Role','A ces membres ont Ã©tÃ© attribuÃ©s ce rÃ´le: ','fr','yum'),('This users have been assigned to this Role','Questi utenti sono assegnati al ruolo: ','it','yum'),('This users have been assigned to this Role','UÅ¼ytkownik zostaÅ‚ przypisany do rÃ³l: ','pl','yum'),('This users have been assigned to this role','Dieser Rolle gehören diese Benutzer an','de','yum'),('This users have been assigned to this role','Este usuario ha sido asignado a este rol','es','yum'),('This users have been assigned to this role','Ce rÃ´le a bien Ã©tÃ© attribuÃ© Ã  ces membres','fr','yum'),('This users have been assigned to this role','Questo ruolo Ã¨ assegnato  a questo utente','it','yum'),('This users have been assigned to this role','Uzytkownik zostaÅ‚ przypisany do rÃ³l','pl','yum'),('This users have commented your profile recently','Diese Benutzer haben mein Profil kürzlich kommentiert','de','yum'),('This users have commented your profile recently','Cet utilisateur Ã  commentÃ© rÃ©cemment votre profil','fr','yum'),('This users have commented your profile recently','Questo utente ha recentemente commentato sul tuo profilo','it','yum'),('This users have visited my profile','Diese Benutzer haben mein Profil besucht','de','yum'),('This users have visited my profile','Estos usuarios han visitado mi perfil','es','yum'),('This users have visited my profile','Les membres ayant visitÃ© mon profil.','fr','yum'),('This users have visited my profile','Questi utenti hanno visitato il tuo profilo','it','yum'),('This users have visited your profile recently','Diese Benutzer haben kürzlich mein Profil besucht','de','yum'),('This users have visited your profile recently','Cet utilisateur a visitÃ© votre profil rÃ©cemment','fr','yum'),('This users have visited your profile recently','Questi utenti hanno recentemente visitato il tuo profilo','it','yum'),('Time sent','Gesendet am','de','yum'),('Time sent','Hora de envío','es','yum'),('Time sent','EnvoyÃ© le','fr','yum'),('Time sent','Pubblicato su','it','yum'),('Time sent','WysÅ‚ano','pl','yum'),('Title','Titel','de','yum'),('Title','Título','es','yum'),('Title','Titre','fr','yum'),('Title','Titolo','it','yum'),('Title','ÐÐ°Ð·Ð²Ð°Ð½Ð¸Ðµ','ru','yum'),('To','An','de','yum'),('To','Para','es','yum'),('To','A','fr','yum'),('To','A','it','yum'),('Translation','Übersetzung','de','yum'),('Translations have been saved','Die Übersetzungen wurden gespeichert','de','yum'),('Try again','Erneut versuchen','de','yum'),('Try again','Intenta de nuevo','es','yum'),('Try again','Essayer Ã  nouveau','fr','yum'),('Try again','Prova di nuovo','it','yum'),('Try again','SprÃ³buj jeszcze raz','pl','yum'),('Update','Bearbeiten','de','yum'),('Update','Actualizar','es','yum'),('Update','Modifier','fr','yum'),('Update','Aggiorna','it','yum'),('Update','ZmieÅ„','pl','yum'),('Update Profile Field','Profilfeld bearbeiten','de','yum'),('Update Profile Field','Actualizar Campo del Perfil','es','yum'),('Update Profile Field','Modifier le champ du profil','fr','yum'),('Update Profile Field','Aggiorna campo Profilo','it','yum'),('Update Profile Field','ZmieÅ„ pole w profilu','pl','yum'),('Update Profile Field','ÐŸÑ€Ð°Ð²Ð¸Ñ‚ÑŒ','ru','yum'),('Update User','Benutzer bearbeiten','de','yum'),('Update User','Actualizar Usuario','es','yum'),('Update User','GÃ©rer les membres','fr','yum'),('Update User','Aggiorna utenti','it','yum'),('Update User','ÐŸÑ€Ð°Ð²Ð¸Ñ‚ÑŒ','ru','yum'),('Update my profile','Mein Profil bearbeiten','de','yum'),('Update my profile','Aggiorna profilo','it','yum'),('Update payment','Zahlungsart bearbeiten','de','yum'),('Update payment','Aggiorna pagamento','it','yum'),('Update role','Rolle bearbeiten','de','yum'),('Update role','Actualizar rol','es','yum'),('Update role','Modifier les rÃ´les','fr','yum'),('Update role','Aggiorna ruolo','it','yum'),('Update role','Edytuj rolÄ™','pl','yum'),('Update user','Benutzer bearbeiten','de','yum'),('Update user','Actualizar usuario','es','yum'),('Update user','Modifier un membre','fr','yum'),('Update user','Aggiorna utente','it','yum'),('Update user','ZmieÅ„ uÅ¼ytkownika','pl','yum'),('Upload Avatar','Subir un Avatar','es','yum'),('Upload Avatar','Charger une image de profil','fr','yum'),('Upload Avatar','Carica avatar','it','yum'),('Upload avatar','Profilbild hochladen','de','yum'),('Upload avatar','Subir un avatar','es','yum'),('Upload avatar','Charger une image de profil maintenant','fr','yum'),('Upload avatar','Carica avatar','it','yum'),('Upload avatar Image','Carica avatar','it','yum'),('Upload avatar image','Profilbild hochladen','de','yum'),('Upload avatar image','Cargar imagen de perfil','es','yum'),('Upload avatar image','Charger une image pour votre profil','fr','yum'),('Upload avatar image','Carica immagine avatar','it','yum'),('User','Benutzer','de','yum'),('User','Usuario','es','yum'),('User','Utilisateur','fr','yum'),('User','Utente','it','yum'),('User Administration','Benutzerverwaltung','de','yum'),('User Administration','Administración de usuario','es','yum'),('User Administration','Gestion des membres','fr','yum'),('User Administration','Gestione utente','it','yum'),('User Administration','ZarzÄ…dzanie uÅ¼ytkownikami','pl','yum'),('User Management Home','Benutzerverwaltung Startseite','de','yum'),('User Management Home','Administración de usuario','es','yum'),('User Management Home','Page de gestion des membres','fr','yum'),('User Management Home','Home gestione utente','it','yum'),('User Management Home','Strona startowa profilu','pl','yum'),('User Management settings configuration','Einstellungen','de','yum'),('User Management settings configuration','Ajustes de configuración de la Administración de usuarios','es','yum'),('User Management settings configuration','Options de configuration des profils','fr','yum'),('User Management settings configuration','Configurazione impostazioni gestione utente','it','yum'),('User Operations','Benutzeraktionen','de','yum'),('User Operations','Operaciones de usuario','es','yum'),('User Operations','Action de l utilisateur','fr','yum'),('User Operations','Azioni utente','it','yum'),('User Operations','CzynnoÅ›ci uÅ¼ytkownika','pl','yum'),('User activation','User-Aktivierung','de','yum'),('User activation','Activación de usuario','es','yum'),('User activation','Activation du compte utilisateur','fr','yum'),('User activation','Attivazione utente','it','yum'),('User activation','User-Aktivierung','pl','yum'),('User activation','ÐÐºÑ‚Ð¸Ð²Ð°Ñ†Ð¸Ñ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ñ','ru','yum'),('User administration Panel','Benutzerkontrollzentrum','de','yum'),('User administration Panel','Panel de administración de usuario','es','yum'),('User administration Panel','Centre de controle des membres','fr','yum'),('User administration Panel','Pannello di controllo','it','yum'),('User administration Panel','Panel zarzÄ…dzania uÅ¼ytkownika','pl','yum'),('User administration panel','Kontrollzentrum','de','yum'),('User administration panel','Panel de administración de usuario','es','yum'),('User administration panel','Centre de controle user','fr','yum'),('User administration panel','Pannello di controllo','it','yum'),('User administration panel','Panel zarzÄ…dzania uÅ¼ytkownikiem','pl','yum'),('User belongs to Roles','Benutzer gehört diesen Rollen an','de','yum'),('User belongs to Roles','El usuario pertenece al los Roles','es','yum'),('User belongs to Roles','Attribuer des rÃ´les Ã  un membre','fr','yum'),('User belongs to Roles','Utente appartiene a questi ruoli','it','yum'),('User belongs to Roles','UÅ¼ytkownik posiada role','pl','yum'),('User belongs to these roles','Benutzer gehört diesen Rollen an','de','yum'),('User belongs to these roles','El usuario pertenece a estos roles','es','yum'),('User belongs to these roles','Attribuer ce rÃ´le Ã  un membre','fr','yum'),('User belongs to these roles','Utente appartiene a questi ruoli','it','yum'),('User belongs to these roles','UÅ¼ytkownik posiada role','pl','yum'),('User can not administer any users','Kann keine Benutzer verwalten','de','yum'),('User can not administer any users','El usuario no puede administrar ningún usuario','es','yum'),('User can not administer any users','Ne peut pas gÃ©rer les utilisateurs','fr','yum'),('User can not administer any users','Impossibile gestire gli utenti','it','yum'),('User can not administer any users','UÅ¼ytkownik nie moÅ¼e zarzÄ…dzaÄ‡ Å¼adnymi uÅ¼ytkownikami','pl','yum'),('User can not administer any users of any role','Kann keine Rollen verwalten','de','yum'),('User can not administer any users of any role','El usuario no puede administrar ningún usuario o ningún rol','es','yum'),('User can not administer any users of any role','Ne peut pas gÃ©rer les rolles','fr','yum'),('User can not administer any users of any role','Impossibile gestire i ruoli','it','yum'),('User can not administer any users of any role','UÅ¼ytkownik nie moÅ¼e zarzÄ…dzaÄ‡ Å¼adnymi rolami uÅ¼ytkownikÃ³w','pl','yum'),('User is Online!','Benutzer ist Online!','de','yum'),('User is Online!','Utilisateur en ligne!','fr','yum'),('User is Online!','Utente online!','it','yum'),('User module settings','Moduleinstellungen','de','yum'),('User module settings','Ajustes del módulo de usuario','es','yum'),('User module settings','RÃ©glages du module user','fr','yum'),('User module settings','Modulo impostazioni utente','it','yum'),('User module settings','Ustawienia moduÅ‚u uÅ¼ytkownika','pl','yum'),('Usergroups','Benutzergruppen','de','yum'),('Usergroups','Grupos del usuario','es','yum'),('Usergroups','Utilisateur des grouppes','fr','yum'),('Usergroups','Gruppi utenti','it','yum'),('Username','Benutzername','de','yum'),('Username','Usuario','es','yum'),('Username','Benutzername','fr','yum'),('Username','Username','it','yum'),('Username','UÅ¼ytkownik','pl','yum'),('Username is incorrect.','Benutzername ist falsch.','de','yum'),('Username is incorrect.','Nombre de usuario incorrecto','es','yum'),('Username is incorrect.','Le nom d utilisateur est incorrect.','fr','yum'),('Username is incorrect.','Username non corretto.','it','yum'),('Username is incorrect.','Nazwa uÅ¼ytkownika jest niepoprawna.','pl','yum'),('Username is incorrect.','ÐŸÐ¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÑŒ Ñ Ñ‚Ð°ÐºÐ¸Ð¼ Ð¸Ð¼ÐµÐ½ÐµÐ¼ Ð½Ðµ Ð·Ð°Ñ€ÐµÐ³Ð¸ÑÑ‚Ñ€Ð¸Ñ€Ð¾Ð²Ð°Ð½.','ru','yum'),('Username or Email','Benutzername oder E-mail','de','yum'),('Username or Email','Nombre de usuario o Email','es','yum'),('Username or Email','Nom d utilisateur ou adresse e-mail.','fr','yum'),('Username or Email','Username o email','it','yum'),('Username or Password is incorrect','Benutzername oder Passwort ist falsch','de','yum'),('Username or Password is incorrect','Usuario o contraseña incorrectos','es','yum'),('Username or Password is incorrect','Nom d utilisateur ou mot passe incorrect','fr','yum'),('Username or Password is incorrect','Username o password errato/a','it','yum'),('Username or email','Benutzername oder E-Mail','de','yum'),('Username or email','Nom d utilisateur ou adresse e-mail','fr','yum'),('Username or email','Username o email','it','yum'),('Users','Usuarios','es','yum'),('Users','Utilisateur','fr','yum'),('Users','Utenti','it','yum'),('Users','ÐŸÐ¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ð¸','ru','yum'),('Users: ','Benutzer: ','de','yum'),('Users: ','Usuarios:','es','yum'),('Users: ','Membres: ','fr','yum'),('Users: ','Utenti: ','it','yum'),('Users: ','UÅ¼ytkownicy: ','pl','yum'),('Variable name','Variablen name','de','yum'),('Variable name','Nombre de variable','es','yum'),('Variable name','Nom de la variable','fr','yum'),('Variable name','Nome variabile','it','yum'),('Variable name','Ð˜Ð¼Ñ Ð¿ÐµÑ€ÐµÐ¼ÐµÐ½Ð½Ð¾Ð¹','ru','yum'),('Verification Code','Codice verifica','it','yum'),('Verification Code','Kod weryfikujÄ…cy','pl','yum'),('Verification Code','ÐŸÑ€Ð¾Ð²ÐµÑ€Ð¾Ñ‡Ð½Ñ‹Ð¹ ÐºÐ¾Ð´','ru','yum'),('Verification code','Verifizierung','de','yum'),('Verification code','Código de verificación','es','yum'),('Verification code','Code de verification','fr','yum'),('Verification code','Codice verifica','it','yum'),('View','Anzeigen','de','yum'),('View','Ver','es','yum'),('View','Editer','fr','yum'),('View','Visualizza','it','yum'),('View','PolaÅ¼','pl','yum'),('View Details','Zur Gruppe','de','yum'),('View Details','Mostra dettagli','it','yum'),('View Profile Field','Mostra campo Profilo','it','yum'),('View Profile Field','ÐŸÑ€Ð¾ÑÐ¼Ð¾Ñ‚Ñ€','ru','yum'),('View Profile Field #','Mostra # campo Profilo','it','yum'),('View Profile Field #','ÐŸÐ¾Ð»Ðµ Ð¿Ñ€Ð¾Ñ„Ð¸Ð»Ñ #','ru','yum'),('View User','Benutzer anzeigen','de','yum'),('View User','Ver Usuario','es','yum'),('View User','Consulter le profil du membre','fr','yum'),('View User','Mostra utente','it','yum'),('View User','ÐŸÑ€Ð¾ÑÐ¼Ð¾Ñ‚Ñ€ Ð¿Ñ€Ð¾Ñ„Ð¸Ð»Ñ','ru','yum'),('View admin messages','Administratornachrichten anzeigen','de','yum'),('View admin messages','Ver mensajes de admin','es','yum'),('View admin messages','Voir les messages de l administateur','fr','yum'),('View admin messages','Visualizza messaggi amministratore','it','yum'),('View admin messages','PokaÅ¼ wiadomoÅ›ci administratora','pl','yum'),('View my messages','Meine Nachrichten ansehen','de','yum'),('View my messages','Ver mis mensajes','es','yum'),('View my messages','Voir mes messages','fr','yum'),('View my messages','Visualizza messaggi','it','yum'),('View my messages','WyÅ›wietl moje wiadomoÅ›ci','pl','yum'),('View user \"{username}\"','Benutzer \"{username}\"','de','yum'),('View user \"{username}\"','Ver usuario \"{username}\"','es','yum'),('View user \"{username}\"','Membre \"{username}\"','fr','yum'),('View user \"{username}\"','Visualizza utente \"{username}\"','it','yum'),('View user \"{username}\"','UÅ¼ytkownik \"{username}\"','pl','yum'),('View users','Benutzer anzeigen','de','yum'),('View users','Ver usuarios','es','yum'),('View users','Montrer les utilisateurs','fr','yum'),('View users','Visualizza utenti','it','yum'),('View users','PokaÅ¼ uÅ¼ytkownika','pl','yum'),('Visible','Sichtbar','de','yum'),('Visible','Visible','es','yum'),('Visible','Visible','fr','yum'),('Visible','Visibile','it','yum'),('Visible','Ð’Ð¸Ð´Ð¸Ð¼Ð¾ÑÑ‚ÑŒ','ru','yum'),('Visit profile','Profil besuchen','de','yum'),('Visit profile','Visiter le profil','fr','yum'),('Visit profile','Visita profilo','it','yum'),('When selecting searchable, users of this role can be searched in the \"user Browse\" function','Wenn \"suchbar\" ausgewählt wird, kann man Nutzer dieser Rolle in der \"Benutzer durchsuchen\"-Funktion suchen','de','yum'),('When selecting searchable, users of this role can be searched in the \"user Browse\" function','Si le status de \"visible\" est choisi, un membre de ce rÃ´le pourra apparaitre dans les rÃ©sultats d une recherche','fr','yum'),('When selecting searchable, users of this role can be searched in the \"user Browse\" function','Quando selezioni \"Ricercabile\", gli utenti di questo ruolo sono ricercabili nella funzione \"Browser utenti\" ','it','yum'),('Write a comment','Kommentar hinterlassen','de','yum'),('Write a comment','Escribir un comentario','es','yum'),('Write a comment','Laisser un commentaire','fr','yum'),('Write a comment','Scrivi commento','it','yum'),('Write a message','Nachricht schreiben','de','yum'),('Write a message','Escribir un mensaje','es','yum'),('Write a message','Ecrire un message','fr','yum'),('Write a message','Scrivi messaggio','it','yum'),('Write a message','Napisz wiadomoÅ›Ä‡','pl','yum'),('Write a message to this User','Diesem Benutzer eine Nachricht schreiben','de','yum'),('Write a message to this User','Escribir un mensaje a este Usuario','es','yum'),('Write a message to this User','Ecrire un message Ã  ce membre','fr','yum'),('Write a message to this User','Scrivi messaggio a questo utente','it','yum'),('Write a message to {username}','Nachricht an {username} schreiben','de','yum'),('Write a message to {username}','Message Ã©crire Ã  {username} ','fr','yum'),('Write a message to {username}','Scrivi messaggio a {username} ','it','yum'),('Write another message','Eine weitere Nachricht schreiben','de','yum'),('Write another message','Escribir otro mensaje','es','yum'),('Write another message','Ecrire un autre message','fr','yum'),('Write another message','Scrivi un\'altro messaggio','it','yum'),('Write another message','Eine weitere Nachricht schreiben','pl','yum'),('Write comment','Kommentar schreiben','de','yum'),('Write comment','Escribir comentario','es','yum'),('Write comment','Ecrire un commentaire','fr','yum'),('Write comment','Scrivi commento','it','yum'),('Write message','Nachricht schreiben','de','yum'),('Written at','Geschrieben am','de','yum'),('Written at','Escrito el','es','yum'),('Written at','Ecrit le','fr','yum'),('Written at','Scritto a ','it','yum'),('Written from','Geschrieben von','de','yum'),('Written from','Escrito por','es','yum'),('Written from','Ecrit par','fr','yum'),('Written from','Scritto da ','it','yum'),('Wrong password confirmation! Account was not deleted','Falsches Bestätigugspasswort! Zugang wurde nicht gelöscht','de','yum'),('Wrong password confirmation! Account was not deleted','¡Contraseña para confirmación incorrecta! Lacuenta no ha sido eliminada','es','yum'),('Wrong password confirmation! Account was not deleted','Confirmation incorrecte! Le compte n a pas Ã©tÃ© supprimÃ©','fr','yum'),('Wrong password confirmation! Account was not deleted','Password id oconferma errata! Account non cancellato','it','yum'),('Wrong password confirmation! Account was not deleted','Niepoprawne hasÅ‚o! Konto nie zostaÅ‚o usuniÄ™te','pl','yum'),('Yes','Ja','de','yum'),('Yes','Sí','es','yum'),('Yes','Oui','fr','yum'),('Yes','Si','it','yum'),('Yes','Ja','pl','yum'),('Yes','Ð”Ð°','ru','yum'),('Yes and show on registration form','Ja, und auf Registrierungsseite anzeigen','de','yum'),('Yes and show on registration form','Si y mostrar en formulario de registro','es','yum'),('Yes and show on registration form','oui et charger le formulaire d inscription','fr','yum'),('Yes and show on registration form','Si e mostra nel form di registrazione','it','yum'),('Yes and show on registration form','Tak i pokaÅ¼ w formularzu rejestracji','pl','yum'),('Yes and show on registration form','Ð”Ð° Ð¸ Ð¿Ð¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ Ð¿Ñ€Ð¸ Ñ€ÐµÐ³Ð¸ÑÑ‚Ñ€Ð°Ñ†Ð¸Ð¸','ru','yum'),('You account is activated.','Ihr Konto wurde aktiviert.','de','yum'),('You account is activated.','Su cuenta está activada.','es','yum'),('You account is activated.','Votre compte a bien Ã©tÃ© activÃ©.','fr','yum'),('You account is activated.','Account attivato','it','yum'),('You account is activated.','Ihr Konto wurde aktiviert.','pl','yum'),('You account is activated.','Ð’Ð°ÑˆÐ° ÑƒÑ‡ÐµÑ‚Ð½Ð°Ñ Ð·Ð°Ð¿Ð¸ÑÑŒ Ð°ÐºÑ‚Ð¸Ð²Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð°.','ru','yum'),('You account is active.','Ihr Konto ist aktiv.','de','yum'),('You account is active.','Su cuenta está activa.','es','yum'),('You account is active.','Votre compte est actif.','fr','yum'),('You account is active.','Account attivo','it','yum'),('You account is active.','Ihr Konto ist aktiv.','pl','yum'),('You account is active.','Ð’Ð°ÑˆÐ° ÑƒÑ‡ÐµÑ‚Ð½Ð°Ñ Ð·Ð°Ð¿Ð¸ÑÑŒ ÑƒÐ¶Ðµ Ð°ÐºÑ‚Ð¸Ð²Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð°.','ru','yum'),('You account is blocked.','Account bloccato','it','yum'),('You account is blocked.','Ð’Ð°Ñˆ Ð°ÐºÐºÐ°ÑƒÐ½Ñ‚ Ð·Ð°Ð±Ð»Ð¾ÐºÐ¸Ñ€Ð¾Ð²Ð°Ð½.','ru','yum'),('You account is not activated.','Account non attivo','it','yum'),('You account is not activated.','Ð’Ð°Ñˆ Ð°ÐºÐºÐ°ÑƒÐ½Ñ‚ Ð½Ðµ Ð°ÐºÑ‚Ð¸Ð²Ð¸Ñ€Ð¾Ð²Ð°Ð½.','ru','yum'),('You already are friends','Ihr seid bereits Freunde','de','yum'),('You already are friends','Ya son amigos','es','yum'),('You already are friends','Ce membre figure dÃ©jÃ  dans votre liste de contact','fr','yum'),('You already are friends','Siete giÃ  in contatto','it','yum'),('You are not allowed to view this profile.','Sie dürfen dieses Profil nicht ansehen.','de','yum'),('You are not allowed to view this profile.','No tiene permiso para ver este perfil.','es','yum'),('You are not allowed to view this profile.','VOus ne pouvez pas consulter ce profil.','fr','yum'),('You are not allowed to view this profile.','Non puoi vedere questo profilo.','it','yum'),('You are not allowed to view this profile.','Nie masz uprawnie do przeglÄ…dania tego profilu','pl','yum'),('You are running the Yii User Management Module {version} in Debug Mode!','Dies ist das Yii-User-Management Modul in Version {version} im Debug Modus!','de','yum'),('You are running the Yii User Management Module {version} in Debug Mode!','¡Está ejecutando el Módulo de Administración de Usuarios Yii {version} en modo de depuración!','es','yum'),('You are running the Yii User Management Module {version} in Debug Mode!','Dies ist das Yii-User-Management Modul in Version {version} im Debug Modus!','fr','yum'),('You are running the Yii User Management Module {version} in Debug Mode!','Questo Ã¨ il modulo di YUM versione {version} in modalitÃ  debug!','it','yum'),('You are running the Yii User Management Module {version} in Debug Mode!','Uruchamiasz moduÅ‚ Yii User Management Modul, wersja {version}, w trybie DEBUG!','pl','yum'),('You do not have any friends yet','Ihre Kontaktliste ist leer','de','yum'),('You do not have any friends yet','No tienes ningún amigo todavía','es','yum'),('You do not have any friends yet','Votre liste de contact est vide','fr','yum'),('You do not have any friends yet','Lista contatti vuota','it','yum'),('You do not have set an avatar image yet','Es wurde noch kein Profilbild hochgeladen','de','yum'),('You do not have set an avatar image yet','Aún no has subido tu imágen de Avatar','es','yum'),('You do not have set an avatar image yet','Aucune photo de votre profil disponible','fr','yum'),('You do not have set an avatar image yet','Non hai settato un\'avatar','it','yum'),('You have joined this group','Sie sind dieser Gruppe beigetreten','de','yum'),('You have new Messages !','Sie haben neue Nachrichten !','de','yum'),('You have new Messages !','¡Tienes Mensajes nuevos!','es','yum'),('You have new Messages !','Vous avez de nouveaux messages !','fr','yum'),('You have new Messages !','Hai un nuovo messaggio!','it','yum'),('You have new messages!','Sie haben neue Nachrichten!','de','yum'),('You have new messages!','¡Tienes mensajes nuevos!','es','yum'),('You have new messages!','Vous n avez pas de messages!','fr','yum'),('You have new messages!','Hai un nuovo messaggio!','it','yum'),('You have new messages!','Masz nowÄ… wiadomoÅ›Ä‡!','pl','yum'),('You have no messages yet','Sie haben bisher noch keine Nachrichten','de','yum'),('You have no messages yet','Aucun message rÃ©cent','fr','yum'),('You have no messages yet','Non hai messaggi','it','yum'),('You have {count} new Messages !','Sie haben {count} neue Nachricht(en)!','de','yum'),('You have {count} new Messages !','¡Tienes {count} mensajes nuevos!','es','yum'),('You have {count} new Messages !','Vous avez {count} nouveau(x) message(s)!','fr','yum'),('You have {count} new Messages !','Hai {count} nuovi messaggi!','it','yum'),('You have {count} new Messages !','Masz {count} nowych wiadomoÅ›ci !','pl','yum'),('You registered from {site_name}','Sei registrato su {site_name}','it','yum'),('Your Account has been activated. Thank you for your registration','Ihr Zugang wurde aktiviert. Danke für die Registierung','de','yum'),('Your Account has been activated. Thank you for your registration.','Votre compte a bien Ã©tÃ© activÃ©. Merci pour votre inscription.','fr','yum'),('Your Account has been activated. Thank you for your registration.','Il tuo account Ã¨ stato attivato. Grazie per la tua registrazione','it','yum'),('Your Avatar image','Ihr Avatar-Bild','de','yum'),('Your Avatar image','Tu imagen de Avatar','es','yum'),('Your Avatar image','Votre image de profil','fr','yum'),('Your Avatar image','Il tuo avatar','it','yum'),('Your Message has been sent.','El Mensaje ha sido enviado.','es','yum'),('Your Message has been sent.','Votre mÃ©ssage a Ã©tÃ© envoyÃ©.','fr','yum'),('Your Message has been sent.','Messaggio inviato.','it','yum'),('Your account has been activated.','Tu cuenta ha sido activada.','es','yum'),('Your account has been activated. Thank you for your registration','Ihr Zugang wurde aktiviert. Danke für ihre Registrierung','de','yum'),('Your account has been activated. Thank you for your registration','VOtre compte est maintenant actif. Merci de vous Ãªtre enregistrÃ©','fr','yum'),('Your account has been activated. Thank you for your registration','Il tuo account Ã¨ stato attivato. Grazie per esserti registrato','it','yum'),('Your account has been activated. Thank you for your registration.','Tu cuenta ha sido activada. Gracias por registrarte.','es','yum'),('Your account has been activated. Thank you for your registration.','Twoje konto zostaÅ‚o aktywowane. DziÄ™kujemy za rejestracjÄ™.','pl','yum'),('Your account has been deleted.','Ihr Zugang wurde gelöscht','de','yum'),('Your account has been deleted.','Votre compte a bien Ã©tÃ© supprimÃ©','fr','yum'),('Your account has been deleted.','Il tuo account Ã¨ stato cancellato.','it','yum'),('Your activation succeeded','Ihre Aktivierung war erfolgreich','de','yum'),('Your activation succeeded','Votre compte a Ã©tÃ© activÃ©','fr','yum'),('Your activation succeeded','Attivazione riuscita','it','yum'),('Your changes have been saved','Ihre Änderungen wurden gespeichert','de','yum'),('Your changes have been saved','Los cambios han sido guardados','es','yum'),('Your changes have been saved','Vos modification ont Ã©tÃ© mÃ©morisÃ©es','fr','yum'),('Your changes have been saved','Le modifiche sono state salvate','it','yum'),('Your changes have been saved','Twoje zmiany zostaÅ‚y zapisane','pl','yum'),('Your current password','Ihr aktuelles Passwort','de','yum'),('Your current password','Votre mot de passe actuel','fr','yum'),('Your current password','La tua password corrente','it','yum'),('Your current password is not correct','Ihr aktuelles Passwort ist nicht korrekt','de','yum'),('Your current password is not correct','Votre mot de passe actuel n est pas correct','fr','yum'),('Your current password is not correct','La tua password corrente non Ã¨ corretta','it','yum'),('Your friendship request has been accepted','Ihre Freundschaftsanfrage wurde akzeptiert','de','yum'),('Your friendship request has been accepted','Votre demande de contact a bien Ã©tÃ© acceptÃ©e','fr','yum'),('Your friendship request has been accepted','La richiesta di contatto Ã¨ stata accettata','it','yum'),('Your message has been sent','Ihre Nachricht wurde gesendet','de','yum'),('Your message has been sent','El mensaje ha sido enviado','es','yum'),('Your message has been sent','Votre mÃ©ssage a bien Ã©tÃ© envoyÃ©','fr','yum'),('Your message has been sent','Il tuo messaggio Ã¨ stato inviato.','it','yum'),('Your message has been sent','Twoja wiadomoÅ›Ä‡ zostaÅ‚a wysÅ‚ana','pl','yum'),('Your new password has been saved.','Ihr Passwort wurde gespeichert.','de','yum'),('Your new password has been saved.','La nueva contraseña ha sido guardada.','es','yum'),('Your new password has been saved.','La modification de votre mot de passe a bien Ã©tÃ© mÃ©morisÃ©.','fr','yum'),('Your new password has been saved.','La nuova password Ã¨ stata salvata.','it','yum'),('Your new password has been saved.','Twoje nowe hasÅ‚o zostaÅ‚o zapisane.','pl','yum'),('Your password has expired. Please enter your new Password below:','Ihr Passwort ist abgelaufen. Bitte geben Sie ein neues Passwort an:','de','yum'),('Your password has expired. Please enter your new Password below:','La contraseña ha expirado. Por favor escribe una contraseña nueva abajo:','es','yum'),('Your password has expired. Please enter your new Password below:','La durÃ©e de vie de votre mot de passe est arrivÃ©e Ã  Ã©chÃ©ance. Veuillez en definir un nouveau:','fr','yum'),('Your password has expired. Please enter your new Password below:','La password Ã¨ scaduta. Si prega di inserire una nuova password:','it','yum'),('Your privacy settings have been saved','Ihre Privatsphären-einstellungen wurden gespeichert','de','yum'),('Your privacy settings have been saved','La configuration de vos donnÃ©es privÃ©es a bien Ã©tÃ© enregistrÃ©e','fr','yum'),('Your privacy settings have been saved','Le tue opzioni Privacy sono state salvate','it','yum'),('Your profile','Ihr Profil','de','yum'),('Your profile','Tu perfil','es','yum'),('Your profile','Ihr Profil','fr','yum'),('Your profile','Il tuo profilo','it','yum'),('Your profile','Ihr Profil','pl','yum'),('Your profile','Ð’Ð°Ñˆ Ð¿Ñ€Ð¾Ñ„Ð¸Ð»ÑŒ','ru','yum'),('Your registration didn\'t work. Please try another E-Mail address. If this problem persists, please contact our System Administrator. ','Tu proceso de registro falló. Por favor intenta con otra cuenta de correo. Si el problema persiste por favor contáctanos.','es','yum'),('Your request succeeded. Please enter below your new password:','Tu solicitud fué exitosa. Por favor, escribe a continuación tu nueva contraseña:','es','yum'),('about','information me concernant','fr','yum'),('about','Informazioni su','it','yum'),('activation key','Aktivierungsschlüssel','de','yum'),('activation key','clave de activación','es','yum'),('activation key','ClÃ© d activation de votre compte','fr','yum'),('activation key','chiave di attivazione','it','yum'),('activation key','AktivierungsschlÃ¼ssel','pl','yum'),('activation key','ÐšÐ»ÑŽÑ‡ Ð°ÐºÑ‚Ð¸Ð²Ð°Ñ†Ð¸Ð¸','ru','yum'),('birthdate','Geburtstag','de','yum'),('birthdate','anniversaire','fr','yum'),('birthdate','Compleanno','it','yum'),('birthday','Geburtstag','de','yum'),('birthday','date de naissance','fr','yum'),('birthday','Compleanno','it','yum'),('change Password','Passwort ändern','de','yum'),('change Password','cambiar Contraseña','es','yum'),('change Password','Changer le mot de passe','fr','yum'),('change Password','ZmieÅ„ hasÅ‚o','pl','yum'),('change password','Passwort ändern','de','yum'),('change password','cambiar contraseña','es','yum'),('change password','Modifier le mot de passe','fr','yum'),('change password','Cambia password','it','yum'),('do not make my friends public','Meine Kontakte nicht veröffentlichen','de','yum'),('do not make my friends public','Ne pas rendre publique la liste de mes contacts','fr','yum'),('do not make my friends public','Non mostrare i miei contatti pubblicamente','it','yum'),('email','E-Mail','de','yum'),('email','correo','es','yum'),('email','e-Mail','fr','yum'),('email','email','it','yum'),('email','mejl','pl','yum'),('email address','correo electrónico','es','yum'),('email address','Adres mejlowy','pl','yum'),('firstname','Vorname','de','yum'),('firstname','prÃ©nom','fr','yum'),('firstname','Cognome','it','yum'),('friends only','Nur Freunde','de','yum'),('friends only','sólo amigos','es','yum'),('friends only','A mes contacts seulement','fr','yum'),('friends only','Solo contatti','it','yum'),('lastname','Nachname','de','yum'),('lastname','nom de famille','fr','yum'),('lastname','Nome','it','yum'),('make my friends public','Meine Kontakte veröffentlichen','de','yum'),('make my friends public','Rendre visibles mes contacts','fr','yum'),('make my friends public','Rendi pubblici i miei contatti','it','yum'),('no','Nein','de','yum'),('no','Non','fr','yum'),('no','No','it','yum'),('of user','von Benutzer','de','yum'),('of user','de l utilisateur','fr','yum'),('of user','dell\'utente','it','yum'),('only to my friends','Nur an meine Freunde veröffentlichen','de','yum'),('only to my friends','Visible seulement pour mes contacts','fr','yum'),('only to my friends','solamente ai miei contatti','it','yum'),('password','Passwort','de','yum'),('password','contraseña','es','yum'),('password','mot de passe','fr','yum'),('password','password','it','yum'),('password','hadÅ‚o','pl','yum'),('password','ÐŸÐ°Ñ€Ð¾Ð»ÑŒ','ru','yum'),('private','Privat','de','yum'),('private','privado','es','yum'),('private','PrivÃ©','fr','yum'),('private','Privato','it','yum'),('private','prywatny','pl','yum'),('protected','Geschützt','de','yum'),('protected','protegido','es','yum'),('protected','ProtÃ¨gÃ©','fr','yum'),('protected','Protetto','it','yum'),('protected','chroniony','pl','yum'),('public','Öffentlich','de','yum'),('public','público','es','yum'),('public','Publique','fr','yum'),('public','Pubblico','it','yum'),('public','publiczny','pl','yum'),('street','rue','fr','yum'),('street','Indirizzo','it','yum'),('timestamp','Zeitstempel','de','yum'),('timestamp','marca de tiempo','es','yum'),('timestamp','tempon de date et heure','fr','yum'),('timestamp','timestamp','it','yum'),('username','Benutzername','de','yum'),('username','usuario','es','yum'),('username','nom d utilisateur','fr','yum'),('username','username','it','yum'),('username','nazwa uÅ¼ytkownika','pl','yum'),('username','Ð›Ð¾Ð³Ð¸Ð½','ru','yum'),('username or email','Benutzername oder E-Mail Adresse','de','yum'),('username or email','nombre de usuario o email','es','yum'),('username or email','nom d utilisateur ou adresse e-mail','fr','yum'),('username or email','username or email','it','yum'),('username or email','nazwa uÅ¼ytkowniak lub mejl','pl','yum'),('username or email','Ð›Ð¾Ð³Ð¸Ð½ Ð¸Ð»Ð¸ email','ru','yum'),('yes','Ja, diese Daten veröffentlichen','de','yum'),('yes','Oui, rendre publique ces donnÃ©es','fr','yum'),('yes','Si','it','yum'),('zipcode','Postleitzahl','de','yum'),('zipcode','code postal','fr','yum'),('zipcode','CAP','it','yum'),('{attribute} is too long (max. {num} characters).','{attribute} es muy larga (max. {num} caracteres).','es','yum'),('{attribute} is too long (max. {num} characters).','{attribute} troppo lungo (max. {num} caratteri).','it','yum'),('{attribute} is too long (max. {num} characters).','{attribute} jest zbyt dÅ‚ugi (max. {num} znakÃ³w).','pl','yum'),('{attribute} is too short (min. {num} characters).','{attribute} es muy corta (min. {num} caracteres).','es','yum'),('{attribute} is too short (min. {num} characters).','{attribute} troppo corto (min. {num} caratteri).','it','yum'),('{attribute} is too short (min. {num} characters).','{attribute} jest zbyt krÃ³tki (min. {num} znakÃ³w).','pl','yum'),('{attribute} must include at least {num} digits.','{attribute} debe tener al menos {num} dígitos.','es','yum'),('{attribute} must include at least {num} digits.','{attribute}deve includere almeno {num} numeri.','it','yum'),('{attribute} must include at least {num} digits.','{attribute} musi zawieraÄ‡ co najmniej {num} cyfr.','pl','yum'),('{attribute} must include at least {num} lower case letters.','{attribute} debe tener al menos {num} caracteres en minúscula.','es','yum'),('{attribute} must include at least {num} lower case letters.','{attribute} deve includere almeno {num} lettere minuscole.','it','yum'),('{attribute} must include at least {num} lower case letters.','{attribute} musi zawieraÄ‡ co najmniej {num} maÅ‚ych liter.','pl','yum'),('{attribute} must include at least {num} symbols.','{attribute} debe tener al menos {num} símbolos.','es','yum'),('{attribute} must include at least {num} symbols.','{attribute} deve includere almeno {num} simboli.','it','yum'),('{attribute} must include at least {num} symbols.','{attribute} musi zawieraÄ‡ co najmniej {num} symboli.','pl','yum'),('{attribute} must include at least {num} upper case letters.','{attribute} debe tener al menos {num} caracteres en mayúscula.','es','yum'),('{attribute} must include at least {num} upper case letters.','{attribute} deve includere almeno {num} lettere maiuscole.','it','yum'),('{attribute} must include at least {num} upper case letters.','{attribute} musi zawieraÄ‡ co najmniej {num} duÅ¼ych liter.','pl','yum'),('{attribute} must not contain more than {num} sequentially repeated characters.','{attribute} no debe tener más de {num} caracteres repetidos secuencialmente.','es','yum'),('{attribute} must not contain more than {num} sequentially repeated characters.','{attribute} non deve contenere {num} caratteri ripetuti sequenzialmente.','it','yum'),('{attribute} must not contain more than {num} sequentially repeated characters.','{attribute} nie moÅ¼e zawieraÄ‡ wiÄ™cej niÅ¼ {num} sekwencji znakÃ³w.','pl','yum'),('{attribute} must not contain whitespace.','{attribute} no debe contener espacios.','es','yum'),('{attribute} must not contain whitespace.','{attribute} non deve contenere spazi.','it','yum'),('{attribute} must not contain whitespace.','{attribute} nie moÅ¼e zawieraÄ‡ biaÅ‚ych znakÃ³w.','pl','yum');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `activationKey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `lastaction` int(10) NOT NULL DEFAULT '0',
  `lastpasswordchange` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `avatar` varchar(255) DEFAULT NULL,
  `notifyType` enum('None','Digest','Instant','Threshold') DEFAULT 'Instant',
  `avatar_id` int(11) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `first_name` varchar(512) DEFAULT NULL,
  `alias_url` varchar(40) DEFAULT NULL,
  `alternate_name` varchar(512) DEFAULT NULL,
  `total_changed` int(10) DEFAULT '0',
  `level_user` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user` */

/*Table structure for table `user_group` */

DROP TABLE IF EXISTS `user_group`;

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `participants` text,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user_group` */

/*Table structure for table `user_group_message` */

DROP TABLE IF EXISTS `user_group_message`;

CREATE TABLE `user_group_message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  `createtime` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user_group_message` */

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user_role` */

/*Table structure for table `usr_privacy_setting` */

DROP TABLE IF EXISTS `usr_privacy_setting`;

CREATE TABLE `usr_privacy_setting` (
  `user_id` int(10) unsigned NOT NULL,
  `message_new_friendship` tinyint(1) NOT NULL DEFAULT '1',
  `message_new_message` tinyint(1) NOT NULL DEFAULT '1',
  `message_new_profilecomment` tinyint(1) NOT NULL DEFAULT '1',
  `appear_in_search` tinyint(1) NOT NULL DEFAULT '1',
  `show_online_status` tinyint(1) NOT NULL DEFAULT '1',
  `log_profile_visits` tinyint(1) NOT NULL DEFAULT '1',
  `ignore_users` varchar(255) DEFAULT NULL,
  `public_profile_fields` bigint(15) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usr_privacy_setting` */

insert  into `usr_privacy_setting`(`user_id`,`message_new_friendship`,`message_new_message`,`message_new_profilecomment`,`appear_in_search`,`show_online_status`,`log_profile_visits`,`ignore_users`,`public_profile_fields`) values (1,1,1,1,1,1,1,'',NULL),(2,1,1,1,1,1,1,NULL,NULL);

/*Table structure for table `usr_profile` */

DROP TABLE IF EXISTS `usr_profile`;

CREATE TABLE `usr_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `privacy` enum('protected','private','public') NOT NULL,
  `lastname` varchar(50) DEFAULT '',
  `firstname` varchar(50) DEFAULT '',
  `show_friends` tinyint(1) DEFAULT '1',
  `allow_comments` tinyint(1) DEFAULT '1',
  `email` varchar(255) NOT NULL DEFAULT '',
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `about` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `usr_profile` */

insert  into `usr_profile`(`id`,`user_id`,`timestamp`,`privacy`,`lastname`,`firstname`,`show_friends`,`allow_comments`,`email`,`street`,`city`,`about`) values (1,1,'2013-05-30 16:41:36','protected','admin','admin',1,1,'webmaster@example.com',NULL,NULL,NULL),(2,2,'2013-05-30 16:41:36','protected','demo','demo',1,1,'demo@example.com',NULL,NULL,NULL),(3,3,'0000-00-00 00:00:00','protected','panda','panda',1,1,'panda@gmail.com',NULL,NULL,NULL);

/*Table structure for table `usr_profile_comment` */

DROP TABLE IF EXISTS `usr_profile_comment`;

CREATE TABLE `usr_profile_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `createtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usr_profile_comment` */

/*Table structure for table `usr_profile_field` */

DROP TABLE IF EXISTS `usr_profile_field`;

CREATE TABLE `usr_profile_field` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `hint` text NOT NULL,
  `field_type` varchar(50) NOT NULL DEFAULT '',
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(255) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  `related_field_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`visible`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `usr_profile_field` */

insert  into `usr_profile_field`(`id`,`varname`,`title`,`hint`,`field_type`,`field_size`,`field_size_min`,`required`,`match`,`range`,`error_message`,`other_validator`,`default`,`position`,`visible`,`related_field_name`) values (1,'email','E-Mail','','VARCHAR',255,0,1,'','','','CEmailValidator','',0,3,''),(2,'firstname','First name','','VARCHAR',255,0,0,'','','','','',0,3,''),(3,'lastname','Last name','','VARCHAR',255,0,0,'','','','','',0,3,''),(4,'street','Street','','VARCHAR',255,0,0,'','','','','',0,3,''),(5,'city','City','','VARCHAR',255,0,0,'','','','','',0,3,''),(6,'about','About','','TEXT',255,0,0,'','','','','',0,3,'');

/*Table structure for table `usr_profile_field_group` */

DROP TABLE IF EXISTS `usr_profile_field_group`;

CREATE TABLE `usr_profile_field_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `position` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usr_profile_field_group` */

/*Table structure for table `usr_profile_visit` */

DROP TABLE IF EXISTS `usr_profile_visit`;

CREATE TABLE `usr_profile_visit` (
  `visitor_id` int(11) NOT NULL,
  `visited_id` int(11) NOT NULL,
  `timestamp_first_visit` int(11) NOT NULL,
  `timestamp_last_visit` int(11) NOT NULL,
  `num_of_visits` int(11) NOT NULL,
  PRIMARY KEY (`visitor_id`,`visited_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usr_profile_visit` */

/*Table structure for table `usr_translation` */

DROP TABLE IF EXISTS `usr_translation`;

CREATE TABLE `usr_translation` (
  `message` varbinary(255) NOT NULL,
  `translation` varchar(255) NOT NULL,
  `language` varchar(5) NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`message`,`language`,`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usr_translation` */

/*Table structure for table `usr_user` */

DROP TABLE IF EXISTS `usr_user`;

CREATE TABLE `usr_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `activationKey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `lastaction` int(10) NOT NULL DEFAULT '0',
  `lastpasswordchange` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `avatar` varchar(255) DEFAULT NULL,
  `notifyType` enum('None','Digest','Instant','Threshold') DEFAULT 'Instant',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `usr_user` */

insert  into `usr_user`(`id`,`username`,`password`,`activationKey`,`createtime`,`lastvisit`,`lastaction`,`lastpasswordchange`,`superuser`,`status`,`avatar`,`notifyType`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','',1369906896,1377193204,0,0,1,1,NULL,'Instant'),(2,'demo','fe01ce2a7fbac8fafaed7c982a04e229','',1369906896,0,0,0,0,1,NULL,'Instant'),(3,'panda','panda','',1369909189,0,0,0,0,1,NULL,'Instant');

/*Table structure for table `xinh_album` */

DROP TABLE IF EXISTS `xinh_album`;

CREATE TABLE `xinh_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(512) COLLATE utf8_unicode_ci DEFAULT '',
  `description` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail_id` int(10) DEFAULT NULL,
  `thumbnail_path` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` int(10) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` int(10) DEFAULT NULL,
  `sort` int(10) DEFAULT '1',
  `enabled` tinyint(1) DEFAULT '1',
  `isdefault` tinyint(1) DEFAULT '0',
  `params` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `isdeleted` tinyint(1) DEFAULT '0',
  `deleted_date` int(10) DEFAULT NULL,
  `state` int(10) DEFAULT NULL,
  `taken` int(10) DEFAULT NULL,
  `equip` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `watermask` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `xinh_album` */

/*Table structure for table `xinh_album_category` */

DROP TABLE IF EXISTS `xinh_album_category`;

CREATE TABLE `xinh_album_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `xinh_album_category` */

/*Table structure for table `xinh_album_stats` */

DROP TABLE IF EXISTS `xinh_album_stats`;

CREATE TABLE `xinh_album_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) DEFAULT '0',
  `view_count` int(11) DEFAULT '0',
  `like_count` int(11) DEFAULT '0',
  `comment_count` int(11) DEFAULT '0',
  `photos_count` int(11) DEFAULT '0',
  `favorite_count` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `xinh_album_stats` */

/*Table structure for table `xinh_category` */

DROP TABLE IF EXISTS `xinh_category`;

CREATE TABLE `xinh_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT '0',
  `type` varchar(100) NOT NULL DEFAULT '',
  `name` varchar(255) DEFAULT '',
  `description` varchar(500) DEFAULT '',
  `sort` int(10) DEFAULT '0',
  `enabled` tinyint(1) DEFAULT '0',
  `slug` varchar(125) DEFAULT NULL,
  `created_by` int(10) DEFAULT '0',
  `created_date` int(10) DEFAULT '0',
  `updated_by` int(10) DEFAULT '0',
  `updated_date` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `xinh_category` */

/*Table structure for table `xinh_comment` */

DROP TABLE IF EXISTS `xinh_comment`;

CREATE TABLE `xinh_comment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `content` text,
  `created_date` int(10) DEFAULT '0',
  `created_by` int(10) DEFAULT '0',
  `approved` tinyint(1) DEFAULT '0',
  `type_id` varchar(255) DEFAULT '',
  `item_id` int(10) DEFAULT '0',
  `like_count` int(10) DEFAULT '0',
  `photo_id` int(11) DEFAULT NULL,
  `tagger_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `xinh_comment` */

/*Table structure for table `xinh_favorite` */

DROP TABLE IF EXISTS `xinh_favorite`;

CREATE TABLE `xinh_favorite` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_id` int(10) DEFAULT '0',
  `fav_by` int(10) DEFAULT '0',
  `fav_date` int(10) DEFAULT '0',
  `type_id` varchar(100) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `xinh_favorite` */

/*Table structure for table `xinh_giftcode` */

DROP TABLE IF EXISTS `xinh_giftcode`;

CREATE TABLE `xinh_giftcode` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT '0',
  `user_id` int(10) DEFAULT '0',
  `event_id` int(10) DEFAULT '0',
  `membership_code` varchar(64) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `xinh_giftcode` */

/*Table structure for table `xinh_giftcode_events` */

DROP TABLE IF EXISTS `xinh_giftcode_events`;

CREATE TABLE `xinh_giftcode_events` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `start` int(10) DEFAULT NULL,
  `end` int(10) DEFAULT NULL,
  `created` int(10) DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT '1',
  `note` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `xinh_giftcode_events` */

/*Table structure for table `xinh_giftcode_history` */

DROP TABLE IF EXISTS `xinh_giftcode_history`;

CREATE TABLE `xinh_giftcode_history` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `content` text,
  `created` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `xinh_giftcode_history` */

/*Table structure for table `xinh_keyword` */

DROP TABLE IF EXISTS `xinh_keyword`;

CREATE TABLE `xinh_keyword` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `xinh_keyword` */

/*Table structure for table `xinh_like` */

DROP TABLE IF EXISTS `xinh_like`;

CREATE TABLE `xinh_like` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_id` int(10) DEFAULT '0',
  `like_by` int(10) DEFAULT '0',
  `like_date` int(10) DEFAULT '0',
  `type_id` varchar(100) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `xinh_like` */

/*Table structure for table `xinh_notifications` */

DROP TABLE IF EXISTS `xinh_notifications`;

CREATE TABLE `xinh_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `ownerid` int(11) DEFAULT '0',
  `owner_type` enum('user') DEFAULT 'user',
  `notification_type` int(11) DEFAULT NULL,
  `notification_data` text,
  `timestamp` int(10) DEFAULT '0',
  `last_read` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `xinh_notifications` */

/*Table structure for table `xinh_notifications_types` */

DROP TABLE IF EXISTS `xinh_notifications_types`;

CREATE TABLE `xinh_notifications_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `variables` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `xinh_notifications_types` */

/*Table structure for table `xinh_occupation` */

DROP TABLE IF EXISTS `xinh_occupation`;

CREATE TABLE `xinh_occupation` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `description` text,
  `params` text,
  `enable` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `xinh_occupation` */

/*Table structure for table `xinh_occupation_user` */

DROP TABLE IF EXISTS `xinh_occupation_user`;

CREATE TABLE `xinh_occupation_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT '0',
  `occupation_id` int(10) DEFAULT '0',
  `params` text,
  `created` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `xinh_occupation_user` */

/*Table structure for table `xinh_photo` */

DROP TABLE IF EXISTS `xinh_photo`;

CREATE TABLE `xinh_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) DEFAULT NULL,
  `title` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cache` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ext` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `width` int(10) DEFAULT NULL,
  `height` int(10) DEFAULT NULL,
  `path` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_cache` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mime` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uploaded_by` int(11) DEFAULT NULL,
  `uploaded_date` int(10) DEFAULT NULL,
  `watermask` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` tinyint(1) DEFAULT NULL,
  `url` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_x` int(10) DEFAULT '0',
  `img_y` int(10) DEFAULT '0',
  `img_width` int(10) DEFAULT '0',
  `img_height` int(10) DEFAULT '0',
  `crop_width` int(10) DEFAULT '0',
  `crop_height` int(10) DEFAULT '0',
  `sort_order` int(10) DEFAULT '0',
  `cover_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `updated_date` int(10) DEFAULT NULL,
  `server_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(512) COLLATE utf8_unicode_ci DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `xinh_photo` */

/*Table structure for table `xinh_photo_album` */

DROP TABLE IF EXISTS `xinh_photo_album`;

CREATE TABLE `xinh_photo_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` int(10) DEFAULT NULL,
  `iscover` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `xinh_photo_album` */

/*Table structure for table `xinh_photo_cache` */

DROP TABLE IF EXISTS `xinh_photo_cache`;

CREATE TABLE `xinh_photo_cache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) DEFAULT NULL,
  `photo_key` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `width` int(10) DEFAULT NULL,
  `height` int(10) DEFAULT NULL,
  `prefix` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `xinh_photo_cache` */

/*Table structure for table `xinh_photo_share` */

DROP TABLE IF EXISTS `xinh_photo_share`;

CREATE TABLE `xinh_photo_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `xinh_photo_share` */

/*Table structure for table `xinh_photo_size` */

DROP TABLE IF EXISTS `xinh_photo_size`;

CREATE TABLE `xinh_photo_size` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `width` int(10) DEFAULT NULL,
  `height` int(10) DEFAULT NULL,
  `isdefault` tinyint(1) DEFAULT '0',
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prefix` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `xinh_photo_size` */

/*Table structure for table `xinh_setting` */

DROP TABLE IF EXISTS `xinh_setting`;

CREATE TABLE `xinh_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `xinh_setting` */

/*Table structure for table `xinh_tag_category` */

DROP TABLE IF EXISTS `xinh_tag_category`;

CREATE TABLE `xinh_tag_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(10) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `xinh_tag_category` */

/*Table structure for table `xinh_tag_category_friend` */

DROP TABLE IF EXISTS `xinh_tag_category_friend`;

CREATE TABLE `xinh_tag_category_friend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT '0',
  `updated_date` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `xinh_tag_category_friend` */

/*Table structure for table `xinh_widget` */

DROP TABLE IF EXISTS `xinh_widget`;

CREATE TABLE `xinh_widget` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `class` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `xinh_widget` */

/*Table structure for table `xinh_widget_section` */

DROP TABLE IF EXISTS `xinh_widget_section`;

CREATE TABLE `xinh_widget_section` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `widget_id` int(10) NOT NULL DEFAULT '0',
  `section_id` int(10) DEFAULT '0',
  `position` varchar(50) DEFAULT '',
  `sort` int(10) DEFAULT '0',
  `params` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `xinh_widget_section` */

/* Procedure structure for procedure `update_data` */

/*!50003 DROP PROCEDURE IF EXISTS  `update_data` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`xinh`@`%` PROCEDURE `update_data`()
BEGIN
	DECLARE valbum_id, vtotal,vdone INT;
	
	DECLARE datas CURSOR FOR
		SELECT album_id,COUNT(photo_id)
		FROM xinh_photo_album
		GROUP BY `album_id`;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET vdone = 1;
	
	OPEN datas;
	loop_data:LOOP
		FETCH datas INTO valbum_id, vtotal;
		IF (vdone = 1) THEN
			CLOSE datas;
			LEAVE loop_data;
		END IF;
		
		IF (EXISTS(SELECT * FROM xinh_album_stats WHERE album_id = valbum_id)) THEN
			UPDATE xinh_album_stats
			SET photos_count = vtotal
			WHERE album_id = valbum_id;
		ELSE
			INSERT INTO xinh_album_stats (album_id, photos_count)
			VALUES (valbum_id, vtotal);
		END IF;
		
	END LOOP loop_data;
				
END */$$
DELIMITER ;

/* Procedure structure for procedure `update_totalPhotoStats` */

/*!50003 DROP PROCEDURE IF EXISTS  `update_totalPhotoStats` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`xinh`@`%` PROCEDURE `update_totalPhotoStats`(IN falbum_id INT)
BEGIN
	DECLARE vtotal INT;
	SELECT IFNULL(COUNT(photo_id),0) INTO vtotal
	FROM xinh_photo_album
	WHERE album_id = falbum_id
	GROUP BY `album_id`;
	
	IF (EXISTS(SELECT * FROM xinh_album_stats WHERE album_id = falbum_id)) THEN
		UPDATE xinh_album_stats
		SET photos_count = vtotal
		WHERE album_id = falbum_id;
	ELSE
		INSERT INTO xinh_album_stats (album_id, photos_count)
		VALUES (falbum_id, vtotal);
	END IF;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
