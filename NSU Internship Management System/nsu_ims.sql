-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 08:51 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nsu-ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `user_type`) VALUES
(2, 'admin', 'admin@gmail.com', '123456', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `apply_job_post`
--

CREATE TABLE `apply_job_post` (
  `apply_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply_job_post`
--

INSERT INTO `apply_job_post` (`apply_id`, `job_id`, `com_id`, `id`, `status`) VALUES
(2, 23, 2, 11, 2),
(3, 24, 2, 11, 1),
(9, 22, 2, 11, 1),
(12, 25, 1, 11, 1),
(16, 21, 2, 56, 0);

-- --------------------------------------------------------

--
-- Table structure for table `company_information`
--

CREATE TABLE `company_information` (
  `com_id` int(11) NOT NULL,
  `com_name` varchar(255) NOT NULL,
  `com_reg_num` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `com_user_name` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `com_reg_address` text NOT NULL,
  `verification_status` varchar(255) NOT NULL,
  `verification_id` varchar(255) NOT NULL,
  `com_number` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `conpassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_information`
--

INSERT INTO `company_information` (`com_id`, `com_name`, `com_reg_num`, `email`, `com_user_name`, `user_type`, `com_reg_address`, `verification_status`, `verification_id`, `com_number`, `password`, `conpassword`) VALUES
(1, 'technocation', '1845456656665', 'soft-tech@gmail.com', 'soft_tech', 'company', 'Sonargaon, Narayanganj, Dhaka', '', '', '01311336212', '1234', '1234'),
(2, 'Smart Tech', '15975345656', 'smart.tech@gmail.com', 'gt', 'company', 'Dhaka, Bangladesh', '', '', '021321321132', '1234', '1234'),
(3, 'Hello', '157849854564654', 'hello@gmail.com', 'hello_user', 'company', 'Dhaka, Bangladesh', '', '', '012313213213', '1234', '1234'),
(5, 'Soft_tech', '1812805656456', 'moshiure.rahman@northsouth.edu', 'soft_tech', 'company', 'Dhaka', '1', '989109009', '01311336212', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `contact_message`
--

CREATE TABLE `contact_message` (
  `contact_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `write_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_message`
--

INSERT INTO `contact_message` (`contact_id`, `username`, `email`, `subject`, `write_message`) VALUES
(1, 'Moshi', 'moshiur@gmail.com', 'Hello', 'Hello, World'),
(2, 'Moshi', 'moshiur@gmail.com', 'Hello', 'Hello, Bangladesh'),
(3, 'Moshi', 'moshiur@gmail.com', 'Hello', 'Hello, Bangladesh'),
(4, 'hassan', 'hassan@gmail.com', 'Web Development', 'Lorem Lorem Lorem LOrem'),
(5, 'hassan', 'hassan@gmail.com', 'Web Development', 'Lorem Lorem Lorem LOrem');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_information`
--

CREATE TABLE `faculty_information` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fac_user_name` varchar(50) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `fac_id` varchar(20) NOT NULL,
  `fac_number` varchar(20) NOT NULL,
  `fac_password` varchar(50) NOT NULL,
  `fac_confirm_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_information`
--

INSERT INTO `faculty_information` (`id`, `first_name`, `last_name`, `email`, `fac_user_name`, `user_type`, `fac_id`, `fac_number`, `fac_password`, `fac_confirm_password`) VALUES
(1, 'Mahadi', 'Hassan', 'mahadi.hassan@gmail.com', 'MAH', 'faculty', '148484655', '01311632323', '123456', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `job_list`
--

CREATE TABLE `job_list` (
  `job_id` int(11) NOT NULL,
  `com_id` int(255) NOT NULL,
  `job_name` varchar(255) NOT NULL,
  `job_category` varchar(255) NOT NULL,
  `vacancies` int(255) NOT NULL,
  `publish_date` varchar(255) NOT NULL,
  `application_deadline` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `internship_status` varchar(255) NOT NULL,
  `intern_paid_or_unpaid` varchar(255) NOT NULL,
  `intern_description` varchar(255) NOT NULL,
  `intern_responsibility` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_list`
--

INSERT INTO `job_list` (`job_id`, `com_id`, `job_name`, `job_category`, `vacancies`, `publish_date`, `application_deadline`, `location`, `internship_status`, `intern_paid_or_unpaid`, `intern_description`, `intern_responsibility`) VALUES
(21, 2, 'Data Entry', 'data_entry', 2, '12/12/2022', '19/12/2022', 'rajshahi', 'part_time', 'Unpaid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(22, 2, 'Data Entry', 'data_entry', 2, '12/12/2022', '19/12/2022', 'rajshahi', 'part_time', 'Unpaid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(23, 2, 'Graphics Designer', 'graphics', 4, '4/05/2022', '12/05/2022', 'chittagong', 'full_time', 'Paid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(24, 2, 'Graphics Designer', 'graphics', 4, '4/05/2022', '12/05/2022', 'chittagong', 'full_time', 'Paid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(25, 1, 'Data Entry', 'data_science', 2, '12/12/2022', '20/12/2022', 'rajshahi', 'part_time', 'Paid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s');

-- --------------------------------------------------------

--
-- Table structure for table `single_sms`
--

CREATE TABLE `single_sms` (
  `sms_id` int(11) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `message` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `single_sms`
--

INSERT INTO `single_sms` (`sms_id`, `phone_number`, `message`) VALUES
(1, 1311336212, 'Hello 123'),
(2, 1311336212, 'Hello'),
(3, 1311336212, 'Moshiur');

-- --------------------------------------------------------

--
-- Table structure for table `student_information`
--

CREATE TABLE `student_information` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `st_user_name` varchar(50) NOT NULL,
  `user_type` varchar(40) NOT NULL,
  `st_id` int(20) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `st_number` varchar(50) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `verification_status` varchar(255) NOT NULL,
  `verification_id` varchar(255) NOT NULL,
  `st_password` varchar(30) NOT NULL,
  `st_confirm_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_information`
--

INSERT INTO `student_information` (`id`, `first_name`, `last_name`, `email`, `st_user_name`, `user_type`, `st_id`, `skill`, `st_number`, `resume`, `verification_status`, `verification_id`, `st_password`, `st_confirm_password`) VALUES
(12, 'Shamim', 'Hossain', 'hassan.mahmud@gmail.com', 'mahmud', 'student', 1812802042, 'PHP,Python', '01311336212', '6303651dd97ba.pdf', '1', '0', '12345', '12345'),
(56, 'Moshiur', 'Sumon', 'moshiure.rahman@northsouth.edu', 'moshi', 'student', 1812802042, 'Java,PHP', '01951173824', '6304e71dd3901.pdf', '1', '365990636', '123', '123'),
(57, 'Sazid', 'Tonmoy', 'sazid.tonmoy@northsouth.edu', 'sazid', 'student', 54564564, 'Java', '01892770006', '63051c5aee875.pdf', '0', '261795888', '123', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply_job_post`
--
ALTER TABLE `apply_job_post`
  ADD PRIMARY KEY (`apply_id`);

--
-- Indexes for table `company_information`
--
ALTER TABLE `company_information`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `contact_message`
--
ALTER TABLE `contact_message`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `faculty_information`
--
ALTER TABLE `faculty_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_list`
--
ALTER TABLE `job_list`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `single_sms`
--
ALTER TABLE `single_sms`
  ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `student_information`
--
ALTER TABLE `student_information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply_job_post`
--
ALTER TABLE `apply_job_post`
  MODIFY `apply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `company_information`
--
ALTER TABLE `company_information`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_message`
--
ALTER TABLE `contact_message`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `faculty_information`
--
ALTER TABLE `faculty_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_list`
--
ALTER TABLE `job_list`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `single_sms`
--
ALTER TABLE `single_sms`
  MODIFY `sms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_information`
--
ALTER TABLE `student_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
