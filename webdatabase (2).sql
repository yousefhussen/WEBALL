-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 10:14 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `seen` int(16) NOT NULL DEFAULT 0,
  `comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `seen`, `comments`) VALUES
(80, 234920460, 1366213838, 'Hi admin', 1, 'heeel'),
(81, 1366213838, 234920460, 'Hi gika', 1, 'laala'),
(82, 1366213838, 234920460, 'How can I help you ?', 1, 'sdddddddddddddddddddddddddddddddddddddd'),
(83, 234920460, 1366213838, 'I would like some technical help with buying a new course', 1, 'asdasd'),
(84, 1366213838, 234920460, 'Sure, let me help you.', 1, NULL),
(85, 234920460, 1366213838, 'ok, fuck you', 1, 'asdasdasd'),
(86, 1366213838, 234920460, 'shikakakaakak', 1, 'asddddddd'),
(87, 234920460, 1366213838, 'hey joe', 1, 'sssssssssssssssssssss'),
(88, 234920460, 1366213838, 'ahlaaan', 1, 'asdasdasdasd'),
(89, 1366213838, 234920460, 'tezk', 1, 'china was here'),
(90, 1366213838, 234920460, 'jasdasd', 1, 'hey my name is kaza kaza kaza'),
(91, 234920460, 1366213838, 'asdasdasd', 1, 'sssssssssssssss'),
(92, 234920460, 1366213838, 'asdasdad', 1, 'asdasdasdasdasd'),
(93, 1366213838, 234920460, 'asdasdasd', 1, 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd'),
(94, 234920460, 1366213838, 'omk w abook', 1, 'salah was here'),
(95, 1366213838, 234920460, '7abby teslak', 1, 'salah teezo 7amra'),
(96, 1366213838, 234920460, 'asdasd', 0, 'ddddddddddddddd'),
(97, 1366213838, 234920460, 'asdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 0, 'asdasdasd'),
(98, 1366213838, 234920460, '5od', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
