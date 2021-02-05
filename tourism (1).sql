-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 09:04 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
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

CREATE TABLE `national_parks` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `national_parks`
--

INSERT INTO `national_parks` (`id`, `name`, `location`, `description`) VALUES
(1, 'Queen Elizabeth', 'Kasese', NULL),
(2, 'Bwindi National Park', '', NULL),
(3, 'Machizon N.P', 'Kasese', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) NOT NULL,
  `price` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `national_park_id` int(10) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `price`, `name`, `national_park_id`, `description`) VALUES
(1, '100000', 'Golden', 1, 'With this package, you will have 5 days of safaris, and feeding'),
(2, '75000', 'Silver', 1, 'With this package, you will have 3 days of safaris, and feeding. 0755205108 will call you shortly'),
(49, '100000', 'Golden', 1, ''),
(50, '75000', 'Silver', 1, ''),
(51, '600000', 'Silver', 3, 'hjfkhddf');

-- --------------------------------------------------------

--
-- Table structure for table `park_orders`
--

CREATE TABLE `park_orders` (
  `id` int(10) NOT NULL,
  `package_id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `phone_number` varchar(15) NOT NULL,
  `date_ordered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `park_orders`
--

INSERT INTO `park_orders` (`id`, `package_id`, `status`, `phone_number`, `date_ordered`) VALUES
(1, 2, 'pending', '0787436754', '2021-01-31 16:58:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `national_parks`
--
ALTER TABLE `national_parks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `national_park_id` (`national_park_id`);

--
-- Indexes for table `park_orders`
--
ALTER TABLE `park_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_id` (`package_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `national_parks`
--
ALTER TABLE `national_parks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `park_orders`
--
ALTER TABLE `park_orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`national_park_id`) REFERENCES `national_parks` (`id`);

--
-- Constraints for table `park_orders`
--
ALTER TABLE `park_orders`
  ADD CONSTRAINT `park_orders_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
