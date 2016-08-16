-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2016 at 07:45 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sea`
--

-- --------------------------------------------------------

--
-- Table structure for table `sea_franchise_courses`
--

CREATE TABLE `sea_franchise_courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `course_acmas` tinyint(4) DEFAULT NULL,
  `course_writeasy` tinyint(4) DEFAULT NULL,
  `course_iaa` tinyint(4) DEFAULT NULL,
  `course_funmaths` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sea_franchise_education_details`
--

CREATE TABLE `sea_franchise_education_details` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `college_university` varchar(100) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `completed_in_year` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sea_franchise_level`
--

CREATE TABLE `sea_franchise_level` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sea_franchise_oth_train_att`
--

CREATE TABLE `sea_franchise_oth_train_att` (
  `user_id` int(10) NOT NULL,
  `course_type` varchar(10) DEFAULT NULL,
  `course_name` varchar(10) DEFAULT NULL,
  `institution` varchar(30) DEFAULT NULL,
  `course_compl_year` date DEFAULT NULL,
  `occupation` varchar(30) DEFAULT NULL,
  `purpose` varchar(100) DEFAULT NULL,
  `fees` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sea_franchise_resid_address`
--

CREATE TABLE `sea_franchise_resid_address` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `doorno` varchar(10) DEFAULT NULL,
  `streetname` varchar(30) DEFAULT NULL,
  `area` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `pincode` int(6) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `nationality` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sea_level`
--

CREATE TABLE `sea_level` (
  `id` smallint(6) NOT NULL,
  `franchise_level` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `sea_roles` (
  `id` smallint(6) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `sea_student_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sea_student_pers_details`
--

CREATE TABLE `sea_student_pers_details` (
  `fath_name` varchar(70) DEFAULT NULL,
  `fath_mobno` int(10) DEFAULT NULL,
  `moth_name` varchar(70) DEFAULT NULL,
  `moth_mobno` int(10) DEFAULT NULL,
  `fath_email` varchar(50) DEFAULT NULL,
  `fath_qualif` varchar(30) DEFAULT NULL,
  `fath_occup` varchar(30) DEFAULT NULL,
  `moth_qualif` varchar(30) DEFAULT NULL,
  `land_no` int(15) DEFAULT NULL,
  `school_name` varchar(30) DEFAULT NULL,
  `school_add` varchar(70) DEFAULT NULL,
  `school_mobno` int(10) DEFAULT NULL,
  `program_name` varchar(10) DEFAULT NULL,
  `course_name` varchar(30) DEFAULT NULL,
  `level_name` varchar(30) DEFAULT NULL,
  `fsib_name` varchar(50) DEFAULT NULL,
  `ssib_name` varchar(50) DEFAULT NULL,
  `fsib_sname` varchar(50) DEFAULT NULL,
  `fsib_age` int(3) DEFAULT NULL,
  `fsib_gender` varchar(6) DEFAULT NULL,
  `fsib_stand` varchar(10) NOT NULL,
  `ssib_sname` varchar(50) DEFAULT NULL,
  `ssib_age` int(3) NOT NULL,
  `ssib_gender` int(3) DEFAULT NULL,
  `ssib_stand` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sea_users`
--

CREATE TABLE `sea_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `middle_name` varchar(250) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('MALE','FEMALE') DEFAULT NULL,
  `age` smallint(6) DEFAULT NULL,
  `landno` varchar(15) DEFAULT NULL,
  `mobileno` int(15) DEFAULT NULL,
  `birthplace` varchar(30) DEFAULT NULL,
  `franchiseetypeId` int(11) NOT NULL,
  `franch_name` varchar(30) DEFAULT NULL,
  `image_path` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sea_users`
--

