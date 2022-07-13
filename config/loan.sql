-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 10:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loan`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `aid` int(11) NOT NULL,
  `auth_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comm_per` decimal(10,0) NOT NULL,
  `adds` text NOT NULL,
  `is_active` int(11) NOT NULL,
  `voter_id` varchar(100) NOT NULL,
  `pan_card` varchar(100) NOT NULL,
  `pro_image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `authenticate_user`
--

CREATE TABLE `authenticate_user` (
  `au_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_roll` varchar(100) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authenticate_user`
--

INSERT INTO `authenticate_user` (`au_id`, `username`, `password`, `user_roll`, `session_id`, `status`) VALUES
(21, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'master_employee', '00000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `collect_emi`
--

CREATE TABLE `collect_emi` (
  `id` int(11) NOT NULL,
  `collection_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fine_amount` decimal(10,2) NOT NULL,
  `emi_amount` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `collected_by` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `father` varchar(100) NOT NULL,
  `adds` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `bank_ac_no` varchar(50) NOT NULL,
  `ifsc` varchar(20) NOT NULL,
  `voter_image` varchar(100) NOT NULL,
  `pan_image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(11) NOT NULL,
  `auth_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adds` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `pro_image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `auth_id`, `name`, `adds`, `phone`, `email`, `is_active`, `pro_image`, `status`) VALUES
(4, 21, 'Masud Ahmed', 'Dhubri', '9876543210', 'admin@admin.com', 0, 'NA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fine_master`
--

CREATE TABLE `fine_master` (
  `fid` int(11) NOT NULL,
  `fine_name` varchar(50) NOT NULL,
  `fine_percent` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loan_ac`
--

CREATE TABLE `loan_ac` (
  `loan_id` int(11) NOT NULL,
  `loan_ac_no` varchar(30) NOT NULL,
  `loan_amount` varchar(30) NOT NULL,
  `interest_rate` decimal(10,2) NOT NULL,
  `interest_amount` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `emi_amount` decimal(10,2) NOT NULL,
  `no_of_month` int(11) NOT NULL,
  `no_emi` int(11) NOT NULL,
  `emi_schedule` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `no_emi_left` int(11) NOT NULL,
  `fin_year_cylcle` varchar(30) NOT NULL,
  `remarks` text NOT NULL,
  `status` int(11) NOT NULL,
  `activity` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `auth_id` (`auth_id`);

--
-- Indexes for table `authenticate_user`
--
ALTER TABLE `authenticate_user`
  ADD PRIMARY KEY (`au_id`);

--
-- Indexes for table `collect_emi`
--
ALTER TABLE `collect_emi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collect_emi_ibfk_1` (`collected_by`),
  ADD KEY `collect_emi_ibfk_2` (`loan_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `auth_id` (`auth_id`);

--
-- Indexes for table `fine_master`
--
ALTER TABLE `fine_master`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `loan_ac`
--
ALTER TABLE `loan_ac`
  ADD PRIMARY KEY (`loan_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `authenticate_user`
--
ALTER TABLE `authenticate_user`
  MODIFY `au_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `collect_emi`
--
ALTER TABLE `collect_emi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fine_master`
--
ALTER TABLE `fine_master`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loan_ac`
--
ALTER TABLE `loan_ac`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`auth_id`) REFERENCES `authenticate_user` (`au_id`);

--
-- Constraints for table `collect_emi`
--
ALTER TABLE `collect_emi`
  ADD CONSTRAINT `collect_emi_ibfk_1` FOREIGN KEY (`collected_by`) REFERENCES `authenticate_user` (`au_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `collect_emi_ibfk_2` FOREIGN KEY (`loan_id`) REFERENCES `loan_ac` (`loan_id`) ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`auth_id`) REFERENCES `authenticate_user` (`au_id`);

--
-- Constraints for table `loan_ac`
--
ALTER TABLE `loan_ac`
  ADD CONSTRAINT `loan_ac_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
