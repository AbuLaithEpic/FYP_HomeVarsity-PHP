-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 10:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home_varsity_db`
--
CREATE DATABASE IF NOT EXISTS `home_varsity_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `home_varsity_db`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `email` varchar(50) NOT NULL,
  `ic` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`email`, `ic`, `nama`, `date_created`) VALUES
('abu@gmail.com', 'abu', '', '2023-01-09 10:48:47'),
('test', 'test', 'test', '2023-01-17 07:22:26'),
('z', 'z', '', '2023-01-16 07:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(10) NOT NULL,
  `version` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `line1` varchar(50) NOT NULL,
  `line2` varchar(50) NOT NULL,
  `postcode` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `version`, `email`, `line1`, `line2`, `postcode`, `city`, `state`) VALUES
(27, '1', 'abu@gmail.com', 'No12', 'Taman Cahaya', '', '', ''),
(28, '2', 'abu@gmail.com', 'No23', 'Taman Bunga Raya', '', '', ''),
(29, '3', 'abu@gmail.com', 'No38', 'Taman Jaya', '', '', ''),
(30, '4', 'abu@gmail.com', 'No47', 'Taman Idaman', '', '', ''),
(34, '5', 'z', 'No 50', 'Taman Bahagia', '', '', ''),
(35, '6', 'z', 'No 52', 'Taman Bahagia', '', '', ''),
(36, '7', 'test', 'test', 'test', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `id` int(11) NOT NULL,
  `version` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `approve` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`id`, `version`, `email`, `approve`) VALUES
(20, '1', 'abu@gmail.com', 'approved'),
(21, '2', 'abu@gmail.com', 'approved'),
(22, '3', 'abu@gmail.com', 'approved'),
(23, '4', 'abu@gmail.com', 'approved'),
(29, '5', 'z', 'pending'),
(30, '6', 'z', 'approved'),
(31, '7', 'test', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `version` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `version`, `email`, `phone`, `link`) VALUES
(27, '1', 'abu@gmail.com', '012-3456789', 'https://wa.me/012-3456789'),
(28, '2', 'abu@gmail.com', '012-3456789', 'https://wa.me/012-3456789'),
(29, '3', 'abu@gmail.com', '012-3456789', 'https://wa.me/012-3456789'),
(30, '4', 'abu@gmail.com', '014-5678901', 'https://wa.me/012-3456789'),
(34, '5', 'z', '010-9822923', 'https://wa.me/010-9822923'),
(35, '6', 'z', '010-9822923', 'https://wa.me/010-9822923'),
(36, '7', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `distance`
--

CREATE TABLE `distance` (
  `id` int(11) NOT NULL,
  `version` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jarak` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distance`
--

INSERT INTO `distance` (`id`, `version`, `email`, `jarak`) VALUES
(25, '1', 'abu@gmail.com', 7),
(26, '2', 'abu@gmail.com', 5),
(27, '3', 'abu@gmail.com', 8.3),
(28, '4', 'abu@gmail.com', 5.5),
(32, '5', 'z', 10),
(33, '6', 'z', 10),
(34, '7', 'test', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `version` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `version`, `email`, `image_name`) VALUES
(26, '1', 'abu@gmail.com', 'z_1.jpg'),
(27, '2', 'abu@gmail.com', 'z_2.jpg'),
(28, '3', 'abu@gmail.com', 'z_3.jpg'),
(29, '4', 'abu@gmail.com', 'z_4.jpg'),
(33, '5', 'z', 'z_5.jpg'),
(34, '6', 'z', 'z_6.jpg'),
(35, '7', 'test', 'test_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `version` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `version`, `email`, `harga`) VALUES
(26, '1', 'abu@gmail.com', 1250),
(27, '2', 'abu@gmail.com', 1300),
(28, '3', 'abu@gmail.com', 1300),
(29, '4', 'abu@gmail.com', 300),
(33, '5', 'z', 1500),
(34, '6', 'z', 400),
(35, '7', 'test', 1100);

-- --------------------------------------------------------

--
-- Table structure for table `quantity`
--

CREATE TABLE `quantity` (
  `id` int(11) NOT NULL,
  `version` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bilangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quantity`
--

INSERT INTO `quantity` (`id`, `version`, `email`, `bilangan`) VALUES
(25, '1', 'abu@gmail.com', '1'),
(26, '2', 'abu@gmail.com', '1'),
(27, '3', 'abu@gmail.com', '2'),
(28, '4', 'abu@gmail.com', '4'),
(32, '5', 'z', '3'),
(33, '6', 'z', '5'),
(34, '7', 'test', '1');

-- --------------------------------------------------------

--
-- Table structure for table `type_house`
--

CREATE TABLE `type_house` (
  `version` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_house`
--

INSERT INTO `type_house` (`version`, `email`, `type`) VALUES
(1, 'abu@gmail.com', 'Terrace House'),
(2, 'abu@gmail.com', 'Single House'),
(3, 'abu@gmail.com', 'Terrace House'),
(4, 'abu@gmail.com', 'Single House'),
(5, 'z', 'Single House'),
(6, 'z', 'Single House'),
(7, 'test', 'Terrace');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distance`
--
ALTER TABLE `distance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quantity`
--
ALTER TABLE `quantity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_house`
--
ALTER TABLE `type_house`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `distance`
--
ALTER TABLE `distance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `quantity`
--
ALTER TABLE `quantity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `type_house`
--
ALTER TABLE `type_house`
  MODIFY `version` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
