-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2020 at 06:19 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineairticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `email`, `password`) VALUES
(1, 'admin1@gmail.com', 'pass1234'),
(2, 'admin11@gmail.com', 'testpass1'),
(3, 'admin13@gmail.com', 'testpass3'),
(4, 'admin14@gmail.com', 'testpass2');

-- --------------------------------------------------------

--
-- Table structure for table `customerinfo`
--

CREATE TABLE `customerinfo` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerinfo`
--

INSERT INTO `customerinfo` (`id`, `firstname`, `lastname`, `email`, `phoneno`, `password`, `gender`, `age`) VALUES
(1, 'user', 'name', 'user1@gmail.com', '+8801282983398', '$2y$10$I0rWlwSUft6Bq0AjwWl4BumXIFPy.pwLxPFGUYryW8222fCZrIwJq', 'male', 22);

-- --------------------------------------------------------

--
-- Table structure for table `customerlogin`
--

CREATE TABLE `customerlogin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flightdetails`
--

CREATE TABLE `flightdetails` (
  `id` int(11) NOT NULL,
  `flightno` varchar(11) NOT NULL,
  `airlinesname` varchar(30) NOT NULL,
  `departure` varchar(30) NOT NULL,
  `destination` varchar(30) NOT NULL,
  `departuredate` date NOT NULL,
  `arrivaldate` date NOT NULL,
  `class` varchar(30) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flightdetails`
--

INSERT INTO `flightdetails` (`id`, `flightno`, `airlinesname`, `departure`, `destination`, `departuredate`, `arrivaldate`, `class`, `price`) VALUES
(1, 'UBG222', 'US-BANGLA', 'DHAKA', 'CHITTAGONG', '2020-05-30', '2020-05-30', 'Economy', 5000),
(2, 'UBG331', 'US-BANGLA', 'DHAKA', 'RAJHSAHI', '2020-05-30', '2020-05-30', 'Economy', 3000),
(3, 'UBG333', 'US-BANGLA', 'CHITTAGONG', 'RAJSHAHI', '2020-05-30', '2020-05-30', 'Economy', 5000),
(4, 'UBG303', 'US-BANGLA', 'CHITTAGONG', 'DHAKA', '2020-05-30', '2020-05-30', 'Economy', 3500),
(5, 'BNG595', 'US-BANGLA', 'RAJSHAHI', 'DHAKA', '2020-05-30', '2020-05-30', 'Economy', 5000),
(6, 'UBG222', 'US-BANGLA', 'DHAKA', 'CHITTAGONG', '2020-05-31', '2020-05-31', 'Economy', 4000),
(7, 'UBG222', 'US-BANGLA', 'DHAKA ', 'CHITTAGONG', '2020-06-01', '2020-06-01', 'Economy', 4000),
(8, 'UBG331', 'US-BANGLA', 'DHAKA', 'RAJSHAHI', '2020-05-31', '2020-05-31', 'Economy', 3500),
(9, 'UBG331', 'US-BANGLA', 'DHAKA', 'RAJSHAHI', '2020-06-01', '2020-06-01', 'Economy', 3500),
(10, 'UBG303', 'US-BANGLA', 'CHITTAGONG', 'DHAKA', '2020-05-31', '2020-05-31', 'Economy', 4000),
(11, 'UBG303', 'US-BANGLA', 'CHITTAGONG', 'DHAKA', '2020-06-01', '2020-06-01', 'Economy', 4000),
(12, 'UBG333', 'US-BANGLA', 'CHITTAGONG', 'RAJSHAHI', '2020-05-31', '2020-05-31', 'Economy', 5500),
(16, 'UBG333', 'US-BANGLA', 'CHITTAGONG', 'RAJSHAHI', '2020-06-01', '2020-06-01', 'Economy', 5500),
(17, 'UBG440', 'US-BANGLA', 'RAJSHAHI', 'DHAKA', '2020-05-31', '2020-05-31', 'economy', 5000),
(18, 'UBG440', 'US-BANGLA', 'RAJSHAHI', 'DHAKA', '2020-06-01', '2020-05-01', 'economy', 5000),
(19, 'UBG091', 'US-BANGLA', 'RAJSHAHI', 'CHITTAGONG', '2020-05-31', '2020-05-31', 'economy', 5500),
(20, 'UBG091', 'US-BANGLA', 'RAJSHAHI', 'CHITTAGONG', '2020-06-01', '2020-05-01', 'economy', 5500),
(21, 'UBG091', 'US-BANGLA', 'RAJSHAHI', 'CHITTAGONG', '2020-06-02', '2020-06-02', 'economy', 5500);

-- --------------------------------------------------------

--
-- Table structure for table `flightschedule`
--

CREATE TABLE `flightschedule` (
  `id` int(11) NOT NULL,
  `flightno` varchar(255) NOT NULL,
  `departuretime` varchar(255) NOT NULL,
  `arrivaltime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flightschedule`
--

INSERT INTO `flightschedule` (`id`, `flightno`, `departuretime`, `arrivaltime`) VALUES
(1, 'UBG222', '09:00AM', '09:30AM'),
(4, 'UBG331', '10:00AM', '10:30AM'),
(5, 'UBG333', '12:00PM', '12:30PM'),
(6, 'UBG303', '08:00AM', '08:30AM'),
(7, 'BNG595', '12:00PM', '12:30PM'),
(8, 'UBG222', '02:00PM', '02:30PM'),
(9, 'UBG331', '12:00PM', '12:30PM'),
(10, 'UBG333', '02:00PM', '02:30PM'),
(12, 'UBG222', '08:00PM', '08:30PM'),
(13, 'UBG331', '05:00PM', '05:30PM'),
(14, 'UBG303', '02:00PM', '02:30PM'),
(15, 'UBG303', '06:00PM', '06:30PM'),
(16, 'UBG333', '05:00PM', '05:30PM'),
(17, 'UBG440', '10:00AM', '10:30AM'),
(18, 'UBG440', '02:00PM', '02:30PM'),
(19, 'UBG091', '12:00PM', '12:30PM'),
(20, 'UBG091', '06:00PM', '06:30PM'),
(21, 'UBG440', '08:00PM', '08:30PM'),
(22, 'UBG091', '09:00AM', '09:30AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerinfo`
--
ALTER TABLE `customerinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerlogin`
--
ALTER TABLE `customerlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flightdetails`
--
ALTER TABLE `flightdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flightschedule`
--
ALTER TABLE `flightschedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customerinfo`
--
ALTER TABLE `customerinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customerlogin`
--
ALTER TABLE `customerlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flightdetails`
--
ALTER TABLE `flightdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `flightschedule`
--
ALTER TABLE `flightschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
