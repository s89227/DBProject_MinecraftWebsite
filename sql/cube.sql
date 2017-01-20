-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Jun 30, 2016, 07:04 AM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `project`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `cube`
-- 

CREATE TABLE `cube` (
  `Cube_ID` varchar(8) NOT NULL,
  `Cube_name` varchar(10) NOT NULL,
  `Cube_type` varchar(8) NOT NULL,
  `Cube_from` varchar(8) NOT NULL,
  `Cube_info` varchar(20) default NULL,
  PRIMARY KEY  (`Cube_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=big5;

-- 
-- 列出以下資料庫的數據： `cube`
-- 

INSERT INTO `cube` VALUES ('c01', '石頭', '固體方塊', '天然生成', '裝飾、材料');
INSERT INTO `cube` VALUES ('c02', '草地', '固體方塊', '天然生成', '飼料');
INSERT INTO `cube` VALUES ('c03', '泥土', '固體方塊', '天然生成', '種植、建材');
INSERT INTO `cube` VALUES ('c04', '基岩', '固體方塊', '天然生成', '邊界');
INSERT INTO `cube` VALUES ('c05', '水', '流體', '天然生成', '種植');
INSERT INTO `cube` VALUES ('c06', '熔岩', '流體', '天然生成', '燃燒');
INSERT INTO `cube` VALUES ('c07', '沙', '固體方塊', '天然生成', '掩埋');
INSERT INTO `cube` VALUES ('c08', '紅沙', '固體方塊', '天然生成', '掩埋');
INSERT INTO `cube` VALUES ('c09', '礫石', '固體方塊', '天然生成', '裝飾、材料');
INSERT INTO `cube` VALUES ('c10', '金礦', '固體方塊', '天然生成', '熔煉');
INSERT INTO `cube` VALUES ('c11', '鐵礦', '固體方塊', '天然生成', '熔煉');
INSERT INTO `cube` VALUES ('c12', '煤礦', '固體方塊', '天然生成', '燃燒原料');
INSERT INTO `cube` VALUES ('c13', '原木', '固體方塊', '天然生成', '材料');
INSERT INTO `cube` VALUES ('c14', '青金石礦', '固體方塊', '天然生成', '熔煉');
INSERT INTO `cube` VALUES ('c15', '紅石礦', '固體方塊', '天然生成', '熔煉');
INSERT INTO `cube` VALUES ('c16', '雪塊', '方塊', '天然生成', '裝飾');
INSERT INTO `cube` VALUES ('c17', '冰', '固體方塊', '天然生成', '滑動物品');
INSERT INTO `cube` VALUES ('c18', '木材', '固體方塊', '合成', '建材');
INSERT INTO `cube` VALUES ('c19', '金磚', '固體方塊', '合成', '建材');
INSERT INTO `cube` VALUES ('c20', '地獄磚', '固體方塊', '合成', '建材');
INSERT INTO `cube` VALUES ('c21', '靈魂沙', '固體方塊', '天然生成', '簡易效果');
INSERT INTO `cube` VALUES ('c22', '海磷石', '固體方塊', '天然生成', '建材');
INSERT INTO `cube` VALUES ('c23', '黑曜石', '固體方塊', '天然生成', '傳送門用');
INSERT INTO `cube` VALUES ('c24', '青苔石', '固體方塊', '天然生成', '建材');
INSERT INTO `cube` VALUES ('c25', '螢光石', '固體方塊', '天然生成', '發光材料');
INSERT INTO `cube` VALUES ('c26', '鵝卵石', '固體方塊', '天然生成', '材料');
INSERT INTO `cube` VALUES ('c27', '藤蔓', '方塊', '天然生成', '材料');
INSERT INTO `cube` VALUES ('c28', '石磚半磚', '方塊', '合成', '材料');
INSERT INTO `cube` VALUES ('c29', '線', '方塊', '天然生成', '材料');
INSERT INTO `cube` VALUES ('c30', '鐵釘', '方塊', '合成', '材料');
INSERT INTO `cube` VALUES ('c31', '南瓜', '固體方塊', '天然生成', '材料');
INSERT INTO `cube` VALUES ('c32', '火把', '方塊', '合成', '裝飾');
INSERT INTO `cube` VALUES ('c33', '西瓜', '固體方塊', '天然生成', '材料');
INSERT INTO `cube` VALUES ('c34', '鑽石', '方塊', '天然生成', '材料');
INSERT INTO `cube` VALUES ('c35', '金釘', '方塊', '合成', '材料');
INSERT INTO `cube` VALUES ('c36', '螢光石粉', '方塊', '合成', '材料');
INSERT INTO `cube` VALUES ('c37', '地獄石英', '固體方塊', '天然生成', '建材');
INSERT INTO `cube` VALUES ('c38', '小麥', '方塊', '天然生成', '材料');
INSERT INTO `cube` VALUES ('c39', '煤炭', '方塊', '天然生成', '材料');
INSERT INTO `cube` VALUES ('c40', '閃長岩', '固體方塊', '天然生成', '建材');
INSERT INTO `cube` VALUES ('c41', '花崗岩', '固體方塊', '天然生成', '建材');
INSERT INTO `cube` VALUES ('c42', '終界石', '固體方塊', '天然生成', '建材');
INSERT INTO `cube` VALUES ('c43', '熔岩球', '方塊', '天然生成', '材料');
INSERT INTO `cube` VALUES ('c44', '石磚', '固體方塊', '合成', '建材');
