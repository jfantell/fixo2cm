-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2017 at 08:51 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_o2cm`
--

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE `competitions` (
  `competition_id` int(10) UNSIGNED NOT NULL,
  `university_id` int(10) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `name` varchar(100) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`competition_id`, `university_id`, `start_date`, `end_date`, `name`) VALUES
(2, 100, '2017-04-17', '2017-04-17', 'RPI Dancesport Competition'),
(8, 100, '2017-10-10', '2018-10-10', 'RPI The Dance');

-- --------------------------------------------------------

--
-- Table structure for table `dances`
--

CREATE TABLE `dances` (
  `dance_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `dances`
--

INSERT INTO `dances` (`dance_id`, `name`, `event_id`, `level_id`) VALUES
(1, 'Foxtrot', 1, 1),
(2, 'Quickstep', 1, 1),
(3, 'Foxtrot', 2, 2),
(4, 'Quickstep', 2, 2),
(5, 'Tango', 2, 2),
(6, 'Waltz', 2, 2),
(7, 'Foxtrot', 3, 3),
(8, 'Foxtrot', 4, 4),
(9, 'Quickstep', 4, 4),
(10, 'Tango', 4, 4),
(11, 'Waltz', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `name`) VALUES
(1, 'smooth'),
(2, 'standard'),
(3, 'latin'),
(4, 'rhythm');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `level_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(15) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`level_id`, `name`) VALUES
(1, '1'),
(2, '1'),
(3, '1'),
(4, '1');

-- --------------------------------------------------------

--
-- Table structure for table `partnerdances`
--

CREATE TABLE `partnerdances` (
  `partner_dance_id` int(10) UNSIGNED NOT NULL,
  `partner_id` int(10) UNSIGNED NOT NULL,
  `dance_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `partnerdances`
--

INSERT INTO `partnerdances` (`partner_dance_id`, `partner_id`, `dance_id`) VALUES
(1, 1, 1),
(2, 2, 3),
(3, 2, 3),
(4, 2, 3),
(5, 2, 3),
(6, 3, 7),
(7, 4, 8),
(8, 4, 9),
(9, 4, 10),
(10, 4, 11);

-- --------------------------------------------------------

--
-- Table structure for table `partnerships`
--

CREATE TABLE `partnerships` (
  `partner_id` int(10) UNSIGNED NOT NULL,
  `competition_id` int(10) UNSIGNED NOT NULL,
  `leader_id` int(10) UNSIGNED NOT NULL,
  `follower_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `partnerships`
--

INSERT INTO `partnerships` (`partner_id`, `competition_id`, `leader_id`, `follower_id`) VALUES
(1, 2, 4, 5),
(2, 2, 4, 5),
(3, 2, 4, 5),
(4, 8, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `university_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `address_1` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `address_2` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `city` varchar(25) COLLATE utf32_unicode_ci NOT NULL,
  `state` varchar(2) COLLATE utf32_unicode_ci NOT NULL,
  `zip` varchar(11) COLLATE utf32_unicode_ci NOT NULL,
  `country` varchar(30) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`university_id`, `name`, `address_1`, `address_2`, `city`, `state`, `zip`, `country`) VALUES
(100, 'Rensselaer Polytechnic Institute', '110 8th St', '', 'Troy', 'NY', '12180', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `university_id` int(10) UNSIGNED NOT NULL,
  `leader_level` int(10) UNSIGNED NOT NULL,
  `follow_level` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `university_id`, `leader_level`, `follow_level`) VALUES
(4, 'John', 'Fantell', 'jfantell@icloud.com', 100, 1, 1),
(5, 'Hayley', 'Gill', 'hayley@hayley.com', 100, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`competition_id`),
  ADD KEY `host` (`university_id`);

--
-- Indexes for table `dances`
--
ALTER TABLE `dances`
  ADD PRIMARY KEY (`dance_id`),
  ADD KEY `event` (`event_id`),
  ADD KEY `level` (`level_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `partnerdances`
--
ALTER TABLE `partnerdances`
  ADD PRIMARY KEY (`partner_dance_id`),
  ADD KEY `partners` (`partner_id`),
  ADD KEY `dances` (`dance_id`);

--
-- Indexes for table `partnerships`
--
ALTER TABLE `partnerships`
  ADD PRIMARY KEY (`partner_id`),
  ADD KEY `competition` (`competition_id`),
  ADD KEY `leader` (`leader_id`),
  ADD KEY `follower` (`follower_id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`university_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `university` (`university_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `competition_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dances`
--
ALTER TABLE `dances`
  MODIFY `dance_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `level_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `partnerdances`
--
ALTER TABLE `partnerdances`
  MODIFY `partner_dance_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `partnerships`
--
ALTER TABLE `partnerships`
  MODIFY `partner_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `university_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `competitions`
--
ALTER TABLE `competitions`
  ADD CONSTRAINT `host` FOREIGN KEY (`university_id`) REFERENCES `university` (`university_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dances`
--
ALTER TABLE `dances`
  ADD CONSTRAINT `event` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `level` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `partnerdances`
--
ALTER TABLE `partnerdances`
  ADD CONSTRAINT `dances` FOREIGN KEY (`dance_id`) REFERENCES `dances` (`dance_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `partners` FOREIGN KEY (`partner_id`) REFERENCES `partnerships` (`partner_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `partnerships`
--
ALTER TABLE `partnerships`
  ADD CONSTRAINT `competition` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`competition_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follower` FOREIGN KEY (`follower_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `leader` FOREIGN KEY (`leader_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `university` FOREIGN KEY (`university_id`) REFERENCES `university` (`university_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
