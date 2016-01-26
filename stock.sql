/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50615
Source Host           : 127.0.0.1:3306
Source Database       : stock

Target Server Type    : MYSQL
Target Server Version : 50615
File Encoding         : 65001

Date: 2016-01-08 18:32:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL,
  `quantity` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cart
-- ----------------------------

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_add_userid` int(11) NOT NULL,
  `c_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `c_tradepath` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_zonepath` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `c_postcode` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_businesslicence` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_businesslicencedate` datetime DEFAULT NULL,
  `c_siteurl` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_registeraddress` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_registerdate` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_registermoney` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_mainoperation` varchar(3000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_businessscope` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_mainmarket` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_corporation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_corporationid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_dutyparagraph` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_nature` int(11) DEFAULT NULL,
  `c_character` int(11) DEFAULT NULL,
  `c_fromtype` int(11) DEFAULT NULL,
  `c_keyword` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_brief` longtext COLLATE utf8_unicode_ci,
  `c_businessmode` int(11) DEFAULT NULL,
  `c_employeenumber` int(11) DEFAULT NULL,
  `c_yearturnover` int(11) DEFAULT NULL,
  `c_sourceurl` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_createtime` datetime DEFAULT NULL,
  `c_status` int(11) DEFAULT NULL,
  `c_icp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_remark` longtext COLLATE utf8_unicode_ci,
  `c_contact` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_mobile` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_id` int(11) NOT NULL COMMENT '客户编号',
  `c_checktime` datetime DEFAULT NULL COMMENT '审核时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('1', '2', '杭州铭来网络科技有限公司', '101', '330101', '浙江省杭州市西湖区天目山路15号宏丰家居城', '222222', '', '0000-00-00 00:00:00', '', '浙江省杭州市西湖区天目山路15号宏丰家居城', '', '', '', '', '', '', '', '', '0', '1', '0', null, '', '1', '1', '1', '', '2014-08-22 11:58:45', '3', '', '1111', '沈桂波', '111111111', '11111111111111111111', '0', null);
INSERT INTO `customers` VALUES ('2', '7', '杭州先行科技有限公司', '101', '330205', '浙江省杭州市西湖区天目山路15号宏丰家居城', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '0', '1', '0', null, '', '1', '1', '1', '', '2014-08-22 12:04:49', '1', '', '123', '沈桂波', '11111111111', '11111111111111111111', '221976', null);
INSERT INTO `customers` VALUES ('3', '2', '杭州人民大学测试', '118', '330205', '随便吧12123232123123123232', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '0', '1', '0', null, '111111', '1', '1', '1', '11111111', '2014-09-13 14:05:41', null, '', null, '1111', '111', '1111', '0', null);
INSERT INTO `customers` VALUES ('4', '2', '湖州商美科技有限公司', '101', '330204', '1111111111111111111111111111', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '0', '1', '0', null, '12123323', '1', '1', '1', '', '2014-09-13 14:06:35', null, '', null, '11111', '11111', '11111', '0', null);
INSERT INTO `customers` VALUES ('5', '2', '杭州商美科技', '114', '330106', '浙江省杭州市西湖区天目山路15号宏丰家居城', '310030', '', '0000-00-00 00:00:00', '', '浙江省杭州市西湖区天目山路15号宏丰家居城', '', '', '', '', '', '', '', '', '0', '1', '0', null, '', '1', '1', '1', '', '2014-09-13 14:08:15', '5', '', null, '沈桂波', '111111111111', '11111111111111111111', '0', null);
INSERT INTO `customers` VALUES ('6', '2', '杭州快鱼网络科技有限公司', '115', '330106', '1211222222222222222222222222', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '0', '1', '0', null, '', '1', '1', '1', '', '2014-09-13 15:21:43', '5', '', '杭州快鱼网络科技有限公司 ', '1212121', '1212121', '12121212', '0', '0000-00-00 00:00:00');
INSERT INTO `customers` VALUES ('7', '8', '杭州九月十六日测试', '101', '330103', '12323121231241241241', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '0', '1', '0', null, '', '1', '1', '1', '', '2014-09-16 11:30:02', '1', '', '1111111', '11121212', '121212', '12121212', '267492', null);
INSERT INTO `customers` VALUES ('8', '8', '杭州测试公司1', '101', '330103', '111111111111111111111', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '0', '1', '0', null, '', '1', '1', '1', '', '2014-09-17 11:07:57', '5', '', '11111', '11111', '1111111', '11111111', '267251', '2015-01-01 00:00:00');
INSERT INTO `customers` VALUES ('9', '7', '杭州冉雅服饰有限公司', '101', '330101', '浙江省杭州市西湖区天目山路15号宏丰家居城', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '0', '1', '0', null, '', '1', '1', '1', '', '2015-01-07 10:25:14', null, '', null, '沈桂波', '66666666', '18888888888', '0', null);
INSERT INTO `customers` VALUES ('10', '7', '杭州加拿大科技有限公司', '101', '330101', '浙江省杭州市西湖区天目山路15号宏丰家居城', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '0', '1', '0', null, '', '1', '1', '1', '', '2015-01-07 10:26:10', null, '', null, '沈桂波', '66666666', '', '0', null);
INSERT INTO `customers` VALUES ('11', '7', '杭州加拿大科技有限公司', '101', '330101', '浙江省杭州市西湖区天目山路15号宏丰家居城', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '0', '1', '0', null, '', '1', '1', '1', '', '2015-01-07 10:28:37', null, '', null, '沈桂波', '121212121', '18888888888', '0', null);
INSERT INTO `customers` VALUES ('12', '7', '海宁钱荘瓦业有限公司', '10101', '330101', '湖州市龙王山路1236号2幢C509', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '0', '1', '0', null, '', '1', '1', '1', '', '2015-01-08 16:50:15', null, '', null, '曹安', '15888863316', '15888863316', '0', null);
INSERT INTO `customers` VALUES ('13', '7', '湖州品创孵化器有限公司 ', '101', '330502', '湖州市龙王山路1236号2幢C509', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '0', '1', '0', null, '', '1', '1', '1', '', '2015-01-12 09:20:28', '0', '', null, '曹', '15888863316', '15888863316', '0', null);
INSERT INTO `customers` VALUES ('14', '7', '香港金日利有限公司', '101', '330101', '湖州市龙王山路1236号2幢C509', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '0', '1', '0', null, '', '1', '1', '1', '', '2015-01-13 09:12:13', null, '', null, '曹', '15888863316', '15888863316', '0', null);
INSERT INTO `customers` VALUES ('15', '11', '杭州畅聚科技有限公司', '104', '330106', '', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '0', '1', '0', null, '', '1', '1', '1', '', '2015-01-13 19:01:01', null, '', null, '丁献丹', '18668867277', '18668867277', '0', null);
INSERT INTO `customers` VALUES ('16', '11', '香港金日利有限公司', '101', '330101', '湖州市龙王山路1236号2幢C509', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '0', '1', '0', null, '', '1', '1', '1', '', '2015-01-14 09:18:15', '0', '', null, '曹', '15888863316', '15888863316', '0', null);
INSERT INTO `customers` VALUES ('17', '11', '杭州畅聚科技有限公司', '104', '330105', '西湖区文一路68号坤和商务楼8F', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '0', '1', '0', null, '', '1', '1', '1', '', '2015-01-14 09:20:09', '0', '', null, '丁献丹', '18668867277', '', '0', null);
INSERT INTO `customers` VALUES ('18', '7', '小格调婚纱摄影', '101', '330101', '浙江省杭州市西湖区天目山路15号宏丰家居城', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '0', '1', '0', null, '', '1', '1', '1', '', '2015-01-15 08:20:35', '1', '', '121', '沈桂波', '66666666', '18358197150', '260585', '2014-08-28 00:00:00');
INSERT INTO `customers` VALUES ('19', '7', '杭州途高电器有限公司', '101', '330101', '浙江省杭州市西湖区天目山路15号宏丰家居城', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '0', '1', '0', null, '', '1', '1', '1', '', '2015-01-15 09:43:14', '2', '', '测试 杭州途高电器有限公司 ', '沈桂波', '66666666', '18888888888', '0', null);
INSERT INTO `customers` VALUES ('20', '7', '嘉兴市芦荟源生物科技有限公司', '101', '330101', '浙江省杭州市西湖区天目山路15号宏丰家居城', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '0', '1', '0', null, '', '1', '1', '1', '', '2015-01-15 10:12:49', '1', '', '', '沈桂波', '66666666', '', '158019', '2015-08-28 14:57:27');
INSERT INTO `customers` VALUES ('21', '7', '杭州苏格网络科技有限公司', '101', '330101', '浙江省杭州市西湖区天目山路15号宏丰家居城', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '0', '1', '0', null, '', '1', '1', '1', '', '2015-01-15 10:16:05', '5', '', '123', '沈桂波', '66666666', '18888888888', '0', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `quantity` float(10,2) DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '猪头肉', '342.00', '12.03', '0');
INSERT INTO `goods` VALUES ('2', '123', '223.00', '123.00', '0');
INSERT INTO `goods` VALUES ('3', '这是一个测试公司1', '20.00', '1.00', '0');
INSERT INTO `goods` VALUES ('4', '这是一个测试公司1', '100.00', '2.00', '0');
INSERT INTO `goods` VALUES ('5', '122', '1.00', '1.00', '0');
INSERT INTO `goods` VALUES ('6', 'test', '1.00', '1.00', '0');
INSERT INTO `goods` VALUES ('7', 'test1', '1.00', '1.00', '0');

-- ----------------------------
-- Table structure for goods_log
-- ----------------------------
DROP TABLE IF EXISTS `goods_log`;
CREATE TABLE `goods_log` (
  `id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '0:in 1:out',
  `quantity` float(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_log
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `c_num` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2', 'roy', '$2y$10$JQU68YciVijLjXJgAPRwdeZRMubnrPWP1wh4TglF5jLv2WDLIn2hG', '杭州先行科技有限公司', '123456789', '123456789', '123456789', '10', 'IUH9McsCIlDdBcsxc6OGNXIkPJmc9QuHlqJAc77suxMSvIRMCgDOBF6WRaSl', 'ruixinglong@xxkj.com');
INSERT INTO `users` VALUES ('7', 'xxkj', '$2y$10$YOi2lHk4gkpVD4.fV9VKu.5DK0q2TAIfTKL5vWkNItNkLMT.IJvbO', '埠孙冷库', '99999999', '99999999', '99999999', '10', '6P2zFGi2DK0osnlz3H2heCKrTdSWIURl9TXgP16AVyhcRSLIWNot3nFvc2G9', 'ruixinglong@xxkj.com');
INSERT INTO `users` VALUES ('8', 'junze2014', '$2y$10$gzDsxBVTefEwraIt7Yp3nehhOFk2vsgRP3cSRNOKeel.nwOtJjt32', '嘉兴君择信息技术有限公司', '邢燕子', '0573-83987055', '13758083673', '10', null, null);
INSERT INTO `users` VALUES ('9', 'boyi2014', '$2y$10$XsLm6.5fay8TBGEPMTLW4u1zyFdJE4sijfFBe2dJ8xPg5xM0i7Vgi', '衢州博弈信息咨询', '朱巧明', '18057098277', '18057098277', '10', null, null);
INSERT INTO `users` VALUES ('10', 'chenxiaodong2014', '$2y$10$eWrl150cbHT4XF4cudXIUOF0mc1Bux4vukxjFB.GKZMPMMdivk7Yq', '陈晓东', '', '', '', '10', null, null);
INSERT INTO `users` VALUES ('11', 'changju', '$2y$10$cfroJAngkqWFIxIqjtwKeuMCBVV.2Ge170wQ4THRQivshAWD096te', '杭州畅聚科技有限公司', '丁献丹/吕总', '18668867277', '18605749977', '10', null, null);

-- ----------------------------
-- View structure for view_customers
-- ----------------------------
DROP VIEW IF EXISTS `view_customers`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY INVOKER  VIEW `view_customers` AS select `c`.`c_mobile` AS `c_mobile`,`c`.`c_phone` AS `c_phone`,`c`.`c_contact` AS `c_contact`,`c`.`c_remark` AS `c_remark`,`c`.`c_icp` AS `c_icp`,`c`.`c_status` AS `c_status`,`c`.`c_createtime` AS `c_createtime`,`c`.`c_sourceurl` AS `c_sourceurl`,`c`.`c_yearturnover` AS `c_yearturnover`,`c`.`c_employeenumber` AS `c_employeenumber`,`c`.`c_businessmode` AS `c_businessmode`,`c`.`c_brief` AS `c_brief`,`c`.`c_keyword` AS `c_keyword`,`c`.`c_fromtype` AS `c_fromtype`,`c`.`c_character` AS `c_character`,`c`.`c_nature` AS `c_nature`,`c`.`c_dutyparagraph` AS `c_dutyparagraph`,`c`.`c_corporationid` AS `c_corporationid`,`c`.`c_corporation` AS `c_corporation`,`c`.`c_mainmarket` AS `c_mainmarket`,`c`.`c_businessscope` AS `c_businessscope`,`c`.`c_mainoperation` AS `c_mainoperation`,`c`.`c_registermoney` AS `c_registermoney`,`c`.`c_registerdate` AS `c_registerdate`,`c`.`c_registeraddress` AS `c_registeraddress`,`c`.`c_siteurl` AS `c_siteurl`,`c`.`c_businesslicencedate` AS `c_businesslicencedate`,`c`.`c_businesslicence` AS `c_businesslicence`,`c`.`id` AS `id`,`c`.`c_add_userid` AS `c_add_userid`,`c`.`c_name` AS `c_name`,`c`.`c_tradepath` AS `c_tradepath`,`c`.`c_zonepath` AS `c_zonepath`,`c`.`c_address` AS `c_address`,`c`.`c_postcode` AS `c_postcode`,`ct`.`c_tradename` AS `c_tradename`,`cz1`.`c_zonename` AS `city`,`cz2`.`c_zonename` AS `area`,`users`.`name` AS `name`,`users`.`contact` AS `contact`,`users`.`phone` AS `phone`,`users`.`mobile` AS `mobile`,`c`.`c_checktime` AS `c_checktime`,`c`.`c_id` AS `c_id`,`users`.`email` AS `email` from ((((`customers` `c` left join `customer_trades` `ct` on((`c`.`c_tradepath` = `c`.`c_tradepath`))) left join `customer_zones` `cz1` on((left(`c`.`c_zonepath`,4) = `cz1`.`c_zonepath`))) left join `customer_zones` `cz2` on((`c`.`c_zonepath` = `cz2`.`c_zonepath`))) left join `users` on((`c`.`c_add_userid` = `users`.`id`))) ;
