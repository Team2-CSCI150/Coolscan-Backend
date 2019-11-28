-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2019 at 02:02 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `classinfo`
--

CREATE TABLE `classinfo` (
  `ClassID` int(6) NOT NULL,
  `Lattitude` decimal(10,7) NOT NULL,
  `Longitude` decimal(20,16) NOT NULL,
  `LatVariance` decimal(10,7) NOT NULL,
  `LongVariance` decimal(20,16) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `WeekDays` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classinfo`
--

INSERT INTO `classinfo` (`ClassID`, `Lattitude`, `Longitude`, `LatVariance`, `LongVariance`, `StartTime`, `EndTime`, `WeekDays`) VALUES
(510102, '36.8139238', '-119.7498563459344200', '0.0009000', '0.0040000000000000', '14:00:00', '17:00:00', 'TUTH'),
(510100, '36.7909769', '-119.6744964129226800', '0.0050000', '0.0010000000000000', '00:00:00', '23:59:59', 'MWF');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
