-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 24, 2022 at 05:01 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizme`
--

-- --------------------------------------------------------

--
-- Table structure for table `quizz_admin`
--

CREATE TABLE `quizz_admin` (
  `id` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quizz_admin`
--

INSERT INTO `quizz_admin` (`id`, `username`, `password`) VALUES
(21, 'javaadmin', 'goodluck'),
(22, 'reactadmin', 'goodluck');

-- --------------------------------------------------------

--
-- Table structure for table `quizz_categories`
--

CREATE TABLE `quizz_categories` (
  `catg_id` int(11) NOT NULL,
  `catg_name` varchar(30) DEFAULT NULL,
  `catg_qt_id` int(5) DEFAULT NULL,
  `catg_createdby` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quizz_categories`
--

INSERT INTO `quizz_categories` (`catg_id`, `catg_name`, `catg_qt_id`, `catg_createdby`) VALUES
(22, 'java level one', 21, 21);

-- --------------------------------------------------------

--
-- Table structure for table `quizz_qustions`
--

CREATE TABLE `quizz_qustions` (
  `qu_id` int(11) NOT NULL,
  `topic` int(5) DEFAULT NULL,
  `type` int(5) DEFAULT NULL,
  `question` text,
  `option_one` varchar(30) DEFAULT NULL,
  `option_two` varchar(30) DEFAULT NULL,
  `option_three` varchar(30) DEFAULT NULL,
  `option_four` varchar(30) DEFAULT NULL,
  `correctIndex` int(5) DEFAULT NULL,
  `createdBy` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quizz_qustions`
--

INSERT INTO `quizz_qustions` (`qu_id`, `topic`, `type`, `question`, `option_one`, `option_two`, `option_three`, `option_four`, `correctIndex`, `createdBy`) VALUES
(10, 21, 22, 'Test', 'A', 'B', 'C', 'D', 1, 21);

-- --------------------------------------------------------

--
-- Table structure for table `quizz_super_admin`
--

CREATE TABLE `quizz_super_admin` (
  `id` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quizz_super_admin`
--

INSERT INTO `quizz_super_admin` (`id`, `username`, `password`) VALUES
(4, 'superAdmin', 'goodluck');

-- --------------------------------------------------------

--
-- Table structure for table `quizz_topics`
--

CREATE TABLE `quizz_topics` (
  `qt_id` int(11) NOT NULL,
  `qt_name` varchar(30) DEFAULT NULL,
  `qt_createdby` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizz_topics`
--

INSERT INTO `quizz_topics` (`qt_id`, `qt_name`, `qt_createdby`) VALUES
(21, 'Java', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'ramesh', 'goodluck'),
(2, 'ravi', 'goodluck');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quizz_admin`
--
ALTER TABLE `quizz_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizz_categories`
--
ALTER TABLE `quizz_categories`
  ADD PRIMARY KEY (`catg_id`),
  ADD UNIQUE KEY `catg_name` (`catg_name`);

--
-- Indexes for table `quizz_qustions`
--
ALTER TABLE `quizz_qustions`
  ADD PRIMARY KEY (`qu_id`);

--
-- Indexes for table `quizz_super_admin`
--
ALTER TABLE `quizz_super_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizz_topics`
--
ALTER TABLE `quizz_topics`
  ADD PRIMARY KEY (`qt_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quizz_admin`
--
ALTER TABLE `quizz_admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `quizz_categories`
--
ALTER TABLE `quizz_categories`
  MODIFY `catg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `quizz_qustions`
--
ALTER TABLE `quizz_qustions`
  MODIFY `qu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quizz_super_admin`
--
ALTER TABLE `quizz_super_admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
