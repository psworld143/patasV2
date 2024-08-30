-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 07:42 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(8) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `first_name`, `middle_name`, `last_name`, `username`, `password`, `user_type`, `date_added`) VALUES
(1, 'Michael Paul', 'Olea', 'Sebando', 'admin', 'admin020894', 'admin', '2022-11-19 06:07:08'),
(5, 'Tabulator', '', 'Test', 'tabulator', 'tabulator', 'tabulator', '2022-11-19 06:07:08'),
(6, 'Michael Paul', 'Olea', 'Sebando', 'paul', 'paul', 'judge', '2022-11-21 08:08:12'),
(7, 'Kenneth', 'Olinan', 'Suerte', 'kenneth', 'kenneth123', 'judge', '2022-11-21 13:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `contestants`
--

CREATE TABLE `contestants` (
  `id` int(11) NOT NULL,
  `firstname` text DEFAULT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` text DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `course` varchar(8) DEFAULT NULL,
  `personal_background` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `contestant_no` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contestants`
--

INSERT INTO `contestants` (`id`, `firstname`, `middlename`, `lastname`, `age`, `gender`, `course`, `personal_background`, `image`, `contestant_no`, `added_by`) VALUES
(7, 'Renette', '', 'Del Mundo', '19', 'Female', '3', '', 'cictgirl.jpg', '1', 'admin'),
(8, 'Frank Leimbergh', '', 'Amodia', '19', 'Male', '3', '', 'cictboy.jpg', '1', 'admin'),
(9, 'Ruby Jane', 'Palma', 'Salazar', '20', 'Female', '7', '', 'ctegirl.jpg', '2', 'admin'),
(10, 'Erwin', 'Rama', 'Estacion', '22', 'Male', '7', '', 'cteboy.jpg', '2', 'admin'),
(12, 'Julie Ann', 'Talming', 'Bento', '22', 'Female', '11', '', 'ccjegirl.jpg', '6', 'admin'),
(13, 'April Mae', '', 'Elican', '', 'Female', '8', '', 'cafgirl.jpg', '3', 'admin'),
(14, 'Junlee', '', 'Flores', '', 'Male', '8', '', 'cbggboy.jpg', '3', 'admin'),
(15, 'Michelle Jane', '', 'Bejau', '', 'Female', '9', '', 'ccegirl.jpg', '4', 'admin'),
(16, 'Samson', '', 'Branzuela', '', 'Male', '9', '', 'cceboy.jpg', '4', 'admin'),
(17, 'Katrina Collen', '', 'Sabuera', '', 'Female', '10', '', 'shsgirl.jpg', '5', 'admin'),
(18, 'Joriebel', '', 'Ropero', '', 'Male', '10', '', 'shsboy.jpg', '5', 'admin'),
(19, 'John Christian', '', 'Tolentino', '', 'Male', '11', '', 'ccjeboy.jpg', '6', 'admin'),
(20, 'Nyah', '', 'Calantas', '', 'Female', '6', '', 'cafgirl.jpg', '7', 'admin'),
(21, 'Chuckie', '', 'Jagolino', '', 'Male', '6', '', 'cafboy.jpg', '7', 'admin'),
(22, 'Mary', '', 'Ganaba', '', 'Female', '12', '', 'thmswgirl.jpg', '8', 'admin'),
(23, 'Jay', '', 'Magallen', '', 'Male', '12', '', 'thmswboy.jpg', '8', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(8) NOT NULL,
  `course_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `added_by` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `description`, `added_by`) VALUES
(3, 'College of Information and Communication Technology', 'BSIT Department', 'admin'),
(6, 'College of Agriculture and Fisheries', '', 'admin'),
(7, 'College of Teacher Education', '', 'admin'),
(8, 'College of Business and Good Governance', '', 'admin'),
(9, 'College of Civil Engineering', '', 'admin'),
(10, 'Senior Highschool Department', '', 'admin'),
(11, 'College of Criminal Justice Education', '', 'admin'),
(12, 'Tourism Hospitality Management and Social Work Department', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `criteria_archive`
--

CREATE TABLE `criteria_archive` (
  `id` int(8) NOT NULL,
  `criteria_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criteria_archive`
--

INSERT INTO `criteria_archive` (`id`, `criteria_name`, `description`, `added_by`) VALUES
(7, 'Stage Projection', '', 'admin'),
(8, 'Becomingness', '', 'admin'),
(9, 'Charm and Beauty/Handsomeness', '', 'admin'),
(10, 'Appropriateness of chosen accessories', '', 'admin'),
(11, 'Stage Appeal', '', 'admin'),
(12, 'Content of the answer', '', 'admin'),
(13, 'Relevance of the answer', '', 'admin'),
(14, 'Organization of the answer', '', 'admin'),
(15, 'Content Relevance and Organization of the Answer', '', 'admin'),
(16, 'StageAppeal, Poise and Bearing and Beauty', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `criteria_informations`
--

CREATE TABLE `criteria_informations` (
  `id` int(8) NOT NULL,
  `event_id` varchar(255) DEFAULT NULL,
  `criteria_id` varchar(255) DEFAULT NULL,
  `percentage` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criteria_informations`
--

INSERT INTO `criteria_informations` (`id`, `event_id`, `criteria_id`, `percentage`, `added_by`) VALUES
(10, '8', '7', '30', 'admin'),
(11, '8', '8', '20', 'admin'),
(12, '8', '9', '40', 'admin'),
(13, '8', '10', '10', 'admin'),
(14, '9', '7', '30', 'admin'),
(15, '9', '8', '20', 'admin'),
(16, '9', '9', '40', 'admin'),
(17, '9', '10', '10', 'admin'),
(18, '10', '7', '30', 'admin'),
(19, '10', '8', '20', 'admin'),
(20, '10', '9', '40', 'admin'),
(21, '10', '10', '10', 'admin'),
(22, '11', '7', '40', 'admin'),
(23, '11', '11', '40', 'admin'),
(24, '11', '10', '20', 'admin'),
(25, '12', '12', '30', 'admin'),
(26, '12', '13', '30', 'admin'),
(27, '12', '14', '30', 'admin'),
(28, '12', '11', '10', 'admin'),
(33, '14', '15', '60', 'admin'),
(34, '14', '16', '40', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE `event_category` (
  `id` int(8) NOT NULL,
  `category_name` text NOT NULL,
  `description` text NOT NULL,
  `order_number` int(11) DEFAULT NULL,
  `percentage` varchar(255) DEFAULT NULL,
  `isTabulated` varchar(255) NOT NULL DEFAULT 'No',
  `added_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_category`
--

INSERT INTO `event_category` (`id`, `category_name`, `description`, `order_number`, `percentage`, `isTabulated`, `added_by`) VALUES
(8, 'Production Number', '', 1, '20', 'NO', 'admin'),
(9, 'Sports Attire', '', 2, '20', 'NO', 'admin'),
(10, 'School Uniform', '', 3, '0', 'NO', 'admin'),
(11, 'Evening Gown/Inspired Barong', '', 4, '20', 'NO', 'admin'),
(12, 'Interview', '', 5, '40', 'No', 'admin'),
(14, 'Top Five', '', 6, '100', 'No', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `event_contestant`
--

CREATE TABLE `event_contestant` (
  `id` int(8) NOT NULL,
  `event_id` text NOT NULL,
  `contestant_id` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_contestant`
--

INSERT INTO `event_contestant` (`id`, `event_id`, `contestant_id`, `status`, `added_by`) VALUES
(3, '8', '7', 'status', 'admin'),
(4, '8', '8', 'status', 'admin'),
(5, '8', '9', 'status', 'admin'),
(6, '8', '10', 'status', 'admin'),
(7, '9', '7', 'status', 'admin'),
(8, '9', '8', 'status', 'admin'),
(9, '9', '9', 'status', 'admin'),
(10, '9', '10', 'status', 'admin'),
(11, '10', '7', 'status', 'admin'),
(12, '10', '8', 'status', 'admin'),
(13, '10', '9', 'status', 'admin'),
(14, '10', '10', 'status', 'admin'),
(15, '11', '7', 'status', 'admin'),
(16, '11', '8', 'status', 'admin'),
(17, '11', '9', 'status', 'admin'),
(18, '11', '10', 'status', 'admin'),
(19, '12', '7', 'status', 'admin'),
(20, '12', '8', 'status', 'admin'),
(21, '12', '9', 'status', 'admin'),
(22, '12', '10', 'status', 'admin'),
(23, '8', '12', 'status', 'admin'),
(24, '8', '13', 'status', 'admin'),
(25, '8', '14', 'status', 'admin'),
(26, '8', '15', 'status', 'admin'),
(27, '8', '16', 'status', 'admin'),
(28, '8', '17', 'status', 'admin'),
(29, '8', '18', 'status', 'admin'),
(30, '8', '19', 'status', 'admin'),
(31, '8', '20', 'status', 'admin'),
(32, '8', '21', 'status', 'admin'),
(33, '8', '22', 'status', 'admin'),
(34, '8', '23', 'status', 'admin'),
(35, '9', '12', 'status', 'admin'),
(36, '9', '13', 'status', 'admin'),
(37, '9', '14', 'status', 'admin'),
(38, '9', '15', 'status', 'admin'),
(39, '9', '16', 'status', 'admin'),
(40, '9', '17', 'status', 'admin'),
(41, '9', '18', 'status', 'admin'),
(42, '9', '19', 'status', 'admin'),
(43, '9', '20', 'status', 'admin'),
(44, '9', '21', 'status', 'admin'),
(45, '9', '22', 'status', 'admin'),
(46, '9', '23', 'status', 'admin'),
(47, '10', '12', 'status', 'admin'),
(48, '10', '13', 'status', 'admin'),
(49, '10', '14', 'status', 'admin'),
(50, '10', '15', 'status', 'admin'),
(51, '10', '16', 'status', 'admin'),
(52, '10', '17', 'status', 'admin'),
(53, '10', '18', 'status', 'admin'),
(54, '10', '19', 'status', 'admin'),
(55, '10', '20', 'status', 'admin'),
(56, '10', '21', 'status', 'admin'),
(57, '10', '22', 'status', 'admin'),
(58, '10', '23', 'status', 'admin'),
(59, '11', '12', 'status', 'admin'),
(60, '11', '13', 'status', 'admin'),
(61, '11', '14', 'status', 'admin'),
(62, '11', '15', 'status', 'admin'),
(63, '11', '16', 'status', 'admin'),
(64, '11', '17', 'status', 'admin'),
(65, '11', '18', 'status', 'admin'),
(66, '11', '19', 'status', 'admin'),
(67, '11', '20', 'status', 'admin'),
(68, '11', '21', 'status', 'admin'),
(69, '11', '22', 'status', 'admin'),
(70, '11', '23', 'status', 'admin'),
(71, '12', '12', 'status', 'admin'),
(72, '12', '13', 'status', 'admin'),
(73, '12', '14', 'status', 'admin'),
(74, '12', '15', 'status', 'admin'),
(75, '12', '16', 'status', 'admin'),
(76, '12', '17', 'status', 'admin'),
(77, '12', '18', 'status', 'admin'),
(78, '12', '19', 'status', 'admin'),
(79, '12', '20', 'status', 'admin'),
(80, '12', '21', 'status', 'admin'),
(81, '12', '22', 'status', 'admin'),
(82, '12', '23', 'status', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(8) NOT NULL,
  `category` int(8) NOT NULL,
  `criteria_id` int(8) NOT NULL,
  `contestant` int(8) NOT NULL,
  `score` int(8) NOT NULL,
  `judge` varchar(255) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topfive`
--

CREATE TABLE `topfive` (
  `id` int(9) NOT NULL,
  `contestant` varchar(255) DEFAULT NULL,
  `score` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contestants`
--
ALTER TABLE `contestants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criteria_archive`
--
ALTER TABLE `criteria_archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criteria_informations`
--
ALTER TABLE `criteria_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_category`
--
ALTER TABLE `event_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_contestant`
--
ALTER TABLE `event_contestant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topfive`
--
ALTER TABLE `topfive`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contestants`
--
ALTER TABLE `contestants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `criteria_archive`
--
ALTER TABLE `criteria_archive`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `criteria_informations`
--
ALTER TABLE `criteria_informations`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `event_contestant`
--
ALTER TABLE `event_contestant`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `topfive`
--
ALTER TABLE `topfive`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
