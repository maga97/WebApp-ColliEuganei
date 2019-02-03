-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2019 at 01:15 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ColliDigitali`
--

-- --------------------------------------------------------

--
-- Table structure for table `Attivita`
--

CREATE TABLE `Attivita` (
  `ID_Attivita` int(11) NOT NULL,
  `Descrizione` varchar(512) COLLATE latin1_bin NOT NULL,
  `Nome` varchar(40) COLLATE latin1_bin NOT NULL,
  `Prezzo` double NOT NULL,
  `Data` date NOT NULL,
  `Ore` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `Attivita`
--

INSERT INTO `Attivita` (`ID_Attivita`, `Descrizione`, `Nome`, `Prezzo`, `Data`, `Ore`) VALUES
(1, 'aaaa', 'AAA', 10, '2019-02-20', '10:00:00'),
(2, 'bbbb', 'BBB', 15, '2019-03-19', '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Prenotazioni`
--

CREATE TABLE `Prenotazioni` (
  `ID_Prenotazione` int(11) NOT NULL,
  `ID_Attivita` int(11) NOT NULL,
  `ID_Utenti` int(11) NOT NULL,
  `Giorno` date NOT NULL,
  `Ore` int(11) NOT NULL,
  `NumPostiPrenotati` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `Prenotazioni`
--

INSERT INTO `Prenotazioni` (`ID_Prenotazione`, `ID_Attivita`, `ID_Utenti`, `Giorno`, `Ore`, `NumPostiPrenotati`) VALUES
(12, 1, 7, '2019-02-20', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Utenti`
--

CREATE TABLE `Utenti` (
  `ID_Utente` int(11) NOT NULL,
  `Nome` varchar(28) COLLATE latin1_bin NOT NULL,
  `Cognome` varchar(28) COLLATE latin1_bin NOT NULL,
  `Email` varchar(28) COLLATE latin1_bin NOT NULL,
  `Password` varchar(256) COLLATE latin1_bin NOT NULL,
  `Indirizzo` varchar(28) COLLATE latin1_bin DEFAULT NULL,
  `Civico` int(11) DEFAULT NULL,
  `Citta` varchar(28) COLLATE latin1_bin DEFAULT NULL,
  `CAP` int(11) DEFAULT NULL,
  `Tipo` enum('utente','amministratore') COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `Utenti`
--

INSERT INTO `Utenti` (`ID_Utente`, `Nome`, `Cognome`, `Email`, `Password`, `Indirizzo`, `Civico`, `Citta`, `CAP`, `Tipo`) VALUES
(1, 'Mario', 'Coniglio', 'ciao@gmail.com', '$2y$10$Zhowx9JH0PEQn/BzHMXJO.GdkV0xlMzIe21/PONIvCZ1/Uz2vg84q', 'ciso', 12, '', 12, 'utente'),
(2, 'Giulio', 'Piva', 'GiulioPiva@outlook.it', '$2y$10$Ys5pFBEiS2YFplU3vQBfku3wWzpHzghoV3G2mGHLSpGPiBAVIS8t6', 'via dei salici', 12, '', 12, 'utente'),
(3, 'Giulio', 'Piva', 'tonyeffe@gmail.com', '$2y$10$kvT9FV3OisphW1jySmYCDuC3uHQIOySFK1GWoLXRXBDfE252j4KX2', 'via dei lupi', 0, '12', 35026, 'utente'),
(4, 'Giannizzero', 'bottoni', 'cico@gmail.com', '$2y$10$KRnwPb7E8MpYR3OR5.2dmeGI8M6u8wsW.6Y6X8PtDkispQhLQeJQK', '', 0, '', 0, 'utente'),
(5, 'AAA', 'BBB', 'a@a.a', '$2y$10$SoMy6Dyby3JGATdzvU293.cr..JjH31CLp9xc/GQgInv0layn5bCS', 'BBBB', 111, 'AAAA', 0, 'utente'),
(6, 'AAAA', 'AAAA', 'aaa@aaa.it', '$2y$10$fO9pidwSwaovVRSdSigNMuFK8VK8biWXKsoQH/CwcMrWgmVBs20I2', '', 0, '', 0, 'utente'),
(7, 'Giulio', 'Piv', 'gp@ciao.com', '$2y$10$BL1JmX5t7r3rSGrVU9v6UOSIMShwgx/1yk486zbc4iwJ4HD2EE46G', 'via dei lupi', 2, '12', 2, 'utente'),
(8, 'c', 'c', 'cc@ciao.com', '$2y$10$CipRqECkEHCMQfWL/40XmeVBcKNteZodN7dFIdSmHtbBuTK2lKIi.', 'c', 1, 'c', 1, 'utente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Attivita`
--
ALTER TABLE `Attivita`
  ADD PRIMARY KEY (`ID_Attivita`);

--
-- Indexes for table `Prenotazioni`
--
ALTER TABLE `Prenotazioni`
  ADD PRIMARY KEY (`ID_Prenotazione`),
  ADD KEY `ID_Attivita` (`ID_Attivita`),
  ADD KEY `ID_Utenti` (`ID_Utenti`);

--
-- Indexes for table `Utenti`
--
ALTER TABLE `Utenti`
  ADD PRIMARY KEY (`ID_Utente`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Attivita`
--
ALTER TABLE `Attivita`
  MODIFY `ID_Attivita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Prenotazioni`
--
ALTER TABLE `Prenotazioni`
  MODIFY `ID_Prenotazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Utenti`
--
ALTER TABLE `Utenti`
  MODIFY `ID_Utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Prenotazioni`
--
ALTER TABLE `Prenotazioni`
  ADD CONSTRAINT `Prenotazioni_ibfk_1` FOREIGN KEY (`ID_Attivita`) REFERENCES `Attivita` (`ID_Attivita`),
  ADD CONSTRAINT `Prenotazioni_ibfk_2` FOREIGN KEY (`ID_Utenti`) REFERENCES `Utenti` (`ID_Utente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
