-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 03:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `admin_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_code`, `name`, `email`, `password`) VALUES
(2, 'Admin023', 'YOGESH T ', 'yogiyogesht8131@gmail.com', '$2y$10$2NFzb18dgWWVqbIcZAw5P.k1JqOnzHGG5ORTj2x95bVGn5lfZfoCq'),
(3, 'Admin023', 'Harish', 'admin1@gmail.com', '$2y$10$Pua9VZOVaFQ0j7xsQhgSi.FON6FUGVh/frC0V8REAFsS.0uf1Ys6q'),
(4, 'Admin023', 'YOGESH T ', 'admin1@gmail.com', '$2y$10$lp/fZImP5QjGteYEp8rjK.l6T/vNvbFbKQ7tBPZqb3JKGh9A9ktXO');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(10, 'user2', 'user2@gmail.com', '123456', 'user'),
(11, 'User3', 'user3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(12, 'User4', 'user4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(13, 'user5', 'user5@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(14, 'Admin', 'admin1@gmail.com', '0e7517141fb53f21ee439b355b5a1d0a', 'admin'),
(15, 'Harish ', 'harish@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(16, 'user6', 'user6@gmail.com', '$2y$10$tpGf9UD894FnIboVTeaVKO1LIs.3teTYaro70RAi61SL5Ma95u652', ''),
(17, 'user6', 'user6@gmail.com', '$2y$10$ULpNXuyB1QmDk3ZdMReRe.5z.hxnNWVx2ey8GWiu.2r/JrfgYRJMe', ''),
(18, 'user7', 'user7@gmail.com', '$2y$10$ppcaX9Op6xyPs0HeFpMh2enbT5h3ytSEthqlLSN9wfhPnkiNy2MPy', ''),
(19, 'Akhilesh', 'akhil@gmail.com', '$2y$10$mxk4al1jnAq3hBofhX1q1OnbXvNEYN/0Ol0rb7eRLYh5RM92JFAjq', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
