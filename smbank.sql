-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 06:07 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `sr` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `message` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`sr`, `name`, `email`, `message`) VALUES
(13, 'Rohit Mahajan', 'rohitm.official404@g', 'What is the python course fee?'),
(14, 'Rohit', 'adef32795@gmail.com', 'This is a demo paregraph!'),
(15, 'Rohit', 'adef327095@gmail.com', 'This is a para!');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `sr` int(11) NOT NULL,
  `sender` varchar(10) NOT NULL,
  `receiver` varchar(10) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`sr`, `sender`, `receiver`, `amount`, `status`) VALUES
(47, '9002', '9001', 10, 'succeed'),
(48, '9001', '9002', 101, 'succeed'),
(49, '9002', '9001', 100, 'succeed'),
(50, '9001', '9005', 150, 'failed'),
(52, '9001', '9004', 20, 'succeed'),
(53, '9001', '9002', 500, 'failed'),
(54, '9001', '9009', 20, 'succeed'),
(55, '9001', '9009', 100, 'failed'),
(56, '9003', '9001', 20, 'succeed'),
(57, '9003', '9008', 100, 'failed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sr` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `accno` varchar(10) NOT NULL,
  `blc` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sr`, `name`, `email`, `accno`, `blc`) VALUES
(13, 'UTSAV GOHEL', 'UTSAV@GMAIL.COM', '9001', 88),
(14, 'JEET JETHWA', 'JEET@GMAIL.COM', '9002', 91),
(15, 'PRATIK TANK', 'PRATIK@GMAIL.COM', '9003', 80),
(16, 'TEJAS FALDU', 'TEJAS@GMAIL.COM', '9004', 120),
(17, 'DARSHAN JAMBUNI', 'DARSHAN@GMAIL.COM', '9005', 100),
(18, 'DARSHAN JAMBUNI', 'DARSHAN@GMAIL.COM', '9005', 100),
(19, 'VIVEK KADVANI', 'VIVEK@GMAIL.COM', '9006', 100),
(20, 'MANAV NANDA', 'MANAV@GMAIL.COM', '9007', 100),
(21, 'MEET GAJJAR', 'MEET@GMAIL.COM', '9008', 100),
(22, 'HIITTEN TANNA', 'HITTEN@GMAIL.COM', '9009', 120),
(23, 'PREET KAUR', 'PREET@GMAIL.COM', '9010', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
