-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2015 at 05:29 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtest`
--
CREATE DATABASE IF NOT EXISTS `dbtest` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbtest`;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(20) NOT NULL,
  `subservice` varchar(30) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `Addr1` text NOT NULL,
  `Addr2` text NOT NULL,
  `Addr3` text NOT NULL,
  `Time` time NOT NULL,
  `Date` date NOT NULL,
  `QueryTime` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `subservice`, `username`, `Addr1`, `Addr2`, `Addr3`, `Time`, `Date`, `QueryTime`) VALUES
(24, 'Sanitary Repair', 'dam', 'adsa', 'jgj', 'jgj', '01:01:00', '2016-02-02', 1445729327),
(25, 'Sanitary Replace', 'abcd', '1195', 'sector 16-17 hisar', '', '12:22:00', '0000-00-00', 1445869020);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `Service_ID` int(2) NOT NULL,
  `Services` varchar(20) NOT NULL DEFAULT ''''''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`Service_ID`, `Services`) VALUES
(1, '''Vehicle'''),
(2, '''Electrician'''),
(3, '''Plumber'''),
(4, '''ComputerRepair''');

-- --------------------------------------------------------

--
-- Table structure for table `subservices`
--

CREATE TABLE `subservices` (
  `Service_ID` int(2) NOT NULL DEFAULT '0',
  `subService` varchar(25) NOT NULL DEFAULT '''''',
  `subServiceID` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subservices`
--

INSERT INTO `subservices` (`Service_ID`, `subService`, `subServiceID`) VALUES
(1, '''Car Washing''', 11),
(1, '''Car Repair''', 12),
(1, '''Rent Driver''', 13),
(1, '''Rent Car''', 14),
(2, '''Fan Repair''', 21),
(2, '''AC Repair''', 22),
(2, '''Refrigerator Repair''', 23),
(2, '''Washing-Machine Repair''', 24),
(3, '''Sanitary Repair''', 31),
(3, '''Sanitary Replace''', 32),
(4, '''Computer Repair''', 41),
(4, '''Laptop Repair''', 42);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phoneNo` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `phoneNo`) VALUES
(21, 'abcd', 'abcd@xyz.com', '0af2e8b1e4a91c959f3f8ed885a39f1c', 1234567);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`Service_ID`);

--
-- Indexes for table `subservices`
--
ALTER TABLE `subservices`
  ADD UNIQUE KEY `subService` (`subService`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phoneNo` (`phoneNo`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `Service_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
