-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Jun 30, 2016, 07:00 AM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `project`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `article`
-- 

CREATE TABLE `article` (
  `article_ID` int(11) NOT NULL auto_increment,
  `title` varchar(20) character set big5 NOT NULL,
  `author_ID` varchar(20) collate utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`article_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- 列出以下資料庫的數據： `article`
-- 

