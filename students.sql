-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2019 at 06:04 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `addstudents`
--

CREATE TABLE `addstudents` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `session` varchar(50) NOT NULL,
  `semister` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addstudents`
--

INSERT INTO `addstudents` (`id`, `name`, `username`, `department`, `session`, `semister`, `roll`, `image`, `dates`) VALUES
(1, 'abdullah al noman', 'noman', 'Computer', '14-15', '4th', 835195, 'noman.jpg', '2003-07-18 18:00:00'),
(2, 'rejoan hawlader', 'rejoan', 'Civil', '14-15', '4th', 835186, 'rejoan.jpg', '2003-07-18 18:00:00'),
(3, 'md robiul hawlader', 'robiul', 'Computer', '14-15', '5th', 835187, 'robiul.jpg', '2019-07-19 15:10:12'),
(4, 'toma halder', 'toma', 'Computer', '14-15', '4th', 835188, 'toma.jpg', '2019-07-19 15:12:02'),
(5, 'bosir uddin', 'bosir', 'Electrical', '18-19', '4th', 835155, 'uploads/4852d0ddd7.png', '2019-07-21 18:43:16'),
(6, 'md kamal', 'kamal', 'Civil', '15-16', '4th', 835167, '2c758b07b1.png', '2019-07-22 02:20:46'),
(7, 'rofiq hawlader', 'rofiq', 'Computer', '14-15', '4th', 835176, '9e3e02a73a.jpg', '2019-07-25 17:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `add_subject`
--

CREATE TABLE `add_subject` (
  `id` int(11) NOT NULL,
  `sub_code` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_subject`
--

INSERT INTO `add_subject` (`id`, `sub_code`, `sub_name`, `department`) VALUES
(1, 6672, 'system analysis design and development', 'computer'),
(2, 0, '6671', 'Computer'),
(3, 7741, 'database management system', 'Computer'),
(4, 6671, 'micro proccessor and microcomputer-2', 'Computer');

-- --------------------------------------------------------

--
-- Table structure for table `add_teacher`
--

CREATE TABLE `add_teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_teacher`
--

