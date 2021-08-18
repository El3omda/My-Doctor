-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2021 at 08:26 PM
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
  `DocGender` varchar(6) NOT NULL,
  `DocAge` int(3) NOT NULL,
  `DocSpec` varchar(200) NOT NULL,
  `DocClinic` varchar(300) NOT NULL,
  `DocCountry` varchar(100) NOT NULL,
  `DocImageSrc` text NOT NULL,
  `Online` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`ID`, `DocName`, `DocEmail`, `DocPassword`, `DocPhone`, `DocGender`, `DocAge`, `DocSpec`, `DocClinic`, `DocCountry`, `DocImageSrc`, `Online`) VALUES
(6, 'محمد النكلاوي', 'dr1@1.com', '123', '1254663', 'Male', 45, 'اخصائي باطنة', 'الزوايدة نمرة 2 عمارة قهوة السلطنة', 'Alexandria', 'imgs/doc/d1.jpg', 'No'),
(7, 'سارة عبدالسلام', 'dr2@1.com', '123', '25456423', 'Female', 27, 'الاسنان', 'المعمورة شارع 5 اما مسجد القيامة عمارة 7 شقة 3', 'Alexandria', 'imgs/doc/d3.jpg', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `ID` int(10) NOT NULL,
  `OffName` varchar(200) NOT NULL,
  `OffOPrice` varchar(10) NOT NULL,
  `OffNPrice` varchar(10) NOT NULL,
  `GeoLocation` varchar(100) NOT NULL,
  `OffClinicAddress` text NOT NULL,
  `OffDetails` text NOT NULL,
  `OffAvaliable` varchar(5) NOT NULL,
  `OffImageSrc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`ID`, `OffName`, `OffOPrice`, `OffNPrice`, `GeoLocation`, `OffClinicAddress`, `OffDetails`, `OffAvaliable`, `OffImageSrc`) VALUES
(1, 'تبيض اسنان', '50', '40', 'Alexandria', 'الاسكندرية العجمي شارع 4 امام مسجد النور\r\nعمارة 105 الدور الاول اول شقة شمال', 'تبيض الاسنان و ازالة الرواسب حتي تعود الاسنان جديد و لامعة', 'Yes', 'imgs/offers/dentist.jpg'),
(2, 'تجميل الانف', '5500', '4000', 'Alexandria', 'الاسكندرية العوايد شارع 8 عزبة محسن امام قهوة النصر\r\nعمارة 9 الدور التالت علوى شقة رقم 5', 'تجميل الانف و ازاله العيوب\r\nبالاليزر', 'Yes', 'imgs/offers/beaty.jpg');

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
  `QuestionNo` int(11) NOT NULL,
  `BookingNo` int(11) NOT NULL,
  `Online` varchar(5) NOT NULL,
  `RegDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `UserName`, `UserEmail`, `UserPassword`, `UserAge`, `UserGender`, `UserCountry`, `QuestionNo`, `BookingNo`, `Online`, `RegDate`) VALUES
(1, 'Admin', 'admin@admin.com', '123', 21, 'male', 'Alexandria', 0, 0, 'Yes', '2021-08-17'),
(7, 'Emad Othman', 'e@gmail.com', '123', 21, 'male', 'Alexandria', 0, 0, 'No', '2021-08-18');

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
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
