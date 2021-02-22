-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2021 at 11:52 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `box_record`
--

-- --------------------------------------------------------

--
-- Table structure for table `box_config`
--

CREATE TABLE `box_config` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `width` int(10) NOT NULL,
  `lenght` int(10) NOT NULL,
  `height` int(10) NOT NULL,
  `volume` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `box_config`
--

INSERT INTO `box_config` (`id`, `name`, `width`, `lenght`, `height`, `volume`) VALUES
(1, 'Mango box', 56, 4, 4, 896),
(2, 'Apple Box', 54, 54, 2, 5832),
(3, 'Grapes box', 9, 8, 6, 432),
(4, 'Orange box', 95, 2, 10, 1900);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `box_config`
--
ALTER TABLE `box_config`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `box_config`
--
ALTER TABLE `box_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
