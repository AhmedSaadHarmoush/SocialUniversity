-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2015 at 12:41 PM
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
('c995045269356740d544a9ad465bc14a', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.11 Safari/537.36', 1425555271, 'a:2:{s:9:"user_data";a:38:{i:0;s:2:"40";s:2:"id";s:2:"40";i:1;s:5:"Tarek";s:8:"username";s:5:"Tarek";i:2;s:19:"./files/img/222.jpg";s:11:"profile_url";s:19:"./files/img/222.jpg";i:3;s:1:"0";s:3:"age";s:1:"0";i:4;s:6:"7amada";s:8:"fname_en";s:6:"7amada";i:5;s:0:"";s:8:"mname_en";s:0:"";i:6;s:7:"ibrahim";s:8:"lname_en";s:7:"ibrahim";i:7;s:1:"0";s:6:"gov_id";s:1:"0";i:8;s:1:"0";s:7:"mob_num";s:1:"0";i:9;s:1:"0";s:9:"phone_num";s:1:"0";i:10;s:0:"";s:7:"address";s:0:"";i:11;s:1:"0";s:6:"active";s:1:"0";i:12;s:19:"0000-00-00 00:00:00";s:11:"last_active";s:19:"0000-00-00 00:00:00";i:13;s:32:"202cb962ac59075b964b07152d234b70";s:8:"password";s:32:"202cb962ac59075b964b07152d234b70";i:14;s:0:"";s:5:"email";s:0:"";i:15;s:1:"1";s:4:"type";s:1:"1";i:16;s:4:"male";s:6:"gender";s:4:"male";i:17;s:1:"0";s:10:"activation";s:1:"0";i:18;s:19:"2015-03-05 09:30:03";s:7:"created";s:19:"2015-03-05 09:30:03";}s:9:"type_data";a:1:{i:0;a:18:{i:0;s:2:"40";s:7:"user_id";s:2:"40";i:1;s:1:"0";s:4:"cgpa";s:1:"0";i:2;s:1:"7";s:13:"department_id";s:1:"7";i:3;s:1:"0";s:8:"major_id";s:1:"0";i:4;s:1:"0";s:8:"minor_id";s:1:"0";i:5;s:1:"0";s:5:"hours";s:1:"0";i:6;s:1:"0";s:10:"student_id";s:1:"0";i:7;s:1:"0";s:5:"level";s:1:"0";i:8;s:19:"2015-03-05 09:30:03";s:7:"created";s:19:"2015-03-05 09:30:03";}}}'),
('d228cfbe398de71baf02d851f29a5a6b', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1425551686, 'a:2:{s:9:"user_data";a:38:{i:0;s:2:"40";s:2:"id";s:2:"40";i:1;s:5:"Tarek";s:8:"username";s:5:"Tarek";i:2;s:19:"./files/img/222.jpg";s:11:"profile_url";s:19:"./files/img/222.jpg";i:3;s:1:"0";s:3:"age";s:1:"0";i:4;s:6:"7amada";s:8:"fname_en";s:6:"7amada";i:5;s:0:"";s:8:"mname_en";s:0:"";i:6;s:7:"ibrahim";s:8:"lname_en";s:7:"ibrahim";i:7;s:1:"0";s:6:"gov_id";s:1:"0";i:8;s:1:"0";s:7:"mob_num";s:1:"0";i:9;s:1:"0";s:9:"phone_num";s:1:"0";i:10;s:0:"";s:7:"address";s:0:"";i:11;s:1:"0";s:6:"active";s:1:"0";i:12;s:19:"0000-00-00 00:00:00";s:11:"last_active";s:19:"0000-00-00 00:00:00";i:13;s:32:"202cb962ac59075b964b07152d234b70";s:8:"password";s:32:"202cb962ac59075b964b07152d234b70";i:14;s:0:"";s:5:"email";s:0:"";i:15;s:1:"1";s:4:"type";s:1:"1";i:16;s:4:"male";s:6:"gender";s:4:"male";i:17;s:1:"0";s:10:"activation";s:1:"0";i:18;s:19:"2015-03-05 09:30:03";s:7:"created";s:19:"2015-03-05 09:30:03";}s:9:"type_data";a:1:{i:0;a:18:{i:0;s:2:"40";s:7:"user_id";s:2:"40";i:1;s:1:"0";s:4:"cgpa";s:1:"0";i:2;s:1:"7";s:13:"department_id";s:1:"7";i:3;s:1:"0";s:8:"major_id";s:1:"0";i:4;s:1:"0";s:8:"minor_id";s:1:"0";i:5;s:1:"0";s:5:"hours";s:1:"0";i:6;s:1:"0";s:10:"student_id";s:1:"0";i:7;s:1:"0";s:5:"level";s:1:"0";i:8;s:19:"2015-03-05 09:30:03";s:7:"created";s:19:"2015-03-05 09:30:03";}}}');

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `post_id`, `user_id`, `created`) VALUES
(30, 'sdkjfnskhbsk', 36, 40, '2015-03-05 10:15:44'),
(32, 'dsibcushdcbdsuhjcbsk', 39, 40, '2015-03-05 10:19:21'),
(33, 'ggg', 38, 40, '2015-03-05 12:48:49'),
(35, 'sdfghjkl;', 40, 40, '2015-03-05 13:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `departements`
--

CREATE TABLE IF NOT EXISTS `departements` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departements`
--

INSERT INTO `departements` (`id`, `name`, `manager`, `created`) VALUES
(6, 'ComputerScience', 'Yasser  Fouad', '2015-03-05 09:04:01'),
(7, 'Chemistry', 'Selim Mohamed', '2015-03-05 09:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE IF NOT EXISTS `docs` (
`user_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `salry` float NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `created` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`user_id`, `department_id`, `salry`, `type`, `created`) VALUES
(35, 6, 0, 0, 0),
(36, 7, 0, 0, 0);

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
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`groupid` int(11) NOT NULL,
  `name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`groupid`, `name`, `subject_id`, `active`, `created`) VALUES
(14, 'Programming1', 24, 1425539679, '2015-03-05 09:10:41'),
(15, 'Programming2', 25, 1425539686, '2015-03-05 09:10:42'),
(16, 'Discrete', 26, 1425539687, '2015-03-05 09:10:46'),
(17, 'Java', 27, 1425539456, '2015-03-05 09:10:56'),
(18, 'Chemistry2', 29, 1425539704, '2015-03-05 09:15:04'),
(19, 'Chemsitry4', 31, 1425539710, '2015-03-05 09:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE IF NOT EXISTS `group_members` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`user_id`, `group_id`, `type`, `created`) VALUES
(40, 18, 0, '2015-03-05 10:15:09'),
(35, 14, 1, '2015-03-05 12:00:11'),
(35, 17, 1, '2015-03-05 12:00:47'),
(40, 14, 0, '2015-03-05 12:48:19');

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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `imgs`
--

INSERT INTO `imgs` (`id`, `url`, `name`, `user_id`, `cat_id`, `ext`, `size`, `created`) VALUES
(49, 'C:/xampp/htdocs/code/files/img/10602686_10201758201996707_22336804_n.jpg', '10602686_10201758201996707_22336804_n.jpg', 35, 0, '.jpg', 63, '2015-03-05 07:02:45'),
(50, 'C:/xampp/htdocs/code/files/img/400755_10200489713222802_1436011082_n.jpg', '400755_10200489713222802_1436011082_n.jpg', 36, 0, '.jpg', 61, '2015-03-05 07:03:36'),
(51, 'C:/xampp/htdocs/code/files/img/222.jpg', '222.jpg', 40, 0, '.jpg', 6, '2015-03-05 08:16:15'),
(52, 'C:/xampp/htdocs/code/files/img/3840x24002.jpg', '3840x24002.jpg', 40, 0, '.jpg', 617, '2015-03-05 08:17:23'),
(53, 'C:/xampp/htdocs/code/files/img/2lIPt1.jpg', '2lIPt1.jpg', 40, 0, '.jpg', 209, '2015-03-05 08:18:52'),
(54, 'C:/xampp/htdocs/code/files/img/10394596_301196000088951_2737162820728305160_n2.jpg', '10394596_301196000088951_2737162820728305160_n2.jpg', 40, 0, '.jpg', 5, '2015-03-05 08:22:52'),
(55, 'C:/xampp/htdocs/code/files/file/Cathode_Ray_Tube_.pdf', 'Cathode_Ray_Tube_.pdf', 40, 0, '.pdf', 127, '2015-03-05 09:19:58'),
(56, 'C:/xampp/htdocs/code/files/file/Cathode_Ray_Tube_1.pdf', 'Cathode_Ray_Tube_1.pdf', 40, 0, '.pdf', 127, '2015-03-05 09:23:12'),
(57, 'C:/xampp/htdocs/code/files/file/Cathode_Ray_Tube_2.pdf', 'Cathode_Ray_Tube_2.pdf', 40, 0, '.pdf', 127, '2015-03-05 09:24:00'),
(58, 'C:/xampp/htdocs/code/files/file/Cathode_Ray_Tube_3.pdf', 'Cathode_Ray_Tube_3.pdf', 40, 0, '.pdf', 127, '2015-03-05 09:28:40'),
(59, 'C:/xampp/htdocs/code/files/file/Cathode_Ray_Tube_4.pdf', 'Cathode_Ray_Tube_4.pdf', 40, 0, '.pdf', 127, '2015-03-05 09:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
`id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`, `created`) VALUES
(188, 36, 40, '2015-03-05 10:15:39'),
(189, 39, 40, '2015-03-05 10:19:00'),
(190, 37, 40, '2015-03-05 10:20:16'),
(192, 38, 40, '2015-03-05 10:21:34'),
(194, 40, 35, '2015-03-05 12:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `msgs`
--

CREATE TABLE IF NOT EXISTS `msgs` (
`id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `msg` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sent` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `seen_at` datetime NOT NULL,
  `typing` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `msgs`
--

INSERT INTO `msgs` (`id`, `to_id`, `from_id`, `msg`, `sent`, `seen`, `seen_at`, `typing`) VALUES
(21, 40, 35, 'hi takek', '2015-03-05 12:29:37', 0, '0000-00-00 00:00:00', 0),
(22, 35, 35, 'sdhcvsj', '2015-03-05 12:33:54', 0, '0000-00-00 00:00:00', 0),
(23, 40, 35, 'jadvajgva', '2015-03-05 12:34:03', 0, '0000-00-00 00:00:00', 0),
(24, 24, 40, 'jagsvxagjvxaj', '2015-03-05 12:36:13', 0, '0000-00-00 00:00:00', 0),
(25, 35, 40, 'dshbchjs', '2015-03-05 12:38:20', 0, '0000-00-00 00:00:00', 0),
(26, 35, 35, 'jhfvdsjf', '2015-03-05 13:09:21', 0, '0000-00-00 00:00:00', 0),
(27, 35, 35, 'jdfvdikhfgd', '2015-03-05 13:09:28', 0, '0000-00-00 00:00:00', 0),
(28, 35, 35, 'kbsk', '2015-03-05 13:09:29', 0, '0000-00-00 00:00:00', 0),
(29, 35, 35, 'fkvhbsk', '2015-03-05 13:09:29', 0, '0000-00-00 00:00:00', 0),
(30, 35, 35, 'ervkjbdfk', '2015-03-05 13:09:30', 0, '0000-00-00 00:00:00', 0),
(31, 35, 35, 'kdfhbvdk', '2015-03-05 13:09:30', 0, '0000-00-00 00:00:00', 0),
(32, 40, 40, 'dskhcbshdk', '2015-03-05 13:34:43', 0, '0000-00-00 00:00:00', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `post`, `quiz`, `ans_1`, `ans_2`, `ans_3`, `ans_4`, `type`, `cat_id`, `user_id`, `img_url`, `groupe_id`, `created`) VALUES
(36, 'Ù…ÙˆØ§Ø¹ÙŠØ¯ Ø§Ù„Ø§Ù…ØªØ­Ø§Ù†Ø§Øª', '20/6 Ù…ÙˆØ§Ø¹ÙŠØ¯ Ø§Ù„Ø§Ù…ØªØ­Ø§Ù†Ø§Øª :', 0, NULL, NULL, NULL, NULL, 0, NULL, 24, NULL, 0, '2015-03-05 09:30:53'),
(37, NULL, 'gwiyfgiyfer\r\n', 0, NULL, NULL, NULL, NULL, 1, NULL, 40, NULL, 14, '2015-03-05 10:17:09'),
(38, NULL, '', 0, NULL, NULL, NULL, NULL, 1, NULL, 40, './files/img/3840x24002.jpg', 14, '2015-03-05 10:17:23'),
(39, NULL, '', 0, NULL, NULL, NULL, NULL, 1, NULL, 40, './files/img/2lIPt1.jpg', 18, '2015-03-05 10:18:52'),
(40, NULL, '', 0, NULL, NULL, NULL, NULL, 1, NULL, 40, './files/img/10394596_301196000088951_2737162820728305160_n2.jpg', 14, '2015-03-05 10:22:52'),
(45, NULL, '', 0, NULL, NULL, NULL, NULL, 2, NULL, 40, './files/file/Cathode_Ray_Tube_4.pdf', 14, '2015-03-05 11:43:10');

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

--
-- Dumping data for table `set_subjects`
--

INSERT INTO `set_subjects` (`user_id`, `subject_id`, `statue`, `gpa`, `active`, `tearm`, `quiz1`, `med`, `quiz2`, `oural`, `pre_tol`, `pract`, `thery`, `total`, `created`) VALUES
(40, 29, '', '0', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2015-03-05 10:15:09'),
(40, 24, '', '0', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2015-03-05 12:48:19');

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

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`user_id`, `cgpa`, `department_id`, `major_id`, `minor_id`, `hours`, `student_id`, `level`, `created`) VALUES
(37, '0', 6, 0, 0, 0, 0, 0, '2015-03-05 07:26:25'),
(38, '0', 6, 0, 0, 0, 0, 0, '2015-03-05 07:26:44'),
(39, '0', 7, 0, 0, 0, 0, 0, '2015-03-05 07:27:06'),
(40, '0', 7, 0, 0, 0, 0, 0, '2015-03-05 07:30:03');

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `code`, `code_old`, `departement`, `require_id`, `active_set`, `created`) VALUES
(24, 'Programming1', 'Cs102', '', 6, 0, 1, '2015-03-05 09:08:51'),
(25, 'Programming2', 'Cs201', 'Cs201', 6, 24, 0, '2015-03-05 09:09:30'),
(26, 'Discrete', 'Cs203', 'Cs203', 6, 24, 0, '2015-03-05 09:10:05'),
(27, 'Java', 'Cs205', 'Cs205', 6, 25, 1, '2015-03-05 09:10:38'),
(28, 'Chemistry1', 'Ch101', 'Ch101', 7, 0, 0, '2015-03-05 09:11:19'),
(29, 'Chemistry2', 'Ch102', 'Ch102', 7, 0, 1, '2015-03-05 09:11:40'),
(30, 'Chemsitry3', 'Ch103', 'Ch103', 7, 28, 0, '2015-03-05 09:13:16'),
(31, 'Chemsitry4', 'Ch104', 'Ch104', 7, 29, 1, '2015-03-05 09:13:41');

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
  `mname_en` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname_en` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gov_id` int(15) NOT NULL,
  `mob_num` int(15) NOT NULL,
  `phone_num` int(10) NOT NULL,
  `address` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_active` datetime NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '1',
  `gender` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `activation` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `profile_url`, `age`, `fname_en`, `mname_en`, `lname_en`, `gov_id`, `mob_num`, `phone_num`, `address`, `active`, `last_active`, `password`, `email`, `type`, `gender`, `activation`, `created`) VALUES
