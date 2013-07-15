-- phpMyAdmin SQL Dump
-- version 4.0.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 03, 2013 at 06:57 PM
-- Server version: 5.5.31-0ubuntu0.12.04.2
-- PHP Version: 5.3.10-1ubuntu3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `intelrad_bank`
--
CREATE DATABASE IF NOT EXISTS `intelbank_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `intelbank_db`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `customer_id` int(255) NOT NULL,
  `account_number` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `balance` decimal(6,2) NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Containts account data of customers.' AUTO_INCREMENT=10 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `customer_id`, `account_number`, `balance`, `description`, `create_date`) VALUES
(8, 3, '15243', 1000.00, 'Poor Employee', '2013-07-03 14:02:15'),
(9, 4, '51423', 3699.99, 'Rich CEO', '2013-07-03 14:02:15');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`) VALUES
(1, 'intelGSM');

-- --------------------------------------------------------

--
-- Table structure for table `company_payment`
--

CREATE TABLE IF NOT EXISTS `company_payment` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `payment_type` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `source_id` int(255) NOT NULL,
  `amount` decimal(6,2) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `payment_type` (`payment_type`),
  KEY `source_id` (`source_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company_service`
--

CREATE TABLE IF NOT EXISTS `company_service` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `company_id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `company_service`
--

INSERT INTO `company_service` (`id`, `company_id`, `name`) VALUES
(1, 1, 'Cell Phone Payment'),
(2, 1, 'Home Phone Payment');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `ssn` int(11) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `customer_number` int(30) NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Contains customer informations' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `surname`, `birthdate`, `ssn`, `phone_number`, `address`, `email`, `customer_number`, `password`, `create_date`) VALUES
(3, 'Mehmet Dursun', 'INCE', '1983-12-12', 1234567890, 2147483647, 'Istanbul / Taksim', 'mehmet.ince@intelrad.com', 15243, 'e10adc3949ba59abbe56e057f20f883e', '2013-07-03 13:58:39'),
(4, 'Can', 'YILDIZLI', '1985-07-12', 987654321, 2147483647, 'Istanbul / Taksim', 'can.yildizli@intelrad.com', 51423, 'e10adc3949ba59abbe56e057f20f883e', '2013-07-03 13:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(255) NOT NULL,
  `ip_address` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `customer_id`, `ip_address`, `create_date`) VALUES
(1, 3, '127.0.0.1', '2013-07-03 14:02:33'),
(2, 3, '127.0.0.1', '2013-07-03 14:04:29'),
(3, 3, '127.0.0.1', '2013-07-03 14:26:33'),
(4, 4, '127.0.0.1', '2013-07-03 14:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `customer_id` int(255) NOT NULL,
  `source_id` int(255) NOT NULL,
  `destination_id` int(255) NOT NULL,
  `amount` decimal(6,2) NOT NULL,
  `transfer_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`,`source_id`,`destination_id`),
  KEY `source_id` (`source_id`),
  KEY `destination_id` (`destination_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `customer_id`, `source_id`, `destination_id`, `amount`, `transfer_date`, `description`) VALUES
(1, 3, 8, 9, 37.00, '2013-07-03 14:35:17', 'i''m sending money to you sir.'),
(2, 3, 8, 9, 300.00, '2013-07-03 14:43:15', 'TEST'),
(3, 3, 9, 8, 300.00, '2013-07-03 14:43:39', 'TEST'),
(4, 3, 9, 8, 300.00, '2013-07-03 14:44:01', 'TEST'),
(5, 3, 9, 8, 300.00, '2013-07-03 14:44:02', 'TEST'),
(6, 3, 9, 8, 300.00, '2013-07-03 14:44:02', 'TEST'),
(7, 3, 9, 8, 300.00, '2013-07-03 14:44:03', 'TEST'),
(8, 3, 9, 8, 300.00, '2013-07-03 14:44:03', 'TEST'),
(9, 3, 9, 8, 300.00, '2013-07-03 14:44:54', 'TEST'),
(10, 3, 9, 8, 300.00, '2013-07-03 14:44:54', 'TEST'),
(11, 3, 9, 8, 300.00, '2013-07-03 14:44:54', 'TEST'),
(12, 3, 9, 8, 300.00, '2013-07-03 14:44:54', 'TEST'),
(13, 3, 9, 8, 300.00, '2013-07-03 14:44:54', 'TEST'),
(14, 3, 9, 8, 300.00, '2013-07-03 14:44:55', 'TEST'),
(15, 3, 9, 8, 300.00, '2013-07-03 14:44:55', 'TEST'),
(16, 3, 9, 8, 300.00, '2013-07-03 14:44:55', 'TEST'),
(17, 3, 9, 8, 300.00, '2013-07-03 14:44:55', 'TEST'),
(18, 3, 9, 8, 300.00, '2013-07-03 14:44:55', 'TEST'),
(19, 3, 9, 8, 300.00, '2013-07-03 14:44:56', 'TEST'),
(20, 3, 9, 8, 300.00, '2013-07-03 14:50:07', 'TEST'),
(21, 3, 9, 8, 300.00, '2013-07-03 14:50:49', 'TEST'),
(22, 3, 9, 8, 300.00, '2013-07-03 14:51:04', 'TEST'),
(23, 3, 9, 8, 300.00, '2013-07-03 15:17:36', 'TEST');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company_payment`
--
ALTER TABLE `company_payment`
  ADD CONSTRAINT `company_payment_ibfk_2` FOREIGN KEY (`source_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_payment_ibfk_1` FOREIGN KEY (`payment_type`) REFERENCES `company_service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_payment_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company_service`
--
ALTER TABLE `company_service`
  ADD CONSTRAINT `company_service_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`destination_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`source_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
