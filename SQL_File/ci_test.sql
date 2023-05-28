-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 01:18 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(150) DEFAULT NULL,
  `LastName` varchar(150) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Zipcode` varchar(10) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '0' COMMENT '0:dealer,1:employee',
  `IsLogin` int(1) NOT NULL DEFAULT '0' COMMENT '0:firstTime',
  `Created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FirstName`, `LastName`, `Email`, `Password`, `City`, `State`, `Zipcode`, `user_type`, `IsLogin`, `Created_date`) VALUES
(2, 'Anuj', 'kumar', 'ak@gmail.com', 'Test@123', '', '', '', 0, 0, '2021-06-29 23:14:15'),
(4, 'Amit', 'Singh', 'amitsingh@gmail.com', 'Test@12345', '', '', '', 0, 0, '2021-06-30 00:06:24'),
(8, 'dsafnb`', 'hbm', 'MARUTI@gmail.com', '123456', 'surat', 'gujarat', '395010', 0, 0, '2023-05-27 10:29:51'),
(14, 'sandip', 'hirpara', 'sandip.hirpara111@gmail.com', '123456', 'Surat', 'Colorado', '67788', 0, 1, '2023-05-27 14:03:33'),
(15, 'test', 'test', 'employee@gmail.com', '123456', 'ahemdabad', 'gujarat', '353535', 1, 0, '2023-05-27 16:00:53'),
(17, 'new', 'new', 'new@gmail.com', '123456', 'Surat', 'Colorado', '67788', 0, 0, '2023-05-28 10:15:12'),
(18, 'test1', 'emp', 'test1@gmail.com', '123456', '', '', '', 0, 0, '2023-05-28 10:40:04'),
(19, 'test2', 'emp2', 'test2@gmail.com', '123456', '', '', '', 0, 0, '2023-05-28 10:41:05'),
(20, 'test3', 'test3', 'test3@gmail.com', '123456', '', '', '', 0, 0, '2023-05-28 10:41:54'),
(21, 'test4', 'test4', 'test4@gmail.com', '123456', '', '', '', 0, 0, '2023-05-28 10:43:07'),
(26, 'dealer', 'test', 'dealer@gmail.com', '123456', 'ahemdabad', 'gujarat', '556677', 0, 1, '2023-05-28 11:12:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
