/************16-11-2013*************/
CREATE TABLE `sys_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `ownerid` int(11) DEFAULT '0',
  `owner_type` enum('user') DEFAULT 'user',
  `notification_type` int(11) DEFAULT NULL,
  `notification_data` text,
  `timestamp` int(10) DEFAULT '0',
  `last_read` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `sys_pickto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0:unpick, 1:pick',
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `sys_notifications_types`;

CREATE TABLE `sys_notifications_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `variables` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*Data for the table `sys_notifications_types` */

insert  into `sys_notifications_types`(`id`,`parent_id`,`variables`,`name`,`description`) values (1,0,'NOTIFI_COMMENT_WALL','Comment wall','Comment wall'),(2,0,'NOTIFI_LIKE_WALL','Like wall','Like wall');
