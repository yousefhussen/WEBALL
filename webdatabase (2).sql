-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2021 at 08:04 PM
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
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseId` int(255) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `coursePrice` varchar(255) NOT NULL,
  `enrolledSid` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `instructorName` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `Approved` int(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseId`, `courseName`, `coursePrice`, `enrolledSid`, `description`, `instructorName`, `image`, `Approved`) VALUES
(1, 'Swift', '14.55', '640001', 'Salah is in this course', 'Dalia', 'uploads/mariam-soliman-Ht5XmeuLyDg-unsplash.jpg', 1),
(2, 'Web Development', '20.00', '12001', 'yasser and china and joex feeh', 'Mohamed Elgazaar', 'uploads/mariam-soliman-Ht5XmeuLyDg-unsplash.jpg', 1),
(3, 'Android', '16.55', '10000', 'yonos feeh', 'jone', 'uploads/mariam-soliman-Ht5XmeuLyDg-unsplash.jpg', 1),
(4, 'Machine Learning', '18.14', '56457', 'very hard ', 'Mr.Robot', 'uploads/mariam-soliman-Ht5XmeuLyDg-unsplash.jpg', 1),
(5, 'Deep Learning', '56.00', '65465', 'very hard fsh5', 'Dolphine', 'uploads/mariam-soliman-Ht5XmeuLyDg-unsplash.jpg', 1),
(6, 'Algoritm and Data Structure', '20.10', '12500', 'me only', 'Mark', 'uploads/mariam-soliman-Ht5XmeuLyDg-unsplash.jpg', 1),
(8, 'Computer Graphics', '555', '55556', 'it was bad for speed team', 'Youmna', 'uploads/Image6.jpg', 1),
(9, 'Simpana', '1.00', '5', 'Yaasser', 'Yasser', 'uploads/Image4.jpg\"', 1),
(12, 'Speed', '1', '5', '10 sa3at mn sppeed wa hwa bykool y3nyy ehh!', 'Speed', 'uploads/artworks-000557600433-dvmtmy-t500x500.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(2, 344391712, 511301026, 'hi'),
(3, 344391712, 511301026, 'i love you'),
(4, 511301026, 344391712, 'i love you too'),
(5, 344391712, 511301026, 'Fukc speed ?'),
(6, 511301026, 344391712, 'Fuck speed');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `courseid` int(11) NOT NULL,
  `star1` int(200) NOT NULL,
  `star2` int(200) NOT NULL,
  `star3` int(200) NOT NULL,
  `star4` int(200) NOT NULL,
  `star5` int(200) NOT NULL,
  `TNOR` varchar(255) GENERATED ALWAYS AS (`star1` + `star2` + `star3` + `star4` + `star5`) VIRTUAL,
  `Total` varchar(16) GENERATED ALWAYS AS ((`star1` * 1 + `star2` * 2 + `star3` * 3 + `star4` * 4 + `star5` * 5) / (`star1` + `star2` + `star3` + `star4` + `star5`)) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`courseid`, `star1`, `star2`, `star3`, `star4`, `star5`) VALUES
(1, 104, 206, 303, 400, 705),
(2, 101, 304, 404, 602, 753),
(3, 217, 303, 405, 603, 739),
(4, 5, 0, 0, 0, 4),
(5, 100, 200, 300, 400, 500),
(6, 500, 400, 300, 200, 101),
(7, 1000, 700, 500, 250, 10),
(8, 2000, 1000, 500, 250, 15),
(9, 12, 20, 33, 40, 2200),
(12, 1, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `scourse` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `userId` varchar(255) NOT NULL,
  `courseId` varchar(255) NOT NULL,
  `user_Name` varchar(255) NOT NULL,
  `user_rating` varchar(255) NOT NULL,
  `user_review` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`userId`, `courseId`, `user_Name`, `user_rating`, `user_review`, `datetime`, `image`) VALUES
