/*
Navicat MySQL Data Transfer

Source Server         : 本地数据库
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : zufengbtc

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-03-26 14:56:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for zfb_admin
-- ----------------------------
DROP TABLE IF EXISTS `zfb_admin`;
CREATE TABLE `zfb_admin` (
  `admin_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `account` varchar(10) DEFAULT NULL COMMENT '账号',
  `passwd` varchar(100) DEFAULT NULL COMMENT '密码',
  `ico_path` varchar(50) DEFAULT NULL COMMENT '图片地址',
  `cid` int(11) DEFAULT NULL COMMENT '创建人ID',
  `uid` int(11) DEFAULT NULL COMMENT '修改人ID',
  `ctime` datetime DEFAULT NULL COMMENT '添加时间',
  `utime` datetime DEFAULT NULL COMMENT '修改时间',
  `is_del` tinyint(4) DEFAULT NULL COMMENT '0表示不删除，1表示删除',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_admin
-- ----------------------------
INSERT INTO `zfb_admin` VALUES ('1', 'admin', '$2y$13$XWUQweGWN9QnPFXSnfIjuOmtgvwNuPXp7pfzIGVyKU8MEvAH8jaU2', null, '1', '1', '2018-03-24 20:50:32', '2018-03-24 20:50:35', '0');

-- ----------------------------
-- Table structure for zfb_coin
-- ----------------------------
DROP TABLE IF EXISTS `zfb_coin`;
CREATE TABLE `zfb_coin` (
  `coin_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '币种ID',
  `coin_type` varchar(10) DEFAULT NULL COMMENT '币种种类',
  `coin_addr` varchar(100) DEFAULT NULL COMMENT '币种地址',
  `coin_url` varchar(100) DEFAULT NULL COMMENT '链接地址',
  `coin_desp` varchar(255) DEFAULT NULL COMMENT '描述',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `cid` int(11) DEFAULT NULL COMMENT '添加人',
  `uid` int(11) DEFAULT NULL COMMENT '修改人',
  `ctime` datetime DEFAULT NULL COMMENT '添加时间',
  `utime` datetime DEFAULT NULL COMMENT '修改时间',
  `is_del` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`coin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_coin
-- ----------------------------
INSERT INTO `zfb_coin` VALUES ('1', 'CNY', '241240208423142', null, '人民币', '0', '1', '1', '2018-02-07 01:09:42', '2018-02-07 01:34:45', '0');
INSERT INTO `zfb_coin` VALUES ('2', 'USDT', '24242142141', null, '', '1', '1', '1', '2018-02-07 01:29:25', '2018-02-07 01:31:51', '0');
INSERT INTO `zfb_coin` VALUES ('3', 'BTC', '16JqytBxrMJ8GWEFEmeeUmPwdHY7GPBF3t8', 'http://www.baidu.com', '比特币', '2', '1', '1', '2018-02-07 01:33:09', '2018-02-07 01:53:07', '0');
INSERT INTO `zfb_coin` VALUES ('4', 'LTC', '35JqytBCFGHNUVEmeeUmPwdHY7GPBF3t==', null, '莱特币', '3', '1', '1', '2018-02-07 01:33:48', '2018-02-07 01:35:01', '0');
INSERT INTO `zfb_coin` VALUES ('5', 'ETH', '17JqytBxrMJ8GNUVEmeeUmPwdHY7GPBF3t0', null, '', '4', '1', '1', '2018-02-07 01:35:39', '2018-02-07 01:35:51', '0');
INSERT INTO `zfb_coin` VALUES ('6', 'ETC', '25JqytBxrWGFGYTFmeeUmPwdHY7GPBF3t=22', 'http://www.etc.com', '', '5', '1', '1', '2018-02-07 01:53:52', '2018-02-07 01:53:52', '0');

-- ----------------------------
-- Table structure for zfb_cust
-- ----------------------------
DROP TABLE IF EXISTS `zfb_cust`;
CREATE TABLE `zfb_cust` (
  `cust_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '客户ID',
  `customer_id` int(11) DEFAULT NULL COMMENT '会员中心的客户ID',
  `cust_name` varchar(30) DEFAULT NULL COMMENT '客户名字',
  `cust_sex` tinyint(1) DEFAULT NULL COMMENT '性别，0表示男，1表示女',
  `cust_alias` varchar(30) DEFAULT NULL COMMENT '客户别名',
  `cust_phone` varchar(12) DEFAULT NULL COMMENT '绑定电话',
  `cust_email` varchar(255) DEFAULT NULL,
  `security_passwd` varchar(100) DEFAULT NULL COMMENT '安全密码',
  `is_admin` tinyint(4) DEFAULT NULL COMMENT '0表示不是管理员，1表示后台管理员',
  `admin_id` int(11) DEFAULT NULL COMMENT '管理员ID',
  `cid` int(11) DEFAULT NULL COMMENT '添加人ID',
  `uid` int(11) DEFAULT NULL COMMENT '修改人ID',
  `ctime` datetime DEFAULT NULL COMMENT '添加时间',
  `utime` datetime DEFAULT NULL COMMENT '修改时间',
  `is_del` tinyint(1) DEFAULT NULL COMMENT '0表示不删除，1表示删除',
  PRIMARY KEY (`cust_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_cust
-- ----------------------------
INSERT INTO `zfb_cust` VALUES ('7', '3', null, null, null, '15950023569', 'jialiu_1985@126.com', '$2y$13$O33OFczDKoIIwYy.iT3c5erkFcCDdplG5cXerMHofAbjx9tmHBhTG', null, null, null, null, '2018-03-20 04:26:11', '2018-03-20 04:26:11', '0');
INSERT INTO `zfb_cust` VALUES ('8', '4', null, null, null, null, '531401078@qq.com', null, null, null, null, null, '2018-03-20 05:04:43', '2018-03-20 05:04:43', '0');

-- ----------------------------
-- Table structure for zfb_cust_account
-- ----------------------------
DROP TABLE IF EXISTS `zfb_cust_account`;
CREATE TABLE `zfb_cust_account` (
  `account_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '账号ID',
  `account` varchar(255) DEFAULT NULL COMMENT '账号',
  `coin_id` int(11) DEFAULT NULL COMMENT '币种ID',
  `account_desp` varchar(255) DEFAULT NULL COMMENT '账号描述',
  `cust_id` int(11) DEFAULT NULL COMMENT '客户ID',
  `status` tinyint(1) DEFAULT NULL COMMENT '0表示不默认，1表示默认',
  `ctime` datetime DEFAULT NULL COMMENT '添加时间',
  `utime` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_cust_account
-- ----------------------------
INSERT INTO `zfb_cust_account` VALUES ('4', '174eUZLFx1hZLJi2D9wS9Dmk4N7R4nv8Ws ', '2', 'USEDT', '7', '1', '2018-03-23 02:04:00', '2018-03-23 05:05:33');
INSERT INTO `zfb_cust_account` VALUES ('5', '1FeexV6bAHb8ybZjqQMjJrcCrHGW9sb6uF', '3', 'BTC', '7', '0', '2018-03-23 02:16:43', '2018-03-23 05:06:05');
INSERT INTO `zfb_cust_account` VALUES ('6', '1HQ3Go3ggs8pFnXuHVHRytPCq5fGG8Hbhx ', '2', 'USDT', '7', '0', '2018-03-23 02:43:48', '2018-03-23 02:43:48');

-- ----------------------------
-- Table structure for zfb_cust_bank
-- ----------------------------
DROP TABLE IF EXISTS `zfb_cust_bank`;
CREATE TABLE `zfb_cust_bank` (
  `bank_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '银行卡ID',
  `bank_account` varchar(50) DEFAULT NULL COMMENT '开户名',
  `bank_name` varchar(50) DEFAULT NULL COMMENT '开户银行',
  `bank_pro_city` varchar(50) DEFAULT NULL COMMENT '开户银行省/市',
  `bank_child` varchar(255) DEFAULT NULL COMMENT '开户支行名称',
  `bank_no` varchar(60) DEFAULT NULL COMMENT '银行卡号',
  `cust_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '0表示不默认，1表示默认',
  `ctime` datetime DEFAULT NULL,
  `utime` datetime DEFAULT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_cust_bank
-- ----------------------------
INSERT INTO `zfb_cust_bank` VALUES ('3', '张三', '农业银行', '江苏苏州', '斜塘支行', '622 2897 0623 58789', '7', '1', '2018-03-23 02:07:33', '2018-03-23 05:04:28');

-- ----------------------------
-- Table structure for zfb_cust_finance
-- ----------------------------
DROP TABLE IF EXISTS `zfb_cust_finance`;
CREATE TABLE `zfb_cust_finance` (
  `finance_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '财务ID',
  `coin_id` int(11) DEFAULT NULL COMMENT '币种ID',
  `cust_id` int(11) DEFAULT NULL COMMENT '客户ID',
  `balance` float DEFAULT NULL COMMENT '可用余额',
  `frozen` float DEFAULT NULL COMMENT '冻结数量',
  `ctime` datetime DEFAULT NULL COMMENT '添加时间',
  `utime` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`finance_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_cust_finance
-- ----------------------------
INSERT INTO `zfb_cust_finance` VALUES ('1', '1', '7', '0', '0', '2018-03-23 05:04:28', '2018-03-23 05:04:28');
INSERT INTO `zfb_cust_finance` VALUES ('2', '2', '7', '0', '0', '2018-03-23 05:05:33', '2018-03-23 05:05:33');
INSERT INTO `zfb_cust_finance` VALUES ('3', '3', '7', '0', '0', '2018-03-23 05:06:05', '2018-03-23 05:06:05');

-- ----------------------------
-- Table structure for zfb_cust_finance_log
-- ----------------------------
DROP TABLE IF EXISTS `zfb_cust_finance_log`;
CREATE TABLE `zfb_cust_finance_log` (
  `log_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '日志ID',
  `cust_id` int(11) DEFAULT NULL COMMENT '客户ID',
  `account_id` int(11) DEFAULT NULL COMMENT '账号ID',
  `coin_id` int(11) DEFAULT NULL COMMENT '币种ID',
  `flag` tinyint(1) DEFAULT NULL COMMENT '0表示充值，1表示提现',
  `amount` float DEFAULT NULL COMMENT '金额',
  `status` tinyint(1) DEFAULT NULL COMMENT '提现时使用，0表示还未提现，1表示已提现',
  `desp` varchar(255) DEFAULT NULL COMMENT '描述',
  `cid` int(11) DEFAULT NULL COMMENT '创建人',
  `uid` int(11) DEFAULT NULL COMMENT '提现时使用，管理员ID',
  `ctime` datetime DEFAULT NULL,
  `utime` datetime DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_cust_finance_log
-- ----------------------------
INSERT INTO `zfb_cust_finance_log` VALUES ('18', '7', '3', '1', '1', '5000', '0', null, null, null, '2018-03-24 05:27:04', '2018-03-24 05:27:04');
INSERT INTO `zfb_cust_finance_log` VALUES ('19', '7', '3', '1', '1', '3000', '0', null, null, null, '2018-03-24 05:39:01', '2018-03-24 05:39:01');
INSERT INTO `zfb_cust_finance_log` VALUES ('20', '7', '4', '2', '1', '20', '0', null, null, null, '2018-03-24 05:39:25', '2018-03-24 05:39:25');
INSERT INTO `zfb_cust_finance_log` VALUES ('21', '7', '6', '4', '0', '0.1245', null, '买奥数带来的附加二楼忍饥挨饿我确认了', null, null, '2018-03-05 00:00:00', '2018-03-24 09:09:48');
INSERT INTO `zfb_cust_finance_log` VALUES ('22', '7', '6', '4', '0', '0.1245', null, '买奥数带来的附加二楼忍饥挨饿我确认了', null, null, '2018-03-05 00:00:00', '2018-03-24 09:10:14');
INSERT INTO `zfb_cust_finance_log` VALUES ('23', '7', '5', '3', '0', '0.124543', null, '描述了录入金额累计浪费掉了加热', null, null, '2018-03-01 00:00:00', '2018-03-24 09:15:58');

-- ----------------------------
-- Table structure for zfb_cust_log
-- ----------------------------
DROP TABLE IF EXISTS `zfb_cust_log`;
CREATE TABLE `zfb_cust_log` (
  `log_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '日志ID',
  `cust_id` int(11) DEFAULT NULL COMMENT '客户ID',
  `type` varchar(30) DEFAULT NULL COMMENT '类别',
  `dec_type` varchar(50) DEFAULT NULL COMMENT '设备类型',
  `ip` varchar(100) DEFAULT NULL COMMENT 'IP地址说明',
  `desp` varchar(50) DEFAULT NULL COMMENT '描述',
  `ctime` datetime DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_cust_log
-- ----------------------------
INSERT INTO `zfb_cust_log` VALUES ('1', '1', '登录日志', '网页', '192.168.1.18', '描述', '2018-02-09 18:02:11');

-- ----------------------------
-- Table structure for zfb_cust_orders
-- ----------------------------
DROP TABLE IF EXISTS `zfb_cust_orders`;
CREATE TABLE `zfb_cust_orders` (
  `order_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单ID',
  `order_no` varchar(50) DEFAULT NULL COMMENT '订单号',
  `good_id` int(11) DEFAULT NULL COMMENT '商品ID',
  `good_quantity` int(11) DEFAULT NULL COMMENT '商品数量',
  `order_cash` int(11) DEFAULT NULL COMMENT '购买金额',
  `cust_id` int(11) DEFAULT NULL COMMENT '客户ID',
  `ctime` datetime DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_cust_orders
-- ----------------------------
INSERT INTO `zfb_cust_orders` VALUES ('1', 'CJ24241043', '1', '10', '138000', '1', '2018-01-17 11:22:48');
INSERT INTO `zfb_cust_orders` VALUES ('2', 'CK242340303', '1', '2', '27600', '2', '2018-01-16 11:23:19');

-- ----------------------------
-- Table structure for zfb_cust_recharge
-- ----------------------------
DROP TABLE IF EXISTS `zfb_cust_recharge`;
CREATE TABLE `zfb_cust_recharge` (
  `recharge_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '充值记录ID',
  `cust_id` int(11) DEFAULT NULL COMMENT '客户ID',
  `recharge_money` int(11) DEFAULT NULL COMMENT '充值金额',
  `desp` varchar(255) DEFAULT NULL COMMENT '充值描述',
  `ctime` datetime DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`recharge_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_cust_recharge
-- ----------------------------
INSERT INTO `zfb_cust_recharge` VALUES ('1', '1', '8000', '建行银行充值，单号XLJERJERLRJ34342304', '2018-01-13 14:51:02');
INSERT INTO `zfb_cust_recharge` VALUES ('2', '2', '20000', '工商银行充值，单号XLJERJERLRJ34wrwe32341', '2018-01-16 14:55:01');

-- ----------------------------
-- Table structure for zfb_file
-- ----------------------------
DROP TABLE IF EXISTS `zfb_file`;
CREATE TABLE `zfb_file` (
  `file_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文件ID',
  `file_path` varchar(100) DEFAULT NULL COMMENT '文件地址',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态',
  `type` varchar(10) DEFAULT NULL COMMENT '类型 news/page/notice',
  `type_id` int(11) DEFAULT NULL COMMENT '类型ID',
  `ctime` datetime DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_file
-- ----------------------------

-- ----------------------------
-- Table structure for zfb_goods
-- ----------------------------
DROP TABLE IF EXISTS `zfb_goods`;
CREATE TABLE `zfb_goods` (
  `good_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `good_title` varchar(255) DEFAULT NULL COMMENT '商品标题',
  `good_price` decimal(10,2) DEFAULT NULL COMMENT '租赁价格',
  `sign_calc` varchar(255) DEFAULT NULL COMMENT '单位算力',
  `store` varchar(255) DEFAULT NULL COMMENT '库存',
  `eth_cny` varchar(255) DEFAULT NULL COMMENT '实时ETH/CNY',
  `opentime` datetime DEFAULT NULL COMMENT '开放租赁时间',
  `zuli_days` float DEFAULT NULL COMMENT '算力租赁天数',
  `huiben_days` float DEFAULT NULL COMMENT '回本周期',
  `ri_weihu` float DEFAULT NULL COMMENT '日维护费',
  `dianfei` float DEFAULT NULL COMMENT '电费',
  `gonghao` float DEFAULT NULL COMMENT '功耗',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态，0可购，1已满',
  `flag` tinyint(4) DEFAULT NULL COMMENT '0表示上架，1表示下架',
  `prod_id` int(11) DEFAULT NULL COMMENT '产品ID',
  `cid` int(11) DEFAULT NULL COMMENT '添加人ID',
  `uid` int(11) DEFAULT NULL COMMENT '修改人ID',
  `ctime` datetime DEFAULT NULL COMMENT '添加时间',
  `utime` datetime DEFAULT NULL COMMENT '修改时间',
  `is_del` tinyint(4) DEFAULT NULL COMMENT '0表示不删除，1表示删除',
  PRIMARY KEY (`good_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_goods
-- ----------------------------
INSERT INTO `zfb_goods` VALUES ('1', 'Hash Fax 150M ETH Hashrate', '13800.00', '150.0M', '100', '5963.1', '2018-03-24 00:00:00', '760', '130.68', '0', '0.78', '1200', '0', '0', '1', '1', '1', '2018-01-17 11:21:09', '2018-03-24 06:57:04', '0');
INSERT INTO `zfb_goods` VALUES ('3', 'Hash Fax 13T BTC Hashrate', '13800.00', '13.0T', '200', null, '2018-01-08 00:00:00', '60', '20', '0', '0.5', '950', '1', '0', null, '1', '1', '2018-01-28 02:06:45', '2018-03-24 06:56:45', '0');

-- ----------------------------
-- Table structure for zfb_nav
-- ----------------------------
DROP TABLE IF EXISTS `zfb_nav`;
CREATE TABLE `zfb_nav` (
  `nav_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '导航ID',
  `nav_name` varchar(20) DEFAULT NULL COMMENT '导航名',
  `nav_ctrl` varchar(50) DEFAULT NULL COMMENT '关联模块',
  `nav_url` varchar(255) DEFAULT NULL COMMENT '链接地址',
  `rel_nav_id` varchar(50) DEFAULT NULL COMMENT '关联导航ID',
  `nav_level` tinyint(4) DEFAULT NULL COMMENT '0表示顶级，1表示子页',
  `display_sub` tinyint(1) DEFAULT NULL COMMENT '0表示显示子导航，1表示不显示',
  `display` tinyint(1) DEFAULT NULL COMMENT '0表示显示，1表示不显示',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `cid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `ctime` datetime DEFAULT NULL COMMENT '添加时间',
  `utime` datetime DEFAULT NULL COMMENT '修改时间',
  `is_del` tinyint(4) DEFAULT NULL COMMENT '0表示不删除，1表示删除',
  PRIMARY KEY (`nav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_nav
-- ----------------------------
INSERT INTO `zfb_nav` VALUES ('1', '首页', 'nav', 'site/index', '', '0', '1', '0', '0', '1', '1', '2018-01-31 08:03:20', '2018-01-31 12:29:11', '0');
INSERT INTO `zfb_nav` VALUES ('2', '云算力', 'nav', 'goods/index', '', '0', '1', '0', '1', '1', '1', '2018-01-31 08:33:52', '2018-01-31 12:29:34', '0');
INSERT INTO `zfb_nav` VALUES ('3', '公告', 'nav', 'site/notice', '', '0', '0', '0', '2', '1', '1', '2018-01-31 08:34:26', '2018-01-31 12:29:53', '0');
INSERT INTO `zfb_nav` VALUES ('10', '充值业务', 'member', 'member/recharge', '', '1', '0', '0', '1', '1', '1', '2018-01-31 12:31:33', '2018-01-31 12:31:33', '0');
INSERT INTO `zfb_nav` VALUES ('6', '新闻动态', 'company', 'site/news', '', '1', '0', '0', '2', '1', '1', '2018-01-31 08:57:45', '2018-01-31 12:23:49', '0');
INSERT INTO `zfb_nav` VALUES ('4', '公司简介', 'company', 'site/about&id=2', '', '1', '0', '0', '0', '1', '1', '2018-01-31 08:39:12', '2018-02-01 07:14:35', '0');
INSERT INTO `zfb_nav` VALUES ('5', '官方公告', 'company', 'site/notice', '', '1', '0', '0', '1', '1', '1', '2018-01-31 08:39:50', '2018-01-31 12:22:17', '0');
INSERT INTO `zfb_nav` VALUES ('7', '联系方式', 'company', 'site/contact&id=1', '', '1', '0', '0', '3', '1', '1', '2018-01-31 08:58:51', '2018-02-01 07:14:48', '0');
INSERT INTO `zfb_nav` VALUES ('8', '服务协议', 'company', 'site/protocol&id=3', '', '1', '0', '0', '4', '1', '1', '2018-01-31 08:59:55', '2018-02-06 01:56:17', '0');
INSERT INTO `zfb_nav` VALUES ('9', '财务中心', 'member', 'member/finance', '', '1', '0', '0', '0', '1', '1', '2018-01-31 12:28:29', '2018-01-31 12:28:29', '0');
INSERT INTO `zfb_nav` VALUES ('11', '提现业务', 'member', 'member/withdrawcash', '', '1', '0', '0', '2', '1', '1', '2018-01-31 12:32:46', '2018-01-31 12:32:46', '0');
INSERT INTO `zfb_nav` VALUES ('12', '资金账号', 'member', 'member/account', '', '1', '0', '0', '3', '1', '1', '2018-01-31 12:35:14', '2018-01-31 12:36:20', '0');
INSERT INTO `zfb_nav` VALUES ('13', '综合账单', 'member', 'member/financelog', '', '1', '0', '0', '4', '1', '1', '2018-02-01 02:26:20', '2018-02-08 02:32:05', '0');
INSERT INTO `zfb_nav` VALUES ('14', '优惠券', 'member', 'member/coupon', '', '1', '0', '0', '6', '1', '1', '2018-02-01 02:27:36', '2018-02-06 05:43:26', '0');
INSERT INTO `zfb_nav` VALUES ('15', '安全中心', 'member', 'member/index', '', '1', '0', '0', '5', '1', '1', '2018-02-06 05:42:59', '2018-02-06 05:43:13', '0');

-- ----------------------------
-- Table structure for zfb_news
-- ----------------------------
DROP TABLE IF EXISTS `zfb_news`;
CREATE TABLE `zfb_news` (
  `news_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '新闻ID',
  `news_title` varchar(100) DEFAULT NULL COMMENT '新闻标题',
  `news_content` text COMMENT '新闻内容',
  `news_author` varchar(50) DEFAULT NULL COMMENT '新闻作者',
  `meta_keyword` varchar(100) DEFAULT NULL COMMENT '关键词',
  `meta_desp` varchar(255) DEFAULT NULL COMMENT '关键描述',
  `status` varchar(255) DEFAULT NULL COMMENT '状态，0表示发布，1表示草稿，2表示回收站',
  `count` int(11) DEFAULT NULL COMMENT '访问次数',
  `cid` int(11) DEFAULT NULL COMMENT '添加人ID',
  `uid` int(11) DEFAULT NULL COMMENT '修改人ID',
  `ctime` datetime DEFAULT NULL COMMENT '添加时间',
  `utime` datetime DEFAULT NULL COMMENT '修改时间',
  `is_del` tinyint(4) DEFAULT NULL COMMENT '0表示不删除，1表示删除',
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_news
-- ----------------------------
INSERT INTO `zfb_news` VALUES ('1', '标题001', '<p>neirnogndldlafjldaf</p>', null, '标题001SEO', 'miaoshu', null, null, '1', '1', '2018-01-26 06:58:00', '2018-01-26 07:04:25', '0');

-- ----------------------------
-- Table structure for zfb_notice
-- ----------------------------
DROP TABLE IF EXISTS `zfb_notice`;
CREATE TABLE `zfb_notice` (
  `notice_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '公告ID',
  `notice_title` varchar(100) DEFAULT NULL COMMENT '公告标题',
  `notice_author` varchar(50) DEFAULT NULL COMMENT '发布人',
  `notice_content` text COMMENT '公告内容',
  `notice_photo` varchar(255) DEFAULT NULL COMMENT '公告图片',
  `meta_keyword` varchar(255) DEFAULT NULL COMMENT '关键词',
  `meta_desp` varchar(255) DEFAULT NULL COMMENT '描述',
  `count` int(11) DEFAULT NULL COMMENT '访问次数',
  `cid` int(11) DEFAULT NULL COMMENT '添加人ID',
  `uid` int(11) DEFAULT NULL COMMENT '修改人ID',
  `ctime` datetime DEFAULT NULL COMMENT '添加时间',
  `utime` datetime DEFAULT NULL COMMENT '修改时间',
  `is_del` tinyint(4) DEFAULT NULL COMMENT '0表示不删除，1表示删除',
  PRIMARY KEY (`notice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_notice
-- ----------------------------
INSERT INTO `zfb_notice` VALUES ('16', '以太云算力项目停电通知', '区块链', '<p>接电厂通知，为迎接党的十九大的胜利召开，配合做好安全生产大检查，17日起电厂暂停送电，进行整顿检修。<br/>停电时间为：2017年10月17日-2017年10月25日。<br/>机器停止运行，停电期间无收益，10月18日-10月26日，E2、E6云算力不分币。</p>', null, 'guanjianci', 'miaosh', null, '1', '1', '2018-01-06 07:50:01', '2018-02-02 01:46:05', '0');
INSERT INTO `zfb_notice` VALUES ('17', '以太云算力项目停电通知', '区块链', '<p>接电厂通知，为迎接党的十九大的胜利召开，配合做好安全生产大检查，17日起电厂暂停送电，进行整顿检修。<br/>停电时间为：2017年10月17日-2017年10月25日。<br/>机器停止运行，停电期间无收益，10月18日-10月26日，E2、E6云算力不分币。</p>', null, 'guanjianci', 'miaosh', null, '1', '1', '2017-11-29 07:50:01', '2018-02-02 01:46:05', '0');
INSERT INTO `zfb_notice` VALUES ('18', '以太云算力项目停电通知', '区块链', '<p>接电厂通知，为迎接党的十九大的胜利召开，配合做好安全生产大检查，17日起电厂暂停送电，进行整顿检修。<br/>停电时间为：2017年10月17日-2017年10月25日。<br/>机器停止运行，停电期间无收益，10月18日-10月26日，E2、E6云算力不分币。</p>', null, 'guanjianci', 'miaosh', null, '1', '1', '2018-02-03 07:50:01', '2018-02-02 01:46:05', '0');

-- ----------------------------
-- Table structure for zfb_page
-- ----------------------------
DROP TABLE IF EXISTS `zfb_page`;
CREATE TABLE `zfb_page` (
  `page_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '页面ID ',
  `page_title` varchar(50) DEFAULT NULL COMMENT '页面标题',
  `page_author` varchar(50) DEFAULT NULL COMMENT '发布人',
  `page_content` text COMMENT '页面内容',
  `nav_id` int(11) DEFAULT NULL COMMENT '导航ID',
  `meta_keyword` varchar(255) DEFAULT NULL COMMENT '关键词',
  `meta_desp` varchar(255) DEFAULT NULL COMMENT '描述',
  `cid` int(11) DEFAULT NULL COMMENT '添加人ID',
  `uid` int(11) DEFAULT NULL COMMENT '修改人ID',
  `ctime` datetime DEFAULT NULL COMMENT '创建时间',
  `utime` datetime DEFAULT NULL COMMENT '修改时间ID',
  `is_del` tinyint(1) DEFAULT NULL COMMENT '0表示不删除，1表示删除',
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_page
-- ----------------------------
INSERT INTO `zfb_page` VALUES ('1', '联系我们', null, '<p>客服电话：400-040-8288</p><p>技术支持：<a href=\"http://undefined\">support@jua.com</a></p><p>客户服务：<a href=\"http://undefined\">service@jua.com</a></p><p>客服QQ：262284053</p><p>官方QQ群：284891193</p><p>公司新址：深圳市南山区学府路中科纳能大厦B座7层&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br/></p>', null, '联系我们-区快连', '联系我们-区快连', '1', '1', '2018-01-26 07:59:56', '2018-02-01 02:30:50', '0');
INSERT INTO `zfb_page` VALUES ('2', '公司简介', null, '<div class=\"c-desc\"><p>算力之家成立于2016年，是国内区块链行业龙头企业比银集团全资子公司，依托雄厚资金和技术实力，致力于为用户提供最好的云算力产品。目前业务范围覆盖算力租赁、交易、托管、矿场投资全产业链，在四川、云南、内蒙古、新疆均有矿场分布，云算力产品以其零服务费、足额算力×理论收益，无任何矿机维护、损耗成本广受用户欢迎，目前上线的以太坊算力项目线上租赁两期，线下租赁四期，比特币、莱特币算力项目也将陆续上线。</p><p>主营业务及运营模式见下文：</p><p><strong>算力租赁</strong></p><p><br/>16年4月至今，算力之家前后开展了E系列六期以太算力产品，其中线下四期，线上两期，共出售以太算力近400G，每日为用户产生收益人民币超20万。<br/>线上项目介绍：<br/>E2以太坊云算力（第2期）项目发行总量700台，云算力项目中的机器为腾云定制特种计算机T2，算力150M/台，功耗仅950W/台。7月28日开售一小时内，每台直降100元！开售三周累计租赁149台。<br/>E6以太坊算力项目（第6期）于8月24日正式上线，无预售期，下单日7日内交付算力。E6以太坊云算力项目发行总量200台，上线后抢购一空。</p><p><br/><strong>算力交易</strong></p><p><br/>算力之家拥有专业运营/客服团队，承接国内算力委托销售业务。客户完成项目所需实际算力的部署、接入工作，算力之家开展云算力产品设计及线上销售，为客户提供稳健的销售收入和有保障的挖矿收入，实现资金快速回笼和长期收益。<br/></p><p><strong>委托挖矿</strong></p><p><br/>目前算力之家自有矿场分布在国内多个省份，具有丰富的矿场投资经验，算力之家与用户达成合作意向后，有专业团队遴选场地、建设矿场，采购数字货币挖矿所需设备投入生产，承诺在1个月内建成矿场并投入生产，矿池采用PPS模式分配收益，目前币价行情看涨，投资BTC、LTC、ETH、ETC，3-6个月即可回本，收益稳定，实现资产快速增值。</p><p><br/><strong>产品优势</strong></p><p><br/>合约期内，人民币投资额110%回本，全程除电费外无任何其它费用，用户回本前，净收益日结，每日中午12点发放，理论收益显著高于矿机实际挖矿产出。回本后，算力之家与用户均分后期收益，良性合作，稳定收益。</p><p><br/><strong>运营模式</strong></p><p><br/>算力之家在新疆、内蒙、四川、云南、安徽等地部署专业化、高水平专业计算及大数据机房，正规电力公司合作提供优质廉价电力，机房设施完善、网络品质高效、宽带吞吐量大，配备运营经验丰富的从业经验两年以上的运维团队，目前开展业务以线上租赁为主，更多算力项目即将上线。</p></div><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br/></p>', null, '公司简介-区块链', '公司简介-区块链', '1', '1', '2018-02-01 02:29:00', '2018-02-01 02:30:38', '0');
INSERT INTO `zfb_page` VALUES ('3', '服务协议', '区块链', '<div class=\"modal-body\" style=\"max-height: 500px; overflow-x: hidden; overflow-y: auto\"><p>当您浏览及使用算力之家（www.jua.com）的相关内容、功能、服务时，即视作已完全了解并认可本服务协议条款。您在算力之家（www.jua.com）进行任何操作之前，请仔细阅读以下条款：</p><h4>一、服务总则</h4><p>1、本《协议》是您（即用户）与深圳市腾云计算科技有限公司（下称腾云）就其所提供的服务达成的协议。腾云在此特别提醒您认真阅读、充分理解本《用户服务协议》（下称《协议》）。用户应认真阅读、充分理解本《协议》中各条款，特别涉及免除或者限制腾云责任的免责条款，对用户的权利限制的条款，法律适用、争议解决方式的条款。</p><p>2、请您审慎阅读并选择同意或不同意本《协议》，除非您接受本《协议》所有条款，否则您无权以浏览、注册、登陆、显示、运行、认证、截屏等方式使用本网站及其相关服务。您的浏览、显示、帐号获取和登录、功能使用、截屏等行为表明您自愿接受本协议的全部内容并受其约束，不得以任何理由包括但不限于未能认真阅读本协议等作为纠纷抗辩理由。</p><p>3、本《协议》可由腾云随时更新，更新后的协议条款一旦公布即代替原来的协议条款，不再另行通知。您可重新在网站查阅最新版协议条款。在腾云修改《协议》条款后，如果您不接受修改后的条款，请立即停止使用腾云提供的服务，您继续使用腾云提供的服务将被视为已接受了修改后的协议。</p><p>4、本《协议》内容包括但不限于本协议以下内容，针对某些具体服务所约定的管理办法、公告、重要提示、指引、说明等均为本协议的补充内容，为本协议不可分割之组成部分，具有本协议同等法律效力，接受本协议即视为您自愿接受以上管理办法、公告、重要提示、指引、说明等并受其约束；否则请您立即停止使用腾云提供的服务。</p><h4>二、服务简介</h4><p>腾云通过国际互联网络为用户提供网络服务。同时，用户必须：</p><p>1、自行配备上网的所需设备，包括个人电脑、调制解调器、手机或其他上网装置。</p><p>2、自行负担个人上网所支付的与此服务有关的电话费用、流量费用或网络费用。</p><p>3、基于腾云所提供的网络服务的重要性，用户应同意：</p><p>· 提供真实、准确的个人资料；</p><p>· 及时更新注册资料，符合及时、详尽、准确的要求。</p><h4>三、价格和数量</h4><p>腾云将尽最大努力保证您所购商品、服务与网站上公布的价格一致，但网页价目表和声明并不构成要约。商品及服务的价格都包含了增值税或相关税费。如果发生了意外情况，在确认了您的订单后，由于供应商提价，税额变化引起的价格变化，或是由于网站的错误等造成商品或服务价格变化，您有权取消您的订单，并希望您能及时通过电子邮件或电话通知腾云客户服务部。</p><p>由于市场变化及各种以合理商业努力难以控制的因素的影响，腾云无法承诺用户通过提交订单所希望购买的商品或服务都会有货，用户订购的商品或服务如果发生缺货，用户和腾云皆有权取消该订单。同时，腾云保留对产品或服务订购数量的限制权。</p><h4>四、商品、服务交付及费用</h4><p>1、实物有形商品</p><p>1.1、由于云计算相关产品的特殊性，腾云将会把产品通过物流方式送到您所指定的送货地址。所有物流进度信息、列出的送货时间等仅为参考时间。参考时间的计算是根据库存状况、正常的处理过程和物流公司的送货时间、送货地点的基础上估计得出的。配送方式默认为运费到付。</p><p>1.2、用户应在网站设置真实、准确的物流配送信息，包括但不限定于真实姓名、送货地址及联系方式。</p><p>1.3、因客户提供错误信息和不详细的地址造成订单延迟或无法配送等，责任由用户承担。</p><p>1.4、货物送达无人签收，由此造成的重复配送所产生的费用及相关的后果由用户承担。</p><p>1.5、因不可抗力，例如：自然灾害、交通戒严、突发战争等造成的货物运输相关损失，腾云将不承担责任。</p><p>2、云计算相关服务</p><p>2.1、腾云保证提供用户认购的商品、服务。但以下原因导致的服务延迟，暂停或终止除外：自然灾害、如台风、洪水、冰雹；\r\n 社会异常事件，如罢工、骚乱； \r\n政府行为，如政策变化、征用、电力或互联网络中断。因以上及其他不可抗力因素或第三方的不作为，使用户遭受损失的，腾云不承担责任。</p><p>2.2、当算力产出不足以抵消成本时做暂停处理，当算力产出不足以抵消成本的状况持续服务约定的时长时做算力下架处理，矿机残值所有权归腾云所有（另有约定除外）。鉴于国家相关法律法规的规定和算力市场的特殊情形，腾云不保证用户使用本服务期间的收益，只提供相关的计算公式与计算方式。</p><h4>五、用户隐私制度</h4><p>腾云尊重并保护用户的个人隐私权。腾云将以高度的勤勉、审慎义务对待用户的资料信息。除在如下情况下依据您的个人意愿或法律的规定外，腾云不会将这些信息对外披露或向第三方提供：</p><ul><li>1、经您事先同意，向第三方披露；</li><li>2、根据法律的有关规定，或者行政司法机构的要求，向第三方或者行政、司法机构披露；</li><li>3、为提供您所要求的产品和服务，而必须向第三方分享您的个人信息；</li><li>4、其他腾云根据法律、法规或者网站政策认为合适的披露。</li></ul><h4>六、用户的帐号，密码和安全性</h4><p>1、用户一旦注册成功，成为腾云的合法用户，将得到一个密码和用户名。您可随时改变您的密码。用户将对用户名和密码安全负全部责任。另外，每个用户都要对以其用户名进行的所有活动和事件负全责。用户若发现任何非法使用用户帐号或存在安全漏洞的情况，请立即通告腾云。</p><p>2、用户应当妥善保管和使用其账号及密码和其注册时绑定的手机号码、电子邮箱，并对使用其账号及密码和其注册时绑定的手机号码、电子邮箱进行的任何操作承担全部责任。</p><h4>七、责任限制</h4><p>腾云对因不可抗力或其他无法控制的原因（如腾云服务系统异常或无法使用导致网上交易无法完成或丢失有关的信息、记录等），应尽可能合理地协助处理善后事宜，努力使客户免受经济损失。用户因使用腾云而引起的损害或经济损失，腾云将依据相应的法律规定承担合理的责任，但承担的全部责任均不超过用户购买与该索赔有关的商品或服务的费用。</p><h4>八、对用户信息的存储和限制</h4><p>腾云有判定用户的行为是否符合腾云服务条款的要求和精神的保留权利，如果用户违背了服务条款的规定，腾云有中断对其提供服务的权利。\r\n 对有违反法律法规、捏造事实、恶意诋毁等行为的，腾云有停止传输并删除其信息，禁止用户发言，限制用户订购，注销用户账户并向相关机关进行披露。</p><h4>九、守法合规</h4><p>用户对服务的使用是根据所有适用于腾云的国家法律、地方法律和国际法律标准的。用户必须遵循：</p><ul><li>1、必须符合中国有关法规及用户所在地政策法规。</li><li>2、使用商品或服务不作非法用途。</li><li>3、不干扰或混乱网络服务。</li><li>4、遵守所有使用网络服务的网络协议、规定、程序和惯例。</li><li>5、拥有所操作账户的所有权或取得所有权人的授权。</li></ul><p>若用户的行为不符合以上提到的服务条款，腾云将作出独立判断立即取消用户服务帐号。</p><p>用户需对自己在网上的行为承担法律责任。用户散布和传播反动、色情或其他违反国家法律的信息，腾云的系统记录有可能作为用户违反法律的证据。</p><h4>十、终止服务</h4><p>在下列情况下，腾云可以通过注销账户的方式终止服务，同时保留对用户的违法行为追究法律责任的权利：</p><ul><li>1、用户违反法律法规及本协议相关条款规定；</li><li>2、用户注册信息中的内容虚假；</li><li>3、用户提供的注册信息填写的联系方式不存在或无效；</li><li>4、本协议条款更新时，用户不愿接受新的条款；</li><li>5、用户对腾云实施欺诈、胁迫、恶意攻击等行为；</li><li>6、腾云认为需要终止服务的其他情况。</li></ul><h4>十一、通告</h4><p>所有发给用户的通告都可通过重要页面的公告或电子邮件或常规的信件传送。用户协议条款的修改、服务变更、或其他重要事件的通告都会以此形式进行。</p><h4>十二、法律管辖和适用</h4><p>1、本协议的订立、执行和解释及争议的解决均应适用中国法律。</p><p>2、如发生腾云服务条款与中国法律相抵触时，则这些条款将完全按法律规定重新解释，而其他合法条款则依旧保持对用户产生法律效力和影响。</p><p>3、本协议的规定是可分割的，如本协议任何规定被裁定为无效或不可执行，该规定可被删除而其余条款应予以执行。</p><p>4、如双方就本协议内容或其执行发生任何争议，双方应尽力友好协商解决；协商不成时，任何一方均可向腾云所在地的人民法院提起诉讼。</p></div><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br/></p>', null, '区块链服务协议', '区块链服务协议', '1', '1', '2018-02-06 01:55:38', '2018-02-06 01:55:38', '0');

-- ----------------------------
-- Table structure for zfb_prod
-- ----------------------------
DROP TABLE IF EXISTS `zfb_prod`;
CREATE TABLE `zfb_prod` (
  `prod_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '产品ID',
  `prod_name` varchar(50) DEFAULT NULL COMMENT '产品名称',
  `prod_photo` varchar(50) DEFAULT NULL COMMENT '产品描述',
  `desp` varchar(255) DEFAULT NULL COMMENT '产品详情',
  `suanli` varchar(20) DEFAULT NULL COMMENT '算力',
  `cid` int(11) DEFAULT NULL COMMENT '添加人ID',
  `uid` int(11) DEFAULT NULL COMMENT '修改人ID',
  `ctime` datetime DEFAULT NULL COMMENT '添加时间',
  `utime` datetime DEFAULT NULL COMMENT '修改时间',
  `is_del` tinyint(4) DEFAULT NULL COMMENT '0表示不删除，1表示删除',
  PRIMARY KEY (`prod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_prod
-- ----------------------------
INSERT INTO `zfb_prod` VALUES ('1', '光机', null, '真实可见算力\r\n每日分配收益', '241.3143', '1', '1', '2018-01-10 11:15:47', '2018-01-17 11:15:50', '0');
INSERT INTO `zfb_prod` VALUES ('2', '光机02', null, '真实可见算力\r\n每日分配收益', '23.3041', '1', '1', '2018-01-11 11:16:13', '2018-01-18 11:16:17', '0');
INSERT INTO `zfb_prod` VALUES ('3', '产品', null, null, '20', '1', '1', '2018-01-28 03:19:24', '2018-01-28 03:19:24', '0');
INSERT INTO `zfb_prod` VALUES ('4', '产品', null, null, '20', '1', '1', '2018-01-28 03:19:27', '2018-01-28 03:19:27', '1');
INSERT INTO `zfb_prod` VALUES ('5', '产品', null, '对了对了\n了人家了加热', '20', '1', '1', '2018-01-28 03:20:05', '2018-01-28 03:57:15', '0');

-- ----------------------------
-- Table structure for zfb_slide
-- ----------------------------
DROP TABLE IF EXISTS `zfb_slide`;
CREATE TABLE `zfb_slide` (
  `slide_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '幻灯片图片ID',
  `photo_path` varchar(50) DEFAULT NULL COMMENT '图片地址',
  `slide_btn` varchar(50) DEFAULT NULL COMMENT '链接按钮说明，默认查看详情',
  `slide_desp` varchar(255) DEFAULT NULL COMMENT '幻灯片描述',
  `slide_url` varchar(50) DEFAULT NULL COMMENT '幻灯片链接',
  `display` tinyint(1) DEFAULT NULL COMMENT '是否显示',
  `nav_id` int(11) DEFAULT NULL COMMENT '导航ID',
  `cid` int(11) DEFAULT NULL COMMENT '创建人ID',
  `uid` int(11) DEFAULT NULL COMMENT '修改人ID',
  `ctime` datetime DEFAULT NULL COMMENT '添加时间',
  `utime` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`slide_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_slide
-- ----------------------------

-- ----------------------------
-- Table structure for zfb_system
-- ----------------------------
DROP TABLE IF EXISTS `zfb_system`;
CREATE TABLE `zfb_system` (
  `sys_var` varchar(20) NOT NULL COMMENT '变量名',
  `sys_value` varchar(255) DEFAULT NULL COMMENT '变量值',
  `sys_desp` varchar(1000) DEFAULT NULL COMMENT '变量描述',
  `display` tinyint(1) DEFAULT NULL COMMENT '0表示不显示，1显示',
  PRIMARY KEY (`sys_var`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_system
-- ----------------------------
INSERT INTO `zfb_system` VALUES ('_sitename', 'Hash Fax', '网站名称', '1');
INSERT INTO `zfb_system` VALUES ('_seo_keyword', '区块链关键词', 'SEO关键词', '1');
INSERT INTO `zfb_system` VALUES ('_seo_desp', '区块链关键描述', 'SEO描述', '1');
INSERT INTO `zfb_system` VALUES ('_cust_serv_tel', '400-6305-3432', '客服电话', '1');
INSERT INTO `zfb_system` VALUES ('_support_em', 'zfbtc@support.com', '技术支持邮箱', '1');
INSERT INTO `zfb_system` VALUES ('_cust_serv_em', 'zfbtc@service.com', '客户服务', '1');
INSERT INTO `zfb_system` VALUES ('_site_qq', '750997181', '官方QQ群', '1');
INSERT INTO `zfb_system` VALUES ('_site_domain', 'www.hashfax.com', '网站域名', '1');
INSERT INTO `zfb_system` VALUES ('_coin_type', 'BTC,LTC,ETH', '虚拟货币类型', '1');
INSERT INTO `zfb_system` VALUES ('_site_serv_qq', '531401078', '客服QQ', '1');
INSERT INTO `zfb_system` VALUES ('_site_record_num', '京公网安备11000002000001号 ', '备案号', '1');
INSERT INTO `zfb_system` VALUES ('_company_name', '苏州鑫创锋云信息技术有限公司', '公司名称', '1');
INSERT INTO `zfb_system` VALUES ('_company_addr', '苏州鑫创锋云信息技术有限公司', '公司地址', '1');
INSERT INTO `zfb_system` VALUES ('_company_about', 'Hash fax is an international platform that specializes in providing cloud hashrate,We have one of the largest mining farm in the world.We have close cooperation with the world\'s mainstream pools,exchanges and producer of ASIC bitcoin mining hardware,We pr', '公司介绍', '1');

-- ----------------------------
-- Table structure for zfb_withdraw_cash
-- ----------------------------
DROP TABLE IF EXISTS `zfb_withdraw_cash`;
CREATE TABLE `zfb_withdraw_cash` (
  `withdraw_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '提现ID',
  `cust_id` int(11) DEFAULT NULL COMMENT '客户ID',
  `withdraw_money` varchar(255) DEFAULT NULL COMMENT '金额',
  `ctime` datetime DEFAULT NULL COMMENT '添加时间',
  `did` int(11) DEFAULT NULL COMMENT '后台管理员ID',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态0表示待提现，1表示已打款',
  `desp` varchar(255) DEFAULT NULL COMMENT '描述',
  `dtime` datetime DEFAULT NULL COMMENT '打款日期',
  PRIMARY KEY (`withdraw_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zfb_withdraw_cash
-- ----------------------------
INSERT INTO `zfb_withdraw_cash` VALUES ('1', '1', '2000', '2018-01-13 16:05:33', '1', '0', '', '0000-00-00 00:00:00');
INSERT INTO `zfb_withdraw_cash` VALUES ('2', '1', '1000', '2018-01-15 16:06:07', '1', '1', '已转钱到指定账号', '2018-01-16 16:06:28');
