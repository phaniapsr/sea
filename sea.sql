-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2016 at 05:44 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sea`
--

-- --------------------------------------------------------

--
-- Table structure for table `sea_franchise_education_details`
--

CREATE TABLE IF NOT EXISTS `sea_franchise_education_details` (
  `user_id` int(10) unsigned NOT NULL,
  `college_university` varchar(100) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `completed_in_year` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sea_franchise_level`
--

CREATE TABLE IF NOT EXISTS `sea_franchise_level` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `level_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sea_level`
--

CREATE TABLE IF NOT EXISTS `sea_level` (
`id` smallint(6) NOT NULL,
  `franchise_level` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sea_level`
--

INSERT INTO `sea_level` (`id`, `franchise_level`) VALUES
(1, 'State Master Franchisee'),
(2, 'District Master Franchisee'),
(3, 'Unit Franchisee');

-- --------------------------------------------------------

--
-- Table structure for table `sea_roles`
--

CREATE TABLE IF NOT EXISTS `sea_roles` (
`id` smallint(6) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sea_roles`
--

INSERT INTO `sea_roles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'State'),
(3, 'District'),
(4, 'Unit'),
(5, 'Student'),
(6, 'Consultant');

-- --------------------------------------------------------

--
-- Table structure for table `sea_student_details`
--

CREATE TABLE IF NOT EXISTS `sea_student_details` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `middle_name` varchar(250) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('MALE','FEMALE') DEFAULT NULL,
  `age` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sea_users`
--

CREATE TABLE IF NOT EXISTS `sea_users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `middle_name` varchar(250) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('MALE','FEMALE') DEFAULT NULL,
  `age` smallint(6) DEFAULT NULL,
  `franchiseetypeId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sea_users`
--

INSERT INTO `sea_users` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `middle_name`, `date_of_birth`, `gender`, `age`, `franchiseetypeId`) VALUES
(1, 'admin', '123456', 'phaniapsr@gmail.com', 'Phani', 'Chinta', 'Kumar', '1985-08-02', 'MALE', 30, 1),
(2, 'Anand', '123456', 'anand@gmail.com', 'Anand', NULL, NULL, NULL, NULL, NULL, 2),
(3, 'Ravi', '123456', 'ravi@gmial.com', '', '', '', '2001-01-01', '', NULL, 3),
(4, 'Ravi2', '123456', 'rav3i@gmial.com', '', '', '', '2001-01-01', '', NULL, 3),
(5, 'Raghav', '123456', 'raghav@gmil.com', '', '', '', '2001-01-01', '', NULL, 2),
(6, 'Malabar', '123456', 'malabar', '', '', '', '2001-01-01', '', NULL, 3),
(7, '', '', 'vasu@gmail.com', 'Praveen', 'Chinta', '', '2001-01-01', '', NULL, 4),
(8, '', '', 'varun@gmial.com', 'Phani', 'Chinta', '', '2001-01-01', '', NULL, 4),
(9, '', '', 'varun@gmial.com', 'Phani', 'Chinta', '', '2001-01-01', '', NULL, 4),
(10, '', '', 'varun@gmial.com', 'Phani', 'Chinta', '', '2001-01-01', '', NULL, 4),
(11, '', '', 'varun@gmial.com', 'Phani', 'Chinta', '', '2001-01-01', '', NULL, 4),
(12, '', '', 'prasad@gmail.com', 'Prasad', 'c', '', '2001-01-01', '', NULL, 4),
(13, '', '123456', 'wow@gmial.com', '', '', '', '2001-01-01', '', NULL, 4),
(14, '', '123456', 'paesze@gmail.com', '', '', '', '2001-01-01', '', NULL, 4),
(15, 'Ratest', '123456', 'reste@test.com', '', '', '', '2001-01-01', '', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sea_user_role`
--

CREATE TABLE IF NOT EXISTS `sea_user_role` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` smallint(5) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sea_user_role`
--

INSERT INTO `sea_user_role` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sea_franchise_level`
--
ALTER TABLE `sea_franchise_level`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sea_level`
--
ALTER TABLE `sea_level`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sea_roles`
--
ALTER TABLE `sea_roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sea_student_details`
--
ALTER TABLE `sea_student_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sea_users`
--
ALTER TABLE `sea_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sea_user_role`
--
ALTER TABLE `sea_user_role`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sea_franchise_level`
--
ALTER TABLE `sea_franchise_level`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sea_level`
--
ALTER TABLE `sea_level`
MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sea_roles`
--
ALTER TABLE `sea_roles`
MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sea_student_details`
--
ALTER TABLE `sea_student_details`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sea_users`
--
ALTER TABLE `sea_users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `sea_user_role`
--
ALTER TABLE `sea_user_role`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
