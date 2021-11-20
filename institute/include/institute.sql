-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 11:30 AM
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
(4, 'Abcd', 'active', '2021-11-10 23:14:44'),
(5, '1234', 'active', '2021-11-10 23:21:44'),
(6, 'Abcd', 'active', '2021-11-10 23:24:04'),
(7, 'Abcd', 'active', '2021-11-10 23:24:09'),
(8, 'Abcd', 'active', '2021-11-10 23:24:22'),
(9, 'Abcd', 'active', '2021-11-10 23:24:53'),
(10, '1234', 'active', '2021-11-10 23:25:14'),
(11, '1234', 'active', '2021-11-10 23:26:27'),
(12, '1234', 'active', '2021-11-10 23:28:44'),
(13, '1234', 'active', '2021-11-10 23:28:58'),
(14, 'Abcd', 'active', '2021-11-11 05:19:11'),
(15, '', 'active', '2021-11-11 07:16:36');

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

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `shop_id`, `employee_name`, `contact`, `status`) VALUES
(1, NULL, 'dfdfd', '40', 'active');

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
(1, 2, 'aa', '44', '44', '44', 'active', '2021-11-11 10:38:01'),
(2, 4, 'aa5', 'aa', '8902111100', 'aa', 'active', '2021-11-12 10:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `role_id` int(12) NOT NULL,
  `org_id` int(12) NOT NULL,
  `user_id` varchar(155) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `org_id`, `user_id`, `password`, `status`, `created_at`) VALUES
(1, 2, 1, '0', '44', 'active', '2021-11-11 10:38:01'),
(2, 2, 2, 'gh56', '1256', 'active', '2021-11-15 08:52:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
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
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
