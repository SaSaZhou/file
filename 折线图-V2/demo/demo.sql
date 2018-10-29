/*
Navicat MySQL Data Transfer

Source Server         : lochost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : demo

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-08-23 16:16:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for db_logging
-- ----------------------------
DROP TABLE IF EXISTS `db_logging`;
CREATE TABLE `db_logging` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL DEFAULT '' COMMENT '登录账号',
  `ipno` varchar(100) NOT NULL COMMENT '登录ip号',
  `state` varchar(10) NOT NULL COMMENT '状态',
  `posttime` int(11) NOT NULL DEFAULT '0' COMMENT '登录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8 COMMENT='登录日志';

-- ----------------------------
-- Records of db_logging
-- ----------------------------
INSERT INTO `db_logging` VALUES ('66', 'admin', '192.168.1.200', '禁用', '1501656649');
INSERT INTO `db_logging` VALUES ('94', 'admin', '192.168.1.200', '成功', '1510650735');
INSERT INTO `db_logging` VALUES ('99', 'admin', '192.168.1.200', '成功', '1510716700');
INSERT INTO `db_logging` VALUES ('100', 'admin', '192.168.1.200', '成功', '1510718350');
INSERT INTO `db_logging` VALUES ('101', 'admin', '192.168.1.200', '成功', '1514517063');
INSERT INTO `db_logging` VALUES ('102', 'admin', '192.168.1.200', '成功', '1520306443');
INSERT INTO `db_logging` VALUES ('103', 'admin', '192.168.1.200', '成功', '1521100549');
INSERT INTO `db_logging` VALUES ('104', 'admin', '192.168.1.200', '成功', '1521100943');
INSERT INTO `db_logging` VALUES ('105', 'admin', '192.168.1.200', '成功', '1521701525');
INSERT INTO `db_logging` VALUES ('106', 'admin', '192.168.1.200', '成功', '1521702500');
INSERT INTO `db_logging` VALUES ('107', 'admin', '192.168.1.200', '失败', '1521710924');
INSERT INTO `db_logging` VALUES ('108', 'admin', '192.168.1.200', '成功', '1521710929');
INSERT INTO `db_logging` VALUES ('109', 'admin', '192.168.1.200', '失败', '1522218987');
INSERT INTO `db_logging` VALUES ('110', 'admin', '192.168.1.200', '成功', '1522218991');
INSERT INTO `db_logging` VALUES ('111', 'admin', '192.168.1.200', '成功', '1522222942');
INSERT INTO `db_logging` VALUES ('112', 'admin', '192.168.1.200', '成功', '1522223890');
INSERT INTO `db_logging` VALUES ('113', 'admin', '192.168.1.200', '成功', '1522223931');
INSERT INTO `db_logging` VALUES ('114', 'admin', '192.168.1.200', '成功', '1522225569');
INSERT INTO `db_logging` VALUES ('115', 'admin', '192.168.1.200', '成功', '1522227494');
INSERT INTO `db_logging` VALUES ('116', 'admin', '192.168.1.200', '成功', '1522285954');
INSERT INTO `db_logging` VALUES ('117', 'admin', '192.168.1.200', '成功', '1523349416');
INSERT INTO `db_logging` VALUES ('118', 'admin', '192.168.1.200', '成功', '1533632766');
INSERT INTO `db_logging` VALUES ('119', 'admin', '192.168.1.200', '成功', '1533632928');
INSERT INTO `db_logging` VALUES ('120', 'admin', '192.168.1.200', '成功', '1533634018');
INSERT INTO `db_logging` VALUES ('121', 'admin', '192.168.1.200', '成功', '1533634069');
INSERT INTO `db_logging` VALUES ('122', 'admin', '192.168.1.200', '成功', '1533797161');
INSERT INTO `db_logging` VALUES ('123', 'admin', '192.168.1.200', '成功', '1533797993');
INSERT INTO `db_logging` VALUES ('124', 'admin', '192.168.1.200', '成功', '1533797993');
