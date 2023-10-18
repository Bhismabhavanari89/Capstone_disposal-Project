-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 04:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'admin', '2023-03-08 17:17:20', '2023-03-08 17:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `coordinato`
--

CREATE TABLE `coordinato` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coordinato`
--

INSERT INTO `coordinato` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'cod@gmail.com', 'cod', '2023-03-05 16:44:43', '2023-03-05 16:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `count`
--

CREATE TABLE `count` (
  `id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `CAP_2019` varchar(255) DEFAULT '0',
  `UROP_2019` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `count`
--

INSERT INTO `count` (`id`, `f_id`, `created_at`, `updated_at`, `CAP_2019`, `UROP_2019`) VALUES
(1, 123456, '2023-03-08 17:59:21', '2023-03-09 13:38:13', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `faculty_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `email`, `password`, `faculty_id`, `created_at`, `updated_at`) VALUES
(1, 'faculty@gmail.com', 'faculty', 200110, '2023-03-02 13:46:58', '2023-03-08 17:49:25'),
(2, 'faculty1@gmail.com', 'faculty1', 123456, '2023-03-02 14:09:44', '2023-03-09 13:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `team1` varchar(225) NOT NULL,
  `team2` varchar(225) NOT NULL,
  `team3` varchar(225) NOT NULL,
  `team4` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `topic` varchar(225) NOT NULL,
  `noofstudents` int(11) NOT NULL,
  `file_name` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `size` varchar(225) NOT NULL,
  `f_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_id`, `name`, `topic`, `noofstudents`, `file_name`, `type`, `size`, `f_id`, `created_at`, `updated_at`) VALUES
(12, 0, 'Chat Bot Design', 'ML', 5, 'chatbot.txt', 'text/plain', '0.0068359375', 123456, '2023-03-06 15:16:10', '2023-03-09 13:04:44'),
(13, 1, 'Data Analytics and ML', 'ML', 1, 'dataanalyticsandml.txt', 'text/plain', '0.0205078125', 123456, '2023-03-06 15:19:40', '2023-03-09 13:04:50'),
(14, 2, 'AR, VR and MR in education', 'AR VR MR', 3, 'arvrandmrineducation.txt', 'text/plain', '0.025390625', 123456, '2023-03-06 15:22:03', '2023-03-09 13:04:55'),
(15, 3, 'AR', 'AR', 2, 'arvrandmrineducation.txt', 'text/plain', '0.025390625', 123456, '2023-03-07 13:08:46', '2023-03-09 13:04:59'),
(23, 1000, '23', '23', 1, '', '', '0', 123456, '2023-03-09 13:41:06', '2023-03-09 13:41:06'),
(25, 1001, '23', '23', 1, '', '', '0', 123456, '2023-03-09 13:42:02', '2023-03-09 13:42:02'),
(26, 1002, '23', '23', 2, '', '', '0', 123456, '2023-03-09 13:42:54', '2023-03-09 13:42:54'),
(27, 1003, '23', '23', 2, '', '', '0', 123456, '2023-03-09 13:43:53', '2023-03-09 13:43:53'),
(29, 1004, '23', '2', 1, '', '', '0', 123456, '2023-03-09 13:44:16', '2023-03-09 13:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `member1` varchar(225) NOT NULL,
  `member2` varchar(225) NOT NULL,
  `member3` varchar(225) NOT NULL,
  `member4` varchar(225) NOT NULL,
  `f_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `member1`, `member2`, `member3`, `member4`, `f_id`, `description`, `created_at`, `updated_at`) VALUES
(2, '10@gmail.com', '3@gmail.com', '4@gmail.com', '5@gmail.com', 123456, 'Interest', '2023-03-07 05:42:13', '2023-03-09 13:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Bhisma', '1@gmail.com', '123', '2023-03-02 13:34:08', '2023-03-02 13:34:08'),
(2, 'Hi', '2000@gmail.com', '123', '2023-03-05 16:41:47', '2023-03-07 17:54:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coordinato`
--
ALTER TABLE `coordinato`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `count`
--
ALTER TABLE `count`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`f_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`),
  ADD KEY `list_ibfk_3` (`f_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_id` (`project_id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultyid` (`f_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coordinato`
--
ALTER TABLE `coordinato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `count`
--
ALTER TABLE `count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `count`
--
ALTER TABLE `count`
  ADD CONSTRAINT `count_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `list_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `list_ibfk_3` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`faculty_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
