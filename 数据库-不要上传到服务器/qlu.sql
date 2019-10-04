-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 08 月 13 日 21:32
-- 服务器版本: 5.5.47
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `qlu`
--

-- --------------------------------------------------------

--
-- 表的结构 `ty_ghistory`
--

CREATE TABLE IF NOT EXISTS `ty_ghistory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` char(32) NOT NULL,
  `ttime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ty_info`
--

CREATE TABLE IF NOT EXISTS `ty_info` (
  `id` int(1) NOT NULL,
  `sitename` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `noticflag` int(1) DEFAULT NULL,
  `notic` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `about` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `ty_info`
--

INSERT INTO `ty_info` (`id`, `sitename`, `noticflag`, `notic`, `about`) VALUES
(0, '告白墙', 0, '', ''),
(1, '', NULL, '这是公告', '&lt;h2&gt;&lt;font size=&quot;5&quot;&gt;关于我们&lt;/font&gt;&lt;/h2&gt;&lt;h2&gt;&lt;p&gt;&lt;span style=&quot;font-weight: normal;&quot;&gt;&lt;font size=&quot;3&quot;&gt;你好，欢迎关注&lt;/font&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-weight: normal;&quot;&gt;&lt;font size=&quot;3&quot;&gt;欢迎使用告白墙！&lt;/font&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-weight: normal;&quot;&gt;&lt;font size=&quot;3&quot;&gt;我们&lt;/font&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-weight: normal;&quot;&gt;&lt;font size=&quot;3&quot;&gt;我们&lt;/font&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-weight: normal;&quot;&gt;&lt;font size=&quot;3&quot;&gt;如果你对我们感兴趣，欢迎加入我们。&lt;/font&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-weight: normal;&quot;&gt;&lt;font size=&quot;3&quot;&gt;&lt;/font&gt;&lt;/span&gt;&lt;/p&gt;&lt;/h2&gt;&lt;h2&gt;&lt;font size=&quot;5&quot;&gt;程序特性&lt;/font&gt;&lt;/h2&gt;&lt;h2&gt;&lt;p&gt;&lt;span style=&quot;font-weight: normal;&quot;&gt;&lt;font size=&quot;3&quot;&gt;1.告白者头像为QQ头像&lt;/font&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-weight: normal;&quot;&gt;&lt;font size=&quot;3&quot;&gt;2.发言请遵守当地法律法规和学校规章制度，保留对于发布不良信息和人身攻击的自然人追究法律责任的权利。&lt;/font&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-weight: normal;&quot;&gt;&lt;font size=&quot;3&quot;&gt;3.如发现有消息对个人生活产生困扰或想要获取告白者的联系方式，请联系新媒体中心。&lt;/font&gt;&lt;/span&gt;&lt;/p&gt;&lt;/h2&gt;&lt;h2&gt;&lt;font size=&quot;5&quot;&gt;关于本告白墙作者&lt;/font&gt;&lt;/h2&gt;&lt;h2&gt;&lt;p&gt;&lt;span style=&quot;font-weight: normal;&quot;&gt;&lt;font size=&quot;3&quot;&gt;你好，如果你有发现任何错误或者有任何建议，欢迎与我联系。联系方式(如不在线忙碌请留言)&amp;nbsp;&lt;/font&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-weight: normal;&quot;&gt;&lt;font size=&quot;3&quot;&gt;&lt;a href=&quot;&quot;&gt;www.yelook.com&lt;/a&gt;&lt;/font&gt;&lt;/span&gt;&lt;/p&gt;&lt;/h2&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;'),
(2, 'admin', NULL, 'admin', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `ty_message`
--

CREATE TABLE IF NOT EXISTS `ty_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `realname` varchar(25) NOT NULL,
  `towho` text NOT NULL,
  `ip` text,
  `content` text NOT NULL,
  `lastdate` datetime DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `zan` int(1) unsigned zerofill DEFAULT NULL,
  `avatar` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ty_reply`
--

CREATE TABLE IF NOT EXISTS `ty_reply` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(1) unsigned NOT NULL,
  `email` char(32) NOT NULL,
  `reply` text NOT NULL,
  `nname` varchar(30) NOT NULL,
  `status` int(1) unsigned zerofill NOT NULL,
  `ttime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ty_zan`
--

CREATE TABLE IF NOT EXISTS `ty_zan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` char(32) NOT NULL,
  `gid` int(11) NOT NULL,
  `time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
