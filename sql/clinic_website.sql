-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 09:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `accdata`
--

CREATE TABLE `accdata` (
  `AccountID` int(10) NOT NULL,
  `AccountName` varchar(100) NOT NULL,
  `AccountEmail` varchar(100) NOT NULL,
  `AccountPass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accdata`
--

INSERT INTO `accdata` (`AccountID`, `AccountName`, `AccountEmail`, `AccountPass`) VALUES
(1, 'Brent Harvey B. Rull', 'brentharveyrull@gmail.com', '$2y$10$8.DFzFXCwo9Es0CAuW8X6OVRUu6UxqeYUuZ7aZ0zPdYtmPmrTrqJi'),
(2, 'admin123', 'admin123@gmail.com', '$2y$10$aplIw31feIHXntBaOyjWyOFIhHS0HxzzsiWZdgtxI77LpaK9/rhy6');

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `AccountID` int(10) NOT NULL,
  `AccountName` varchar(100) NOT NULL,
  `AccountType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`AccountID`, `AccountName`, `AccountType`) VALUES
(1, 'Brent Harvey B. Rull', 'customer'),
(2, 'admin123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `AdminID` int(10) NOT NULL,
  `AccountID` int(10) DEFAULT NULL,
  `AccountName` varchar(100) NOT NULL,
  `AccountType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accdata`
--
ALTER TABLE `accdata`
  ADD PRIMARY KEY (`AccountID`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`AccountID`),
  ADD UNIQUE KEY `AccountID` (`AccountID`,`AccountName`,`AccountType`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`AdminID`),
  ADD KEY `AccountID` (`AccountID`,`AccountName`,`AccountType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accdata`
--
ALTER TABLE `accdata`
  MODIFY `AccountID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `AccountID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`AccountID`,`AccountName`,`AccountType`) REFERENCES `accounts` (`AccountID`, `AccountName`, `AccountType`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
