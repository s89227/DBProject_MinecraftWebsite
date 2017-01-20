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
-- 資料表格式： `member`
-- 

CREATE TABLE `member` (
  `member_ID` varchar(20) collate utf8_unicode_ci NOT NULL,
  `password` char(20) collate utf8_unicode_ci NOT NULL,
  `email` char(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`member_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- 列出以下資料庫的數據： `member`
-- 

INSERT INTO `member` VALUES ('test123', '321', '321321@gmail');
INSERT INTO `member` VALUES ('testing', '123', '123@gmail');
