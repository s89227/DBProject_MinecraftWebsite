-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Jun 30, 2016, 07:05 AM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `project`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `monster`
-- 

CREATE TABLE `monster` (
  `monster_ID` varchar(8) NOT NULL,
  `monster_name` varchar(10) NOT NULL,
  `monster_type` varchar(8) NOT NULL,
  `atk` int(11) NOT NULL,
  `def` int(11) NOT NULL,
  `hp` int(11) NOT NULL,
  PRIMARY KEY  (`monster_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=big5;

-- 
-- 列出以下資料庫的數據： `monster`
-- 

INSERT INTO `monster` VALUES ('m01', '村民', '被動型', 2, 5, 10);
INSERT INTO `monster` VALUES ('m02', '乳牛', '可馴服', 2, 8, 15);
INSERT INTO `monster` VALUES ('m03', '馬', '被動型', 1, 4, 8);
INSERT INTO `monster` VALUES ('m04', '野貓', '可馴服', 1, 4, 8);
INSERT INTO `monster` VALUES ('m05', '終界使者', '中立型', 5, 8, 16);
INSERT INTO `monster` VALUES ('m06', '蜘蛛', '中立型', 3, 5, 12);
INSERT INTO `monster` VALUES ('m07', '殭屍', '攻擊型', 5, 8, 14);
INSERT INTO `monster` VALUES ('m08', '苦力怕', '攻擊型', 10, 5, 3);
INSERT INTO `monster` VALUES ('m09', '雪人', '效用型', 2, 3, 5);
INSERT INTO `monster` VALUES ('m10', '終界龍', '魔王型', 15, 15, 30);
