-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2018 at 07:52 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schedule_mgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `minister_info`
--

CREATE TABLE `minister_info` (
  `Minister_ID` int(4) NOT NULL,
  `Designation_ID` int(4) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Contact` bigint(10) NOT NULL DEFAULT '0',
  `Password` varchar(32) NOT NULL DEFAULT '12345',
  `Email_ID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minister_info`
--

INSERT INTO `minister_info` (`Minister_ID`, `Designation_ID`, `Name`, `Contact`, `Password`, `Email_ID`) VALUES
(1001, 2001, 'Komal Bharadiya', 9403887763, '827ccb0eea8a706c4c34a16891f84e7b', 'komalbharadiya@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `minister_info`
--
ALTER TABLE `minister_info`
  ADD PRIMARY KEY (`Minister_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
