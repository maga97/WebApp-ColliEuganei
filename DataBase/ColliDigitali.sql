-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 06, 2019 at 12:08 AM
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
(3, 'Meravigliosa gita al castello del catajo nei pressi di Battaglia Terme.', 'Gita al castello del catajo', 40, '2019-03-14', '12:30:00'),
(4, 'Gita a Villa Lispida nel cuore di Monselice', 'Gita a Villa Lispida', 10, '2019-04-23', '00:00:00'),
(5, 'Bici noleggiabili a 5 euro', 'Biciclettata al ferro di cavallo', 0, '2019-07-08', '16:00:00'),
(6, 'UUU', 'UUU', 45, '2019-02-13', '31:20:00'),
(7, '7999', 'hhk', 15, '2020-05-23', '13:45:00');

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
(16, 'AAA', 'AAA', 'aaa@aaa.it', '$2y$10$43opLpbmqyyzFELyEKwo7.CJZhlVRi07ZD67UTXhlRX.mtMSMGeLS', '', 0, '', 0, 'amministratore'),
(17, 'Giulio', 'a', 'ciso@gmail.com', '$2y$10$yTQWS4g8EnFv7c2.SF9emOqatOfPiXI51HTvAab3B24ZCDWf6919y', '', 0, '', 0, 'utente');

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
  MODIFY `ID_Attivita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Prenotazioni`
--
ALTER TABLE `Prenotazioni`
  MODIFY `ID_Prenotazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Utenti`
--
ALTER TABLE `Utenti`
  MODIFY `ID_Utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Prenotazioni`
--
ALTER TABLE `Prenotazioni`
  ADD CONSTRAINT `Prenotazioni_ibfk_1` FOREIGN KEY (`ID_Attivita`) REFERENCES `Attivita` (`ID_Attivita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Prenotazioni_ibfk_2` FOREIGN KEY (`ID_Utenti`) REFERENCES `Utenti` (`ID_Utente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
