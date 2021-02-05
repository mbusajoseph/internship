-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 05, 2021 at 10:52 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpletech_tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('usher', 'ee1ad5ac826cd68b03f02d272fa77701c5893cd2');

-- --------------------------------------------------------

--
-- Table structure for table `national_parks`
--

DROP TABLE IF EXISTS `national_parks`;
CREATE TABLE IF NOT EXISTS `national_parks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `national_parks`
--

INSERT INTO `national_parks` (`id`, `name`, `location`, `description`) VALUES
(1, 'Machizon N.P', 'Kasese', NULL),
(2, 'Queen Elizabeth', 'Kasese', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `price` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `national_park_id` int(10) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `national_park_id` (`national_park_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `price`, `name`, `description`, `national_park_id`, `status`) VALUES
(1, '100000', 'Golden', NULL, 1, '0'),
(2, '75000', 'Silver', 'The smallest package', 1, '0'),
(3, '15000', 'Diamond', NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `park_orders`
--

DROP TABLE IF EXISTS `park_orders`;
CREATE TABLE IF NOT EXISTS `park_orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `package_id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `phone_number` varchar(15) NOT NULL,
  `date_ordered` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `package_id` (`package_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `park_orders`
--

INSERT INTO `park_orders` (`id`, `package_id`, `status`, `phone_number`, `date_ordered`) VALUES
(1, 1, 'pending', '+256775445677', '2021-01-31 09:29:56'),
(2, 1, 'pending', '+256773463487', '2021-01-31 13:34:09'),
(4, 1, 'approved', '+256773463487', '2021-02-01 02:28:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