INSERT INTO `sea_users` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `middle_name`, `date_of_birth`, `gender`, `age`, `landno`, `mobileno`, `birthplace`, `franchiseetypeId`, `franch_name`, `image_path`) VALUES
(1, 'admin', '123456', 'phaniapsr@gmail.com', 'Phani', 'Chinta', 'Kumar', '1985-08-02', 'MALE', 30, NULL, NULL, NULL, 1, NULL, NULL),
(2, 'Anand', '123456', 'anand@gmail.com', 'Anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(3, 'Ravi', '123456', 'ravi@gmial.com', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 3, NULL, NULL),
(4, 'Ravi2', '123456', 'rav3i@gmial.com', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 3, NULL, NULL),
(5, 'Raghav', '123456', 'raghav@gmil.com', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(6, 'Malabar', '123456', 'malabar', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 3, NULL, NULL),
(7, '', '', 'vasu@gmail.com', 'Praveen', 'Chinta', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(8, '', '', 'varun@gmial.com', 'Phani', 'Chinta', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(9, '', '', 'varun@gmial.com', 'Phani', 'Chinta', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(10, '', '', 'varun@gmial.com', 'Phani', 'Chinta', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(11, '', '', 'varun@gmial.com', 'Phani', 'Chinta', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(12, '', '', 'prasad@gmail.com', 'Prasad', 'c', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(13, '', '123456', 'wow@gmial.com', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(14, '', '123456', 'paesze@gmail.com', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(15, 'Ratest', '123456', 'reste@test.com', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(16, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(17, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(18, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(19, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(20, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(21, 'murali', '', 'manohar.763@gmail', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(22, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(23, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(24, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(25, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(26, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(27, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(28, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(29, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(30, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(31, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(32, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(33, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(34, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(35, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(36, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 3, NULL, NULL),
(37, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(38, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(39, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 3, NULL, NULL),
(40, 'manohar', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(41, 'manohar', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(42, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(43, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(44, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(45, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(46, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(47, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(48, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(49, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(50, 'murali', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(51, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 3, NULL, NULL),
(52, '', '', 'adsf@gma.com', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(53, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(54, 'fd', 'murali', 'manohar.763@gmail', 'murali', 'manohar', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(55, 'fd', 'murali', 'manohar.763@gmail', 'murali', 'manohar', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(56, 'ml', 'kkdlk', 'manohar.763@gmail', 'murali', 'kdfl', 'kldsj', '2001-01-01', 'FEMALE', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(57, 'manohar', 'manohar', 'manohar.763@gmail', 'murali', 'manhar', '', '0000-00-00', 'MALE', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(58, 'dsf', 'ksd', 'manohar.763@gmail', 'jkljdslj', 'lksjdl', '', '0000-00-00', 'FEMALE', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(59, 'fdsasd', '0dsf', 'manohar.763@gmail', 'dsf', 'dsf', '', '2001-01-01', 'MALE', NULL, NULL, NULL, NULL, 3, NULL, NULL),
(60, 'dfa', 'sdfd', 'ksjladk@gma.com', 'dsf', 'sdf', 'dsf', '2001-01-01', 'MALE', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(61, 'dfsf', 'Panangipalli@1', 'manohar.763@gmail', 'mano', 'mural', '', '0000-00-00', 'MALE', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(62, 'man', 'Panangipalli@2', 'manohar.763@gmail', 'dsaf', 'dsf', '', '0000-00-00', 'FEMALE', NULL, NULL, 2147483647, 'mandapea', 3, 'man', NULL),
(63, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(64, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(65, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(66, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(67, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(68, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(69, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(70, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(71, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(72, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(73, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(74, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(75, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(76, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(77, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(78, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(79, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(80, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(81, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(82, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(83, '', '', '', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(84, '', '', 'fads@gma.com', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(85, '', '', 'fads@gma.com', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(86, '', '', 'manohar.763@gmail', '', '', '', '2001-01-01', '', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(87, '', 'manoh', 'manohar.763@gmail', 'dsf', 'sdfadf', '', '2001-01-01', 'MALE', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(88, '', 'ksdjf', 'manohar.763@gmail', 'jdlsf', 'kljsdkl', 'jkds;j', '2001-01-01', 'FEMALE', NULL, NULL, NULL, NULL, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sea_user_role`
--

CREATE TABLE `sea_user_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sea_user_role`
--

INSERT INTO `sea_user_role` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sea_franchise_courses`
--
ALTER TABLE `sea_franchise_courses`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `sea_franchise_courses`
--
ALTER TABLE `sea_franchise_courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sea_franchise_level`
--
ALTER TABLE `sea_franchise_level`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sea_level`
--
ALTER TABLE `sea_level`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sea_roles`
--
ALTER TABLE `sea_roles`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sea_student_details`
--
ALTER TABLE `sea_student_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sea_users`
--
ALTER TABLE `sea_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `sea_user_role`
--
ALTER TABLE `sea_user_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
