-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 24, 2023 at 09:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SunnySpot`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `staffID` bigint(20) NOT NULL,
  `userName` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `mobile` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Cabin`
--

CREATE TABLE `Cabin` (
  `cabinID` bigint(20) NOT NULL,
  `cabinType` varchar(150) DEFAULT NULL,
  `cabinDescription` varchar(255) DEFAULT NULL,
  `pricePerNight` bigint(10) DEFAULT NULL,
  `pricePerWeek` decimal(10,2) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `CabinInclusion`
--

CREATE TABLE `CabinInclusion` (
  `cabinIncID` bigint(20) NOT NULL,
  `cabinID` bigint(20) DEFAULT NULL,
  `incID` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Inclusion`
--

CREATE TABLE `Inclusion` (
  `incID` bigint(20) NOT NULL,
  `incName` varchar(50) DEFAULT NULL,
  `incDetails` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Log`
--

CREATE TABLE `Log` (
  `logID` bigint(20) NOT NULL,
  `loginDateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `logoutDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `staffID` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `Cabin`
--
ALTER TABLE `Cabin`
  ADD PRIMARY KEY (`cabinID`);

--
-- Indexes for table `CabinInclusion`
--
ALTER TABLE `CabinInclusion`
  ADD PRIMARY KEY (`cabinIncID`),
  ADD KEY `cabinID` (`cabinID`),
  ADD KEY `incID` (`incID`);

--
-- Indexes for table `Inclusion`
--
ALTER TABLE `Inclusion`
  ADD PRIMARY KEY (`incID`);

--
-- Indexes for table `Log`
--
ALTER TABLE `Log`
  ADD PRIMARY KEY (`logID`),
  ADD KEY `staffID` (`staffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `staffID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Cabin`
--
ALTER TABLE `Cabin`
  MODIFY `cabinID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `CabinInclusion`
--
ALTER TABLE `CabinInclusion`
  MODIFY `cabinIncID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Inclusion`
--
ALTER TABLE `Inclusion`
  MODIFY `incID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Log`
--
ALTER TABLE `Log`
  MODIFY `logID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CabinInclusion`
--
ALTER TABLE `CabinInclusion`
  ADD CONSTRAINT `cabininclusion_ibfk_1` FOREIGN KEY (`cabinID`) REFERENCES `Cabin` (`cabinID`),
  ADD CONSTRAINT `cabininclusion_ibfk_2` FOREIGN KEY (`incID`) REFERENCES `Inclusion` (`incID`);

--
-- Constraints for table `Log`
--
ALTER TABLE `Log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`staffID`) REFERENCES `Admin` (`staffID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
