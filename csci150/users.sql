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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `FirstName` char(20) NOT NULL,
  `LastName` char(20) NOT NULL,
  `UserID` int(9) NOT NULL,
  `UserPassword` char(12) NOT NULL,
  `isRegistered` char(4) NOT NULL,
  `PriveledgeLevel` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`FirstName`, `LastName`, `UserID`, `UserPassword`, `isRegistered`, `PriveledgeLevel`) VALUES
('John', 'Johnson', 200100, 'password1', 'YES', 'STUDENT'),
('Melissa', 'Smith', 200101, 'password2', 'NO', 'STUDENT'),
('Juan', 'Graica', 300100, 'password3', 'YES', 'TEACHER'),
('Emily', 'Polly', 300101, 'password4', 'YES', 'TEACHER'),
('Crey', 'Cweth', 300102, 'password5', 'YES', 'TEACHER'),
('Jane', 'Grace', 300103, 'password6', 'YES', 'TEACHER'),
('Kelly', 'Quiot', 300104, 'password7', 'YES', 'TEACHER');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
