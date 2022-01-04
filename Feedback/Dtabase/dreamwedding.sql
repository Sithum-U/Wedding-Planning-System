-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 07:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dreamwedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerfeedback`
--

CREATE TABLE `customerfeedback` (
  `Bill_Id` int(11) NOT NULL,
  `C_ID` varchar(50) NOT NULL,
  `C_Username` varchar(50) NOT NULL,
  `C_Email` varchar(50) NOT NULL,
  `C_rate` int(11) NOT NULL,
  `C_Comment` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerfeedback`
--

INSERT INTO `customerfeedback` (`Bill_Id`, `C_ID`, `C_Username`, `C_Email`, `C_rate`, `C_Comment`) VALUES
(1, 'C1213', 'jack', '123@yahoo.com', 5, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(1247, 'C1212', 'nike', 'Nike@yahoo.com', 1, 'xyz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerfeedback`
--
ALTER TABLE `customerfeedback`
  ADD PRIMARY KEY (`Bill_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
