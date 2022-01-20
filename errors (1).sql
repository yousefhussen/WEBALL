-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 10:58 PM
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
-- Table structure for table `errors`
--

CREATE TABLE `errors` (
  `errorNum` int(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `fileLoc` varchar(255) NOT NULL,
  `lineNum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `errors`
--

INSERT INTO `errors` (`errorNum`, `level`, `message`, `fileLoc`, `lineNum`) VALUES
(1, '2', 'Undefined array key \"descriptionnn\"', 'D:xampphtdocsWeb-ProjectPhpAddCourse.php', '80'),
(2, '2', 'Undefined array key \"coursePriceeee\"', 'D:xampphtdocsWeb-ProjectPhpAddCourse.php', '79'),
(3, '2', 'Undefined array key \"coursePricessss\"', 'D:xampphtdocsWeb-ProjectPhpAddCourse.php', '79'),
(4, '2', 'Undefined array key \"coursePricessss\"', 'D:xampphtdocsWeb-ProjectPhpAddCourse.php', '79'),
(5, '2', 'Undefined variable $sql', 'D:xampphtdocsWeb-ProjectPhpAddCourse.php', '78'),
(6, '2', 'Undefined variable $sql', 'D:xampphtdocsWeb-ProjectPhpAddCourse.php', '92'),
(7, '2', 'Undefined variable $query', 'D:xampphtdocsWeb-ProjectPhpadminPanelSearch.php', '34'),
(8, '2', 'Undefined array key \"ide\"', 'D:xampphtdocsWeb-ProjectPhpadminPanelSearch.php', '26'),
(9, '2', 'Undefined variable $html', 'D:xampphtdocsWeb-ProjectPhpadminPanelSearch.php', '76'),
(10, '2', 'Undefined array key \"usernameee\"', 'D:xampphtdocsWeb-ProjectadminPanel.php', '51'),
(11, '2', 'Undefined array key \"ideeeee\"', 'D:xampphtdocsWeb-ProjectPhpeditCourse.php', '75'),
(12, '2', 'Undefined variable $CourseName', 'D:xampphtdocsWeb-ProjectPhpeditCourse.php', '80'),
(13, '2', 'Undefined variable $sql', 'D:xampphtdocsWeb-ProjectAddEditDelete.php', '111'),
(14, '2', 'Undefined variable $sql', 'D:xampphtdocsWeb-ProjectAddEditDelete.php', '111'),
(15, '2', 'Undefined variable $sql', 'D:xampphtdocsWeb-ProjectAddEditDelete.php', '111'),
(16, '2', 'Undefined variable $sql', 'D:xampphtdocsWeb-ProjectAddEditDelete.php', '111'),
(17, '2', 'Undefined variable $row1', 'D:xampphtdocsWeb-ProjectAddEditDelete.php', '120'),
(18, '1024', 'A custom error has been triggered', 'D:xampphtdocsWeb-ProjectAddEditDelete.php', '113'),
(19, '1024', 'A custom error has been triggered', 'D:xampphtdocsWeb-ProjectAddEditDelete.php', '113'),
(20, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-ProjectAddEditDelete.php', '113'),
(21, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-ProjectPhpAddCourse.php', '94'),
(22, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-ProjectPhpAddCourse.php', '94'),
(23, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-ProjectPhpAddCourse.php', '100'),
(24, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcart.php', '244'),
(25, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcart.php', '244'),
(95, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '288'),
(96, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '288'),
(134, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(135, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(136, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(137, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(138, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(139, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(140, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(141, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(142, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(143, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(144, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(145, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(146, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(147, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(148, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(149, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(150, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(151, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(152, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(153, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(154, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(155, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(156, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(157, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(158, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(159, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(160, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(161, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(162, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(163, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(164, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(165, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(166, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(167, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(168, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(169, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(170, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(171, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '226'),
(172, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '229'),
(173, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '229'),
(174, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '229'),
(175, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '229'),
(176, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '229'),
(177, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '229'),
(178, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '229'),
(179, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '229'),
(180, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '229'),
(181, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '229'),
(182, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '230'),
(183, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '230'),
(184, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '230'),
(185, '1024', 'Wrong SQL Statement22', 'D:xampphtdocsWeb-Projectcourses.php', '230'),
(186, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '478'),
(187, '1024', 'Wrong SQL Statement', 'D:xampphtdocsWeb-Projectcourses.php', '478');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `errors`
--
ALTER TABLE `errors`
  ADD PRIMARY KEY (`errorNum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `errors`
--
ALTER TABLE `errors`
  MODIFY `errorNum` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
