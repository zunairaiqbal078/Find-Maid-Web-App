-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 08:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `find-maid`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_record`
--

CREATE TABLE `contact_record` (
  `messageId` int(100) NOT NULL,
  `userId` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `reply` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_record`
--

INSERT INTO `contact_record` (`messageId`, `userId`, `name`, `email`, `subject`, `message`, `reply`) VALUES
(1, 4, 'Numan Zaman', 'chnumanmalaya09@gmail.com', 'Testing', 'Hi', 'none'),
(2, 4, 'Numan Zaman', 'chnumanmalaya09@gmail.com', 'ss', 'sss', 'none'),
(3, 6, 'Numan Malaya', 'chnumanmalaya09@gmail.com', 'w', 's', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `maid_record`
--

CREATE TABLE `maid_record` (
  `maidId` int(100) NOT NULL,
  `maidPic` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `service` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maid_record`
--

INSERT INTO `maid_record` (`maidId`, `maidPic`, `name`, `service`, `address`, `city`, `country`, `status`) VALUES
(1, 'team-3.jpg', 'Exxample one', 'Cooking', 'example street house no #1', 'Lahore', 'Pakistan', 'free'),
(2, 'team-3.jpg', 'Exxample two', 'Cooking', 'example street house no #1', 'Multan', 'Pakistan', 'free'),
(3, 'team-3.jpg', 'Exxample three', 'Cooking', 'example street house no #1', 'Sahiwal', 'Pakistan', 'free'),
(4, 'team-3.jpg', 'Exxample four', 'Childcare', 'example street house no #1', 'Lahore', 'Pakistan', 'free'),
(5, 'team-3.jpg', 'Exxample five', 'Childcare', 'example street house no #1', 'Multan', 'Pakistan', 'free'),
(6, 'team-3.jpg', 'Exxample six', 'Childcare', 'example street house no #1', 'Sahiwal', 'Pakistan', 'free'),
(7, 'team-3.jpg', 'Exxample seven', 'Cleaning', 'example street house no #1', 'Lahore', 'Pakistan', 'free'),
(8, 'team-3.jpg', 'Exxample eight', 'Cleaning', 'example street house no #1', 'Multan', 'Pakistan', 'free'),
(9, 'team-3.jpg', 'Exxample nine', 'Cleaning', 'example street house no #1', 'Sahiwal', 'Pakistan', 'free');

-- --------------------------------------------------------

--
-- Table structure for table `purchased_record`
--

CREATE TABLE `purchased_record` (
  `purchasedId` int(100) NOT NULL,
  `userId` int(100) NOT NULL,
  `maidId` int(100) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `amount` int(100) NOT NULL,
  `amountStatus` varchar(100) NOT NULL,
  `amountSS` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_record`
--

CREATE TABLE `user_record` (
  `userId` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zipCode` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_record`
--

INSERT INTO `user_record` (`userId`, `name`, `email`, `password`, `address`, `city`, `country`, `zipCode`, `mobile`) VALUES
(5, 'Example', 'example@gmail.com', '1234567890', '', '', '', '', ''),
(6, 'Numan Malaya', 'chnumanmalaya09@gmail.com', '1234567890', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_record`
--
ALTER TABLE `contact_record`
  ADD PRIMARY KEY (`messageId`);

--
-- Indexes for table `maid_record`
--
ALTER TABLE `maid_record`
  ADD PRIMARY KEY (`maidId`);

--
-- Indexes for table `purchased_record`
--
ALTER TABLE `purchased_record`
  ADD PRIMARY KEY (`purchasedId`);

--
-- Indexes for table `user_record`
--
ALTER TABLE `user_record`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_record`
--
ALTER TABLE `contact_record`
  MODIFY `messageId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `maid_record`
--
ALTER TABLE `maid_record`
  MODIFY `maidId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchased_record`
--
ALTER TABLE `purchased_record`
  MODIFY `purchasedId` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_record`
--
ALTER TABLE `user_record`
  MODIFY `userId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
