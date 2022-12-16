-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 15, 2022 at 11:19 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
CREATE TABLE IF NOT EXISTS `exam` (
  `exam_id` int NOT NULL AUTO_INCREMENT,
  `academic_year` varchar(255) DEFAULT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `section_name` varchar(255) DEFAULT NULL,
  `exam_type` varchar(255) DEFAULT NULL,
  `class_group` varchar(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `is_subjective` int NOT NULL DEFAULT '0',
  `subjective_mark` double(11,2) NOT NULL DEFAULT '0.00',
  `subjective_pass_mark` double(11,2) NOT NULL DEFAULT '0.00',
  `is_objective` int NOT NULL DEFAULT '0',
  `objective_mark` double(11,2) NOT NULL DEFAULT '0.00',
  `objective_pass_mark` double(11,2) NOT NULL DEFAULT '0.00',
  `is_practical` int NOT NULL DEFAULT '0',
  `practical_mark` double(11,2) NOT NULL DEFAULT '0.00',
  `practical_pass_mark` double(11,2) NOT NULL DEFAULT '0.00',
  `total_mark` double(11,2) NOT NULL,
  `is_attendance` int NOT NULL DEFAULT '0',
  `is_status` int NOT NULL DEFAULT '0',
  `user_id` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `last_update_by` int DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `academic_year`, `class_name`, `section_name`, `exam_type`, `class_group`, `course_name`, `is_subjective`, `subjective_mark`, `subjective_pass_mark`, `is_objective`, `objective_mark`, `objective_pass_mark`, `is_practical`, `practical_mark`, `practical_pass_mark`, `total_mark`, `is_attendance`, `is_status`, `user_id`, `datetime`, `last_update_by`, `last_update_date`) VALUES
(10, '2022(Jan) - 2022(Dec)', 'X', 'A-Science', 'Half-Yearly Examination-2022', 'Science', 'Physics', 1, 50.00, 20.00, 1, 25.00, 10.00, 1, 25.00, 10.00, 100.00, 0, 1, 1, '2022-12-14 13:23:37', 1, '2022-12-14 13:23:37'),
(11, '2022(Jan) - 2022(Dec)', 'X', 'A-Science', 'Half-Yearly Examination-2022', 'Science', 'Bangla I', 1, 70.00, 28.00, 1, 30.00, 12.00, 0, 0.00, 0.00, 100.00, 0, 1, 1, '2022-12-14 14:23:37', 1, '2022-12-14 14:23:37'),
(12, '2022(Jan) - 2022(Dec)', 'X', 'A-Science', 'Half-Yearly Examination-2022', 'Science', 'Bangla II', 1, 70.00, 28.00, 1, 30.00, 12.00, 0, 0.00, 0.00, 100.00, 1, 1, 1, '2022-12-15 14:23:37', 1, '2022-12-15 14:23:37'),
(13, '2022(Jan) - 2022(Dec)', 'X', 'A-Science', 'Half-Yearly Examination-2022', 'Science', 'English I', 1, 70.00, 28.00, 1, 30.00, 12.00, 0, 0.00, 0.00, 100.00, 1, 1, 1, '2022-12-15 10:23:37', 1, '2022-12-15 10:23:37'),
(14, '2022(Jan) - 2022(Dec)', 'X', 'A-Science', 'Half-Yearly Examination-2022', 'Science', 'English II', 1, 70.00, 28.00, 1, 30.00, 12.00, 0, 0.00, 0.00, 100.00, 1, 1, 1, '2022-12-15 11:23:37', 1, '2022-12-15 11:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int DEFAULT '0',
  `table_id` int NOT NULL,
  `message` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `timestamp`, `user_id`, `table_id`, `message`) VALUES
(1, '2022-12-13 11:00:35', 1, 5, 'Exam Configured'),
(2, '2022-12-13 11:00:49', 1, 6, 'Exam Configured'),
(3, '2022-12-13 11:03:27', 1, 7, 'Exam Configured'),
(4, '2022-12-13 11:07:14', 1, 8, 'Exam Configured'),
(5, '2022-12-13 11:08:23', 1, 9, 'Exam Configured'),
(6, '2022-12-14 04:50:08', 1, 9, 'Exam Configured'),
(7, '2022-12-14 05:01:11', 1, 10, 'Exam Configured'),
(8, '2022-12-14 07:10:29', 1, 8, 'Exam Updated'),
(9, '2022-12-14 07:10:43', 1, 8, 'Exam Updated'),
(10, '2022-12-14 07:12:08', 1, 8, 'Exam Updated'),
(11, '2022-12-14 07:12:38', 1, 8, 'Exam Updated'),
(12, '2022-12-14 07:15:31', 1, 8, 'Exam Updated'),
(13, '2022-12-14 07:23:37', 1, 10, 'Exam Updated'),
(14, '2022-12-14 07:23:51', 1, 8, 'Exam Updated'),
(15, '2022-12-14 07:36:54', 1, 8, 'Exam Deleted'),
(16, '2022-12-14 13:27:16', 1, 5, 'Marks Added'),
(17, '2022-12-14 13:29:05', 1, 7, 'Marks Added'),
(18, '2022-12-14 13:30:15', 1, 9, 'Marks Added'),
(19, '2022-12-14 13:55:23', 1, 11, 'Marks Added'),
(20, '2022-12-14 14:05:03', 1, 1, 'Marks Added'),
(21, '2022-12-14 14:05:46', 1, 0, 'Marks Added'),
(22, '2022-12-14 14:27:20', 1, 2, 'Marks Added'),
(23, '2022-12-14 14:30:37', 1, 15, 'Marks Added'),
(24, '2022-12-14 14:31:24', 1, 19, 'Marks Added'),
(25, '2022-12-14 14:32:01', 1, 23, 'Marks Added'),
(26, '2022-12-14 14:35:01', 1, 25, 'Marks Added'),
(27, '2022-12-14 14:48:10', 1, 36, 'Marks Added'),
(28, '2022-12-14 15:12:44', 1, 38, 'Marks Added'),
(29, '2022-12-14 15:14:08', 1, 1, 'Marks Added'),
(30, '2022-12-14 15:14:22', 1, 1, 'Marks Added'),
(31, '2022-12-14 15:15:10', 1, 1, 'Marks Added'),
(32, '2022-12-14 15:15:31', 1, 1, 'Marks Added'),
(33, '2022-12-14 15:15:41', 1, 1, 'Marks Added'),
(34, '2022-12-14 15:15:54', 1, 1, 'Marks Added'),
(35, '2022-12-14 15:16:01', 1, 1, 'Marks Added'),
(36, '2022-12-14 15:16:14', 1, 1, 'Marks Added'),
(37, '2022-12-14 15:16:37', 1, 1, 'Marks Added'),
(38, '2022-12-14 15:17:50', 1, 1, 'Marks Added'),
(39, '2022-12-14 15:17:59', 1, 1, 'Marks Added'),
(40, '2022-12-14 15:36:54', 1, 1, 'Marks Added'),
(41, '2022-12-14 15:37:39', 1, 1, 'Marks Added'),
(42, '2022-12-15 05:21:23', 1, 1, 'Marks Added'),
(43, '2022-12-15 05:24:47', 1, 0, 'Product PDF Generated'),
(44, '2022-12-15 05:25:29', 1, 0, 'Product PDF Generated'),
(45, '2022-12-15 06:06:26', 1, 0, 'Product PDF Generated'),
(46, '2022-12-15 10:14:43', 1, 0, 'Progress Report PDF Generated'),
(47, '2022-12-15 10:14:53', 1, 0, 'Progress Report PDF Generated'),
(48, '2022-12-15 10:16:56', 1, 0, 'Progress Report PDF Generated'),
(49, '2022-12-15 10:17:16', 1, 0, 'Progress Report PDF Generated'),
(50, '2022-12-15 10:18:01', 1, 0, 'Progress Report PDF Generated'),
(51, '2022-12-15 10:18:07', 1, 0, 'Progress Report PDF Generated'),
(52, '2022-12-15 10:28:10', 1, 0, 'Progress Report PDF Generated'),
(53, '2022-12-15 10:30:39', 1, 0, 'Progress Report PDF Generated'),
(54, '2022-12-15 10:30:58', 1, 0, 'Progress Report PDF Generated'),
(55, '2022-12-15 10:31:22', 1, 0, 'Progress Report PDF Generated'),
(56, '2022-12-15 10:31:40', 1, 0, 'Progress Report PDF Generated'),
(57, '2022-12-15 10:31:53', 1, 0, 'Progress Report PDF Generated'),
(58, '2022-12-15 10:32:12', 1, 0, 'Progress Report PDF Generated'),
(59, '2022-12-15 10:32:21', 1, 0, 'Progress Report PDF Generated'),
(60, '2022-12-15 10:32:55', 1, 0, 'Progress Report PDF Generated'),
(61, '2022-12-15 10:33:04', 1, 0, 'Progress Report PDF Generated'),
(62, '2022-12-15 12:10:31', 1, 0, 'Progress Report PDF Generated'),
(63, '2022-12-15 12:11:24', 1, 0, 'Progress Report PDF Generated'),
(64, '2022-12-15 12:11:40', 1, 0, 'Progress Report PDF Generated'),
(65, '2022-12-15 12:13:16', 1, 0, 'Progress Report PDF Generated'),
(66, '2022-12-15 12:13:26', 1, 0, 'Progress Report PDF Generated'),
(67, '2022-12-15 12:14:24', 1, 0, 'Progress Report PDF Generated'),
(68, '2022-12-15 12:15:01', 1, 0, 'Progress Report PDF Generated'),
(69, '2022-12-15 12:15:17', 1, 0, 'Progress Report PDF Generated'),
(70, '2022-12-15 12:16:00', 1, 0, 'Progress Report PDF Generated'),
(71, '2022-12-15 12:21:31', 1, 0, 'Progress Report PDF Generated'),
(72, '2022-12-15 12:29:14', 1, 0, 'Progress Report PDF Generated'),
(73, '2022-12-15 12:30:46', 1, 1, 'Marks Added'),
(74, '2022-12-15 12:30:53', 1, 0, 'Progress Report PDF Generated'),
(75, '2022-12-15 12:32:07', 1, 1, 'Marks Added'),
(76, '2022-12-15 12:32:11', 1, 0, 'Progress Report PDF Generated'),
(77, '2022-12-15 12:33:13', 1, 1, 'Marks Added'),
(78, '2022-12-15 12:34:11', 1, 1, 'Marks Added'),
(79, '2022-12-15 12:34:16', 1, 0, 'Progress Report PDF Generated'),
(80, '2022-12-15 12:36:09', 1, 0, 'Progress Report PDF Generated'),
(81, '2022-12-15 12:43:46', 1, 0, 'Progress Report PDF Generated'),
(82, '2022-12-15 12:51:17', 1, 0, 'Progress Report PDF Generated'),
(83, '2022-12-15 12:51:40', 1, 0, 'Progress Report PDF Generated'),
(84, '2022-12-15 12:53:23', 1, 0, 'Progress Report PDF Generated'),
(85, '2022-12-15 12:53:37', 1, 0, 'Progress Report PDF Generated'),
(86, '2022-12-15 12:53:43', 1, 0, 'Progress Report PDF Generated'),
(87, '2022-12-15 12:53:59', 1, 0, 'Progress Report PDF Generated'),
(88, '2022-12-15 12:54:13', 1, 0, 'Progress Report PDF Generated'),
(89, '2022-12-15 12:54:25', 1, 0, 'Progress Report PDF Generated'),
(90, '2022-12-15 12:54:36', 1, 0, 'Progress Report PDF Generated'),
(91, '2022-12-15 12:54:43', 1, 0, 'Progress Report PDF Generated'),
(92, '2022-12-15 12:55:22', 1, 0, 'Progress Report PDF Generated'),
(93, '2022-12-15 12:55:48', 1, 0, 'Progress Report PDF Generated'),
(94, '2022-12-15 12:56:45', 1, 0, 'Progress Report PDF Generated'),
(95, '2022-12-15 12:57:22', 1, 0, 'Progress Report PDF Generated'),
(96, '2022-12-15 12:57:40', 1, 0, 'Progress Report PDF Generated'),
(97, '2022-12-15 12:58:12', 1, 0, 'Progress Report PDF Generated'),
(98, '2022-12-15 12:59:06', 1, 0, 'Progress Report PDF Generated'),
(99, '2022-12-15 12:59:44', 1, 0, 'Progress Report PDF Generated'),
(100, '2022-12-15 13:00:00', 1, 0, 'Progress Report PDF Generated'),
(101, '2022-12-15 13:00:32', 1, 0, 'Progress Report PDF Generated'),
(102, '2022-12-15 13:00:40', 1, 0, 'Progress Report PDF Generated'),
(103, '2022-12-15 13:00:56', 1, 0, 'Progress Report PDF Generated'),
(104, '2022-12-15 13:01:15', 1, 0, 'Progress Report PDF Generated'),
(105, '2022-12-15 13:02:13', 1, 0, 'Progress Report PDF Generated'),
(106, '2022-12-15 13:02:47', 1, 0, 'Progress Report PDF Generated'),
(107, '2022-12-15 13:07:39', 1, 0, 'Progress Report PDF Generated'),
(108, '2022-12-15 13:08:07', 1, 0, 'Progress Report PDF Generated'),
(109, '2022-12-15 13:08:22', 1, 0, 'Progress Report PDF Generated'),
(110, '2022-12-15 13:09:34', 1, 0, 'Progress Report PDF Generated'),
(111, '2022-12-15 13:11:20', 1, 0, 'Progress Report PDF Generated'),
(112, '2022-12-15 13:15:26', 1, 0, 'Progress Report PDF Generated'),
(113, '2022-12-15 13:16:29', 1, 0, 'Progress Report PDF Generated'),
(114, '2022-12-15 13:17:16', 1, 0, 'Progress Report PDF Generated'),
(115, '2022-12-15 13:26:40', 1, 0, 'Progress Report PDF Generated'),
(116, '2022-12-15 13:27:28', 1, 0, 'Progress Report PDF Generated'),
(117, '2022-12-15 13:27:50', 1, 0, 'Progress Report PDF Generated'),
(118, '2022-12-15 13:31:31', 1, 0, 'Progress Report PDF Generated'),
(119, '2022-12-15 13:34:03', 1, 0, 'Progress Report PDF Generated'),
(120, '2022-12-15 13:34:40', 1, 0, 'Progress Report PDF Generated'),
(121, '2022-12-15 13:35:21', 1, 0, 'Progress Report PDF Generated'),
(122, '2022-12-15 13:35:47', 1, 0, 'Progress Report PDF Generated'),
(123, '2022-12-15 13:37:49', 1, 0, 'Progress Report PDF Generated'),
(124, '2022-12-15 13:38:00', 1, 0, 'Progress Report PDF Generated'),
(125, '2022-12-15 13:38:04', 1, 0, 'Progress Report PDF Generated'),
(126, '2022-12-15 13:38:29', 1, 0, 'Progress Report PDF Generated'),
(127, '2022-12-15 13:39:09', 1, 0, 'Progress Report PDF Generated'),
(128, '2022-12-15 13:39:40', 1, 0, 'Progress Report PDF Generated'),
(129, '2022-12-15 13:40:04', 1, 0, 'Progress Report PDF Generated'),
(130, '2022-12-15 13:41:35', 1, 0, 'Progress Report PDF Generated'),
(131, '2022-12-15 13:41:59', 1, 0, 'Progress Report PDF Generated'),
(132, '2022-12-15 13:42:30', 1, 0, 'Progress Report PDF Generated'),
(133, '2022-12-15 13:42:38', 1, 0, 'Progress Report PDF Generated'),
(134, '2022-12-15 13:42:55', 1, 0, 'Progress Report PDF Generated'),
(135, '2022-12-15 13:43:10', 1, 0, 'Progress Report PDF Generated'),
(136, '2022-12-15 13:43:39', 1, 0, 'Progress Report PDF Generated'),
(137, '2022-12-15 13:44:06', 1, 0, 'Progress Report PDF Generated'),
(138, '2022-12-15 13:44:20', 1, 0, 'Progress Report PDF Generated'),
(139, '2022-12-15 13:44:44', 1, 0, 'Progress Report PDF Generated'),
(140, '2022-12-15 13:45:10', 1, 0, 'Progress Report PDF Generated'),
(141, '2022-12-15 13:45:25', 1, 0, 'Progress Report PDF Generated'),
(142, '2022-12-15 13:45:52', 1, 0, 'Progress Report PDF Generated'),
(143, '2022-12-15 13:50:45', 1, 0, 'Progress Report PDF Generated'),
(144, '2022-12-15 13:58:02', 1, 0, 'Progress Report PDF Generated'),
(145, '2022-12-15 13:59:29', 1, 0, 'Progress Report PDF Generated'),
(146, '2022-12-15 14:00:12', 1, 0, 'Progress Report PDF Generated'),
(147, '2022-12-15 14:05:18', 1, 0, 'Progress Report PDF Generated'),
(148, '2022-12-15 14:05:28', 1, 0, 'Progress Report PDF Generated'),
(149, '2022-12-15 14:05:44', 1, 0, 'Progress Report PDF Generated'),
(150, '2022-12-15 14:06:17', 1, 0, 'Progress Report PDF Generated'),
(151, '2022-12-15 14:08:16', 1, 0, 'Progress Report PDF Generated'),
(152, '2022-12-15 14:08:38', 1, 0, 'Progress Report PDF Generated'),
(153, '2022-12-15 14:08:53', 1, 0, 'Progress Report PDF Generated'),
(154, '2022-12-15 14:09:16', 1, 0, 'Progress Report PDF Generated'),
(155, '2022-12-15 14:09:28', 1, 0, 'Progress Report PDF Generated'),
(156, '2022-12-15 14:09:42', 1, 0, 'Progress Report PDF Generated'),
(157, '2022-12-15 14:10:22', 1, 0, 'Progress Report PDF Generated'),
(158, '2022-12-15 14:10:41', 1, 0, 'Progress Report PDF Generated'),
(159, '2022-12-15 14:13:24', 1, 0, 'Progress Report PDF Generated'),
(160, '2022-12-15 14:14:22', 1, 0, 'Progress Report PDF Generated'),
(161, '2022-12-15 14:14:34', 1, 0, 'Progress Report PDF Generated'),
(162, '2022-12-15 14:15:17', 1, 0, 'Progress Report PDF Generated'),
(163, '2022-12-15 14:17:09', 1, 0, 'Progress Report PDF Generated'),
(164, '2022-12-15 14:17:25', 1, 0, 'Progress Report PDF Generated'),
(165, '2022-12-15 14:17:41', 1, 0, 'Progress Report PDF Generated'),
(166, '2022-12-15 14:17:48', 1, 0, 'Progress Report PDF Generated'),
(167, '2022-12-15 14:18:26', 1, 0, 'Progress Report PDF Generated'),
(168, '2022-12-15 14:18:49', 1, 0, 'Progress Report PDF Generated'),
(169, '2022-12-15 14:18:56', 1, 0, 'Progress Report PDF Generated'),
(170, '2022-12-15 14:19:04', 1, 0, 'Progress Report PDF Generated'),
(171, '2022-12-15 14:22:20', 1, 0, 'Progress Report PDF Generated'),
(172, '2022-12-15 14:23:43', 1, 0, 'Progress Report PDF Generated'),
(173, '2022-12-15 14:26:37', 1, 0, 'Progress Report PDF Generated'),
(174, '2022-12-15 14:28:12', 1, 0, 'Progress Report PDF Generated'),
(175, '2022-12-15 14:28:37', 1, 0, 'Progress Report PDF Generated'),
(176, '2022-12-15 14:29:12', 1, 0, 'Progress Report PDF Generated'),
(177, '2022-12-15 14:31:31', 1, 0, 'Progress Report PDF Generated'),
(178, '2022-12-15 14:31:58', 1, 0, 'Progress Report PDF Generated'),
(179, '2022-12-15 14:32:18', 1, 0, 'Progress Report PDF Generated'),
(180, '2022-12-15 14:37:37', 1, 0, 'Progress Report PDF Generated'),
(181, '2022-12-15 14:37:57', 1, 0, 'Progress Report PDF Generated'),
(182, '2022-12-15 14:38:26', 1, 0, 'Progress Report PDF Generated'),
(183, '2022-12-15 14:39:25', 1, 0, 'Progress Report PDF Generated'),
(184, '2022-12-15 14:39:41', 1, 0, 'Progress Report PDF Generated'),
(185, '2022-12-15 14:39:52', 1, 0, 'Progress Report PDF Generated'),
(186, '2022-12-15 14:41:22', 1, 0, 'Progress Report PDF Generated'),
(187, '2022-12-15 14:41:35', 1, 0, 'Progress Report PDF Generated'),
(188, '2022-12-15 14:41:41', 1, 0, 'Progress Report PDF Generated'),
(189, '2022-12-15 14:41:48', 1, 0, 'Progress Report PDF Generated'),
(190, '2022-12-15 14:42:46', 1, 0, 'Progress Report PDF Generated'),
(191, '2022-12-15 14:43:08', 1, 0, 'Progress Report PDF Generated'),
(192, '2022-12-15 14:44:25', 1, 0, 'Progress Report PDF Generated'),
(193, '2022-12-15 14:45:59', 1, 0, 'Progress Report PDF Generated'),
(194, '2022-12-15 15:01:10', 1, 0, 'Progress Report PDF Generated'),
(195, '2022-12-15 15:01:43', 1, 0, 'Progress Report PDF Generated'),
(196, '2022-12-15 15:02:12', 1, 0, 'Progress Report PDF Generated'),
(197, '2022-12-15 15:07:37', 1, 0, 'Progress Report PDF Generated'),
(198, '2022-12-15 15:08:48', 1, 0, 'Progress Report PDF Generated'),
(199, '2022-12-15 15:09:03', 1, 0, 'Progress Report PDF Generated'),
(200, '2022-12-15 15:12:26', 1, 0, 'Progress Report PDF Generated'),
(201, '2022-12-15 15:14:35', 1, 0, 'Progress Report PDF Generated'),
(202, '2022-12-15 15:15:18', 1, 0, 'Progress Report PDF Generated'),
(203, '2022-12-15 15:16:00', 1, 0, 'Progress Report PDF Generated'),
(204, '2022-12-15 15:17:31', 1, 0, 'Progress Report PDF Generated'),
(205, '2022-12-15 15:24:34', 1, 0, 'Progress Report PDF Generated'),
(206, '2022-12-15 15:25:34', 1, 0, 'Progress Report PDF Generated'),
(207, '2022-12-15 15:25:40', 1, 0, 'Progress Report PDF Generated'),
(208, '2022-12-15 15:25:49', 1, 0, 'Progress Report PDF Generated'),
(209, '2022-12-15 15:26:45', 1, 0, 'Progress Report PDF Generated'),
(210, '2022-12-15 15:27:03', 1, 0, 'Progress Report PDF Generated'),
(211, '2022-12-15 15:28:15', 1, 0, 'Progress Report PDF Generated'),
(212, '2022-12-15 15:29:18', 1, 0, 'Progress Report PDF Generated'),
(213, '2022-12-15 15:29:32', 1, 0, 'Progress Report PDF Generated'),
(214, '2022-12-15 15:30:49', 1, 0, 'Progress Report PDF Generated'),
(215, '2022-12-15 15:31:56', 1, 0, 'Progress Report PDF Generated'),
(216, '2022-12-15 15:32:18', 1, 0, 'Progress Report PDF Generated'),
(217, '2022-12-15 15:32:34', 1, 0, 'Progress Report PDF Generated'),
(218, '2022-12-15 15:32:59', 1, 0, 'Progress Report PDF Generated'),
(219, '2022-12-15 15:33:18', 1, 0, 'Progress Report PDF Generated'),
(220, '2022-12-15 15:33:27', 1, 0, 'Progress Report PDF Generated'),
(221, '2022-12-15 15:43:37', 1, 0, 'Progress Report PDF Generated'),
(222, '2022-12-15 15:44:40', 1, 0, 'Progress Report PDF Generated'),
(223, '2022-12-15 15:49:05', 1, 0, 'Progress Report PDF Generated'),
(224, '2022-12-15 20:04:54', 1, 0, 'Progress Report PDF Generated'),
(225, '2022-12-15 20:05:36', 1, 0, 'Progress Report PDF Generated'),
(226, '2022-12-15 21:40:27', 1, 0, 'Progress Report PDF Generated'),
(227, '2022-12-15 22:06:52', 1, 0, 'Progress Report PDF Generated'),
(228, '2022-12-15 22:26:40', 1, 0, 'Progress Report PDF Generated'),
(229, '2022-12-15 22:27:36', 1, 0, 'Progress Report PDF Generated'),
(230, '2022-12-15 22:28:45', 1, 0, 'Progress Report PDF Generated'),
(231, '2022-12-15 22:29:16', 1, 0, 'Progress Report PDF Generated'),
(232, '2022-12-15 22:29:41', 1, 0, 'Progress Report PDF Generated'),
(233, '2022-12-15 22:29:54', 1, 0, 'Progress Report PDF Generated'),
(234, '2022-12-15 22:30:02', 1, 0, 'Progress Report PDF Generated'),
(235, '2022-12-15 22:30:48', 1, 0, 'Progress Report PDF Generated'),
(236, '2022-12-15 22:31:01', 1, 0, 'Progress Report PDF Generated'),
(237, '2022-12-15 22:31:43', 1, 0, 'Progress Report PDF Generated'),
(238, '2022-12-15 22:32:40', 1, 0, 'Progress Report PDF Generated'),
(239, '2022-12-15 22:33:00', 1, 0, 'Progress Report PDF Generated'),
(240, '2022-12-15 22:57:01', 1, 1, 'Marks Added');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

DROP TABLE IF EXISTS `mark`;
CREATE TABLE IF NOT EXISTS `mark` (
  `mark_id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `exam_id` int NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `obtained_mark` double(11,2) DEFAULT NULL,
  `subjective_mark` double(11,2) DEFAULT NULL,
  `objective_mark` double(11,2) DEFAULT NULL,
  `practical_mark` double(11,2) DEFAULT NULL,
  PRIMARY KEY (`mark_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`mark_id`, `student_id`, `exam_id`, `course_name`, `obtained_mark`, `subjective_mark`, `objective_mark`, `practical_mark`) VALUES
(37, 1, 10, 'Physics', 79.00, 39.00, 20.00, 20.00),
(38, 2, 10, 'Physics', 82.00, 44.00, 23.00, 15.00),
(39, 3, 10, 'Physics', 98.00, 50.00, 24.00, 24.00),
(40, 1, 11, 'Bangla I', 70.00, 50.00, 20.00, NULL),
(41, 2, 11, 'Bangla I', 95.00, 65.00, 30.00, NULL),
(42, 3, 11, 'Bangla I', 88.00, 60.00, 28.00, NULL),
(43, 1, 12, 'Bangla II', 85.00, 60.00, 25.00, NULL),
(44, 2, 12, 'Bangla II', 76.00, 55.00, 21.00, NULL),
(45, 3, 12, 'Bangla II', 87.00, 60.00, 27.00, NULL),
(46, 1, 13, 'English I', 100.00, 70.00, 30.00, NULL),
(47, 2, 13, 'English I', 96.00, 68.00, 28.00, NULL),
(48, 3, 13, 'English I', 78.00, 53.00, 25.00, NULL),
(49, 1, 14, 'English II', 88.00, 59.00, 29.00, NULL),
(50, 2, 14, 'English II', 20.00, 5.00, 15.00, NULL),
(51, 3, 14, 'English II', 35.00, 25.00, 10.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `student_class_id` varchar(10) DEFAULT NULL,
  `roll` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `academic_year` varchar(255) DEFAULT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `section_name` varchar(255) DEFAULT NULL,
  `class_group` varchar(255) DEFAULT NULL,
  `is_status` int NOT NULL DEFAULT '0',
  `user_id` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `last_update_by` int DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_class_id`, `roll`, `name`, `academic_year`, `class_name`, `section_name`, `class_group`, `is_status`, `user_id`, `datetime`, `last_update_by`, `last_update_date`) VALUES
(1, '18020406', 1, 'Ahsanul Haque Saad', '2022(Jan) - 2022(Dec)', 'X', 'A-Science', 'Science', 1, 1, '2022-12-14 13:23:37', 1, '2022-12-14 13:23:37'),
(2, '18020257', 2, 'Anas Al Akhil', '2022(Jan) - 2022(Dec)', 'X', 'A-Science', 'Science', 1, 1, '2022-12-14 13:23:37', 1, '2022-12-14 13:23:37'),
(3, '18020427', 3, 'Abrar Jahin', '2022(Jan) - 2022(Dec)', 'X', 'A-Science', 'Science', 1, 1, '2022-12-14 13:23:37', 1, '2022-12-14 13:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `ip_address` varchar(45) DEFAULT NULL,
  `emp_id` varchar(50) DEFAULT NULL,
  `category_id` text,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `last_login` int UNSIGNED DEFAULT NULL,
  `user_status` int DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `join_desg` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `emp_id`, `category_id`, `username`, `password`, `token`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `user_id`, `datetime`, `last_login`, `user_status`, `first_name`, `last_name`, `phone`, `address`, `join_desg`) VALUES
(1, '127.0.0.1', 'WEMP-000001', NULL, 'admin@admin.com', '$2y$08$zHYqIofSJcsHWxOG4224E./ttKMARydBqrxgfpaa8p1808EH0WicC', '', '', 'WEMP-000001', NULL, 'rZSru.qrHfjqZ4.nftowKO2a65728f9f5f977c2c', 1493196005, '4T440Gtkl0yqR09gFYODXO', 1, '2022-12-14 14:16:47', 1671146146, 1, 'Admin', 'istrator', 'N/A', '', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `user_id` int UNSIGNED DEFAULT NULL COMMENT 'foreign key',
  `group_id` mediumint UNSIGNED DEFAULT NULL COMMENT 'foreign key',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=305 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
