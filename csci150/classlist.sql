-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 05:05 AM
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
-- Table structure for table `classlist`
--

CREATE TABLE `classlist` (
  `ClassName` char(20) COLLATE utf8mb4_bin NOT NULL,
  `ClassSubject` char(20) COLLATE utf8mb4_bin NOT NULL,
  `ClassID` int(6) NOT NULL,
  `ClassInstructor` char(20) COLLATE utf8mb4_bin NOT NULL,
  `Title` char(5) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `classlist`
--

INSERT INTO `classlist` (`ClassName`, `ClassSubject`, `ClassID`, `ClassInstructor`, `Title`) VALUES
('Algebra 1', 'Math', 510100, 'Graica', 'Mr.'),
('Calculus 1', 'Math', 510101, 'Polly', 'Miss'),
('Chemistry 1', 'Science', 510102, 'Cweth', 'Mr.'),
('World History', 'History', 510103, 'Grace', 'Mrs.'),
('Life Biology', 'Science', 510104, 'Quiot', 'Mrs.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
