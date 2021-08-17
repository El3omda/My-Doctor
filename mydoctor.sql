-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2021 at 08:04 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydoctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `ID` int(10) NOT NULL,
  `DocName` varchar(100) NOT NULL,
  `DocEmail` varchar(100) NOT NULL,
  `DocPassword` varchar(100) NOT NULL,
  `DocPhone` varchar(20) NOT NULL,
  `DocGender` varchar(5) NOT NULL,
  `DocAge` int(3) NOT NULL,
  `DocSpec` int(100) NOT NULL,
  `DocClinic` varchar(300) NOT NULL,
  `DocCountry` varchar(100) NOT NULL,
  `Online` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`ID`, `DocName`, `DocEmail`, `DocPassword`, `DocPhone`, `DocGender`, `DocAge`, `DocSpec`, `DocClinic`, `DocCountry`, `Online`) VALUES
(1, 'emad', 'lskldlas@lskld.sdas', '12554', '1245454', 'male', 20, 0, '', 'EG,Alexandria', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `UserPassword` varchar(100) NOT NULL,
  `UserAge` int(3) NOT NULL,
  `UserGender` varchar(5) NOT NULL,
  `UserCountry` varchar(50) NOT NULL,
  `Online` varchar(5) NOT NULL,
  `RegDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `UserName`, `UserEmail`, `UserPassword`, `UserAge`, `UserGender`, `UserCountry`, `Online`, `RegDate`) VALUES
(1, 'emad', 'el3om0a@gmail.com', '123', 20, 'male', 'EG,Alexandria', 'No', '2021-08-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `DocEmail` (`DocEmail`),
  ADD UNIQUE KEY `DocPhone` (`DocPhone`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UserEmail` (`UserEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
