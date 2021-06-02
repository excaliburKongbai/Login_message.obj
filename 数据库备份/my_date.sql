-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-06-02 10:25:24
-- 服务器版本： 8.0.12
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `my_date`
--

-- --------------------------------------------------------

--
-- 表的结构 `my_message`
--

CREATE TABLE `my_message` (
  `id` int(4) NOT NULL,
  `my_user` varchar(24) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_Message` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `my_message`
--

INSERT INTO `my_message` (`id`, `my_user`, `user_Message`, `time`) VALUES
(1, 'excalibur', '米格-21战斗机（俄文：МиГ-21，英文：MiG-21，北约代号：Fishbed，译文：鱼窝），是苏联一型超音速喷气式第二代战斗机。米格-21战斗机采用单座三角翼气动布局，安装一台涡喷发动机，是根据朝鲜战争中喷气战斗机空战经验研制的，主要任务是高空高速截击', '2021-04-26 11:05:44'),
(2, '羽中', '散爆天下第一', '2021-05-02 20:38:55'),
(5, '瓦打我打我打我的达瓦大打我打我的', '达瓦达瓦大', '2021-05-23 19:44:28'),
(23, '8848', '我是8848', '2021-05-26 21:22:24'),
(33, 'bvvd', 'bvvd的妈高度下降1cm', '2021-05-27 10:08:58'),
(36, '战争雷霆', '111111', '2021-05-27 10:44:25'),
(37, 'bvvd', '测试2', '2021-05-27 20:58:32');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(24) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_pass` varchar(24) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `user_id`, `user_pass`) VALUES
(1, '8848', 'wacg'),
(2, '2781', '1234'),
(3, '瓦打我打我打我的达瓦大打我打我的', 'adawdawd'),
(4, '1508894594', '1508894594'),
(11, 'bvvd', '1314520123'),
(12, '2781680577', '1314520wacg'),
(13, '战争雷霆', '1314520wacg');

--
-- 转储表的索引
--

--
-- 表的索引 `my_message`
--
ALTER TABLE `my_message`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `my_message`
--
ALTER TABLE `my_message`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
