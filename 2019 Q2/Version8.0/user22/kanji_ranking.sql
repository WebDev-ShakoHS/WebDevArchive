-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 22, 2020 at 08:21 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `version8`
--

-- --------------------------------------------------------

--
-- Table structure for table `kanji_ranking`
--

CREATE TABLE `kanji_ranking` (
  `id` int(11) NOT NULL,
  `kanji` varchar(100) NOT NULL,
  `stroke_count` varchar(255) NOT NULL,
  `difficulty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kanji_ranking`
--

INSERT INTO `kanji_ranking` (`id`, `kanji`, `stroke_count`, `difficulty`) VALUES
(2, '火', '4', 2),
(4, '僕', '14', 6),
(5, '四', '5', 2),
(6, '死', '8', 5),
(7, '三', '3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kanji_ranking`
--
ALTER TABLE `kanji_ranking`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kanji_ranking`
--
ALTER TABLE `kanji_ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
