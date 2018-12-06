-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2018 at 01:03 PM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `Descrizione` varchar(255) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Prezzo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Prenotazioni`
--

CREATE TABLE `Prenotazioni` (
  `ID_Prenotazione` int(11) NOT NULL,
  `ID_Attivita` int(11) NOT NULL,
  `ID_Utenti` int(11) NOT NULL,
  `Giorno` date NOT NULL,
  `Posti_Prenotati` int(10) NOT NULL,
  `Pagamento` varchar(20) NOT NULL,
  `Valutazione` enum('Insufficiente','Quasi insufficiente','Sufficiente','Buono','Ottimo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Utenti`
--

CREATE TABLE `Utenti` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Cognome` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Indirizzo` varchar(255) NOT NULL,
  `Civico` int(11) NOT NULL,
  `CAP` int(11) NOT NULL,
  `Tipo` enum('Admin','Utente') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Prenotazioni`
--
ALTER TABLE `Prenotazioni`
  ADD CONSTRAINT `Prenotazioni_ibfk_1` FOREIGN KEY (`ID_Attivita`) REFERENCES `Attivita` (`ID_Attivita`),
  ADD CONSTRAINT `Prenotazioni_ibfk_2` FOREIGN KEY (`ID_Utenti`) REFERENCES `Utenti` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
