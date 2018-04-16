/*
Navicat MySQL Data Transfer

Source Server         : 本地数据库
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : hash_user_center

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-03-26 14:56:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(30) DEFAULT NULL,
  `type` varchar(10) NOT NULL COMMENT '1表示平台，2表示电商;(1,2表示平台，电商都可以）',
  `status` tinyint(1) DEFAULT NULL,
  `ctime` datetime NOT NULL,
  `utime` datetime NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('3', 'jialiu_1985@126.com', null, '$2y$13$XpFTfTJViiuALYszYEi2z./Vu36NuPXsQ8x8z2HcbKuof15ECSXIC', '1', '1', '1', '2018-03-20 04:26:11', '2018-03-20 04:26:11');
INSERT INTO `customer` VALUES ('4', '531401078@qq.com', null, '$2y$13$8lZflKevI9RhEKWNztNILeUtmkNZIvHRdL9DCuK/xh4Gt/v4BJIgy', '1', '1', '1', '2018-03-20 05:04:43', '2018-03-20 05:04:43');