('1', '1', 'Salah', '5', 'Yonons', '2021-12-29 18:25:33', 'uploads/126126592_3020492128050804_1703443695247337615_n.jpg'),
('1', '3', 'Salah', '5', 'fuck speed', '2021-12-29 17:22:38', 'uploads/126126592_3020492128050804_1703443695247337615_n.jpg'),
('21', '12', 'Gika', '2', ' i love you but your sound is bad', '2021-12-31 16:10:54', 'Screenshot (16).png'),
('27', '9', 'Speedoo', '1', 'abo shaklk ya 25y', '2021-12-31 10:01:39', 'Image6.jpg'),
('28', '12', 'Nezoko', '1', 'very bad my brother do it better', '2021-12-31 16:03:19', 'uploads/artworks-000557600433-dvmtmy-t500x500.jpg'),
('6', '3', 'Joex', '5', 'first comment', '2021-12-29 17:20:15', 'uploads/joe.jpg'),
('6', '6', 'Joex', '5', 'secound comment', '2021-12-29 17:20:38', 'uploads/joe.jpg'),
('6', '8', 'Joex', '5', 'fuck speed', '2021-12-29 17:21:52', 'uploads/joe.jpg'),
('8', '2', 'Bassem', '5', 'Salah and joex have finished the review system successfulyy ', '2021-12-29 18:21:32', 'uploads/3683.jpg'),
('8', '3', 'Bassem', '5', 'fuck speed', '2021-12-29 17:24:53', 'uploads/3683.jpg'),
('8', '8', 'salah', '5', 'bgrb elstars', '2021-12-29 17:28:33', 'uploads/3683.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `courseid` int(11) NOT NULL,
  `userid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `enjoyed?` varchar(100) NOT NULL,
  `suggestion` varchar(100) NOT NULL,
  `instructorRate` int(100) NOT NULL,
  `courseRate` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usercourse`
--

CREATE TABLE `usercourse` (
  `userid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `courseId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usercourse`
--

INSERT INTO `usercourse` (`userid`, `username`, `courseName`, `courseId`) VALUES
(1, 'Salah', 'Swift', 1),
(1, 'Salah', 'Android', 3),
(1, 'Salah', 'Algoritm and Data Structure', 6),
(1, 'Salah', 'Math2', 7),
(6, 'Joex', 'Android', 3),
(6, 'Joex', 'Algoritm and Data Structure', 6),
(6, 'Joex', 'Computer Graphics', 8),
(8, 'Bassem', 'Web Development', 2),
(8, 'Bassem', 'Android', 3),
(8, 'Bassem', 'Computer Graphics', 8),
(21, 'Gika', 'Swift', 1),
(21, 'Gika', 'Web Development', 2),
(21, 'Gika', 'Computer Graphics', 8),
(21, 'Gika', 'Simpana', 9),
(21, 'Gika', 'Speed', 12),
(27, 'Speedoo', 'Web Development', 2),
(27, 'Speedoo', 'Deep Learning', 5),
(27, 'Speedoo', 'Computer Graphics', 8),
(27, 'Speedoo', 'Simpana', 9),
(28, 'Nezoko', 'Swift', 1),
(28, 'Nezoko', 'Web Development', 2),
(28, 'Nezoko', 'Android', 3),
(28, 'Nezoko', 'Machine Learning', 4),
(28, 'Nezoko', 'Computer Graphics', 8),
(28, 'Nezoko', 'Simpana', 9),
(28, 'Nezoko', 'Speed', 12),
(36, 'Lara', 'Swift', 1),
(36, 'Lara', 'Machine Learning', 4),
(36, 'Lara', 'Deep Learning', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `type` varchar(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Offline now',
  `unique_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`type`, `userid`, `email`, `password`, `username`, `gender`, `image`, `status`, `unique_id`) VALUES
('Adminstrator', 1, 'Salah@gmail.com', 'Salah', 'Salah', 'male', 'uploads/salah.jpg', 'Offline now', 344391712),
('Student', 6, 'Joex@gmail.com', 'Joex', 'Joex', '', 'uploads/salah.jpg', 'Offline now', 273594041),
('Student', 7, 'hady@gmail.com', 'hady', 'hady', '', 'uploads/salah.jpg', 'Offline now', 1122595347),
('Student', 8, 'Bassem@gmail.com', 'Bassem', 'Bassem', 'male', 'uploads/salah.jpg', 'Offline now', 425433210),
('Student', 21, 'Gika@gmail.com', 'Gika', 'Gika', '', 'uploads/salah.jpg', 'Offline now', 511301026),
('Student', 22, 'Speed@gmail.com', 'Speed', 'Speed', '', 'uploads/salah.jpg', 'Offline now', 1346297550),
('Student', 24, 'Mohaned@gmail.com', 'Mohaned', 'Mohaned', '', 'uploads/salah.jpg', 'Offline now', 899381761),
('Student', 25, 'honda@gmail.com', 'honda', 'honda', 'male', 'uploads/salah.jpg', 'Offline now', 153302835),
('Student', 26, 'Yasser', 'Yasser', 'Yasser', 'male', 'uploads/salah.jpg', 'Offline now', 778174218),
('Student', 27, 'Speedoo@gmail.com', 'Speedoo', 'Speedoo', 'male', 'uploads/salah.jpg', 'Offline now', 258233424),
('Student', 28, 'Nezoko@gmail.com', 'Nezoko', 'Nezoko', 'male', 'uploads/artworks-000557600433-dvmtmy-t500x500.jpg', 'Offline now', 648450671),
('Student', 29, 'BlackClover@gmail.com', 'Black', 'Black Clover', '', 'uploads/salah.jpg', 'Offline now', 1215052934),
('Student', 31, 'Samira@gmail.com', 'Samira', 'Samira', 'female', 'uploads/salah.jpg', 'Offline now', 1381678639),
('Student', 36, 'Lara@gmail.com', 'Lara', 'Lara', 'female', 'uploads/salah.jpg', 'Offline now', 463245856),
('Student', 40, 'Zeina@gmail.com', 'Zeina', 'Zeina', 'female', 'uploads/salah.jpg', 'Offline now', 1074598512),
('Student', 42, 'Farah@gmail.com', 'Farah', 'Farah', 'female', 'uploads/salah.jpg', 'Offline now', 1550603867),
('Student', 44, 'Mostafa@gmail.com', 'Mostafa', 'Mostafa', 'male', 'uploads/salah.jpg', 'Offline now', 1054642346),
('Student', 45, 'Reem@gmail.com', 'Reem', 'Reem', 'female', 'uploads/salah.jpg', 'Offline now', 430900660),
('Student', 47, 'YoussefAlaa@gmail.com', 'YoussefAlaa', 'YoussefAlaa', 'male', 'uploads/salah.jpg', 'Offline now', 565758173),
('Student', 49, 'Lara', 'Lara', 'Lara', 'female', 'uploads/salah.jpg', 'Offline now', 1004111546),
('Student', 50, 'Salah', 'Salah', 'Salah', 'male', 'uploads/salah.jpg', 'Offline now', 1618363169),
('Student', 51, 'Kareem@gmail.com', 'Kareem', 'Kareem', 'male', 'uploads/salah.jpg', 'Offline now', 1599647410),
('Student', 52, 'hhhhh@gmail.com', 'hhhhh', 'hhhhh', 'male', 'uploads/salah.jpg', 'Offline now', 534455385),
('Student', 53, 'hhhhh@gmail.com', 'hhhhh', 'hhhh', 'male', 'uploads/salah.jpg', 'Offline now', 731751848),
('Student', 54, 'gggggggggggggggggggg@gmail.com', 'gggggggggggggggggggg', 'gggggggggggggggggggg', 'male', 'uploads/salah.jpg', 'Offline now', 987679646),
('Student', 55, 'Salah11@gmail.com', 'fghfghfghfghfghfghfg', 'fghfghhfghfghfg', 'male', 'uploads/salah.jpg', 'Offline now', 1537396983),
('Student', 91, 'newnewnew1@gmail.com', 'newnewnew1', 'newnewnew1', 'male', 'uploads/wallpaperflare.com_wallpaper.jpg', 'Offline now', 1435852276),
('Student', 92, 'rrrrrrrrrrrrrrrr@gmail.com', 'rrrrrrrrrrrrrrrr', 'rrrrrrrrrrrrrrrr', 'female', 'uploads/salah.jpg', 'Offline now', 547758321),
('Student', 93, 'rrrrrrrrrrrrrrrr1@gmail.com', 'rrrrrrrrrrrrrrrr1', 'rrrrrrrrrrrrrrrr1', 'male', 'uploads/salah.jpg', 'Offline now', 1535322994),
('Student', 94, 'rrrrrrrrrrrrrrrr2@gmail.com', 'rrrrrrrrrrrrrrrr2', 'rrrrrrrrrrrrrrrr2', 'male', 'uploads/salah.jpg', 'Offline now', 389986935),
('Student', 96, 'speedooooo@gmail.com', 'speedooooo', 'speedooooo', 'male', 'uploads/salah.jpg', 'Offline now', 675489348),
('Student', 97, 'LaraLaraLara@gmail.com', 'LaraLaraLara', 'LaraLaraLara', 'female', 'uploads/salah.jpg', 'Offline now', 521610090),
('Student', 113, 'chattttchattttchatttt@gmail.com', 'chattttchatttt', 'chatttt', 'male', 'uploads/sal.jpg', 'Active now', 1616693879);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`courseid`,`star1`,`star2`,`star3`,`star4`,`star5`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`userId`,`courseId`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`courseid`,`userid`);

--
-- Indexes for table `usercourse`
--
ALTER TABLE `usercourse`
  ADD PRIMARY KEY (`userid`,`courseId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
