-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 04:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorite`
--

CREATE TABLE `kategorite` (
  `kategoriaID` int(11) NOT NULL,
  `ushqimetID` int(11) NOT NULL,
  `llojiKategorise` varchar(100) NOT NULL,
  `fotoKategorise` varchar(500) NOT NULL,
  `activeKategorise` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorite`
--

INSERT INTO `kategorite` (`kategoriaID`, `ushqimetID`, `llojiKategorise`, `fotoKategorise`, `activeKategorise`) VALUES
(3, 0, 'Dinner', 'sunset.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `porosite`
--

CREATE TABLE `porosite` (
  `porosiaID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `ushqimetID` int(11) DEFAULT NULL,
  `shoferiID` int(11) NOT NULL,
  `dataEPorosise` date DEFAULT current_timestamp(),
  `dateEDergeses` date DEFAULT NULL,
  `kostoja` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `porosite`
--

INSERT INTO `porosite` (`porosiaID`, `userID`, `ushqimetID`, `shoferiID`, `dataEPorosise`, `dateEDergeses`, `kostoja`) VALUES
(2, 1, 2, 1, '2023-01-02', '2023-01-03', '123.41'),
(17, 1, NULL, 1, '2023-01-04', '2023-01-03', '25.00'),
(18, 1, NULL, 1, '2023-01-03', '2023-01-02', '25.00'),
(34, 1, 4, 1, '2023-07-04', '2022-07-08', '500000.00'),
(35, 1, 4, 1, '2023-01-04', '2023-01-02', '123.47'),
(36, 1, 7, 1, '2023-01-09', '2023-01-05', '123.41');

-- --------------------------------------------------------

--
-- Table structure for table `shoferat`
--

CREATE TABLE `shoferat` (
  `shoferiID` int(11) NOT NULL,
  `emriShoferit` varchar(100) NOT NULL,
  `porosiaID` int(11) NOT NULL,
  `mbiemriShoferit` varchar(100) NOT NULL,
  `phoneShoferi` varchar(100) NOT NULL,
  `statusi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shoferat`
--

INSERT INTO `shoferat` (`shoferiID`, `emriShoferit`, `porosiaID`, `mbiemriShoferit`, `phoneShoferi`, `statusi`) VALUES
(1, 'Elhami', 1, 'Musliu', '69420360', 'Yes'),
(2, 'Elhami', 0, 'Musliu', '+38434434234', '1');

-- --------------------------------------------------------

--
-- Table structure for table `userat`
--

CREATE TABLE `userat` (
  `userID` int(11) NOT NULL,
  `emri` varchar(100) NOT NULL,
  `mbiemri` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passwordi` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `fotoUseri` varchar(500) DEFAULT NULL,
  `role` tinyint(4) NOT NULL,
  `adresa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userat`
--

INSERT INTO `userat` (`userID`, `emri`, `mbiemri`, `email`, `passwordi`, `phone`, `fotoUseri`, `role`, `adresa`) VALUES
(1, 'Linor', 'Zairi', 'linori@gmail.com', '12345678', '123456789', 'linori.png', 1, 'dis address'),
(4, 'Elhami', 'Musliu', 'elhamimusliu@gmail.com', '12345678', '12345678', NULL, 0, 'Ad');

-- --------------------------------------------------------

--
-- Table structure for table `ushqimet`
--

CREATE TABLE `ushqimet` (
  `ushqimetID` int(11) NOT NULL,
  `emriUshqimit` varchar(100) NOT NULL,
  `pershkrimi` varchar(500) DEFAULT NULL,
  `foto` varchar(500) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `kategoriaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ushqimet`
--

INSERT INTO `ushqimet` (`ushqimetID`, `emriUshqimit`, `pershkrimi`, `foto`, `active`, `kategoriaID`) VALUES
(2, 'Dyner', 'Dyner me mish pule, perime etj.', 'dyner.png', 1, 3),
(4, 'Pizza', 'Pizza me perime, ullinje, kerpudha etj.', 'pizza.png', 1, 3),
(6, 'Rice', 'Oriz i kuq me suxhuk, perime, mish etj.', 'rice.png', 1, 3),
(7, 'Burger', 'Hamburger me sallate, keqap, majonez, domate, tranguj etj.', 'burger.png', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorite`
--
ALTER TABLE `kategorite`
  ADD PRIMARY KEY (`kategoriaID`);

--
-- Indexes for table `porosite`
--
ALTER TABLE `porosite`
  ADD PRIMARY KEY (`porosiaID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `ushqimetID` (`ushqimetID`),
  ADD KEY `shoferiID` (`shoferiID`);

--
-- Indexes for table `shoferat`
--
ALTER TABLE `shoferat`
  ADD PRIMARY KEY (`shoferiID`);

--
-- Indexes for table `userat`
--
ALTER TABLE `userat`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `ushqimet`
--
ALTER TABLE `ushqimet`
  ADD PRIMARY KEY (`ushqimetID`),
  ADD KEY `ushqimet` (`kategoriaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorite`
--
ALTER TABLE `kategorite`
  MODIFY `kategoriaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `porosite`
--
ALTER TABLE `porosite`
  MODIFY `porosiaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `shoferat`
--
ALTER TABLE `shoferat`
  MODIFY `shoferiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userat`
--
ALTER TABLE `userat`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ushqimet`
--
ALTER TABLE `ushqimet`
  MODIFY `ushqimetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `porosite`
--
ALTER TABLE `porosite`
  ADD CONSTRAINT `porosite_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `userat` (`userID`),
  ADD CONSTRAINT `porosite_ibfk_2` FOREIGN KEY (`ushqimetID`) REFERENCES `ushqimet` (`ushqimetID`),
  ADD CONSTRAINT `porosite_ibfk_3` FOREIGN KEY (`shoferiID`) REFERENCES `shoferat` (`shoferiID`);

--
-- Constraints for table `ushqimet`
--
ALTER TABLE `ushqimet`
  ADD CONSTRAINT `ushqimet` FOREIGN KEY (`kategoriaID`) REFERENCES `kategorite` (`kategoriaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
