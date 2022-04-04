-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 02, 2022 at 12:42 PM
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
-- Table structure for table `quizzScore`
--

CREATE TABLE `quizzScore` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `userId` int(5) DEFAULT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `type` varchar(30) DEFAULT 'test',
  `topic` int(5) DEFAULT NULL,
  `tot_ques` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quizzScore`
--

INSERT INTO `quizzScore` (`id`, `name`, `userId`, `score`, `type`, `topic`, `tot_ques`) VALUES
(2, 'jj', 6, 1, '6', 5, 1);

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
(1, 'javaAdmin', 'goodluck'),
(2, 'reactAdmin', 'goodluck');

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
(7, 'Java Level One', 4, 1),
(8, 'level one', 6, 2);

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
(5, 4, 7, 'test', '1', '2', '3', '4', 1, 1),
(6, 6, 8, 'Test', '1', '2', '3', '4', 1, 2);

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
(4, 'Java', 1),
(6, 'React', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'ramesh', NULL, 'goodluck'),
(2, 'ravi', NULL, 'goodluck'),
(3, 'ravi', 'ravi@gmail.com', 'goodluck'),
(4, 'raj', '', '123'),
(5, 'raj', 'raj@gmail.com', 'goodluck'),
(6, 'jj', 'hramji094@gmail.com', 'goodluck'),
(7, 'jj', 'hramji094@gmail.com', 'goodluck'),
(8, 'dhayac2d', 'dhayac2d@gmail.com', 'goodluck'),
(9, 'uer', 'Ramsh@gmail.com', '123'),
(10, 'koli', 'koli@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quizzScore`
--
ALTER TABLE `quizzScore`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `quizzScore`
--
ALTER TABLE `quizzScore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quizz_admin`
--
ALTER TABLE `quizz_admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quizz_categories`
--
ALTER TABLE `quizz_categories`
  MODIFY `catg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quizz_qustions`
--
ALTER TABLE `quizz_qustions`
  MODIFY `qu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quizz_super_admin`
--
ALTER TABLE `quizz_super_admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quizz_topics`
--
ALTER TABLE `quizz_topics`
  MODIFY `qt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
