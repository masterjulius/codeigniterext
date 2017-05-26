-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2017 at 10:41 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_one`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(200) NOT NULL,
  `dept_created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dept_created_by` int(11) NOT NULL DEFAULT '0',
  `dept_is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `item_id` int(11) NOT NULL,
  `item_code` varchar(10) NOT NULL DEFAULT '000000',
  `item_name` varchar(100) NOT NULL,
  `item_description` text NOT NULL,
  `item_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_is_active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`item_id`, `item_code`, `item_name`, `item_description`, `item_date_created`, `item_is_active`) VALUES
(1, '000000', 'Item One', 'Item One Description...', '2017-05-11 13:43:54', 1),
(2, '000000', 'Item Two', 'Item Two Description...', '2017-05-11 13:43:54', 1),
(3, '000000', 'Item Three', 'Item Three Description...', '2017-05-11 13:44:38', 1),
(4, '000000', 'Item Four', 'Item Four Description...', '2017-05-11 13:44:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_metakeys`
--

CREATE TABLE `tbl_metakeys` (
  `key_id` bigint(20) NOT NULL,
  `key_name` tinytext NOT NULL,
  `key_is_reserved` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_metakeys`
--

INSERT INTO `tbl_metakeys` (`key_id`, `key_name`, `key_is_reserved`) VALUES
(1, '_create_user', 1),
(2, '_edit_user', 1),
(3, '_create_role', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usermeta`
--

CREATE TABLE `tbl_usermeta` (
  `meta_id` int(11) NOT NULL,
  `meta_user_id` int(11) NOT NULL,
  `meta_key_id` bigint(20) NOT NULL,
  `meta_value` text NOT NULL,
  `meta_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(120) NOT NULL,
  `user_created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_created_by` int(11) NOT NULL DEFAULT '0',
  `user_is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_password`, `user_created_date`, `user_created_by`, `user_is_active`) VALUES
(1, 'admin', '$6$rounds=5000$@eVrY49(`a sMV6|$yVP8.1jAIUswya9cCVmenu3f80YM8crxXM3M4in7hCvCrMW52crho8J1Vnt6DVSC3NUyrN2BW54viz9lUnlLE0', '2017-05-02 09:00:15', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_metakeys`
--
ALTER TABLE `tbl_metakeys`
  ADD PRIMARY KEY (`key_id`);

--
-- Indexes for table `tbl_usermeta`
--
ALTER TABLE `tbl_usermeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `usermeta_user_id` (`meta_user_id`),
  ADD KEY `meta_key_id` (`meta_key_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`,`user_created_by`),
  ADD KEY `user_created_date` (`user_created_date`),
  ADD KEY `user_created_by` (`user_created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_metakeys`
--
ALTER TABLE `tbl_metakeys`
  MODIFY `key_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_usermeta`
--
ALTER TABLE `tbl_usermeta`
  MODIFY `meta_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_usermeta`
--
ALTER TABLE `tbl_usermeta`
  ADD CONSTRAINT `tbl_usermeta_ibfk_1` FOREIGN KEY (`meta_user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_usermeta_ibfk_2` FOREIGN KEY (`meta_key_id`) REFERENCES `tbl_metakeys` (`key_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
