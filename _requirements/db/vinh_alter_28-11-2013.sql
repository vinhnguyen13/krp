/*
SQLyog Ultimate v10.42 
MySQL - 5.5.16 : Database - krp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`krp` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `krp`;

/*Table structure for table `usr_badge_config` */

DROP TABLE IF EXISTS `usr_badge_config`;

CREATE TABLE `usr_badge_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `total_like` int(10) DEFAULT NULL,
  `total_comment` int(10) DEFAULT NULL,
  `total_following` int(10) DEFAULT NULL,
  `total_friend` int(10) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT '1',
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `usr_badge_config` */

insert  into `usr_badge_config`(`id`,`title`,`description`,`total_like`,`total_comment`,`total_following`,`total_friend`,`image`,`enable`,`type`) values (1,'Huy chuong chi','Huy chuong chi',5,5,5,5,'',1,''),(2,'Huy chuong dong','Huy chuong dong',10,10,10,10,'',1,''),(3,'Huy chuong bac','Huy chuong bac',15,15,15,15,'',1,''),(4,'Huy chuong vang','Huy chuong vang',20,20,20,20,'',1,'');

/*Table structure for table `usr_badge_stats` */

DROP TABLE IF EXISTS `usr_badge_stats`;

CREATE TABLE `usr_badge_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `total_like` int(10) DEFAULT '0',
  `total_comment` int(10) DEFAULT '0',
  `total_following` int(10) DEFAULT '0',
  `total_friend` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `usr_badge_stats` */

insert  into `usr_badge_stats`(`id`,`user_id`,`total_like`,`total_comment`,`total_following`,`total_friend`) values (1,2,12,6,7,8);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