(35, 'Yasser', './files/img/10602686_10201758201996707_22336804_n.jpg', 20, 'Yasser ', '', 'Fouad', 0, 0, 0, '', 0, '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', '', 3, 'male', 0, '2015-03-05 07:00:23'),
(36, 'selim', './files/img/400755_10200489713222802_1436011082_n.jpg', 0, 'Selim', '', 'Mohamed', 0, 0, 0, '', 0, '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', '', 2, 'male', 0, '2015-03-05 07:00:48'),
(37, 'Mohamed', NULL, 0, '', '', '', 0, 0, 0, '', 0, '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', '', 1, 'male', 0, '2015-03-05 07:26:25'),
(38, 'Amr', NULL, 0, '', '', '', 0, 0, 0, '', 0, '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', '', 1, 'male', 0, '2015-03-05 07:26:44'),
(39, 'Zakaria', NULL, 0, '', '', '', 0, 0, 0, '', 0, '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', '', 1, 'male', 0, '2015-03-05 07:27:06'),
(40, 'Tarek', './files/img/222.jpg', 0, '7amada', '', 'ibrahim', 0, 0, 0, '', 0, '0000-00-00 00:00:00', '202cb962ac59075b964b07152d234b70', '', 1, 'male', 0, '2015-03-05 07:30:03');

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
 ADD PRIMARY KEY (`groupid`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `departements`
--
ALTER TABLE `departements`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `groupid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `imgs`
--
ALTER TABLE `imgs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=202;
--
-- AUTO_INCREMENT for table `msgs`
--
ALTER TABLE `msgs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
