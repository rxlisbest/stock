-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-02-01 15:18:02
-- 服务器版本： 10.0.21-MariaDB
-- PHP Version: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- 表的结构 `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `c_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `c_createtime` datetime DEFAULT NULL,
  `c_status` int(11) DEFAULT NULL,
  `c_mobile` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `quantity` float(10,2) DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `goods_log`
--

CREATE TABLE `goods_log` (
  `id` int(11) UNSIGNED NOT NULL,
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) DEFAULT NULL,
  `total_money` float(10,2) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `goods_log_detail`
--

CREATE TABLE `goods_log_detail` (
  `id` int(11) NOT NULL,
  `l_id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL,
  `g_name` varchar(100) NOT NULL,
  `price` float(10,2) NOT NULL DEFAULT '0.00' COMMENT '0:in 1:out',
  `quantity` float(10,2) NOT NULL DEFAULT '0.00',
  `outdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `c_num` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `contact`, `phone`, `mobile`, `c_num`, `remember_token`, `email`) VALUES
(2, 'roy', '$2y$10$YOi2lHk4gkpVD4.fV9VKu.5DK0q2TAIfTKL5vWkNItNkLMT.IJvbO', '杭州先行科技有限公司', '123456789', '123456789', '123456789', 10, 'IUH9McsCIlDdBcsxc6OGNXIkPJmc9QuHlqJAc77suxMSvIRMCgDOBF6WRaSl', 'ruixinglong@xxkj.com'),
(7, 'admin', '$2y$10$Fv7mxcBivM1lo9/sp6F9FOtc6Et1wKXE3FqYF9c2JHHL3UvKA/PwS', '埠孙冷库', '99999999', '99999999', '99999999', 10, '6P2zFGi2DK0osnlz3H2heCKrTdSWIURl9TXgP16AVyhcRSLIWNot3nFvc2G9', 'ruixinglong@xxkj.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods_log`
--
ALTER TABLE `goods_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods_log_detail`
--
ALTER TABLE `goods_log_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `goods_log`
--
ALTER TABLE `goods_log`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `goods_log_detail`
--
ALTER TABLE `goods_log_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
