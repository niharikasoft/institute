-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 11:10 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `institute`
--

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `id` int(12) NOT NULL,
  `institute_id` int(12) DEFAULT NULL,
  `student_id` int(12) DEFAULT NULL,
  `registration_no` varchar(55) DEFAULT NULL,
  `course_id` int(12) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`id`, `institute_id`, `student_id`, `registration_no`, `course_id`, `admission_date`, `status`, `created_at`) VALUES
(1, 1, 1, NULL, 1, '2021-11-19', 'active', '2021-11-19 06:02:13'),
(2, 1, 2, '2', 1, '2021-11-19', 'active', '2021-11-19 07:56:35'),
(3, 1, 3, '0013', 1, '2021-11-19', 'active', '2021-11-19 07:57:12'),
(4, 1, 4, '0014', 1, '2021-11-19', 'active', '2021-11-19 08:05:39'),
(5, 1, 5, '440015', 1, '2021-11-19', 'active', '2021-11-19 10:21:06'),
(6, 1, 6, '44001600', 1, '2021-11-19', 'active', '2021-11-19 12:35:19'),
(7, 1, 7, '44001007', 1, '2021-11-20', 'active', '2021-11-20 05:25:07'),
(8, 1, 8, '44001008', 1, '2021-11-20', 'active', '2021-11-20 08:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `name` varchar(155) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `status`, `created_at`) VALUES
(1, 'Branch-1', 'active', '2021-11-16 08:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `collected_fees`
--

CREATE TABLE `collected_fees` (
  `id` int(12) NOT NULL,
  `institute_id` int(12) DEFAULT NULL,
  `student_id` int(12) DEFAULT NULL,
  `admission_id` int(12) DEFAULT NULL,
  `total_fees` decimal(12,2) DEFAULT NULL,
  `collection_date` date DEFAULT NULL,
  `of_month` int(11) DEFAULT NULL,
  `of_year` varchar(25) DEFAULT NULL,
  `payment_mode` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collected_fees`
--

INSERT INTO `collected_fees` (`id`, `institute_id`, `student_id`, `admission_id`, `total_fees`, `collection_date`, `of_month`, `of_year`, `payment_mode`) VALUES
(1, 1, 1, 1, '255.00', '2021-11-19', 2, '2021', ''),
(2, 1, 1, 1, '255.00', '2021-11-19', 3, '2021', ''),
(3, 1, 2, 2, '100.00', '2021-11-19', 11, '2021', ''),
(4, 1, 3, 3, '100.00', '2021-11-19', 11, '2021', ''),
(5, 1, 4, 4, '1000.00', '2021-11-19', 4, '2021', ''),
(6, 1, 5, 5, '1000.00', '2021-11-19', 4, '2021', ''),
(7, 1, 6, 6, '5656.00', '2021-11-19', 3, '2021', ''),
(8, 1, 7, 7, '2525.00', '2021-11-20', 11, '2021', ''),
(9, 1, 8, 8, '1000.00', '2021-11-20', 3, '2021', '');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(12) NOT NULL,
  `institute_id` int(12) DEFAULT NULL,
  `course_name` varchar(155) NOT NULL,
  `course_code` varchar(55) DEFAULT NULL,
  `price` double(12,2) NOT NULL,
  `fees_type` varchar(25) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `institute_id`, `course_name`, `course_code`, `price`, `fees_type`, `status`, `created_at`) VALUES
(1, 1, 'Course-1', '001', 1225.00, 'mothly', 'active', '2021-11-16 11:49:56'),
(2, 1, 'Course-2', '002', 2252.00, 'monthly', 'active', '2021-11-17 07:04:21'),
(4, 2, 'Course-4', '001', 2565.00, 'monthly', 'active', '2021-11-17 09:52:23'),
(6, 2, 'Course-5', '002', 1254.00, 'monthly', 'active', '2021-11-17 12:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(12) NOT NULL,
  `shop_id` int(12) DEFAULT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `contact` varchar(25) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(12) NOT NULL,
  `institute_id` int(12) DEFAULT NULL,
  `fees_name` varchar(255) NOT NULL,
  `price` double(12,2) NOT NULL,
  `status` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

CREATE TABLE `institutes` (
  `id` int(12) NOT NULL,
  `branch_id` int(12) DEFAULT NULL,
  `institute_name` varchar(155) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `institute_code` varchar(80) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `institutes`
--

INSERT INTO `institutes` (`id`, `branch_id`, `institute_name`, `address`, `contact`, `institute_code`, `status`, `created_at`) VALUES
(1, 1, 'Demo Institute', 'MM Road', '8902111100', '44', 'active', '2021-11-16 08:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `id` int(11) NOT NULL,
  `cat` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `addrress` varchar(200) NOT NULL,
  `phn1` varchar(200) NOT NULL,
  `phn2` varchar(200) NOT NULL,
  `gst` varchar(200) NOT NULL,
  `mailid` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `blnce` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `hsn` varchar(200) NOT NULL,
  `unit` varchar(200) NOT NULL,
  `gst` varchar(200) NOT NULL,
  `descp` varchar(200) NOT NULL,
  `pic` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(12) NOT NULL,
  `role_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'institute'),
(3, 'counter');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(12) NOT NULL,
  `institute_id` int(12) DEFAULT NULL,
  `student_name` varchar(55) DEFAULT NULL,
  `father_name` varchar(55) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `post_office` varchar(155) DEFAULT NULL,
  `police_station` varchar(155) DEFAULT NULL,
  `district` varchar(155) DEFAULT NULL,
  `pin` varchar(25) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `institute_id`, `student_name`, `father_name`, `contact`, `address`, `post_office`, `police_station`, `district`, `pin`, `dob`, `gender`) VALUES
(1, 1, 'aa', 'aa', '5365365365', 'sdfsf df', 'dffasf', 'asas', 'sfasfasf', '4686545', '1998-01-31', 'Male'),
(2, 1, 'aaa', 'fgdfgsdg', '666886486', 'dfds sedsdg', 'fsedfsef', 'dfsdf', 'dsdfgsdf', '465425', '1999-11-16', 'Male'),
(3, 1, 'aaa', 'fgdfgsdg', '666886486', 'dfds sedsdg', 'fsedfsef', 'dfsdf', 'dsdfgsdf', '465425', '1999-11-16', 'Male'),
(4, 1, 'aaa', 'aaaa', '368365656', 'huhu hkus', 'zsvAvav', 'ascscf', 'sacascsa', '659669', '1992-02-22', 'Male'),
(5, 1, 'aaaa', 'aaa', '6966356563', 'sdsd sdsd', 'sdd dfsaf', 'kjhjkhj', 'sdsd sdasd', '258523', '2021-11-19', 'Male'),
(6, 1, 'sss', 'sss', '366838968', 'dsdfsdg', 'sfdsf', 'dfddf', 'dsfsdf', '6586879', '2021-11-19', 'Male'),
(7, 1, 'rtrtrtrt', 'rrrg', '8998988989', 'fdgdf grts', 'eweees', 'fegessged', 'fegdsd', '644556', '1999-11-20', 'Male'),
(8, 1, 'dfrt67**\'\'\'\'\"\"\"\"\"\"///{%%}{}', 'dfdfdf', '354355389', 'gdfg', 'uiuiuiu', 'ljkdkjj', 'hhsjdj', '899899', '2021-02-12', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `role_id` int(12) NOT NULL,
  `org_id` int(12) DEFAULT NULL,
  `user_id` varchar(155) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `org_id`, `user_id`, `password`, `status`, `created_at`) VALUES
(2, 2, 2, 'gh56', '1256', 'active', '2021-11-15 08:52:28'),
(3, 2, 3, '1234', 'user', 'active', '2021-11-16 06:10:27'),
(4, 1, NULL, 'admin', 'admin12', 'active', '2021-11-16 06:11:30'),
(5, 2, 1, 'user_inst', '1234', 'active', '2021-11-16 09:55:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collected_fees`
--
ALTER TABLE `collected_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collected_fees`
--
ALTER TABLE `collected_fees`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
