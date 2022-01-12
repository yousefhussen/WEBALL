-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 09:58 PM
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
  `comments` varchar(255) DEFAULT NULL,
  `image?` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `seen`, `comments`, `image?`) VALUES
(174, 234920460, 1366213838, 'asda', 1, NULL, 0),
(175, 1366213838, 234920460, 'uploads/Screenshot_24.png', 1, NULL, 1),
(176, 1366213838, 234920460, 'hello', 1, NULL, 0),
(177, 1366213838, 234920460, 'This is the course i suggest mother fucker', 1, NULL, 0),
(178, 234920460, 1366213838, 'uploads/Screenshot_37.png', 0, NULL, 1),
(179, 234920460, 1366213838, 'uploads/126126592_3020492128050804_1703443695247337615_n.jpg', 0, NULL, 1),
(180, 234920460, 1366213838, 'el sh5s da tezo 7amra', 0, NULL, 0),
(181, 1366213838, 234920460, 'true', 1, NULL, 0),
(182, 1366213838, 234920460, 'uploads/Screenshot_23.png', 1, NULL, 1),
(183, 234920460, 1366213838, 'uploads/Screenshot_11.png', 0, NULL, 1),
(184, 234920460, 1366213838, 'Helloooo', 0, NULL, 0),
(185, 234920460, 1366213838, 'asdasd', 0, NULL, 0),
(186, 234920460, 1366213838, 'sadsa', 0, NULL, 0),
(187, 234920460, 1366213838, 'ddsads', 0, NULL, 0),
(188, 234920460, 1366213838, 'uploads/femaleAvatar.png', 0, NULL, 1),
(189, 234920460, 1366213838, 'uploads/126126592_3020492128050804_1703443695247337615_n.jpg', 0, NULL, 1),
(190, 234920460, 1366213838, 'fuck u', 0, NULL, 0),
(191, 234920460, 1366213838, 'uploads/ex.jpg', 0, NULL, 1);

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
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
