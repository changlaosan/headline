-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-09-05 06:13:57
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `wui1805`
--

-- --------------------------------------------------------

--
-- 表的结构 `news_category`
--

CREATE TABLE IF NOT EXISTS `news_category` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_default` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `news_category`
--

INSERT INTO `news_category` (`id`, `name`, `is_default`) VALUES
(1, '推荐', '1'),
(2, '热点', '1'),
(3, '社会', '1'),
(4, '娱乐', '1'),
(5, '科技', '1'),
(6, '汽车', '1'),
(7, '体育', '1'),
(8, '财经', '1'),
(9, '军事', '1'),
(10, '国际', '1'),
(11, '游戏', '0'),
(12, '旅游', '0'),
(13, '历史', '0'),
(14, '探索', '0'),
(15, '美食', '0'),
(16, '育儿', '0'),
(17, '养生', '0'),
(18, '故事', '0'),
(19, '美文', '0'),
(20, '时尚', '0');
