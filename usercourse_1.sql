-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 01:04 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `usercourse`
--

CREATE TABLE `usercourse` (
  `userid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `courseId` int(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usercourse`
--

INSERT INTO `usercourse` (`userid`, `username`, `courseName`, `courseId`, `Price`, `Date`) VALUES
(1, 'Salah', 'Swift', 1, '14.55', '2021-12-29 18:25:33'),
(1, 'Salah', 'Android', 3, '16.55', '2021-12-29 18:25:33'),
(1, 'Salah', 'Algoritm and Data Structure', 6, '20.10', '2021-12-29 18:25:33'),
(6, 'Joex', 'Android', 3, '16.55', '2021-12-29 18:25:33'),
(6, 'Joex', 'Algoritm and Data Structure', 6, '20.10', '2021-12-29 18:25:33'),
(6, 'Joex', 'Computer Graphics', 8, '555', '2021-12-29 18:25:33'),
(8, 'Bassem', 'Web Development', 2, '20', '2021-12-29 18:25:33'),
(8, 'Bassem', 'Android', 3, '16.55', '2021-12-29 18:25:33'),
(8, 'Bassem', 'Machine Learning', 4, '18.14', '2022-01-08 15:10:54'),
(8, 'Bassem', 'Computer Graphics', 8, '555', '2021-12-29 18:25:33'),
(8, 'Bassem', 'Simpana', 9, '1.00', '2022-01-08 15:10:54'),
(21, 'Gika', 'Swift', 1, '14.55', '2021-12-29 18:25:33'),
(21, 'Gika', 'Web Development', 2, '20', '2021-12-29 18:25:33'),
(21, 'Gika', 'Android', 3, '16.55', '2021-12-29 18:25:33'),
(21, 'Gika', 'Machine Learning', 4, '18.14', '2021-12-29 18:25:33'),
(21, 'Gika', 'Computer Graphics', 8, '555', '2021-12-29 18:25:33'),
(21, 'Gika', 'Simpana', 9, '1', '2021-12-29 18:25:33'),
(27, 'Speedoo', 'Web Development', 2, '20', '2021-12-29 18:25:33'),
(27, 'Speedoo', 'Deep Learning', 5, '56', '2021-12-29 18:25:33'),
(27, 'Speedoo', 'Computer Graphics', 8, '555', '2021-12-29 18:25:33'),
(27, 'Speedoo', 'Simpana', 9, '1', '2021-12-29 18:25:33'),
(28, 'Nezoko', 'Swift', 1, '14.55', '2021-12-29 18:25:33'),
(28, 'Nezoko', 'Web Development', 2, '20', '2021-12-29 18:25:33'),
(28, 'Nezoko', 'Android', 3, '16.55', '2021-12-29 18:25:33'),
(28, 'Nezoko', 'Machine Learning', 4, '18.14', '2021-12-29 18:25:33'),
(28, 'Nezoko', 'Computer Graphics', 8, '555', '2021-12-29 18:25:33'),
(28, 'Nezoko', 'Simpana', 9, '1', '2021-12-29 18:25:33'),
(36, 'Lara', 'Swift', 1, '14.55', '2021-12-29 18:25:33'),
(36, 'Lara', 'Machine Learning', 4, '18.14', '2021-12-29 18:25:33'),
(36, 'Lara', 'Deep Learning', 5, '56', '2021-12-29 18:25:33'),
(115, 'Ahmed Sameh', 'Web Development', 2, '20', '2021-12-29 18:25:33'),
(115, 'Ahmed Sameh', 'Android', 3, '16.55', '2021-12-29 18:25:33'),
(125, 'LaraLara', 'Android', 3, '16.55', '2022-01-09 14:30:18'),
(134, 'SalmaAbed2', 'Web Development', 2, '20.00', '2022-01-09 18:07:06'),
(134, 'SalmaAbed2', 'Android', 3, '16.55', '2022-01-09 18:07:06'),
(135, 'SalmaAbed2', 'Swift', 1, '14.55', '2022-01-09 18:27:46'),
(135, 'SalmaAbed2', 'Web Development', 2, '20.00', '2022-01-09 18:27:46'),
(135, 'SalmaAbed2', 'Android', 3, '16.55', '2022-01-09 18:27:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usercourse`
--
ALTER TABLE `usercourse`
  ADD PRIMARY KEY (`userid`,`courseId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