INSERT INTO `add_teacher` (`id`, `name`, `username`, `department`, `image`, `dates`) VALUES
(1, 'sumaya afroz', 'sumaya', 'Computer', '054652783c.jpg', '2019-07-22 17:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `admin_reg`
--

CREATE TABLE `admin_reg` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_reg`
--

INSERT INTO `admin_reg` (`id`, `name`, `role`, `username`, `password`) VALUES
(1, 'abdullah al noman', 'admin', 'noman123', '123456'),
(2, 'rejoan hawlader', 'teacher', 'rejoan', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_cmt`
--

CREATE TABLE `attendance_cmt` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `semister` varchar(255) NOT NULL,
  `sub_code` int(11) NOT NULL,
  `count` varchar(255) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance_cmt`
--

INSERT INTO `attendance_cmt` (`id`, `roll`, `semister`, `sub_code`, `count`, `dates`) VALUES
(1, 835195, '', 0, 'present', '2019-07-20 10:00:19'),
(2, 835188, '', 0, 'present', '2019-07-20 10:00:19'),
(3, 835195, '', 0, 'present', '2019-07-20 10:00:38'),
(4, 835195, '', 0, 'present', '2019-07-20 10:02:11'),
(5, 835188, '', 0, 'absent', '2019-07-20 10:02:11'),
(6, 835186, '', 0, 'present', '2019-07-21 15:14:50'),
(7, 835195, '4th', 6672, 'present', '2019-07-25 06:23:49'),
(8, 835188, '4th', 6672, 'absent', '2019-07-25 06:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_cvl`
--

CREATE TABLE `attendance_cvl` (
  `id` int(11) NOT NULL,
  `semister` varchar(255) NOT NULL,
  `sub_code` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `count` varchar(255) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_elc`
--

CREATE TABLE `attendance_elc` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `semister` varchar(255) NOT NULL,
  `sub_code` int(11) NOT NULL,
  `count` varchar(255) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance_elc`
--

INSERT INTO `attendance_elc` (`id`, `roll`, `semister`, `sub_code`, `count`, `dates`) VALUES
(1, 835155, '', 0, 'absent', '2019-07-22 01:52:41'),
(2, 835155, '4th', 6672, 'present', '2019-07-25 06:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `due`
--

CREATE TABLE `due` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `semister` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL,
  `fees_type` varchar(255) NOT NULL,
  `ammount` int(11) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `due`
--

INSERT INTO `due` (`id`, `name`, `semister`, `roll`, `fees_type`, `ammount`, `dates`) VALUES
(1, 'bosir uddin', '4th', 835155, 'exam fees', 1150, '2019-07-25 10:46:39'),
(2, 'bosir uddin', '4th', 835155, 'others', 1500, '2019-07-25 10:47:47'),
(3, 'toma halder', '4th', 835188, 'others', 400, '2019-07-25 10:50:14'),
(4, 'abdullah al noman', '4th', 835195, 'semister fees', 5700, '2019-07-25 12:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `messaging`
--

CREATE TABLE `messaging` (
  `id` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `reqid` int(11) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messaging`
--

INSERT INTO `messaging` (`id`, `senderid`, `reqid`, `message`) VALUES
(10, 1, 6, 'hi'),
(11, 1, 2, 'hi rejoan how are you?'),
(12, 2, 6, 'hi'),
(13, 2, 3, 'hello robiul'),
(14, 2, 3, 'hello robiul'),
(15, 2, 3, 'hello robiul'),
(16, 1, 6, 'hlw'),
(17, 1, 6, 'how are you'),
(18, 1, 6, 'what you doing here??'),
(19, 3, 2, 'how are you??'),
(20, 3, 2, 'im also fine'),
(21, 3, 2, 'ok thank you'),
(22, 3, 2, 'ok thank you'),
(23, 3, 2, 'ok thank you'),
(24, 3, 2, 'ok thank you'),
(25, 3, 4, 'hello toma'),
(26, 1, 7, 'hi'),
(27, 1, 2, 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `news_update`
--

CREATE TABLE `news_update` (
  `id` int(11) NOT NULL,
  `news` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_update`
--

INSERT INTO `news_update` (`id`, `news`) VALUES
(1, 'admission going on in summer season ');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `semister` varchar(50) NOT NULL,
  `roll` int(11) NOT NULL,
  `fees` varchar(50) NOT NULL,
  `ammount` int(11) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `department`, `semister`, `roll`, `fees`, `ammount`, `dates`) VALUES
(1, 'noman', '1st', 835195, 'exam fees', 1200, '2015-07-18 18:00:00'),
(5, 'Computer', '5th', 835195, 'exam fees', 4000, '0000-00-00 00:00:00'),
(6, 'Computer', '4th', 835195, 'exam fees', 100, '2019-07-14 18:00:00'),
(12, 'Computer', '3rd', 835195, 'exam fees', 100, '0000-00-00 00:00:00'),
(13, 'Computer', '3rd', 835195, 'exam fees', 100, '0000-00-00 00:00:00'),
(14, 'Electrical', '4th', 835155, 'absent fine', 200, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `name`, `dept`, `title`, `details`, `dates`) VALUES
(1, 'noman123', 'Computer', 'social science', 'tomorrow will 10 am class start', '2019-07-25 17:15:20'),
(2, 'noman123', 'Electrical', 'english 2', 'this post for electrical', '2019-07-25 17:35:03'),
(3, 'noman', 'Computer', 'social science', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora aperiam voluptate cumque commodi numquam, nesciunt, dignissimos modi, quaerat soluta magni veniam id in molestiae quidem. Quibusdam doloremque necessitatibus doloribus blanditiis!', '2019-07-25 17:52:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addstudents`
--
ALTER TABLE `addstudents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_subject`
--
ALTER TABLE `add_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_teacher`
--
ALTER TABLE `add_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_reg`
--
ALTER TABLE `admin_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_cmt`
--
ALTER TABLE `attendance_cmt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_cvl`
--
ALTER TABLE `attendance_cvl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_elc`
--
ALTER TABLE `attendance_elc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `due`
--
ALTER TABLE `due`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messaging`
--
ALTER TABLE `messaging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_update`
--
ALTER TABLE `news_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addstudents`
--
ALTER TABLE `addstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `add_subject`
--
ALTER TABLE `add_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `add_teacher`
--
ALTER TABLE `add_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_reg`
--
ALTER TABLE `admin_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance_cmt`
--
ALTER TABLE `attendance_cmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `attendance_cvl`
--
ALTER TABLE `attendance_cvl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_elc`
--
ALTER TABLE `attendance_elc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `due`
--
ALTER TABLE `due`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messaging`
--
ALTER TABLE `messaging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `news_update`
--
ALTER TABLE `news_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
