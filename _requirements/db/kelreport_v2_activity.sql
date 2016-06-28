/*
Navicat MySQL Data Transfer

Source Server         : 103.3.244.56
Source Server Version : 50539
Source Host           : 103.3.244.56:3306
Source Database       : kelreport_v2_activity

Target Server Type    : MYSQL
Target Server Version : 50539
File Encoding         : 65001

Date: 2016-06-09 14:58:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for activities
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of activities
-- ----------------------------
INSERT INTO `activities` VALUES ('1', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"34\"}', '123.30.165.40', '1388301543', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('2', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"35\"}', '123.30.165.40', '1388301631', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('3', '17', 'kelvin@dwm.vn', '1', '{user} {status} {article}', '{\"{user}\":\"kelvin@dwm.vn\",\"{article}\":\"27\"}', '118.143.5.5', '1388833077', null, '17', 'kelvin@dwm.vn', '0');
INSERT INTO `activities` VALUES ('4', '1', 'admin', '2', '{user} {status} {product}', '{\"{user}\":\"admin\",\"{product}\":\"98\"}', '180.93.240.2', '1389612844', null, '1', 'admin', '0');
INSERT INTO `activities` VALUES ('5', '17', 'kelvin@dwm.vn', '2', '{user} {status} {product}', '{\"{user}\":\"kelvin@dwm.vn\",\"{product}\":\"101\"}', '203.99.232.82', '1389761458', null, '17', 'kelvin@dwm.vn', '0');
INSERT INTO `activities` VALUES ('6', '19', 'bredacedric@hotmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"bredacedric@hotmail.com\",\"{product}\":\"79\"}', '115.76.220.79', '1390274602', null, '19', 'bredacedric@hotmail.com', '0');
INSERT INTO `activities` VALUES ('7', '19', 'bredacedric@hotmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"bredacedric@hotmail.com\",\"{product}\":\"77\"}', '115.76.220.79', '1390274611', null, '19', 'bredacedric@hotmail.com', '0');
INSERT INTO `activities` VALUES ('8', '19', 'bredacedric@hotmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"bredacedric@hotmail.com\",\"{product}\":\"81\"}', '115.76.220.79', '1390274620', null, '19', 'bredacedric@hotmail.com', '0');
INSERT INTO `activities` VALUES ('9', '19', 'bredacedric@hotmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"bredacedric@hotmail.com\",\"{product}\":\"91\"}', '115.76.220.79', '1390275009', null, '19', 'bredacedric@hotmail.com', '0');
INSERT INTO `activities` VALUES ('10', '19', 'bredacedric@hotmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"bredacedric@hotmail.com\",\"{product}\":\"68\"}', '115.76.220.79', '1390275035', null, '19', 'bredacedric@hotmail.com', '0');
INSERT INTO `activities` VALUES ('11', '19', 'bredacedric@hotmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"bredacedric@hotmail.com\",\"{product}\":\"53\"}', '115.76.220.79', '1390275074', null, '19', 'bredacedric@hotmail.com', '0');
INSERT INTO `activities` VALUES ('12', '17', 'kelvin@dwm.vn', '2', '{user} {status} {product}', '{\"{user}\":\"kelvin@dwm.vn\",\"{product}\":\"103\"}', '203.99.232.82', '1390277646', null, '17', 'kelvin@dwm.vn', '0');
INSERT INTO `activities` VALUES ('13', '5', 'q9.spirit@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"q9.spirit@gmail.com\",\"{product}\":\"103\"}', '116.193.72.218', '1390278330', null, '5', 'q9.spirit@gmail.com', '0');
INSERT INTO `activities` VALUES ('14', '4', 'quangvinhit2007@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"quangvinhit2007@gmail.com\",\"{product}\":\"103\"}', '180.93.240.116', '1390278379', null, '4', 'quangvinhit2007@gmail.com', '0');
INSERT INTO `activities` VALUES ('15', '5', 'q9.spirit@gmail.com', '1', '{user} {status} {article}', '{\"{user}\":\"q9.spirit@gmail.com\",\"{article}\":\"80\"}', '116.193.72.218', '1390278490', null, '5', 'q9.spirit@gmail.com', '0');
INSERT INTO `activities` VALUES ('16', '1', 'admin', '1', '{user} {status} {article}', '{\"{user}\":\"admin\",\"{article}\":\"103\"}', '116.193.72.218', '1390281865', null, '1', 'admin', '0');
INSERT INTO `activities` VALUES ('17', '1', 'admin', '2', '{user} {status} {product}', '{\"{user}\":\"admin\",\"{product}\":\"103\"}', '116.193.72.218', '1390281873', null, '1', 'admin', '0');
INSERT INTO `activities` VALUES ('18', '20', 'hoang.kal@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"hoang.kal@gmail.com\",\"{product}\":\"80\"}', '180.93.240.116', '1390282061', null, '20', 'hoang.kal@gmail.com', '0');
INSERT INTO `activities` VALUES ('19', '20', 'hoang.kal@gmail.com', '1', '{user} {status} {article}', '{\"{user}\":\"hoang.kal@gmail.com\",\"{article}\":\"81\"}', '180.93.240.116', '1390282167', null, '20', 'hoang.kal@gmail.com', '0');
INSERT INTO `activities` VALUES ('20', '20', 'hoang.kal@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"hoang.kal@gmail.com\",\"{product}\":\"81\"}', '180.93.240.116', '1390282235', null, '20', 'hoang.kal@gmail.com', '0');
INSERT INTO `activities` VALUES ('21', '22', 'tataem@yahoo.com', '2', '{user} {status} {product}', '{\"{user}\":\"tataem@yahoo.com\",\"{product}\":\"93\"}', '180.93.240.170', '1390283260', null, '22', 'tataem@yahoo.com', '0');
INSERT INTO `activities` VALUES ('22', '24', 'ruby_vi1907@yahoo.com', '2', '{user} {status} {product}', '{\"{user}\":\"ruby_vi1907@yahoo.com\",\"{product}\":\"93\"}', '180.93.240.170', '1390283313', null, '24', 'ruby_vi1907@yahoo.com', '0');
INSERT INTO `activities` VALUES ('23', '5', 'q9.spirit@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"q9.spirit@gmail.com\",\"{product}\":\"80\"}', '116.193.72.218', '1390376559', null, '5', 'q9.spirit@gmail.com', '0');
INSERT INTO `activities` VALUES ('24', '5', 'q9.spirit@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"q9.spirit@gmail.com\",\"{product}\":\"94\"}', '116.193.72.218', '1390378932', null, '5', 'q9.spirit@gmail.com', '0');
INSERT INTO `activities` VALUES ('25', '27', 'james@kelreport.com', '2', '{user} {status} {product}', '{\"{user}\":\"james@kelreport.com\",\"{product}\":\"103\"}', '180.93.240.170', '1390445295', null, '27', 'james@kelreport.com', '0');
INSERT INTO `activities` VALUES ('26', '17', 'kelvin@dwm.vn', '2', '{user} {status} {product}', '{\"{user}\":\"kelvin@dwm.vn\",\"{product}\":\"113\"}', '180.93.240.44', '1392882116', null, '17', 'kelvin@dwm.vn', '0');
INSERT INTO `activities` VALUES ('27', '30', 'thiennhi.b@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"thiennhi.b@gmail.com\",\"{product}\":\"112\"}', '180.93.240.147', '1393227042', null, '30', 'thiennhi.b@gmail.com', '0');
INSERT INTO `activities` VALUES ('28', '31', 'thao@kelreport.com', '2', '{user} {status} {product}', '{\"{user}\":\"thao@kelreport.com\",\"{product}\":\"112\"}', '180.93.240.147', '1393229324', null, '31', 'thao@kelreport.com', '0');
INSERT INTO `activities` VALUES ('29', '30', 'thiennhi.b@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"thiennhi.b@gmail.com\",\"{product}\":\"106\"}', '180.93.240.147', '1393229645', null, '30', 'thiennhi.b@gmail.com', '0');
INSERT INTO `activities` VALUES ('30', '32', 'allen7james@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"allen7james@gmail.com\",\"{product}\":\"77\"}', '180.93.240.147', '1393229946', null, '32', 'allen7james@gmail.com', '0');
INSERT INTO `activities` VALUES ('31', '32', 'allen7james@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"allen7james@gmail.com\",\"{product}\":\"81\"}', '180.93.240.147', '1393230853', null, '32', 'allen7james@gmail.com', '0');
INSERT INTO `activities` VALUES ('32', '32', 'allen7james@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"allen7james@gmail.com\",\"{product}\":\"111\"}', '180.93.240.147', '1393230873', null, '32', 'allen7james@gmail.com', '0');
INSERT INTO `activities` VALUES ('33', '31', 'thao@kelreport.com', '2', '{user} {status} {product}', '{\"{user}\":\"thao@kelreport.com\",\"{product}\":\"63\"}', '180.93.240.147', '1393230916', null, '31', 'thao@kelreport.com', '0');
INSERT INTO `activities` VALUES ('34', '31', 'thao@kelreport.com', '2', '{user} {status} {product}', '{\"{user}\":\"thao@kelreport.com\",\"{product}\":\"106\"}', '180.93.240.147', '1393232546', null, '31', 'thao@kelreport.com', '0');
INSERT INTO `activities` VALUES ('35', '33', 'vi@kelreport.com', '2', '{user} {status} {product}', '{\"{user}\":\"vi@kelreport.com\",\"{product}\":\"117\"}', '180.93.240.147', '1393323319', null, '33', 'vi@kelreport.com', '0');
INSERT INTO `activities` VALUES ('36', '30', 'thiennhi', '2', '{user} {status} {product}', '{\"{user}\":\"thiennhi\",\"{product}\":\"119\"}', '180.93.240.161', '1393905212', null, '30', 'thiennhi', '0');
INSERT INTO `activities` VALUES ('37', '30', 'thiennhi', '2', '{user} {status} {product}', '{\"{user}\":\"thiennhi\",\"{product}\":\"127\"}', '180.93.240.97', '1394512987', null, '30', 'thiennhi', '0');
INSERT INTO `activities` VALUES ('38', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"127\"}', '180.93.240.51', '1394704908', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('39', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"126\"}', '180.93.240.51', '1394704917', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('40', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"128\"}', '180.93.240.51', '1394704922', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('41', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"125\"}', '180.93.240.51', '1394704926', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('42', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"105\"}', '180.93.240.51', '1394704929', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('43', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"133\"}', '180.93.240.51', '1395218438', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('44', '30', 'thiennhi', '2', '{user} {status} {product}', '{\"{user}\":\"thiennhi\",\"{product}\":\"140\"}', '180.93.240.97', '1395285944', null, '30', 'thiennhi', '0');
INSERT INTO `activities` VALUES ('45', '30', 'thiennhi', '2', '{user} {status} {product}', '{\"{user}\":\"thiennhi\",\"{product}\":\"51\"}', '180.93.240.97', '1395309492', null, '30', 'thiennhi', '0');
INSERT INTO `activities` VALUES ('46', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"109\"}', '180.93.240.51', '1395814799', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('47', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"143\"}', '180.93.240.51', '1395814822', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('48', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"146\"}', '180.93.240.51', '1395814858', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('49', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"136\"}', '180.93.240.51', '1395814930', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('50', '28', 'vodinh_thanh@yahoo.com.vn', '1', '{user} {status} {article}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{article}\":\"112\"}', '180.93.240.51', '1395910749', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('51', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"112\"}', '180.93.240.51', '1395910944', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('52', '38', 'dien@dwm.vn', '1', '{user} {status} {article}', '{\"{user}\":\"dien@dwm.vn\",\"{article}\":\"116\"}', '180.93.240.51', '1396410591', null, '38', 'dien@dwm.vn', '0');
INSERT INTO `activities` VALUES ('53', '38', 'dien@dwm.vn', '2', '{user} {status} {product}', '{\"{user}\":\"dien@dwm.vn\",\"{product}\":\"116\"}', '180.93.240.51', '1396410641', null, '38', 'dien@dwm.vn', '0');
INSERT INTO `activities` VALUES ('54', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"164\"}', '180.93.240.51', '1397620907', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('55', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"160\"}', '180.93.240.51', '1397621476', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('56', '31', 'ThaoTran', '2', '{user} {status} {product}', '{\"{user}\":\"ThaoTran\",\"{product}\":\"165\"}', '180.93.240.87', '1397788840', null, '31', 'ThaoTran', '0');
INSERT INTO `activities` VALUES ('57', '31', 'ThaoTran', '2', '{user} {status} {product}', '{\"{user}\":\"ThaoTran\",\"{product}\":\"164\"}', '180.93.240.87', '1397788887', null, '31', 'ThaoTran', '0');
INSERT INTO `activities` VALUES ('58', '31', 'ThaoTran', '2', '{user} {status} {product}', '{\"{user}\":\"ThaoTran\",\"{product}\":\"168\"}', '180.93.240.51', '1397808080', null, '31', 'ThaoTran', '0');
INSERT INTO `activities` VALUES ('59', '31', 'ThaoTran', '2', '{user} {status} {product}', '{\"{user}\":\"ThaoTran\",\"{product}\":\"51\"}', '180.93.240.51', '1397808158', null, '31', 'ThaoTran', '0');
INSERT INTO `activities` VALUES ('60', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"120\"}', '180.93.240.51', '1398335848', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('61', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"163\"}', '180.93.240.51', '1398336984', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('62', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"169\"}', '180.93.240.180', '1398413664', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('63', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"172\"}', '180.93.240.117', '1399268610', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('64', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"169\"}', '180.93.240.117', '1399274528', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('65', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"167\"}', '180.93.240.117', '1399278993', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('66', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"93\"}', '180.93.240.117', '1399347464', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('67', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"174\"}', '180.93.240.117', '1399348395', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('68', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"133\"}', '180.93.240.117', '1399348429', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('69', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"112\"}', '180.93.240.117', '1399348997', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('70', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"168\"}', '180.93.240.117', '1399540200', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('71', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"166\"}', '180.93.240.117', '1399540207', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('72', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"165\"}', '180.93.240.117', '1399540209', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('73', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"171\"}', '180.93.240.117', '1399540304', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('74', '45', 'abc@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"abc@gmail.com\",\"{product}\":\"172\"}', '180.93.240.117', '1399971872', null, '45', 'abc@gmail.com', '0');
INSERT INTO `activities` VALUES ('75', '45', 'abc@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"abc@gmail.com\",\"{product}\":\"175\"}', '180.93.240.117', '1399971905', null, '45', 'abc@gmail.com', '0');
INSERT INTO `activities` VALUES ('76', '45', 'abc@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"abc@gmail.com\",\"{product}\":\"174\"}', '180.93.240.117', '1399971932', null, '45', 'abc@gmail.com', '0');
INSERT INTO `activities` VALUES ('77', '45', 'abc@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"abc@gmail.com\",\"{product}\":\"173\"}', '180.93.240.117', '1399972339', null, '45', 'abc@gmail.com', '0');
INSERT INTO `activities` VALUES ('78', '45', 'abc@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"abc@gmail.com\",\"{product}\":\"171\"}', '180.93.240.117', '1399972405', null, '45', 'abc@gmail.com', '0');
INSERT INTO `activities` VALUES ('79', '45', 'abc@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"abc@gmail.com\",\"{product}\":\"109\"}', '180.93.240.117', '1399972411', null, '45', 'abc@gmail.com', '0');
INSERT INTO `activities` VALUES ('80', '45', 'abc@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"abc@gmail.com\",\"{product}\":\"104\"}', '180.93.240.117', '1399972422', null, '45', 'abc@gmail.com', '0');
INSERT INTO `activities` VALUES ('81', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"164\"}', '180.93.240.117', '1399972563', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('82', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"172\"}', '180.93.240.117', '1399972592', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('83', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"171\"}', '180.93.240.117', '1399972608', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('84', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"126\"}', '180.93.240.117', '1399973274', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('85', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"108\"}', '180.93.240.117', '1399973302', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('86', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"110\"}', '180.93.240.117', '1399973304', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('87', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"101\"}', '180.93.240.117', '1399973483', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('88', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"100\"}', '180.93.240.117', '1399973485', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('89', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"97\"}', '180.93.240.117', '1399973488', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('90', '47', 'quangvinhit2010@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"quangvinhit2010@gmail.com\",\"{product}\":\"174\"}', '180.93.240.117', '1400064612', null, '47', 'quangvinhit2010@gmail.com', '0');
INSERT INTO `activities` VALUES ('91', '47', 'quangvinhit2010@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"quangvinhit2010@gmail.com\",\"{product}\":\"172\"}', '180.93.240.117', '1400065488', null, '47', 'quangvinhit2010@gmail.com', '0');
INSERT INTO `activities` VALUES ('92', '46', 'test1@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"test1@gmail.com\",\"{product}\":\"124\"}', '180.93.240.117', '1400130891', null, '46', 'test1@gmail.com', '0');
INSERT INTO `activities` VALUES ('93', '46', 'test1@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"test1@gmail.com\",\"{product}\":\"83\"}', '180.93.240.117', '1400131006', null, '46', 'test1@gmail.com', '0');
INSERT INTO `activities` VALUES ('94', '46', 'test1@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"test1@gmail.com\",\"{product}\":\"103\"}', '180.93.240.117', '1400147415', null, '46', 'test1@gmail.com', '0');
INSERT INTO `activities` VALUES ('95', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"168\"}', '180.93.240.117', '1400239475', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('96', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"109\"}', '180.93.240.117', '1400239514', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('97', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"181\"}', '180.93.240.117', '1400556365', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('98', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"182\"}', '180.93.240.117', '1400556383', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('99', '52', 'everlasting_camelot@yahoo.com', '2', '{user} {status} {product}', '{\"{user}\":\"everlasting_camelot@yahoo.com\",\"{product}\":\"172\"}', '183.91.31.22', '1400557191', null, '52', 'everlasting_camelot@yahoo.com', '0');
INSERT INTO `activities` VALUES ('100', '52', 'everlasting_camelot@yahoo.com', '2', '{user} {status} {product}', '{\"{user}\":\"everlasting_camelot@yahoo.com\",\"{product}\":\"131\"}', '183.91.31.22', '1400557212', null, '52', 'everlasting_camelot@yahoo.com', '0');
INSERT INTO `activities` VALUES ('101', '52', 'everlasting_camelot@yahoo.com', '2', '{user} {status} {product}', '{\"{user}\":\"everlasting_camelot@yahoo.com\",\"{product}\":\"133\"}', '183.91.31.22', '1400566308', null, '52', 'everlasting_camelot@yahoo.com', '0');
INSERT INTO `activities` VALUES ('102', '53', 'sidchung90@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"sidchung90@gmail.com\",\"{product}\":\"169\"}', '180.93.240.39', '1400566400', null, '53', 'sidchung90@gmail.com', '0');
INSERT INTO `activities` VALUES ('103', '53', 'sidchung90@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"sidchung90@gmail.com\",\"{product}\":\"177\"}', '180.93.240.39', '1400566497', null, '53', 'sidchung90@gmail.com', '0');
INSERT INTO `activities` VALUES ('104', '52', 'everlasting_camelot@yahoo.com', '2', '{user} {status} {product}', '{\"{user}\":\"everlasting_camelot@yahoo.com\",\"{product}\":\"111\"}', '183.91.31.22', '1400566632', null, '52', 'everlasting_camelot@yahoo.com', '0');
INSERT INTO `activities` VALUES ('105', '52', 'everlasting_camelot@yahoo.com', '2', '{user} {status} {product}', '{\"{user}\":\"everlasting_camelot@yahoo.com\",\"{product}\":\"181\"}', '183.91.31.22', '1400566652', null, '52', 'everlasting_camelot@yahoo.com', '0');
INSERT INTO `activities` VALUES ('106', '52', 'everlasting_camelot@yahoo.com', '2', '{user} {status} {product}', '{\"{user}\":\"everlasting_camelot@yahoo.com\",\"{product}\":\"112\"}', '183.91.31.22', '1400566718', null, '52', 'everlasting_camelot@yahoo.com', '0');
INSERT INTO `activities` VALUES ('107', '52', 'everlasting_camelot@yahoo.com', '2', '{user} {status} {product}', '{\"{user}\":\"everlasting_camelot@yahoo.com\",\"{product}\":\"157\"}', '183.91.31.22', '1400566775', null, '52', 'everlasting_camelot@yahoo.com', '0');
INSERT INTO `activities` VALUES ('108', '52', 'everlasting_camelot@yahoo.com', '2', '{user} {status} {product}', '{\"{user}\":\"everlasting_camelot@yahoo.com\",\"{product}\":\"175\"}', '183.91.31.22', '1400566817', null, '52', 'everlasting_camelot@yahoo.com', '0');
INSERT INTO `activities` VALUES ('109', '52', 'everlasting_camelot@yahoo.com', '2', '{user} {status} {product}', '{\"{user}\":\"everlasting_camelot@yahoo.com\",\"{product}\":\"77\"}', '183.91.31.22', '1400566840', null, '52', 'everlasting_camelot@yahoo.com', '0');
INSERT INTO `activities` VALUES ('110', '54', 'tranghi1304@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"tranghi1304@gmail.com\",\"{product}\":\"177\"}', '180.93.240.39', '1400569483', null, '54', 'tranghi1304@gmail.com', '0');
INSERT INTO `activities` VALUES ('111', '4', 'quangvinhit2007@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"quangvinhit2007@gmail.com\",\"{product}\":\"143\"}', '180.93.240.117', '1400570347', null, '4', 'quangvinhit2007@gmail.com', '0');
INSERT INTO `activities` VALUES ('112', '4', 'quangvinhit2007@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"quangvinhit2007@gmail.com\",\"{product}\":\"107\"}', '180.93.240.117', '1400573724', null, '4', 'quangvinhit2007@gmail.com', '0');
INSERT INTO `activities` VALUES ('113', '8', 'milano_hung@yahoo.com', '2', '{user} {status} {product}', '{\"{user}\":\"milano_hung@yahoo.com\",\"{product}\":\"185\"}', '180.93.240.39', '1400583420', null, '8', 'milano_hung@yahoo.com', '0');
INSERT INTO `activities` VALUES ('114', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"185\"}', '180.93.240.117', '1400583753', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('115', '47', 'quangvinhit2010@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"quangvinhit2010@gmail.com\",\"{product}\":\"185\"}', '180.93.240.117', '1400583790', null, '47', 'quangvinhit2010@gmail.com', '0');
INSERT INTO `activities` VALUES ('116', '53', 'sidchung90@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"sidchung90@gmail.com\",\"{product}\":\"183\"}', '180.93.240.39', '1400644866', null, '53', 'sidchung90@gmail.com', '0');
INSERT INTO `activities` VALUES ('117', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"183\"}', '180.93.240.117', '1400645914', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('118', '54', 'tranghi1304@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"tranghi1304@gmail.com\",\"{product}\":\"184\"}', '180.93.240.39', '1400744433', null, '54', 'tranghi1304@gmail.com', '0');
INSERT INTO `activities` VALUES ('119', '61', 'hoangdien0404', '2', '{user} {status} {product}', '{\"{user}\":\"hoangdien0404\",\"{product}\":\"174\"}', '180.93.240.117', '1400755527', null, '61', 'hoangdien0404', '0');
INSERT INTO `activities` VALUES ('120', '61', 'hoangdien0404', '2', '{user} {status} {product}', '{\"{user}\":\"hoangdien0404\",\"{product}\":\"183\"}', '180.93.240.117', '1400755537', null, '61', 'hoangdien0404', '0');
INSERT INTO `activities` VALUES ('121', '61', 'hoangdien0404', '2', '{user} {status} {product}', '{\"{user}\":\"hoangdien0404\",\"{product}\":\"113\"}', '180.93.240.117', '1400755547', null, '61', 'hoangdien0404', '0');
INSERT INTO `activities` VALUES ('122', '62', 'williams1986vn', '2', '{user} {status} {product}', '{\"{user}\":\"williams1986vn\",\"{product}\":\"116\"}', '180.93.240.13', '1400828434', null, '62', 'williams1986vn', '0');
INSERT INTO `activities` VALUES ('123', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"188\"}', '180.93.240.117', '1400831413', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('124', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"187\"}', '180.93.240.117', '1400831540', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('125', '53', 'sidchung90@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"sidchung90@gmail.com\",\"{product}\":\"188\"}', '180.93.240.13', '1400831606', null, '53', 'sidchung90@gmail.com', '0');
INSERT INTO `activities` VALUES ('126', '53', 'sidchung90@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"sidchung90@gmail.com\",\"{product}\":\"187\"}', '180.93.240.13', '1400831769', null, '53', 'sidchung90@gmail.com', '0');
INSERT INTO `activities` VALUES ('127', '53', 'sidchung90@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"sidchung90@gmail.com\",\"{product}\":\"189\"}', '180.93.240.13', '1401071812', null, '53', 'sidchung90@gmail.com', '0');
INSERT INTO `activities` VALUES ('128', '53', 'sidchung90@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"sidchung90@gmail.com\",\"{product}\":\"191\"}', '180.93.240.13', '1401093450', null, '53', 'sidchung90@gmail.com', '0');
INSERT INTO `activities` VALUES ('129', '8', 'milano_hung@yahoo.com', '2', '{user} {status} {product}', '{\"{user}\":\"milano_hung@yahoo.com\",\"{product}\":\"191\"}', '180.93.240.13', '1401093953', null, '8', 'milano_hung@yahoo.com', '0');
INSERT INTO `activities` VALUES ('130', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"182\"}', '180.93.240.30', '1401097046', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('131', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"191\"}', '180.93.240.30', '1401097302', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('132', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"187\"}', '180.93.240.30', '1401097397', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('133', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"189\"}', '180.93.240.30', '1401097440', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('134', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"190\"}', '180.93.240.30', '1401097442', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('135', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"184\"}', '180.93.240.30', '1401097491', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('136', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"186\"}', '180.93.240.30', '1401097523', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('137', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"175\"}', '180.93.240.30', '1401097552', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('138', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"191\"}', '180.93.240.30', '1401185938', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('139', '43', 'vboy1602@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"vboy1602@gmail.com\",\"{product}\":\"192\"}', '180.93.240.30', '1401185949', null, '43', 'vboy1602@gmail.com', '0');
INSERT INTO `activities` VALUES ('140', '52', 'everlasting_camelot@yahoo.com', '2', '{user} {status} {product}', '{\"{user}\":\"everlasting_camelot@yahoo.com\",\"{product}\":\"193\"}', '183.91.31.22', '1401249337', null, '52', 'everlasting_camelot@yahoo.com', '0');
INSERT INTO `activities` VALUES ('141', '65', 'hoa1090', '2', '{user} {status} {product}', '{\"{user}\":\"hoa1090\",\"{product}\":\"193\"}', '103.3.249.226', '1401251073', null, '65', 'hoa1090', '0');
INSERT INTO `activities` VALUES ('142', '50', 'quachtuanlenh@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"quachtuanlenh@gmail.com\",\"{product}\":\"191\"}', '180.93.240.30', '1401265229', null, '50', 'quachtuanlenh@gmail.com', '0');
INSERT INTO `activities` VALUES ('143', '53', 'sidchung90@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"sidchung90@gmail.com\",\"{product}\":\"195\"}', '180.93.240.13', '1401331403', null, '53', 'sidchung90@gmail.com', '0');
INSERT INTO `activities` VALUES ('144', '54', 'tranghi1304@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"tranghi1304@gmail.com\",\"{product}\":\"195\"}', '180.93.240.13', '1401333125', null, '54', 'tranghi1304@gmail.com', '0');
INSERT INTO `activities` VALUES ('145', '8', 'milano_hung@yahoo.com', '2', '{user} {status} {product}', '{\"{user}\":\"milano_hung@yahoo.com\",\"{product}\":\"198\"}', '180.93.240.13', '1401444039', null, '8', 'milano_hung@yahoo.com', '0');
INSERT INTO `activities` VALUES ('146', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"143\"}', '1.53.111.141', '1401472903', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('147', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"195\"}', '1.53.111.141', '1401472993', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('148', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"194\"}', '1.53.111.141', '1401473023', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('149', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"127\"}', '1.53.111.141', '1401473031', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('150', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"190\"}', '1.53.111.141', '1401473043', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('151', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"188\"}', '1.53.111.141', '1401473070', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('152', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"182\"}', '1.53.111.141', '1401473080', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('153', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"177\"}', '1.53.111.141', '1401482226', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('154', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"180\"}', '1.53.111.141', '1401482242', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('155', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"193\"}', '1.53.111.141', '1401482256', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('156', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"172\"}', '1.53.111.141', '1401482268', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('157', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"187\"}', '1.53.111.141', '1401482298', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('158', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"174\"}', '1.53.111.141', '1401482378', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('159', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"167\"}', '1.53.111.141', '1401482392', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('160', '2', 'vinhnguyen', '2', '{user} {status} {product}', '{\"{user}\":\"vinhnguyen\",\"{product}\":\"136\"}', '1.53.111.141', '1401482401', null, '2', 'vinhnguyen', '0');
INSERT INTO `activities` VALUES ('161', '66', 'quangloc93', '2', '{user} {status} {product}', '{\"{user}\":\"quangloc93\",\"{product}\":\"199\"}', '180.93.240.13', '1401694242', null, '66', 'quangloc93', '0');
INSERT INTO `activities` VALUES ('162', '66', 'quangloc93', '2', '{user} {status} {product}', '{\"{user}\":\"quangloc93\",\"{product}\":\"195\"}', '180.93.240.13', '1401694298', null, '66', 'quangloc93', '0');
INSERT INTO `activities` VALUES ('163', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"199\"}', '180.93.240.30', '1401786749', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('164', '52', 'everlasting_camelot@yahoo.com', '2', '{user} {status} {product}', '{\"{user}\":\"everlasting_camelot@yahoo.com\",\"{product}\":\"201\"}', '113.161.65.63', '1401867309', null, '52', 'everlasting_camelot@yahoo.com', '0');
INSERT INTO `activities` VALUES ('165', '37', 'quocdung2012@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"quocdung2012@gmail.com\",\"{product}\":\"203\"}', '180.93.240.134', '1401870049', null, '37', 'quocdung2012@gmail.com', '0');
INSERT INTO `activities` VALUES ('166', '37', 'quocdung2012@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"quocdung2012@gmail.com\",\"{product}\":\"200\"}', '180.93.240.134', '1401870160', null, '37', 'quocdung2012@gmail.com', '0');
INSERT INTO `activities` VALUES ('167', '66', 'quangloc93', '2', '{user} {status} {product}', '{\"{user}\":\"quangloc93\",\"{product}\":\"205\"}', '180.93.240.13', '1401876518', null, '66', 'quangloc93', '0');
INSERT INTO `activities` VALUES ('168', '66', 'quangloc93', '2', '{user} {status} {product}', '{\"{user}\":\"quangloc93\",\"{product}\":\"206\"}', '180.93.240.13', '1401876549', null, '66', 'quangloc93', '0');
INSERT INTO `activities` VALUES ('169', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"205\"}', '27.75.57.213', '1401893457', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('170', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"203\"}', '27.75.57.213', '1401893535', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('171', '66', 'quangloc93', '2', '{user} {status} {product}', '{\"{user}\":\"quangloc93\",\"{product}\":\"203\"}', '180.93.240.13', '1401945072', null, '66', 'quangloc93', '0');
INSERT INTO `activities` VALUES ('172', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"209\"}', '27.75.57.213', '1402121029', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('173', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"208\"}', '27.75.57.213', '1402121109', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('174', '66', 'quangloc93', '2', '{user} {status} {product}', '{\"{user}\":\"quangloc93\",\"{product}\":\"212\"}', '180.93.240.13', '1402393836', null, '66', 'quangloc93', '0');
INSERT INTO `activities` VALUES ('175', '71', 'hokimuyen', '2', '{user} {status} {product}', '{\"{user}\":\"hokimuyen\",\"{product}\":\"220\"}', '222.255.206.11', '1402969838', null, '71', 'hokimuyen', '0');
INSERT INTO `activities` VALUES ('176', '73', 'nhatkha7', '2', '{user} {status} {product}', '{\"{user}\":\"nhatkha7\",\"{product}\":\"197\"}', '118.68.120.214', '1402983086', null, '73', 'nhatkha7', '0');
INSERT INTO `activities` VALUES ('177', '28', 'vodinh_thanh@yahoo.com.vn', '2', '{user} {status} {product}', '{\"{user}\":\"vodinh_thanh@yahoo.com.vn\",\"{product}\":\"220\"}', '180.93.240.97', '1403259423', null, '28', 'vodinh_thanh@yahoo.com.vn', '0');
INSERT INTO `activities` VALUES ('178', '4', 'quangvinhit2007@gmail.com', '2', '{user} {status} {product}', '{\"{user}\":\"quangvinhit2007@gmail.com\",\"{product}\":\"212\"}', '113.172.31.184', '1423149993', null, '4', 'quangvinhit2007@gmail.com', '0');
INSERT INTO `activities` VALUES ('179', '82', 'sannachico', '2', '{user} {status} {product}', '{\"{user}\":\"sannachico\",\"{product}\":\"182\"}', '171.233.164.170', '1452063830', null, '82', 'sannachico', '0');

-- ----------------------------
-- Table structure for activities_stats
-- ----------------------------
DROP TABLE IF EXISTS `activities_stats`;
CREATE TABLE `activities_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_id` int(11) DEFAULT NULL,
  `like_count` int(11) DEFAULT '0',
  `comment_count` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of activities_stats
-- ----------------------------
INSERT INTO `activities_stats` VALUES ('1', '27', '1', '2');
INSERT INTO `activities_stats` VALUES ('2', '28', '0', '1');
INSERT INTO `activities_stats` VALUES ('3', '21', '2', '0');
INSERT INTO `activities_stats` VALUES ('4', '18', '1', '0');
INSERT INTO `activities_stats` VALUES ('5', '19', '1', '0');
INSERT INTO `activities_stats` VALUES ('6', '20', '0', '1');
INSERT INTO `activities_stats` VALUES ('7', '60', '1', '0');
INSERT INTO `activities_stats` VALUES ('8', '55', '0', '1');
INSERT INTO `activities_stats` VALUES ('9', '121', '1', '0');
INSERT INTO `activities_stats` VALUES ('10', '114', '1', '0');
INSERT INTO `activities_stats` VALUES ('11', '96', '1', '0');
INSERT INTO `activities_stats` VALUES ('12', '112', '0', '0');
INSERT INTO `activities_stats` VALUES ('13', '178', '1', '1');
