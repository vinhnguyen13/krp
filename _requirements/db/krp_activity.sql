/*
SQLyog Ultimate v10.42 
MySQL - 5.5.16 : Database - krp_activity
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`krp_activity` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `krp_activity`;

/*Table structure for table `activities` */

DROP TABLE IF EXISTS `activities`;

CREATE TABLE `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action` tinyint(4) DEFAULT NULL,
  `message` mediumtext COLLATE utf8_unicode_ci,
  `params` mediumtext COLLATE utf8_unicode_ci,
  `ip_address` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  `object_id` int(11) DEFAULT '0',
  `owner_id` int(10) unsigned DEFAULT NULL,
  `owner_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `activities` */

insert  into `activities`(`id`,`user_id`,`user_name`,`action`,`message`,`params`,`ip_address`,`timestamp`,`object_id`,`owner_id`,`owner_name`,`group_id`) values (1,2,'vinhnguyen',1,'{user} picked {article}','{\"{user}\":\"vinhnguyen\",\"{article}\":\"70\"}','127.0.0.1',1384618340,NULL,2,'vinhnguyen',0),(2,2,'vinhnguyen',1,'{user} picked {article}','{\"{user}\":\"vinhnguyen\",\"{article}\":\"70\"}','127.0.0.1',1384618375,NULL,2,'vinhnguyen',0);

/*Table structure for table `activities_stats` */

DROP TABLE IF EXISTS `activities_stats`;

CREATE TABLE `activities_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_id` int(11) DEFAULT NULL,
  `like_count` int(11) DEFAULT '0',
  `comment_count` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `activities_stats` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
