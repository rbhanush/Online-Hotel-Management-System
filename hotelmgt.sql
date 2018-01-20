-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2015 at 11:51 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotelmgt`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE IF NOT EXISTS `adminlogin` (
  `id` int(11) NOT NULL,
  `user` varchar(35) NOT NULL,
  `pass` varchar(35) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `user`, `pass`) VALUES
(1, 'rohit27', '9819779559'),
(2, 'rohit', 'rohit');

-- --------------------------------------------------------

--
-- Table structure for table `bankdetails`
--

CREATE TABLE IF NOT EXISTS `bankdetails` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `bankname` varchar(30) NOT NULL,
  `balance` int(11) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankdetails`
--

INSERT INTO `bankdetails` (`id`, `username`, `bankname`, `balance`, `cardno`, `password`) VALUES
(1, 'pankaj', 'Canara Bank', 99000, '12345', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `message` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'Rohit Bhanushali', 'mav.rohit27@gmail.com', 9594912368, 'Hi!!');

-- --------------------------------------------------------

--
-- Table structure for table `hallbooking`
--

CREATE TABLE IF NOT EXISTS `hallbooking` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `ndays` int(11) NOT NULL,
  `rate` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `transid` varchar(20) NOT NULL,
  `bankname` varchar(30) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `username`, `transid`, `bankname`, `amount`, `cardno`, `password`) VALUES
