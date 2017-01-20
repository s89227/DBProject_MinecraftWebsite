-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Jun 29, 2016, 07:37 PM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `project`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `item`
-- 

CREATE TABLE `item` (
  `item_ID` varchar(8) NOT NULL,
  `item_name` varchar(10) NOT NULL,
  `pos1_cube` varchar(6) default NULL,
  `pos2_cube` varchar(6) default NULL,
  `pos3_cube` varchar(6) default NULL,
  `pos4_cube` varchar(6) default NULL,
  `pos5_cube` varchar(6) default NULL,
  `pos6_cube` varchar(6) default NULL,
  `pos7_cube` varchar(6) default NULL,
  `pos8_cube` varchar(6) default NULL,
  `pos9_cube` varchar(6) default NULL,
  `item_to_cube_id` varchar(8) NOT NULL,
  PRIMARY KEY  (`item_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=big5;

-- 
-- 列出以下資料庫的數據： `item`
-- 

INSERT INTO `item` VALUES ('i01', '粗泥', NULL, NULL, NULL, 'c03', 'c09', NULL, 'c09', 'c03', NULL, 'c45');
INSERT INTO `item` VALUES ('i02', '青苔石', NULL, NULL, NULL, 'c26', 'c27', NULL, NULL, NULL, NULL, 'c24');
INSERT INTO `item` VALUES ('i03', '石磚', NULL, NULL, NULL, 'c01', 'c01', NULL, 'c01', 'c01', NULL, 'c44');
INSERT INTO `item` VALUES ('i04', '青苔石磚', NULL, NULL, NULL, 'c44', 'c27', NULL, NULL, NULL, NULL, 'c46');
INSERT INTO `item` VALUES ('i05', '浮雕石磚', NULL, NULL, NULL, NULL, 'c28', NULL, NULL, 'c28', NULL, 'c47');
INSERT INTO `item` VALUES ('i06', '白色羊毛', NULL, NULL, NULL, 'c29', 'c29', NULL, 'c29', 'c29', NULL, 'c48');
INSERT INTO `item` VALUES ('i07', '鐵磚', 'c30', 'c30', 'c30', 'c30', 'c30', 'c30', 'c30', 'c30', 'c30', 'c49');
INSERT INTO `item` VALUES ('i08', '南瓜燈', NULL, NULL, NULL, NULL, 'c31', NULL, NULL, 'c32', NULL, 'c50');
INSERT INTO `item` VALUES ('i09', '西瓜磚', NULL, NULL, NULL, 'c44', 'c27', NULL, NULL, NULL, NULL, 'c51');
INSERT INTO `item` VALUES ('i10', '鑽石磚', 'c34', 'c34', 'c34', 'c34', 'c34', 'c34', 'c34', 'c34', 'c34', 'c52');
INSERT INTO `item` VALUES ('i11', '金磚', 'c35', 'c35', 'c35', 'c35', 'c35', 'c35', 'c35', 'c35', 'c35', 'c19');
INSERT INTO `item` VALUES ('i12', '螢光石', NULL, NULL, NULL, 'c36', 'c36', NULL, 'c36', 'c36', NULL, 'c25');
INSERT INTO `item` VALUES ('i13', '叢林木材', NULL, NULL, NULL, NULL, 'c18', NULL, NULL, NULL, NULL, 'c53');
INSERT INTO `item` VALUES ('i14', '石英磚', NULL, NULL, NULL, 'c37', 'c37', NULL, 'c37', 'c37', NULL, 'c54');
INSERT INTO `item` VALUES ('i15', '砂岩', NULL, NULL, NULL, 'c07', 'c07', NULL, 'c07', 'c07', NULL, 'c55');
INSERT INTO `item` VALUES ('i16', '甘草捆', 'c38', 'c38', 'c38', 'c38', 'c38', 'c38', 'c38', 'c38', 'c38', 'c56');
INSERT INTO `item` VALUES ('i17', '煤炭磚', 'c39', 'c39', 'c39', 'c39', 'c39', 'c39', 'c39', 'c39', 'c39', 'c57');
INSERT INTO `item` VALUES ('i18', '花崗岩', NULL, NULL, NULL, 'c40', 'c37', NULL, NULL, NULL, NULL, 'c41');
INSERT INTO `item` VALUES ('i19', '平滑花崗岩', NULL, NULL, NULL, 'c41', 'c41', NULL, 'c41', 'c41', NULL, 'c58');
INSERT INTO `item` VALUES ('i20', '終界石磚', 'c42', 'c42', NULL, 'c42', 'c42', NULL, NULL, NULL, NULL, 'c59');
INSERT INTO `item` VALUES ('i21', '岩漿塊', NULL, NULL, NULL, NULL, 'c43', 'c43', NULL, 'c43', 'c43', 'c60');
INSERT INTO `item` VALUES ('i22', '叢林木樓梯', '', NULL, 'c18', NULL, 'c18', 'c18', 'c18', 'c18', 'c18', 'c61');
