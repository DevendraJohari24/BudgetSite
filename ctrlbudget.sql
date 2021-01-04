-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 04, 2021 at 07:54 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctrlbudget`
--

-- --------------------------------------------------------

--
-- Table structure for table `budget_expense`
--

DROP TABLE IF EXISTS `budget_expense`;
CREATE TABLE IF NOT EXISTS `budget_expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_title` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `amount` bigint(255) NOT NULL,
  `person_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `target_path` varchar(255) NOT NULL,
  `plan_id` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`,`user_id`),
  KEY `user_id` (`user_id`),
  KEY `plan_id` (`plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `budget_persons`
--

DROP TABLE IF EXISTS `budget_persons`;
CREATE TABLE IF NOT EXISTS `budget_persons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `person_name` varchar(20) NOT NULL,
  `plan_id` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `plan_id` (`plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `budget_plans`
--

DROP TABLE IF EXISTS `budget_plans`;
CREATE TABLE IF NOT EXISTS `budget_plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `initial_budget` bigint(11) NOT NULL,
  `no_of_people` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `budget_users`
--

DROP TABLE IF EXISTS `budget_users`;
CREATE TABLE IF NOT EXISTS `budget_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `budget_expense`
--
ALTER TABLE `budget_expense`
  ADD CONSTRAINT `budget_expense_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `budget_users` (`id`),
  ADD CONSTRAINT `budget_expense_ibfk_2` FOREIGN KEY (`person_id`) REFERENCES `budget_persons` (`id`),
  ADD CONSTRAINT `budget_expense_ibfk_3` FOREIGN KEY (`plan_id`) REFERENCES `budget_plans` (`id`);

--
-- Constraints for table `budget_persons`
--
ALTER TABLE `budget_persons`
  ADD CONSTRAINT `budget_persons_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `budget_users` (`id`),
  ADD CONSTRAINT `budget_persons_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `budget_plans` (`id`);

--
-- Constraints for table `budget_plans`
--
ALTER TABLE `budget_plans`
  ADD CONSTRAINT `budget_plans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `budget_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