(1, 'pankaj', '1441308985', 'Canara Bank', '6000.00', '12345', '12345'),
(2, 'pankaj', '1442761550', 'Canara Bank', '12000.00', '12345', '12345'),
(3, 'pankaj', '1442862797', 'Canara Bank', '3000.00', '12345', '12345'),
(4, 'pankaj', '1442863089', 'Canara Bank', '4500.00', '12345', '12345'),
(5, 'pankaj', '1442863089', 'Canara Bank', '4500.00', '12345', '12345'),
(6, 'pankaj', '1442863572', 'Canara Bank', '3000.00', '12345', '12345'),
(7, 'pankaj', '1442863958', 'Canara Bank', '3000.00', '12345', '12345'),
(8, 'pankaj', '1443197323', 'Canara Bank', '9000.00', '12345', '12345'),
(9, 'pankaj', '1443197629', 'Canara Bank', '3000.00', '12345', '12345'),
(10, 'pankaj', '1443203888', 'Canara Bank', '6000.00', '12345', '12345'),
(11, 'pankaj', '1443204367', 'Canara Bank', '1500.00', '12345', '12345'),
(12, 'pankaj', '1443204460', 'Canara Bank', '1500.00', '12345', '12345'),
(13, 'pankaj', '1443207544', 'Canara Bank', '50000.00', '12345', '12345'),
(14, 'pankaj', '1443207706', 'Canara Bank', '1500.00', '12345', '12345'),
(15, 'pankaj', '1443258363', 'Canara Bank', '50000.00', '12345', '12345'),
(16, 'pankaj', '1443258421', 'Canara Bank', '50000.00', '12345', '12345'),
(17, 'pankaj', '1443288505', 'Canara Bank', '100000.00', '12345', '12345'),
(18, 'pankaj', '1443288546', 'Canara Bank', '1500.00', '12345', '12345'),
(19, 'pankaj', '1443288648', 'Canara Bank', '1500.00', '12345', '12345'),
(20, 'pankaj', '1443289294', 'Canara Bank', '1500.00', '12345', '12345'),
(21, 'pankaj', '1443289364', 'Canara Bank', '3000.00', '12345', '12345'),
(22, 'pankaj', '1443289939', 'Canara Bank', '3000.00', '12345', '12345'),
(23, 'pankaj', '1443289980', 'Canara Bank', '3000.00', '12345', '12345'),
(24, 'pankaj', '1443290408', 'Canara Bank', '1500.00', '12345', '12345'),
(25, 'pankaj', '1443290547', 'Canara Bank', '3000.00', '12345', '12345'),
(26, 'pankaj', '1443290771', 'Canara Bank', '3000.00', '12345', '12345'),
(27, 'pankaj', '1443290771', 'Canara Bank', '3000.00', '12345', '12345'),
(28, 'pankaj', '1443290885', 'Canara Bank', '1500.00', '12345', '12345'),
(29, 'pankaj', '1443290885', 'Canara Bank', '1500.00', '12345', '12345'),
(30, 'pankaj', '1443290959', 'Canara Bank', '1500.00', '12345', '12345'),
(31, 'pankaj', '1443291551', 'Canara Bank', '1500.00', '12345', '12345'),
(32, 'pankaj', '1443292005', 'Canara Bank', '4500.00', '12345', '12345'),
(33, 'pankaj', '1443292473', 'Canara Bank', '3000.00', '12345', '12345'),
(34, 'pankaj', '1443292705', 'Canara Bank', '3000.00', '12345', '12345'),
(35, 'pankaj', '1443293009', 'Canara Bank', '3000.00', '12345', '12345'),
(36, 'pankaj', '1443326715', 'Canara Bank', '3000.00', '12345', '12345'),
(37, 'pankaj', '1443327755', 'Canara Bank', '3000.00', '12345', '12345'),
(38, 'pankaj', '1443327878', 'Canara Bank', '3000.00', '12345', '12345'),
(39, 'pankaj', '1443328607', 'Canara Bank', '3000.00', '12345', '12345'),
(40, 'pankaj', '1443338088', 'Canara Bank', '3000.00', '12345', '12345'),
(41, 'pankaj', '1443338217', 'Canara Bank', '3000.00', '12345', '12345'),
(42, 'pankaj', '1443338304', 'Canara Bank', '3000.00', '12345', '12345'),
(43, 'pankaj', '1443338768', 'Canara Bank', '3000.00', '12345', '12345'),
(44, 'pankaj', '1443364070', 'Canara Bank', '3000.00', '12345', '12345'),
(45, 'pankaj', '1443364384', 'Canara Bank', '3000.00', '12345', '12345'),
(46, 'pankaj', '1443364715', 'Canara Bank', '3000.00', '12345', '12345'),
(47, 'pankaj', '1443372355', 'Canara Bank', '3000.00', '12345', '12345'),
(48, 'pankaj', '1443374594', 'Canara Bank', '3000.00', '12345', '12345'),
(49, 'pankaj', '1443374648', 'Canara Bank', '100000.00', '12345', '12345'),
(50, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(51, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(52, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(53, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(54, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(55, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(56, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(57, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(58, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(59, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(60, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(61, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(62, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(63, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(64, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(65, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(66, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(67, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(68, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(69, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(70, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(71, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(72, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(73, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(74, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(75, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(76, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(77, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(78, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(79, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(80, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(81, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(82, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(83, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(84, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(85, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(86, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(87, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(88, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(89, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(90, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(91, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(92, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(93, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(94, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(95, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(96, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(97, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(98, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(99, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(100, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(101, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(102, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(103, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(104, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(105, 'pankaj', '1443375075', 'Canara Bank', '3000.00', '12345', '12345'),
(106, 'pankaj', '1443378666', 'Canara Bank', '3000.00', '12345', '12345'),
(107, 'pankaj', '1443380034', 'Canara Bank', '100000.00', '12345', '12345'),
(108, 'pankaj', '1443380034', 'Canara Bank', '100000.00', '12345', '12345'),
(109, 'pankaj', '1443380034', 'Canara Bank', '100000.00', '12345', '12345'),
(110, 'pankaj', '1443707318', 'Canara Bank', '3000.00', '12345', '12345'),
(111, 'pankaj', '1443722046', 'Canara Bank', '3000.00', '12345', '12345'),
(112, 'pankaj', '1443722068', 'Canara Bank', '10000.00', '12345', '12345'),
(113, 'pankaj', '1443729026', 'Canara Bank', '3000.00', '12345', '12345'),
(114, 'pankaj', '1443729610', 'Canara Bank', '50000.00', '12345', '12345'),
(115, 'pankaj', '1443729646', 'Canara Bank', '13500.00', '12345', '12345'),
(116, 'pankaj', '1443733043', 'Canara Bank', '3000.00', '12345', '12345'),
(117, 'pankaj', '1443733065', 'Canara Bank', '18000.00', '12345', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(11) NOT NULL,
  `first_name` varchar(35) NOT NULL,
  `user` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `city` varchar(35) NOT NULL,
  `state` varchar(35) NOT NULL,
  `country` varchar(35) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `security_question` text NOT NULL,
  `answer` varchar(35) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `first_name`, `user`, `password`, `gender`, `city`, `state`, `country`, `phone`, `email`, `security_question`, `answer`) VALUES
(1, 'Pankaj Bhanushali', 'pankaj', '12345', 'Male', 'Mumbai', 'Maharashtra', 'India', 9999999999, '123@gmail.com', 'where did you celebrate your last birthday?', 'Mumbai'),
(2, 'Shashank Bhanushali', 'shashank', '12345', 'Male', ' Mumbai', 'Maharashtra', 'India', 9594912368, '1234@gmail.com', 'where did you celebrate your last birthday?', 'Mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `roombooking`
--

CREATE TABLE IF NOT EXISTS `roombooking` (
  `id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `roomno` int(11) NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `ndays` int(11) NOT NULL,
  `category` varchar(35) NOT NULL,
  `type` varchar(35) NOT NULL,
  `option` varchar(35) NOT NULL,
  `rate` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roombooking`
--

INSERT INTO `roombooking` (`id`, `username`, `roomno`, `checkindate`, `checkoutdate`, `ndays`, `category`, `type`, `option`, `rate`) VALUES
(7, 'pankaj', 201, '2015-10-09', '2015-10-10', 2, 'Room', 'Deluxe', 'Ac', '3000.00'),
(8, 'pankaj', 101, '2015-10-02', '2015-10-02', 1, 'Room', 'Single', 'Ac', '9000.00'),
(9, 'pankaj', 102, '2015-10-02', '2015-10-02', 1, 'Room', 'Single', 'Ac', '9000.00');

-- --------------------------------------------------------

--
-- Table structure for table `roomtypes`
--

CREATE TABLE IF NOT EXISTS `roomtypes` (
  `roomno` int(11) NOT NULL,
  `roomtype` varchar(35) NOT NULL,
  `ac` varchar(6) NOT NULL DEFAULT 'Non ac'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomtypes`
--

INSERT INTO `roomtypes` (`roomno`, `roomtype`, `ac`) VALUES
(101, 'Single', 'Ac'),
(102, 'Single', 'Ac'),
(103, 'Single', 'Non Ac'),
(201, 'Deluxe', 'Ac'),
(301, 'Suite', 'Ac'),
(302, 'Suite', 'Ac'),
(303, 'Suite', 'Non Ac');

-- --------------------------------------------------------

--
-- Table structure for table `tariff`
--

CREATE TABLE IF NOT EXISTS `tariff` (
  `no` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `rate` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tariff`
--

INSERT INTO `tariff` (`no`, `name`, `rate`) VALUES
(1, 'Single Room Non AC 	', '800.00'),
(2, 'Single Room AC', '9000.00'),
(3, 'Deluxe Room Non AC', '1200.00'),
(4, 'Deluxe Room AC', '1500.00'),
(5, 'Suite Room Non AC', '2000.00'),
(6, 'Suite Room AC', '2500.00'),
(7, 'Hall', '50000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `bankdetails`
--
ALTER TABLE `bankdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hallbooking`
--
ALTER TABLE `hallbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `roombooking`
--
ALTER TABLE `roombooking`
  ADD PRIMARY KEY (`id`), ADD KEY `userid` (`username`);

--
-- Indexes for table `roomtypes`
--
ALTER TABLE `roomtypes`
  ADD PRIMARY KEY (`roomno`);

--
-- Indexes for table `tariff`
--
ALTER TABLE `tariff`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bankdetails`
--
ALTER TABLE `bankdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `hallbooking`
--
ALTER TABLE `hallbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roombooking`
--
ALTER TABLE `roombooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tariff`
--
ALTER TABLE `tariff`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
