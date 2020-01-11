
-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2015 at 07:19 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `usci`
--

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE IF NOT EXISTS `cats` (
`id` int(11) NOT NULL,
  `cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `cat`, `created`) VALUES
(1, 'puplic', '2014-09-02 15:03:03'),
(2, 'private', '2014-09-02 15:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('8dd6c06098a4b95c25d8af897bff753d', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1424972127, 'a:47:{s:9:"user_data";s:0:"";i:0;s:1:"1";s:2:"id";s:1:"1";i:1;s:9:"amryasser";s:8:"username";s:9:"amryasser";i:2;s:43:"./files/img/_5009043_6693865_1360897347.jpg";s:11:"profile_url";s:43:"./files/img/_5009043_6693865_1360897347.jpg";i:3;s:2:"11";s:3:"age";s:2:"11";i:4;s:4:"7amo";s:8:"fname_en";s:4:"7amo";i:5;s:0:"";s:14:"father_name_en";s:0:"";i:6;s:6:"yasser";s:8:"lname_en";s:6:"yasser";i:7;s:0:"";s:8:"fname_ar";s:0:"";i:8;s:0:"";s:14:"father_name_ar";s:0:"";i:9;s:0:"";s:13:"grand_name_ar";s:0:"";i:10;s:1:"0";s:6:"gov_id";s:1:"0";i:11;s:1:"0";s:7:"mob_num";s:1:"0";i:12;s:1:"0";s:9:"phone_num";s:1:"0";i:13;s:0:"";s:7:"address";s:0:"";i:14;s:1:"0";s:6:"active";s:1:"0";i:15;s:19:"0000-00-00 00:00:00";s:11:"last_active";s:19:"0000-00-00 00:00:00";i:16;s:1:"0";s:13:"grand_name_en";s:1:"0";i:17;s:32:"202cb962ac59075b964b07152d234b70";s:8:"password";s:32:"202cb962ac59075b964b07152d234b70";i:18;s:28:"ksjdgjbh_kashdvj@yavjhm.ckuj";s:5:"email";s:28:"ksjdgjbh_kashdvj@yavjhm.ckuj";i:19;s:1:"2";s:4:"type";s:1:"2";i:20;s:4:"male";s:6:"gender";s:4:"male";i:21;s:1:"1";s:10:"activation";s:1:"1";i:22;s:19:"2014-09-02 14:59:00";s:7:"created";s:19:"2014-09-02 14:59:00";}'),
('b7fe96f8fa17f259c5cb18ad74459558', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1424967574, ''),
('bedd6cba45930e2c00da8e9119f338db', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1424965544, '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `comment` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `post_id`, `user_id`, `created`) VALUES
(2, '7alawa', 8, 0, '2014-09-04 01:45:50'),
(4, '&#1575;&#1605;&#1588;&#1610; &#1610;&#1575; &#1593;&#1576;&#1610;&#1578; :D', 10, 0, '2014-09-04 02:38:48'),
(6, '7amada meen ya madam :D', 7, 1, '2014-09-04 02:58:47'),
(7, '&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;', 10, 1, '2014-09-04 02:59:03'),
(8, '&#1605;&#1575;&#1575;&#1575;&#1575;&#1575;&#1575;&#1575;&#1575;&#1575;&#1575;&#1575;&#1575;&#1575;&#1575;&#1575;&#1575;&#1575;&#1575;&#1588;&#1610; &#1604;&#1610;&#1606;&#1575; &#1601;&#1610;&#1610;&#1587; &#1610;&#1575; &#1607;&#1576;&#1604;&#1577; :D', 10, 1, '2014-09-04 03:05:33'),
(9, '&#1575;&#1606;&#1575; &#1585;&#1575;&#1580;&#1604; &#1608;&#1579;&#1582; &#1575;&#1579;&#1575;&#1579;&#1575; &#1575;&#1606;&#1610; &#1575;&#1583;&#1610;&#1603;&#1608; &#1575;&#1604;&#1605;&#1608;&#1602;&#1593; &#1578;&#1604;&#1593;&#1576;&#1608; &#1576;&#1610;&#1607; &#1578;&#1575;&#1606;&#1610; -_-', 10, 3, '2014-09-04 03:08:27'),
(10, 'akuyfdjatfj', 7, 1, '2014-09-04 19:27:00'),
(11, '&#1581;&#1576;&#1610;&#1576;&#1610; &#1605;&#1589;&#1575;&#1569; &#1575;&#1604;&#1601;&#1590;&#1575;&#1610;&#1581; :3', 17, 0, '2014-09-05 20:01:19'),
(12, 'hhhhhhhhh', 23, 4, '2014-09-07 18:36:13'),
(13, 'hhhhhhhhhhhhhhhh (zayat)', 18, 4, '2014-09-07 18:57:25'),
(16, 'hhhhh', 23, 0, '2014-09-07 20:26:11'),
(17, 'ya bared -_-', 18, 0, '2014-09-07 20:26:47'),
(19, ':(', 24, 1, '2014-09-09 00:06:16'),
(20, 'iugfwyjfjhk', 23, 4, '2015-01-28 15:54:59'),
(21, 'kjbfehjbk', 12, 1, '2015-01-28 16:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `departements`
--

CREATE TABLE IF NOT EXISTS `departements` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departements`
--

INSERT INTO `departements` (`id`, `name`, `manager`, `created`) VALUES
(1, 'cs33', '7amo yasser', '2015-02-26 18:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE IF NOT EXISTS `docs` (
`user_id` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `salry` float NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
`id` int(11) NOT NULL,
  `name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `comments` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grupe_id` int(11) NOT NULL,
  `url` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groupe_mempers`
--

CREATE TABLE IF NOT EXISTS `groupe_mempers` (
  `user_id` int(11) NOT NULL,
  `groupe_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` int(11) NOT NULL,
  `name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `subject_id`, `active`, `created`) VALUES
(1, 'cs', 2, 1424974131, '2015-02-26 20:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `imgs`
--

CREATE TABLE IF NOT EXISTS `imgs` (
`id` int(11) NOT NULL,
  `url` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `ext` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(32) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `imgs`
--

INSERT INTO `imgs` (`id`, `url`, `name`, `user_id`, `cat_id`, `ext`, `size`, `created`) VALUES
(1, './files/img/1.jpg', 'mimo', 0, 1, 'png', 2268, '2014-09-05 15:14:36'),
(5, './files/img/1.jpg', 'sc1.png', 0, 1, 'png', 2268, '2014-09-05 16:51:09'),
(6, './files/img/1.jpg', 'download.jpg', 0, 1, 'jpg', 7521, '2014-09-05 17:00:50'),
(7, './files/img/1.jpg', '14023.png', 0, 1, 'png', 80759, '2014-09-05 19:22:40'),
(10, 'C:/xampp/htdocs/form/files/img/520 copy.png', '520 copy.png', 0, 1, 'png', 30252, '2014-09-05 19:34:01'),
(11, 'C:/xampp/htdocs/form/files/img/45369_449430698442377_1754902515_n.jpg', '45369_449430698442377_1754902515_n.jpg', 0, 0, 'jpg', 11697, '2014-09-06 12:20:50'),
(12, 'C:/xampp/htdocs/form/files/img/14023.png', '14023.png', 0, 0, 'png', 80759, '2014-09-06 13:12:31'),
(13, 'C:/xampp/htdocs/form/files/img/drops2.jpg', 'drops2.jpg', 0, 0, 'jpg', 1856277, '2014-09-06 13:15:38'),
(14, 'C:/xampp/htdocs/form/files/img/reWalls.com_65071.jpg', 'reWalls.com_65071.jpg', 0, 0, 'jpg', 351396, '2014-09-06 13:17:34'),
(15, 'C:/xampp/htdocs/form/files/img/45369_449430698442377_1754902515_n.jpg', '45369_449430698442377_1754902515_n.jpg', 1, 0, 'jpg', 11697, '2014-09-06 13:23:50'),
(16, 'C:/xampp/htdocs/form/files/img/14045.png', '14045.png', 0, 1, 'png', 75398, '2014-09-06 13:41:04'),
(17, 'C:/xampp/htdocs/form/files/img/lpu8pw2srv-2014-04-17.jpg', 'lpu8pw2srv-2014-04-17.jpg', 4, 0, 'jpg', 10559, '2014-09-07 15:35:46'),
(18, 'C:/xampp/htdocs/form/files/img/520 copy.png', '520 copy.png', 0, 1, 'png', 30252, '2014-09-07 16:02:19'),
(19, 'C:/xampp/htdocs/form/files/img/10947594_1545135265765563_1605749853_n.jpg', '10947594_1545135265765563_1605749853_n.jpg', 1, 0, 'jpg', 10589, '2015-01-28 14:06:36'),
(20, 'C:/xampp/htdocs/form/files/img/1898194277.jpg', '1898194277.jpg', 1, 0, 'jpg', 31808, '2015-02-01 14:32:09'),
(21, 'C:/xampp/htdocs/form/files/img/3840x2400.jpg', '3840x2400.jpg', 1, 0, 'jpg', 631940, '2015-02-01 14:32:34'),
(22, 'C:/xampp/htdocs/form/files/img/13792_722429374507710_4292153640361506718_n.jpg', '13792_722429374507710_4292153640361506718_n.jpg', 4, 0, 'jpg', 19704, '2015-02-01 14:40:31'),
(23, 'C:/xampp/htdocs/form/files/img/13792_722429374507710_4292153640361506718_n.jpg', '13792_722429374507710_4292153640361506718_n.jpg', 4, 0, 'jpg', 19704, '2015-02-01 14:42:43'),
(24, 'C:/xampp/htdocs/form/files/img/2lIPt.jpg', '2lIPt.jpg', 4, 0, 'jpg', 214474, '2015-02-01 14:42:51'),
(25, 'C:/xampp/htdocs/social/files/img/22.jpg', '22.jpg', 1, 0, 'jpg', 6129, '2015-02-01 14:52:02'),
(26, 'C:/xampp/htdocs/social/files/img/2lIPt.jpg', '2lIPt.jpg', 1, 0, 'jpg', 214474, '2015-02-01 14:56:07'),
(27, 'C:/xampp/htdocs/social/files/img/WP_20150122_001Ø¡.png', 'WP_20150122_001Ø¡.png', 1, 0, 'png', 741281, '2015-02-17 21:18:27'),
(28, 'C:/xampp/htdocs/social/files/img/download (1).jpg', 'download (1).jpg', 1, 0, 'jpg', 8660, '2015-02-17 21:32:53'),
(29, 'C:/xampp/htdocs/social/files/img/_5009043_6693865_1360897347.jpg', '_5009043_6693865_1360897347.jpg', 1, 0, 'jpg', 12569, '2015-02-17 21:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
`id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`, `created`) VALUES
(32, 8, 1, '2014-09-03 21:11:51'),
(45, 10, 3, '2014-09-04 03:09:05'),
(50, 8, 0, '2014-09-04 15:37:06'),
(51, 10, 0, '2014-09-04 17:28:38'),
(52, 7, 0, '2014-09-04 17:29:10'),
(53, 7, 3, '2014-09-04 19:42:29'),
(54, 18, 1, '2014-09-06 13:37:39'),
(61, 0, 4, '2014-09-07 18:45:06'),
(62, 0, 4, '2014-09-07 18:45:11'),
(63, 0, 4, '2014-09-07 18:45:20'),
(65, 18, 4, '2014-09-07 18:46:59'),
(66, 0, 4, '2014-09-07 18:48:55'),
(67, 0, 4, '2014-09-07 18:48:59'),
(68, 0, 4, '2014-09-07 18:49:03'),
(69, 0, 4, '2014-09-07 18:49:07'),
(80, 12, 4, '2014-09-07 18:57:40'),
(81, 7, 4, '2014-09-07 18:57:43'),
(83, 11, 0, '2014-09-07 20:20:22'),
(84, 24, 0, '2014-09-07 20:20:42'),
(87, 23, 0, '2014-09-08 16:27:10'),
(90, 23, 1, '2015-01-28 17:28:38'),
(91, 23, 4, '2015-01-29 19:15:19'),
(94, 12, 1, '2015-02-01 20:08:03'),
(95, 7, 1, '2015-02-01 20:15:26'),
(97, 24, 1, '2015-02-01 20:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `msgs`
--

CREATE TABLE IF NOT EXISTS `msgs` (
`id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `sent` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `seen_at` datetime NOT NULL,
  `typing` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz` tinyint(1) NOT NULL DEFAULT '0',
  `ans_1` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ans_2` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ans_3` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ans_4` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(1) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `img_url` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groupe_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `post`, `quiz`, `ans_1`, `ans_2`, `ans_3`, `ans_4`, `type`, `cat_id`, `user_id`, `img_url`, `groupe_id`, `created`) VALUES
(1, 'test', 'i am updating', 0, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, '2015-02-25 23:18:40'),
(11, 'private test', 'this is a private post :D', 0, '', '', '', '', 0, 2, 0, NULL, 0, '2014-09-04 14:08:22'),
(12, '7amada', 'date test\r\n', 0, '', '', '', '', 0, 1, 0, NULL, 0, '2014-09-05 15:19:25'),
(26, '7abib 3amoo', 'mohahahahah', 0, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 0, '2015-02-25 23:30:58'),
(27, '7amada', '7amada post :D', 0, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 0, '2015-02-26 13:11:55'),
(28, 'askgajh', 'asdayusvgasuy', 0, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 0, '2015-02-26 17:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `set_subjects`
--

CREATE TABLE IF NOT EXISTS `set_subjects` (
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `statue` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gpa` decimal(10,0) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `tearm` int(11) NOT NULL,
  `quiz1` int(2) NOT NULL,
  `med` int(2) NOT NULL,
  `quiz2` int(2) NOT NULL,
  `oural` int(2) NOT NULL,
  `pre_tol` int(2) NOT NULL,
  `pract` int(2) NOT NULL,
  `thery` int(2) NOT NULL,
  `total` int(2) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `user_id` int(11) NOT NULL,
  `cgpa` decimal(10,0) NOT NULL,
  `department_id` int(3) NOT NULL,
  `major_id` int(3) NOT NULL,
  `minor_id` int(3) NOT NULL,
  `hours` int(3) NOT NULL,
  `student_id` int(11) NOT NULL,
  `level` int(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_old` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departement` int(11) NOT NULL,
  `require_id` int(11) NOT NULL,
  `active_set` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `code`, `code_old`, `departement`, `require_id`, `active_set`, `created`) VALUES
(2, 'cs', 'mm', '55', 1, 0, 1, '2015-02-26 18:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_url` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(4) NOT NULL,
  `fname_en` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name_en` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname_en` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname_ar` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name_ar` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_name_ar` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gov_id` int(15) NOT NULL,
  `mob_num` int(15) NOT NULL,
  `phone_num` int(10) NOT NULL,
  `address` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_active` datetime NOT NULL,
  `grand_name_en` int(11) NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '1',
  `gender` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `activation` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `profile_url`, `age`, `fname_en`, `father_name_en`, `lname_en`, `fname_ar`, `father_name_ar`, `grand_name_ar`, `gov_id`, `mob_num`, `phone_num`, `address`, `active`, `last_active`, `grand_name_en`, `password`, `email`, `type`, `gender`, `activation`, `created`) VALUES
(1, 'amryasser', './files/img/_5009043_6693865_1360897347.jpg', 11, '7amo', '', 'yasser', '', '', '', 0, 0, 0, '', 0, '0000-00-00 00:00:00', 0, '202cb962ac59075b964b07152d234b70', 'ksjdgjbh_kashdvj@yavjhm.ckuj', 2, 'male', 1, '2014-09-02 12:59:00'),
(3, 'mimoyasr', NULL, 21, 'mimo', '', '', '', '', '', 0, 0, 0, '', 0, '0000-00-00 00:00:00', 0, 'c06e016f63751d7af476fd754d97a533', 'a_b@c.d', 1, 'male', 1, '2014-09-02 13:09:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cats`
--
ALTER TABLE `cats`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departements`
--
ALTER TABLE `departements`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imgs`
--
ALTER TABLE `imgs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msgs`
--
ALTER TABLE `msgs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `departements`
--
ALTER TABLE `departements`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `imgs`
--
ALTER TABLE `imgs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `msgs`
--
ALTER TABLE `msgs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
