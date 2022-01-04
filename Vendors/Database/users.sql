-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 08:14 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `CompanyID` int(11) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `MobileNo` int(10) NOT NULL,
  `Location` varchar(80) NOT NULL,
  `Bio` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`CompanyID`, `CompanyName`, `Category`, `Email`, `Password`, `MobileNo`, `Location`, `Bio`) VALUES
(1, 'Summer Breeze', 'DJ', 'summerb@gmail.com', 'abc123', 711252058, 'Colombo', 'Live the moment with music'),
(2, 'Cphoto Studio', 'Photography', 'cphoto@gmail.com', 'abc234', 718007374, 'Gampaha', 'Capture each and every moment with us'),
(3, 'Sunshine catering', 'Catering', 'sunshine@gmail.com', 'abc456', 715004567, 'Galle', 'Best dishes in the island'),
(4, 'DF caterings', 'Catering', 'dfcatering@gmail.com', 'abc678', 112977689, 'Kurunegala', 'Foods from heaven');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`CompanyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `CompanyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
