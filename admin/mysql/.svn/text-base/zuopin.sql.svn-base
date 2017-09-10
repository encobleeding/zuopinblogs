-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-08-30 19:39:46
-- 服务器版本： 5.7.17-log
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zuopin`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL COMMENT '主键ID,自动增加',
  `realname` char(16) NOT NULL COMMENT '真实姓名',
  `passwd` char(32) NOT NULL COMMENT '登录密码md5',
  `tel` char(11) NOT NULL COMMENT '手机号码',
  `loginnum` int(11) DEFAULT NULL COMMENT '登陆次数',
  `lasttime` datetime DEFAULT NULL COMMENT '最后一次登录时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员信息表';

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `realname`, `passwd`, `tel`, `loginnum`, `lasttime`) VALUES
(1, 'nilin', '123456', '18782905241', NULL, NULL),
(2, 'anke', '123456', '15528189938', NULL, NULL),
(4, 'yanliang', '123456', '15682139009', NULL, NULL),
(3, 'yangcheng', '123456', '18892888087', NULL, NULL),
(5, 'yangchunmei', '123456', '12345678910', NULL, NULL),
(6, 'liuchunmei', '123456', '12345678911', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL COMMENT '主键ID,自动增加',
  `aid` int(11) NOT NULL COMMENT '发布人id',
  `username` char(16) NOT NULL COMMENT '发布人姓名',
  `class` char(240) NOT NULL COMMENT '博客分类',
  `title` char(240) NOT NULL COMMENT '博客标题',
  `img` char(240) DEFAULT NULL COMMENT '内容图片路径',
  `content` text NOT NULL COMMENT '博客内容',
  `views` int(11) NOT NULL COMMENT '浏览量',
  `addtime` datetime NOT NULL COMMENT '发布时间',
  `updatetime` datetime NOT NULL COMMENT '最后修改时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='博客表';

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL COMMENT '主键ID,自动增加',
  `content` text NOT NULL COMMENT '评论内容',
  `addtime` datetime NOT NULL COMMENT '评论时间',
  `aid` int(11) NOT NULL COMMENT '评论人'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='博客评论表';

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT '主键ID,自动增加',
  `username` char(32) NOT NULL COMMENT '用户昵称',
  `account` char(32) NOT NULL COMMENT '注册帐号',
  `passwd` char(32) NOT NULL COMMENT '登录密码,md5',
  `tel` char(11) NOT NULL COMMENT '手机号码',
  `loginnum` int(11) NOT NULL COMMENT '登录次数',
  `lasttime` datetime NOT NULL COMMENT '最后登录时间',
  `sex` char(11) NOT NULL COMMENT '性别',
  `img` char(240) NOT NULL COMMENT '头像图路径',
  `sign` text NOT NULL COMMENT '个性签名',
  `addtime` datetime NOT NULL COMMENT '帐号注册时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户信息表';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID,自动增加', AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID,自动增加';
--
-- 使用表AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID,自动增加';
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID,自动增加';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
