-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2019 at 03:17 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collegems`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_college`
--

CREATE TABLE `tbl_college` (
  `college_id` int(11) NOT NULL,
  `collegename` varchar(200) NOT NULL,
  `branch` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_college`
--

INSERT INTO `tbl_college` (`college_id`, `collegename`, `branch`) VALUES
(1, 'ABC', 'Dhaka'),
(2, 'DEF', 'Comilla'),
(3, 'GHI', 'Jashore');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(11) NOT NULL,
  `rolename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `rolename`) VALUES
(1, 'Admin'),
(2, 'Co Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `studentname` varchar(200) NOT NULL,
  `college_id` int(11) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `studentname`, `college_id`, `gender`, `email`, `course`) VALUES
(3, 'abc Rahman', 1, 'Male', 'abcabc@gmail.com', 'Javascript');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `college_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `confpwd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `college_id`, `email`, `gender`, `role_id`, `password`, `confpwd`) VALUES
(1, 'jakjak', 0, 'jakjak@gmail.com', 'Male', 1, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'xyz', 1, 'xyz@gmail.com', 'Male', 2, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(3, 'uvw', 2, 'uvw@gmail.com', 'Male', 2, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(4, 'pqr', 3, 'pqr@gmail.com', 'Male', 2, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_college`
--
ALTER TABLE `tbl_college`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_college`
--
ALTER TABLE `tbl_college`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
