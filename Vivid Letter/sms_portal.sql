-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 06:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `single_sms`
--

CREATE TABLE `single_sms` (
  `sms_id` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `department` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `char_count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `single_sms`
--

INSERT INTO `single_sms` (`sms_id`, `date_time`, `department`, `phone_number`, `message`, `char_count`) VALUES
(1, '2021-03-18 16:20:34', 'Customer-Support', 1892770006, 'thank you', 1),
(2, '2021-03-18 16:31:44', 'Administrator', 1892770006, 'yolo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `page` varchar(255) NOT NULL,
  `admin_access` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `password`, `department`, `page`, `admin_access`) VALUES
(6, 'cs', '1234', 'Customer-Support', 'index.php', 0),
(5, 'admin', '1234', 'Administrator', 'index.php', 1),
(7, 'sadmin', '1234', 'Administrator', 'index.php', 2),
(10, 'Vas', '1234', 'VAS', 'index.php', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `single_sms`
--
ALTER TABLE `single_sms`
  ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `single_sms`
--
ALTER TABLE `single_sms`
  MODIFY `sms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
