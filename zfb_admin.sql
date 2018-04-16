/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1_3306
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : btc

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-02-26 00:07:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zfb_admin`
-- ----------------------------
DROP TABLE IF EXISTS `zfb_admin`;
CREATE TABLE `zfb_admin` (
  `admin_id` int(11) NOT NULL COMMENT '管理员ID',
  `account` varchar(10) DEFAULT NULL COMMENT '账号',
  `passwd` varchar(50) DEFAULT NULL COMMENT '密码',
  `ico_path` varchar(50) DEFAULT NULL COMMENT '图片地址',
  `cid` int(11) DEFAULT NULL COMMENT '创建人ID',
  `uid` int(11) DEFAULT NULL COMMENT '修改人ID',
  `ctime` datetime DEFAULT NULL COMMENT '添加时间',
  `utime` datetime DEFAULT NULL COMMENT '修改时间',
  `is_del` tinyint(4) DEFAULT NULL COMMENT '0表示不删除，1表示删除',
  `role` int(2) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_admin
-- ----------------------------
INSERT INTO `zfb_admin` VALUES ('1', 'admin', '51f17858a310b35c7fed8d1c3c565b21', null, null, null, null, null, null, null);
