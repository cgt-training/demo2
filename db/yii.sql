-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 28, 2017 at 05:26 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.6.30-7+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii`
--
CREATE DATABASE IF NOT EXISTS `yii` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `yii`;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', NULL),
('user', '2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'admin', NULL, NULL, NULL, NULL),
('author', 1, NULL, NULL, NULL, 1493275642, 1493275642),
('authors', 1, NULL, NULL, NULL, 1493275975, 1493275975),
('create_branch', 2, NULL, NULL, NULL, NULL, NULL),
('create_company', 2, 'create company', NULL, NULL, NULL, NULL),
('create_country', 2, 'create_country', NULL, NULL, 1493289068, 1493289068),
('create_department', 2, NULL, NULL, NULL, NULL, NULL),
('createPost', 2, 'Create a post', NULL, NULL, 1493271566, 1493271566),
('delete_branch', 2, NULL, NULL, NULL, NULL, NULL),
('delete_company', 2, NULL, NULL, NULL, NULL, NULL),
('delete_department', 2, NULL, NULL, NULL, NULL, NULL),
('manager', 1, 'manager', NULL, NULL, NULL, NULL),
('permission', 1, 'per', NULL, NULL, 1493272828, 1493272828),
('student', 1, 'student', NULL, NULL, NULL, NULL),
('update_branch', 2, NULL, NULL, NULL, NULL, NULL),
('update_company', 2, NULL, NULL, NULL, NULL, NULL),
('update_department', 2, NULL, NULL, NULL, NULL, NULL),
('updatecheckss', 2, 'hi', NULL, NULL, 1493356484, 1493356484),
('user', 1, 'user', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'create_branch'),
('authors', 'create_branch'),
('manager', 'create_branch'),
('user', 'create_branch'),
('admin', 'create_company'),
('manager', 'create_company'),
('student', 'create_company'),
('user', 'create_company'),
('admin', 'create_country'),
('student', 'create_country'),
('admin', 'create_department'),
('student', 'create_department'),
('user', 'create_department'),
('admin', 'createPost'),
('authors', 'createPost'),
('student', 'createPost'),
('user', 'createPost'),
('admin', 'delete_branch'),
('authors', 'delete_branch'),
('student', 'delete_branch'),
('admin', 'delete_company'),
('authors', 'delete_company'),
('user', 'delete_company'),
('admin', 'delete_department'),
('authors', 'delete_department'),
('user', 'delete_department'),
('admin', 'update_branch'),
('student', 'update_branch'),
('user', 'update_branch'),
('admin', 'update_company'),
('student', 'update_company'),
('user', 'update_company'),
('admin', 'update_department'),
('user', 'update_department');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_fk_id` int(11) NOT NULL,
  `branch_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch_created` datetime NOT NULL,
  `branch_status` enum('Active','Inactive','','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`branch_id`),
  KEY `company_id` (`company_fk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `company_fk_id`, `branch_name`, `branch_created`, `branch_status`) VALUES
(1, 2, 'demo1', '2017-04-24 00:00:00', 'Active'),
(2, 2, 'demo2', '2017-04-24 00:00:00', 'Active'),
(3, 1, 'demo3', '2017-04-24 00:00:00', 'Active'),
(4, 1, 'demo2', '2017-04-24 00:00:00', 'Active'),
(5, 1, 'demo2', '2017-04-24 00:00:00', 'Inactive'),
(6, 1, 'demo2', '2017-04-24 00:00:00', 'Active'),
(7, 1, 'fgh', '2017-04-04 00:00:00', 'Active'),
(8, 5, 'branch', '0000-00-00 00:00:00', 'Active'),
(9, 2, 'asd234', '2017-04-18 00:00:00', 'Active'),
(10, 2, 'dfs86dw', '2017-04-18 00:00:00', 'Active'),
(11, 1, 'demo24', '2017-04-18 00:00:00', 'Active'),
(12, 8, 'demo24', '2017-04-19 00:00:00', 'Active'),
(13, 1, 'demo1', '2017-04-11 00:00:00', 'Active'),
(14, 8, 'demo1', '2017-04-17 00:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_profile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_created` datetime NOT NULL,
  `company_status` enum('Active','Inactive','','') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_email`, `company_address`, `company_profile`, `company_created`, `company_status`) VALUES
(1, 'cg', 'cg@gmail.com', '6th road', 'demo', '2017-04-04 00:00:00', 'Inactive'),
(2, 'altus', 'altus@gmail.com', 'address', 'test', '0000-00-00 00:00:00', 'Active'),
(4, 'test', 'test@gmail.com', 'address', 'demo', '2017-04-18 00:00:00', 'Active'),
(5, 'demo', 'demo@gmail.com', 'test', 'test', '2017-04-27 00:00:00', 'Active'),
(6, 'test', 'test@gmail.com', 'test', 'te', '0000-00-00 00:00:00', 'Active'),
(7, 'test', 'rahul@', 'address', 'demo', '2017-04-12 00:00:00', 'Active'),
(8, 'rahul', 'racxc@gmail.com', 'address', 'demo', '2017-04-11 00:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `population` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `code`, `name`, `population`, `country_image`) VALUES
(1, '2001', 'india', '120cr', ''),
(2, 'xasd', 'asd', 'sdf', ''),
(3, 'sdfsd', 'sdf', 'sdf', ''),
(4, 'sd', 'ds', 'sdf', ''),
(5, 'sd', 'ds', 'sdf', ''),
(6, 'sd', 'ds', 'sdf', ''),
(7, 'sd', 'ds', 'sdf', ''),
(8, 'xasdas', 'asd', 'asd', ''),
(9, 'dfg', 'dfg', 'fgh', ''),
(10, 'dfg', 'sdf', 'dfg', ''),
(11, 'dfg', 'dfg', 'dfg', ''),
(12, 'dsdf', 'sdf', 'sdf', ''),
(13, 'dsdf', 'sdf', 'sdf', ''),
(14, 'dsdf', 'sdf', 'sdf', ''),
(15, 'asdf', 'asd', 'dfg', ''),
(16, 'sdf', 'dfg', 'asd', 'uploads/dfg.jpeg'),
(17, 'india', 'asd', 'xcv', 'uploads/asd.jpeg'),
(18, 'code', 'newupdate', '123', 'uploads/testss.jpeg'),
(19, 'dfg', 'xcv', 'dfg', 'uploads/xcv.jpeg'),
(20, 'cxc', 'xc', 'xc', 'uploads/xc.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_fk_id` int(11) NOT NULL,
  `branch_fk_id` int(11) NOT NULL,
  `department_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department_create` datetime NOT NULL,
  `department_status` enum('Active','Inactive','','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`department_id`),
  KEY `company_id` (`company_fk_id`),
  KEY `branch_id` (`branch_fk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `company_fk_id`, `branch_fk_id`, `department_name`, `department_create`, `department_status`) VALUES
(1, 1, 3, 'test', '2017-04-19 00:00:00', 'Active'),
(2, 1, 7, 'test', '2017-04-25 00:00:00', 'Active'),
(3, 1, 1, 'xcv', '2017-04-24 00:00:00', 'Active'),
(4, 1, 7, 'dfg', '2017-04-11 00:00:00', 'Active'),
(5, 1, 11, 'department', '2017-04-05 00:00:00', 'Active'),
(6, 1, 3, 'tests', '2017-04-11 00:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1492673106),
('m130524_201442_init', 1492673115),
('m140506_102106_rbac_init', 1493113225),
('m170425_050824_create_news_table', 1493097324),
('m170425_052257_add_position_column_to_news_table', 1493098090),
('m170425_053109_add_social_media_column_to_news_table', 1493098336);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `position` int(11) DEFAULT NULL,
  `social_media` enum('facebook','google','twitter','github') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oldprojects`
--

DROP TABLE IF EXISTS `oldprojects`;
CREATE TABLE IF NOT EXISTS `oldprojects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `population` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `code`, `name`, `population`) VALUES
(2, '', 'test', 'test', '2121'),
(4, '', '45', 'demo', '123'),
(5, '', '2', 'india', 'wer'),
(6, '', '8558', 'tests', '120 CR'),
(7, '', 'sdf', 'sdf', 'sdf'),
(8, '', 'bvcb', 'cvb', 'cvb'),
(9, '', 'product', 'product', 'products'),
(10, '', 'sdf', 'dsf', 'sdf'),
(11, 'wer', 'dfg', 'dfsd', 'dsf'),
(12, 'sdf', 'sdf', 'sdf', 'sdf'),
(15, 'sdf', 'dfg', 'dfgdfg', 'dfgdfg'),
(16, 'sdf', 'product', 'sdfsdf', 'sdf'),
(17, 'title', 'eww', 'rahul', '2552'),
(18, '', 'asd', 'asd', 'asdasd'),
(19, 'df', '34', 'sdf', 'sdfsdf'),
(20, 'sdf', 'fgdfg', 'dfg', '324324'),
(21, 'asdasddf', 'fgh', 'fgh', 'fgh'),
(22, 'rahul', '234', 'fsdf', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `title`, `details`, `created_at`, `updated_at`) VALUES
(1, 'jkjhkjhk', '', 0, 0),
(2, 'jkjhkjhk ghfghfgh', '', 0, 0),
(3, 'rahul', '', 0, 0),
(4, 'rahulcgfg', '', 0, 0),
(5, 'dfgfdg', '', 1492686298, 1492686298),
(6, 'zxczxc', 'zxczxc', 1492686795, 1492686795),
(7, 'asdasd', 'sdfsdf', 1492686871, 1492686871),
(8, 'rahul singh', 'singh', 1492686894, 1492686894);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'rahul', 'lVRx3rAel9QszhYBlcpOXJCBXVrEG3KJ', '$2y$13$2pRqKk6E8GBrnP0sSjmfRuFdio9aANJ/bFl4IS9a6z2JFlBkfmW46', NULL, 'singh@gmail.com', 10, 1492676437, 1492676437),
(2, 'singh', 'yjf9WWf8EGROpf3nr7uVq5EPrUIUlFbU', '$2y$13$lcBjYtUxlEIEbPDSY9SO1utEa4xq41Wo81I08vHRT2baormKoYhsa', NULL, 'rahul@gmail.com', 10, 1492676625, 1492676625),
(3, 'cg', 'LlzzZ7EZQGaUceylyGn_VM0l_-4zmQH2', '$2y$13$H/SgEr175vHP76uMxGRzLewZOu9khC6nb0jfRDKRv1J/RvqfJBKpi', NULL, 'rahuls@gmail.com', 10, 1492676673, 1492676673);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `company_id` FOREIGN KEY (`company_fk_id`) REFERENCES `company` (`company_id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `branch_id` FOREIGN KEY (`branch_fk_id`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`company_fk_id`) REFERENCES `company` (`company_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
